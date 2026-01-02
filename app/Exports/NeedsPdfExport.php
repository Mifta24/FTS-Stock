<?php

namespace App\Exports;

use App\Models\Need;
use Barryvdh\DomPDF\Facade\Pdf;

class NeedsPdfExport
{
    protected $filterStatus;
    protected $filterMonth;
    protected $filterYear;

    public function __construct($filterStatus = 'all', $filterMonth = '', $filterYear = '')
    {
        $this->filterStatus = $filterStatus;
        $this->filterMonth = $filterMonth;
        $this->filterYear = $filterYear;
    }

    public function download()
    {
        $query = Need::with('user')->orderBy('created_at', 'desc');

        if ($this->filterStatus !== 'all') {
            $query->where('status', $this->filterStatus);
        }

        if ($this->filterMonth) {
            $query->whereMonth('created_at', $this->filterMonth);
        }

        if ($this->filterYear) {
            $query->whereYear('created_at', $this->filterYear);
        }

        $needs = $query->get();

        $data = [
            'needs' => $needs,
            'filterStatus' => $this->filterStatus,
            'filterMonth' => $this->filterMonth,
            'filterYear' => $this->filterYear,
            'totalCost' => $needs->sum('estimated_price'),
            'exportDate' => now()->format('d M Y H:i'),
        ];

        $pdf = Pdf::loadView('exports.needs-pdf', $data);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('needs-report-' . now()->format('Y-m-d') . '.pdf');
    }
}
