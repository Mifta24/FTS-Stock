<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Needs Report</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 10px;
            color: #333;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid #4F46E5;
        }
        .header h1 {
            color: #4F46E5;
            font-size: 24px;
            margin-bottom: 5px;
        }
        .header p {
            color: #666;
            font-size: 11px;
        }
        .info-section {
            background: #F3F4F6;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            display: table;
            width: 100%;
        }
        .info-row {
            display: table-row;
        }
        .info-label {
            display: table-cell;
            font-weight: bold;
            color: #4B5563;
            padding: 4px 10px;
            width: 120px;
        }
        .info-value {
            display: table-cell;
            color: #1F2937;
            padding: 4px 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th {
            background: linear-gradient(135deg, #667EEA 0%, #764BA2 100%);
            color: white;
            padding: 10px 8px;
            text-align: left;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #E5E7EB;
            font-size: 9px;
        }
        tr:nth-child(even) {
            background-color: #F9FAFB;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-pending {
            background: #FEF3C7;
            color: #92400E;
        }
        .status-approved {
            background: #D1FAE5;
            color: #065F46;
        }
        .status-rejected {
            background: #FEE2E2;
            color: #991B1B;
        }
        .status-filled {
            background: #DBEAFE;
            color: #1E40AF;
        }
        .footer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 2px solid #E5E7EB;
            text-align: right;
        }
        .summary {
            background: #EEF2FF;
            padding: 12px;
            border-radius: 6px;
            margin-top: 15px;
        }
        .summary-item {
            display: inline-block;
            margin-right: 25px;
        }
        .summary-label {
            font-weight: bold;
            color: #4338CA;
            font-size: 10px;
        }
        .summary-value {
            color: #1F2937;
            font-size: 11px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📊 FTS Stock - Needs Report</h1>
        <p>Stock Requirements Management System</p>
    </div>

    <div class="info-section">
        <div class="info-row">
            <div class="info-label">Export Date:</div>
            <div class="info-value">{{ $exportDate }}</div>
        </div>
        @if($filterStatus !== 'all')
        <div class="info-row">
            <div class="info-label">Status Filter:</div>
            <div class="info-value">{{ ucfirst($filterStatus) }}</div>
        </div>
        @endif
        @if($filterMonth)
        <div class="info-row">
            <div class="info-label">Month:</div>
            <div class="info-value">{{ date('F', mktime(0, 0, 0, $filterMonth, 1)) }}</div>
        </div>
        @endif
        @if($filterYear)
        <div class="info-row">
            <div class="info-label">Year:</div>
            <div class="info-value">{{ $filterYear }}</div>
        </div>
        @endif
        <div class="info-row">
            <div class="info-label">Total Items:</div>
            <div class="info-value">{{ $needs->count() }}</div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 25%;">Item Name</th>
                <th style="width: 10%;">Quantity</th>
                <th style="width: 15%;">Est. Price</th>
                <th style="width: 12%;">Date</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 23%;">Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse($needs as $index => $need)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td><strong>{{ $need->item_name }}</strong></td>
                <td>{{ $need->quantity }} {{ $need->unit }}</td>
                <td>
                    @if($need->estimated_price)
                        Rp {{ number_format($need->estimated_price, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $need->created_at->format('d M Y') }}</td>
                <td>
                    <span class="status-badge status-{{ $need->status }}">
                        {{ ucfirst($need->status) }}
                    </span>
                </td>
                <td>{{ Str::limit($need->description ?? '-', 50) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 20px; color: #9CA3AF;">
                    No data available
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary">
        <div class="summary-item">
            <span class="summary-label">Total Items:</span>
            <span class="summary-value">{{ $needs->count() }}</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Pending:</span>
            <span class="summary-value">{{ $needs->where('status', 'pending')->count() }}</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Approved:</span>
            <span class="summary-value">{{ $needs->where('status', 'approved')->count() }}</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Filled:</span>
            <span class="summary-value">{{ $needs->where('status', 'filled')->count() }}</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Rejected:</span>
            <span class="summary-value">{{ $needs->where('status', 'rejected')->count() }}</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Total Cost:</span>
            <span class="summary-value">Rp {{ number_format($totalCost, 0, ',', '.') }}</span>
        </div>
    </div>

    <div class="footer">
        <p style="color: #6B7280; font-size: 9px;">Generated by FTS Stock Management System</p>
    </div>
</body>
</html>
