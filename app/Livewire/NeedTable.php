<?php

namespace App\Livewire;

use App\Models\Need;
use Livewire\Component;
use Livewire\Attributes\On;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NeedsExport;

class NeedTable extends Component
{
    public $filterStatus = 'all';
    public $filterMonth = '';
    public $filterYear = '';

    public function mount()
    {
        $this->filterMonth = now()->format('m');
        $this->filterYear = now()->format('Y');
    }

    #[On('need-saved')]
    public function refreshTable()
    {
        // Livewire akan auto-refresh
    }

    public function updateStatus($needId, $status)
    {
        $need = Need::findOrFail($needId);
        $need->update(['status' => $status]);

        session()->flash('message', 'Status berhasil diupdate!');
    }

    public function export()
    {
        return Excel::download(new NeedsExport(
            $this->filterStatus,
            $this->filterMonth,
            $this->filterYear
        ), 'kebutuhan-' . now()->format('Y-m-d') . '.xlsx');
    }

    public function getNeeds()
    {
        $query = Need::with('user')->orderBy('created_at', 'desc');

        if ($this->filterStatus !== 'all') {
            $query->where('status', $this->filterStatus);
        }

        if ($this->filterMonth) {
            $query->whereMonth('needed_date', $this->filterMonth);
        }

        if ($this->filterYear) {
            $query->whereYear('needed_date', $this->filterYear);
        }

        return $query->get();
    }

    public function render()
    {
        return view('livewire.need-table', [
            'needs' => $this->getNeeds(),
        ]);
    }
}
