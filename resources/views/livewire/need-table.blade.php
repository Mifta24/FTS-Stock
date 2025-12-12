<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Daftar Kebutuhan</h3>
            <button wire:click="export"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                📥 Export Excel
            </button>
        </div>

        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('message') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium mb-1">Status</label>
                <select wire:model.live="filterStatus"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="all">Semua</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Bulan</label>
                <select wire:model.live="filterMonth"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Bulan</option>
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                            {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                        </option>
                    @endfor
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Tahun</label>
                <select wire:model.live="filterYear"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @for($y = now()->year; $y >= now()->year - 5; $y--)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Item</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Qty</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl Butuh</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($needs as $need)
                        <tr>
                            <td class="px-4 py-3">
                                <div class="font-medium">{{ $need->item_name }}</div>
                                @if($need->description)
                                    <div class="text-sm text-gray-500">{{ Str::limit($need->description, 50) }}</div>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $need->quantity }} {{ $need->unit }}</td>
                            <td class="px-4 py-3">
                                @if($need->estimated_price)
                                    Rp {{ number_format($need->estimated_price, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $need->needed_date->format('d/m/Y') }}</td>
                            <td class="px-4 py-3">
                                @if($need->status === 'pending')
                                    <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded">Pending</span>
                                @elseif($need->status === 'approved')
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded">Approved</span>
                                @else
                                    <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded">Rejected</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if($need->status === 'pending')
                                    <button wire:click="updateStatus({{ $need->id }}, 'approved')"
                                            class="text-green-600 hover:text-green-800 text-sm mr-2">✓ Approve</button>
                                    <button wire:click="updateStatus({{ $need->id }}, 'rejected')"
                                            class="text-red-600 hover:text-red-800 text-sm">✗ Reject</button>
                                @else
                                    <button wire:click="updateStatus({{ $need->id }}, 'pending')"
                                            class="text-blue-600 hover:text-blue-800 text-sm">↻ Reset</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                Belum ada data kebutuhan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-sm text-gray-600">
            Total: {{ $needs->count() }} item
        </div>
    </div>
</div>
