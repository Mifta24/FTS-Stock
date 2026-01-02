<?php

namespace App\Livewire;

use App\Models\Need;
use App\Models\ActivityLog;
use Livewire\Component;
use Livewire\Attributes\On;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NeedsExport;
use App\Exports\NeedsPdfExport;

class NeedTable extends Component
{
    public $filterStatus = 'all';
    public $filterMonth = '';
    public $filterYear = '';
    public $search = '';
    public $perPage = 10;

    public $editingId = null;

    // Sorting
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    // Bulk actions
    public $selectedIds = [];
    public $selectAll = false;
    public $showBulkActionModal = false;
    public $bulkAction = null;

    // Modal properties
    public $showDeleteModal = false;
    public $deleteId = null;
    public $showStatusModal = false;
    public $statusId = null;
    public $newStatus = null;
    public $showHistoryModal = false;
    public $historyNeedId = null;
    public $editForm = [
        'item_name' => '',
        'description' => '',
        'quantity' => '',
        'unit' => '',
        'estimated_price' => '',
        'needed_date' => '',
        'notes' => '',
    ];

    public function mount()
    {
        $this->filterMonth = now()->format('m');
        $this->filterYear = now()->format('Y');
    }

    public function sort($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    #[On('need-saved')]
    public function refreshTable()
    {
        // Livewire auto-refresh
    }

    public function confirmStatusChange($needId, $status)
    {
        $this->statusId = $needId;
        $this->newStatus = $status;
        $this->showStatusModal = true;
    }

    public function updateStatus()
    {
        if ($this->statusId && $this->newStatus) {
            $need = Need::findOrFail($this->statusId);
            $oldStatus = $need->status;
            $need->update(['status' => $this->newStatus]);

            // Log activity
            ActivityLog::create([
                'need_id' => $need->id,
                'user_id' => auth()->id(),
                'action' => 'status_changed',
                'old_status' => $oldStatus,
                'new_status' => $this->newStatus,
                'description' => "Status changed from {$oldStatus} to {$this->newStatus}",
            ]);
            $this->showStatusModal = false;
            $this->statusId = null;
            $this->newStatus = null;
        }
    }

    public function cancelStatusChange()
    {
        $this->showStatusModal = false;
        $this->statusId = null;
        $this->newStatus = null;
    }

    public function edit($needId)
    {
        $need = Need::findOrFail($needId);
        $this->editingId = $needId;
        $this->editForm = [
            'item_name' => $need->item_name,
            'description' => $need->description,
            'quantity' => $need->quantity,
            'unit' => $need->unit,
            'estimated_price' => $need->estimated_price,
            'needed_date' => $need->needed_date->format('Y-m-d'),
            'notes' => $need->notes,
        ];
    }

    public function cancelEdit()
    {
        $this->editingId = null;
        $this->reset('editForm');
    }

    public function update()
    {
        $this->validate([
            'editForm.item_name' => 'required|string|max:255',
            'editForm.quantity' => 'required|integer|min:1',
            'editForm.unit' => 'required|string|max:50',
            'editForm.needed_date' => 'required|date',
        ]);

        $need = Need::findOrFail($this->editingId);

        // Log activity
        ActivityLog::create([
            'need_id' => $need->id,
            'user_id' => auth()->id(),
            'action' => 'updated',
            'description' => "Updated need: {$this->editForm['item_name']}",
        ]);

        $need->update($this->editForm);

        $this->editingId = null;
        $this->reset('editForm');

        session()->flash('message', 'Need updated successfully!');
    }

    public function showHistory($needId)
    {
        $this->historyNeedId = $needId;
        $this->showHistoryModal = true;
    }

    public function closeHistory()
    {
        $this->showHistoryModal = false;
        $this->historyNeedId = null;
    }

    public function getHistoryProperty()
    {
        if (!$this->historyNeedId) {
            return collect();
        }

        return ActivityLog::with('user')
            ->where('need_id', $this->historyNeedId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function confirmDelete($needId)
    {
        $this->deleteId = $needId;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        if ($this->deleteId) {
            $need = Need::findOrFail($this->deleteId);

            // Log activity before deleting
            ActivityLog::create([
                'need_id' => $need->id,
                'user_id' => auth()->id(),
                'action' => 'deleted',
                'description' => "Deleted need: {$need->item_name}",
            ]);

            $need->delete();
            session()->flash('message', 'Need deleted successfully!');
            $this->showDeleteModal = false;
            $this->deleteId = null;
        }
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->deleteId = null;
    }

    public function export()
    {
        return Excel::download(new NeedsExport(
            $this->filterStatus,
            $this->filterMonth,
            $this->filterYear
        ), 'needs-' . now()->format('Y-m-d') . '.xlsx');
    }

    public function exportCsv()
    {
        return Excel::download(new NeedsExport(
            $this->filterStatus,
            $this->filterMonth,
            $this->filterYear
        ), 'needs-' . now()->format('Y-m-d') . '.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportPdf()
    {
        $pdfExport = new NeedsPdfExport(
            $this->filterStatus,
            $this->filterMonth,
            $this->filterYear
        );

        return $pdfExport->download();
    }

    public function getNeeds()
    {
        $query = Need::with(['user', 'attachments'])->orderBy($this->sortBy, $this->sortDirection);

        if ($this->filterStatus !== 'all') {
            $query->where('status', $this->filterStatus);
        }

        if ($this->filterMonth) {
            $query->whereMonth('created_at', $this->filterMonth);
        }

        if ($this->filterYear) {
            $query->whereYear('created_at', $this->filterYear);
        }

        if ($this->search) {
            $query->where(function($q) {
                $q->where('item_name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%')
                  ->orWhere('notes', 'like', '%' . $this->search . '%');
            });
        }

        return $query->paginate($this->perPage);
    }

    public function getStatsProperty()
    {
        $query = Need::query();

        // Apply same filters
        if ($this->filterMonth) {
            $query->whereMonth('created_at', $this->filterMonth);
        }
        if ($this->filterYear) {
            $query->whereYear('created_at', $this->filterYear);
        }
        if ($this->search) {
            $query->where(function($q) {
                $q->where('item_name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%')
                  ->orWhere('notes', 'like', '%' . $this->search . '%');
            });
        }

        return [
            'total' => (clone $query)->count(),
            'pending' => (clone $query)->where('status', 'pending')->count(),
            'approved' => (clone $query)->where('status', 'approved')->count(),
            'rejected' => (clone $query)->where('status', 'rejected')->count(),
            'filled' => (clone $query)->where('status', 'filled')->count(),
            'total_cost' => (clone $query)->sum('estimated_price'),
        ];
    }

    // Bulk actions methods
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedIds = $this->getNeeds()->pluck('id')->toArray();
        } else {
            $this->selectedIds = [];
        }
    }

    public function confirmBulkAction($action)
    {
        if (empty($this->selectedIds)) {
            return;
        }
        $this->bulkAction = $action;
        $this->showBulkActionModal = true;
    }

    public function closeBulkActionModal()
    {
        $this->showBulkActionModal = false;
        $this->bulkAction = null;
    }

    public function executeBulkAction()
    {
        if (empty($this->selectedIds) || !$this->bulkAction) {
            return;
        }

        $needs = Need::whereIn('id', $this->selectedIds)->get();

        foreach ($needs as $need) {
            if ($this->bulkAction === 'delete') {
                ActivityLog::create([
                    'need_id' => $need->id,
                    'user_id' => auth()->id(),
                    'action' => 'deleted',
                    'description' => "Bulk deleted: {$need->item_name}",
                ]);
                $need->delete();
            } elseif (in_array($this->bulkAction, ['pending', 'approved', 'rejected', 'filled'])) {
                $oldStatus = $need->status;
                $need->update(['status' => $this->bulkAction]);
                ActivityLog::create([
                    'need_id' => $need->id,
                    'user_id' => auth()->id(),
                    'action' => 'status_changed',
                    'old_status' => $oldStatus,
                    'new_status' => $this->bulkAction,
                    'description' => "Bulk status changed from {$oldStatus} to {$this->bulkAction}",
                ]);
            }
        }

        $this->selectedIds = [];
        $this->selectAll = false;
        $this->showBulkActionModal = false;
        $this->bulkAction = null;
    }

    public function render()
    {
        return view('livewire.need-table', [
            'needs' => $this->getNeeds(),
            'stats' => $this->stats,
        ]);
    }
}
