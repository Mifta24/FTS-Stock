<?php

namespace App\Exports;

use App\Models\Need;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class NeedsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $filterStatus;
    protected $filterMonth;
    protected $filterYear;

    public function __construct($filterStatus = 'all', $filterMonth = null, $filterYear = null)
    {
        $this->filterStatus = $filterStatus;
        $this->filterMonth = $filterMonth;
        $this->filterYear = $filterYear;
    }

    public function collection()
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

    public function headings(): array
    {
        return [
            'No',
            'Nama Item',
            'Deskripsi',
            'Jumlah',
            'Unit',
            'Estimasi Harga',
            'Tanggal Dibutuhkan',
            'Status',
            'Catatan',
            'Dibuat Oleh',
            'Tanggal Input',
        ];
    }

    public function map($need): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $need->item_name,
            $need->description,
            $need->quantity,
            $need->unit,
            $need->estimated_price ? 'Rp ' . number_format($need->estimated_price, 0, ',', '.') : '-',
            $need->needed_date->format('d/m/Y'),
            ucfirst($need->status),
            $need->notes,
            $need->user->name,
            $need->created_at->format('d/m/Y H:i'),
        ];
    }
}
