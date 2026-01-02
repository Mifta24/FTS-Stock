<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div>
                <h3 class="text-2xl font-bold text-white flex items-center gap-2">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Needs Management
                </h3>
                <p class="text-indigo-100 text-sm mt-1">Track and manage all your needs in one place</p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <button wire:click="exportPdf"
                        class="bg-white text-red-600 px-4 py-2 rounded-lg font-semibold hover:bg-red-50 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center gap-2 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    PDF
                </button>
                <button wire:click="export"
                        class="bg-white text-green-600 px-4 py-2 rounded-lg font-semibold hover:bg-green-50 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center gap-2 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Excel
                </button>
                <button wire:click="exportCsv"
                        class="bg-white text-teal-600 px-4 py-2 rounded-lg font-semibold hover:bg-teal-50 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center gap-2 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    CSV
                </button>
            </div>
        </div>
    </div>

    <div class="p-6">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
            <!-- Total Needs -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-4 border-2 border-blue-100 hover:shadow-lg transition-all duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">Total</p>
                        <p class="text-2xl font-bold text-blue-700 mt-1">{{ $stats['total'] }}</p>
                    </div>
                    <div class="bg-blue-500 rounded-lg p-2">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pending -->
            <div class="bg-gradient-to-br from-yellow-50 to-amber-50 rounded-xl p-4 border-2 border-yellow-100 hover:shadow-lg transition-all duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-yellow-600 uppercase tracking-wide">Pending</p>
                        <p class="text-2xl font-bold text-yellow-700 mt-1">{{ $stats['pending'] }}</p>
                    </div>
                    <div class="bg-yellow-500 rounded-lg p-2">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Approved -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-4 border-2 border-green-100 hover:shadow-lg transition-all duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-green-600 uppercase tracking-wide">Approved</p>
                        <p class="text-2xl font-bold text-green-700 mt-1">{{ $stats['approved'] }}</p>
                    </div>
                    <div class="bg-green-500 rounded-lg p-2">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Filled -->
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border-2 border-blue-100 hover:shadow-lg transition-all duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">Filled</p>
                        <p class="text-2xl font-bold text-blue-700 mt-1">{{ $stats['filled'] }}</p>
                    </div>
                    <div class="bg-blue-500 rounded-lg p-2">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Rejected -->
            <div class="bg-gradient-to-br from-red-50 to-rose-50 rounded-xl p-4 border-2 border-red-100 hover:shadow-lg transition-all duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-red-600 uppercase tracking-wide">Rejected</p>
                        <p class="text-2xl font-bold text-red-700 mt-1">{{ $stats['rejected'] }}</p>
                    </div>
                    <div class="bg-red-500 rounded-lg p-2">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Cost -->
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-4 border-2 border-purple-100 hover:shadow-lg transition-all duration-200">
                <div class="flex items-center justify-between">
                    <div class="overflow-hidden">
                        <p class="text-xs font-semibold text-purple-600 uppercase tracking-wide">Total Cost</p>
                        <p class="text-lg font-bold text-purple-700 mt-1 truncate" title="Rp {{ number_format($stats['total_cost'], 0, ',', '.') }}">
                            Rp {{ number_format($stats['total_cost'] / 1000, 0) }}K
                        </p>
                    </div>
                    <div class="bg-purple-500 rounded-lg p-2">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/30 dark:to-emerald-900/30 border border-green-200 dark:border-green-700 text-green-700 dark:text-green-300 rounded-xl flex items-center gap-3 shadow-sm">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ session('message') }}
            </div>
        @endif

        <!-- Search Bar -->
        <div class="mb-6">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text"
                       wire:model.live.debounce.300ms="search"
                       placeholder="Search by item name, description, or notes..."
                       class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500">
                @if($search)
                    <button wire:click="$set('search', '')" class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <svg class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Filter by Status</label>
                <select wire:model.live="filterStatus"
                        class="w-full border-2 border-gray-200 dark:border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    <option value="all">All</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                    <option value="filled">Filled</option>
                </select>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Filter by Month</label>
                <select wire:model.live="filterMonth"
                        class="w-full border-2 border-gray-200 dark:border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    <option value="">All Months</option>
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                            {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Filter by Year</label>
                <select wire:model.live="filterYear"
                        class="w-full border-2 border-gray-200 dark:border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    @for($y = now()->year; $y >= now()->year - 5; $y--)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <!-- Bulk Actions Bar -->
        @if(count($selectedIds) > 0)
            <div class="bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg p-4 shadow-lg animate-fade-in">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-white font-semibold">{{ count($selectedIds) }} item(s) selected</span>
                    </div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <button wire:click="confirmBulkAction('approved')"
                                class="px-4 py-2 bg-white text-green-600 hover:bg-green-50 rounded-lg font-semibold transition-colors duration-200 flex items-center gap-2 shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Approve
                        </button>
                        <button wire:click="confirmBulkAction('rejected')"
                                class="px-4 py-2 bg-white text-red-600 hover:bg-red-50 rounded-lg font-semibold transition-colors duration-200 flex items-center gap-2 shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Reject
                        </button>
                        <button wire:click="confirmBulkAction('filled')"
                                class="px-4 py-2 bg-white text-blue-600 hover:bg-blue-50 rounded-lg font-semibold transition-colors duration-200 flex items-center gap-2 shadow-md">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Mark Filled
                        </button>
                        <button wire:click="confirmBulkAction('pending')"
                                class="px-4 py-2 bg-white text-yellow-600 hover:bg-yellow-50 rounded-lg font-semibold transition-colors duration-200 flex items-center gap-2 shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Reset Pending
                        </button>
                        <div class="w-px h-8 bg-white opacity-30"></div>
                        <button wire:click="confirmBulkAction('delete')"
                                class="px-4 py-2 bg-white text-red-700 hover:bg-red-50 rounded-lg font-semibold transition-colors duration-200 flex items-center gap-2 shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600">
                    <tr>
                        <th class="px-6 py-4 text-left">
                            <input type="checkbox" wire:model.live="selectAll"
                                   class="w-5 h-5 text-indigo-600 bg-white border-gray-300 dark:border-gray-600 rounded focus:ring-indigo-500 focus:ring-2 cursor-pointer dark:bg-gray-700">
                        </th>
                        <th wire:click="sort('item_name')" class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                            <div class="flex items-center gap-2">
                                Item Name
                                @if($sortBy === 'item_name')
                                    @if($sortDirection === 'asc')
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    @endif
                                @else
                                    <svg class="w-4 h-4 opacity-30" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </div>
                        </th>
                        <th wire:click="sort('quantity')" class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                            <div class="flex items-center gap-2">
                                Quantity
                                @if($sortBy === 'quantity')
                                    @if($sortDirection === 'asc')
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    @endif
                                @else
                                    <svg class="w-4 h-4 opacity-30" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </div>
                        </th>
                        <th wire:click="sort('estimated_price')" class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                            <div class="flex items-center gap-2">
                                Price
                                @if($sortBy === 'estimated_price')
                                    @if($sortDirection === 'asc')
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    @endif
                                @else
                                    <svg class="w-4 h-4 opacity-30" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </div>
                        </th>
                        <th wire:click="sort('created_at')" class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                            <div class="flex items-center gap-2">
                                Date
                                @if($sortBy === 'created_at')
                                    @if($sortDirection === 'asc')
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    @endif
                                @else
                                    <svg class="w-4 h-4 opacity-30" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </div>
                        </th>
                        <th wire:click="sort('status')" class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                            <div class="flex items-center gap-2">
                                Status
                                @if($sortBy === 'status')
                                    @if($sortDirection === 'asc')
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    @endif
                                @else
                                    <svg class="w-4 h-4 opacity-30" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Files</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($needs as $need)
                        @if($editingId === $need->id)
                            <tr class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/30 dark:to-indigo-900/30">
                                <td class="px-4 py-3">
                                    <input type="checkbox" wire:model.live="selectedIds" value="{{ $need->id }}"
                                           class="w-5 h-5 text-indigo-600 bg-white border-gray-300 dark:border-gray-600 rounded focus:ring-indigo-500 focus:ring-2 cursor-pointer dark:bg-gray-700">
                                </td>
                                <td class="px-4 py-3">
                                    <input type="text" wire:model="editForm.item_name"
                                           class="w-full border rounded px-2 py-1 text-sm">
                                    @error('editForm.item_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-1">
                                        <input type="number" wire:model="editForm.quantity"
                                               class="w-16 border rounded px-2 py-1 text-sm">
                                        <input type="text" wire:model="editForm.unit"
                                               class="w-16 border rounded px-2 py-1 text-sm">
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <input type="number" wire:model="editForm.estimated_price"
                                           class="w-full border rounded px-2 py-1 text-sm">
                                </td>
                                <td class="px-4 py-3">
                                    <input type="date" wire:model="editForm.needed_date"
                                           class="w-full border rounded px-2 py-1 text-sm">
                                </td>
                                <td class="px-4 py-3">
                                    @if($need->status === 'pending')
                                        <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded">Pending</span>
                                    @elseif($need->status === 'approved')
                                        <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded">Approved</span>
                                    @elseif($need->status === 'filled')
                                        <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">Filled</span>
                                    @else
                                        <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded">Rejected</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if($need->attachments->count() > 0)
                                        <span class="text-xs text-gray-600 dark:text-gray-400">{{ $need->attachments->count() }} file(s)</span>
                                    @else
                                        <span class="text-xs text-gray-400 dark:text-gray-500">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <button wire:click="update"
                                            class="text-green-600 hover:text-green-800 font-medium text-sm mr-2 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Save
                                    </button>
                                    <button wire:click="cancelEdit"
                                            class="text-gray-600 hover:text-gray-800 font-medium text-sm flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Cancel
                                    </button>
                                </td>
                            </tr>
                        @else
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <td class="px-6 py-4">
                                    <input type="checkbox" wire:model.live="selectedIds" value="{{ $need->id }}"
                                           class="w-5 h-5 text-indigo-600 bg-white border-gray-300 dark:border-gray-600 rounded focus:ring-indigo-500 focus:ring-2 cursor-pointer dark:bg-gray-700">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900 dark:text-gray-100">{{ $need->item_name }}</div>
                                    @if($need->description)
                                        <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ Str::limit($need->description, 50) }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $need->quantity }}</span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $need->unit }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($need->estimated_price)
                                        <span class="font-semibold text-gray-900 dark:text-gray-100">Rp {{ number_format($need->estimated_price, 0, ',', '.') }}</span>
                                    @else
                                        <span class="text-gray-400 dark:text-gray-500">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $need->created_at->format('d M Y') }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($need->status === 'pending')
                                        <span class="px-3 py-1.5 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded-full flex items-center gap-1 w-fit">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg>
                                            Pending
                                        </span>
                                    @elseif($need->status === 'approved')
                                        <span class="px-3 py-1.5 text-xs font-semibold bg-green-100 text-green-800 rounded-full flex items-center gap-1 w-fit">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            Approved
                                        </span>
                                    @elseif($need->status === 'filled')
                                        <span class="px-3 py-1.5 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full flex items-center gap-1 w-fit">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            Filled
                                        </span>
                                    @else
                                        <span class="px-3 py-1.5 text-xs font-semibold bg-red-100 text-red-800 rounded-full flex items-center gap-1 w-fit">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                            </svg>
                                            Rejected
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($need->attachments->count() > 0)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                            </svg>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $need->attachments->count() }} file(s)</p>
                                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                                    @foreach($need->attachments as $attachment)
                                                        <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank" download
                                                           class="hover:text-indigo-600 dark:hover:text-indigo-400 hover:underline">{{ $attachment->file_name }}</a>
                                                        @if(!$loop->last), @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-sm text-gray-400 dark:text-gray-500">No files</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <!-- Edit & Delete buttons group -->
                                        <div class="flex items-center gap-1 border-r-2 border-gray-200 dark:border-gray-600 pr-3">
                                            <button wire:click="edit({{ $need->id }})"
                                                    class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium text-sm transition-colors flex items-center gap-1 hover:bg-blue-50 dark:hover:bg-blue-900/30 px-2 py-1 rounded">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </button>
                                            <button wire:click="confirmDelete({{ $need->id }})"
                                                    class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 font-medium text-sm transition-colors flex items-center gap-1 hover:bg-red-50 dark:hover:bg-red-900/30 px-2 py-1 rounded">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete
                                            </button>
                                            <button wire:click="showHistory({{ $need->id }})"
                                                    class="text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-300 font-medium text-sm transition-colors flex items-center gap-1 hover:bg-purple-50 dark:hover:bg-purple-900/30 px-2 py-1 rounded">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                History
                                            </button>
                                        </div>

                                        <!-- Status action buttons group -->
                                        <div class="flex items-center gap-1">
                                        @if($need->status === 'pending')
                                        <button wire:click="confirmStatusChange({{ $need->id }}, 'approved')"
                                                class="text-green-600 hover:text-green-800 font-medium text-sm transition-colors flex items-center gap-1 hover:bg-green-50 px-2 py-1 rounded">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Approve
                                        </button>
                                        <button wire:click="confirmStatusChange({{ $need->id }}, 'rejected')"
                                                class="text-red-600 hover:text-red-800 font-medium text-sm transition-colors flex items-center gap-1 hover:bg-red-50 px-2 py-1 rounded">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Reject
                                        </button>
                                    @elseif($need->status === 'approved')
                                        <button wire:click="confirmStatusChange({{ $need->id }}, 'filled')"
                                                class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors flex items-center gap-1 hover:bg-blue-50 px-2 py-1 rounded">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Mark Filled
                                        </button>
                                        <button wire:click="confirmStatusChange({{ $need->id }}, 'pending')"
                                                class="text-gray-600 hover:text-gray-800 font-medium text-sm transition-colors flex items-center gap-1 hover:bg-gray-50 px-2 py-1 rounded">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                            Reset
                                        </button>
                                    @else
                                        <button wire:click="confirmStatusChange({{ $need->id }}, 'pending')"
                                                class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors flex items-center gap-1 hover:bg-blue-50 px-2 py-1 rounded">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                            Reset
                                        </button>
                                    @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-gray-500 text-lg font-medium mb-2">No needs data yet</p>
                                    <p class="text-gray-400 text-sm">Start by adding your first need item</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <label class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Show per page:</label>
                    <select wire:model.live="perPage"
                            class="border-2 border-gray-200 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="text-sm text-gray-600 dark:text-gray-400">
                        Showing <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $needs->firstItem() ?? 0 }}</span>
                        to <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $needs->lastItem() ?? 0 }}</span>
                        of <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $needs->total() }}</span> results
                    </span>
                </div>

                <div>
                    {{ $needs->links() }}
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-gray-200 dark:border-gray-600">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Total Items Filtered:</span>
                <span class="text-sm font-bold text-indigo-600 dark:text-indigo-400">{{ $needs->total() }}</span>
            </div>
            <a href="{{ route('input') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow hover:shadow-lg transform hover:-translate-y-0.5 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Need
            </a>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    @if($showDeleteModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 dark:bg-opacity-70 flex items-center justify-center z-50 transition-opacity duration-300" wire:click="cancelDelete">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all duration-300 scale-100" wire:click.stop>
                <div class="p-6">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 dark:bg-red-900/30 rounded-full mb-4">
                        <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Delete Confirmation</h3>
                    <p class="text-gray-600 text-center mb-6">Are you sure you want to delete this item? This action cannot be undone.</p>

                    <div class="flex gap-3">
                        <button wire:click="cancelDelete"
                                class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Cancel
                        </button>
                        <button wire:click="delete"
                                class="flex-1 px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition-all duration-200 shadow-lg hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-red-500">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Status Change Confirmation Modal -->
    @if($showStatusModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 dark:bg-opacity-70 flex items-center justify-center z-50 transition-opacity duration-300" wire:click="cancelStatusChange">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all duration-300 scale-100" wire:click.stop>
                <div class="p-6">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-gradient-to-r
                        @if($newStatus === 'approved') from-green-100 to-emerald-100 dark:from-green-900/30 dark:to-emerald-900/30
                        @elseif($newStatus === 'rejected') from-red-100 to-rose-100 dark:from-red-900/30 dark:to-rose-900/30
                        @elseif($newStatus === 'filled') from-blue-100 to-indigo-100 dark:from-blue-900/30 dark:to-indigo-900/30
                        @else from-gray-100 to-slate-100 dark:from-gray-800 dark:to-slate-800
                        @endif
                        rounded-full mb-4">
                        @if($newStatus === 'approved')
                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @elseif($newStatus === 'rejected')
                            <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @elseif($newStatus === 'filled')
                            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @else
                            <svg class="w-8 h-8 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 text-center mb-2">Status Change Confirmation</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center mb-6">
                        Are you sure you want to change the status to
                        <span class="font-semibold
                            @if($newStatus === 'approved') text-green-600 dark:text-green-400
                            @elseif($newStatus === 'rejected') text-red-600 dark:text-red-400
                            @elseif($newStatus === 'filled') text-blue-600 dark:text-blue-400
                            @else text-gray-600 dark:text-gray-400
                            @endif">
                            {{ ucfirst($newStatus ?? '') }}
                        </span>?
                    </p>

                    <div class="flex gap-3">
                        <button wire:click="cancelStatusChange"
                                class="flex-1 px-4 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-semibold hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500">
                            Cancel
                        </button>
                        <button wire:click="updateStatus"
                                class="flex-1 px-4 py-3 bg-gradient-to-r
                                    @if($newStatus === 'approved') from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:ring-green-500
                                    @elseif($newStatus === 'rejected') from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 focus:ring-red-500
                                    @elseif($newStatus === 'filled') from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:ring-blue-500
                                    @else from-gray-600 to-slate-600 hover:from-gray-700 hover:to-slate-700 focus:ring-gray-500
                                    @endif
                                    text-white rounded-lg font-semibold transition-all duration-200 shadow-lg hover:shadow-xl focus:outline-none focus:ring-2">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- History Modal -->
    @if($showHistoryModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 dark:bg-opacity-70 flex items-center justify-center z-50 transition-opacity duration-300" wire:click="closeHistory">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-2xl w-full mx-4 max-h-[80vh] overflow-hidden transform transition-all duration-300 scale-100" wire:click.stop>
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-purple-600 to-indigo-600">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Activity History
                        </h3>
                        <button wire:click="closeHistory" class="text-white hover:text-gray-200 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="p-6 overflow-y-auto max-h-[60vh]">
                    @if($history->count() > 0)
                        <div class="space-y-4">
                            @foreach($history as $log)
                                <div class="flex gap-4 pb-4 border-b border-gray-200 dark:border-gray-700 last:border-0">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-r
                                            @if($log->action === 'status_changed' && $log->new_status === 'approved') from-green-400 to-emerald-400
                                            @elseif($log->action === 'status_changed' && $log->new_status === 'rejected') from-red-400 to-rose-400
                                            @elseif($log->action === 'status_changed' && $log->new_status === 'filled') from-blue-400 to-indigo-400
                                            @elseif($log->action === 'deleted') from-red-400 to-rose-400
                                            @else from-purple-400 to-indigo-400
                                            @endif
                                            flex items-center justify-center text-white">
                                            @if($log->action === 'status_changed')
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                                </svg>
                                            @elseif($log->action === 'updated')
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            @elseif($log->action === 'deleted')
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            @else
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $log->description }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                            By <span class="font-medium">{{ $log->user->name }}</span> •
                                            {{ $log->created_at->diffForHumans() }}
                                        </p>
                                        @if($log->old_status && $log->new_status)
                                            <div class="mt-2 flex items-center gap-2 text-xs">
                                                <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded font-medium">
                                                    {{ ucfirst($log->old_status) }}
                                                </span>
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                                </svg>
                                                <span class="px-2 py-1
                                                    @if($log->new_status === 'approved') bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300
                                                    @elseif($log->new_status === 'rejected') bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300
                                                    @elseif($log->new_status === 'filled') bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300
                                                    @else bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300
                                                    @endif
                                                    rounded font-medium">
                                                    {{ ucfirst($log->new_status) }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-300 dark:text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-gray-500 dark:text-gray-400 text-lg font-medium">No activity history yet</p>
                            <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">Changes will be tracked here</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <!-- Bulk Action Confirmation Modal -->
    @if($showBulkActionModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 dark:bg-opacity-70 flex items-center justify-center z-50 transition-opacity duration-300" wire:click="closeBulkActionModal">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all duration-300 scale-100" wire:click.stop>
                <div class="p-6 border-b border-gray-200 dark:border-gray-700
                    @if($bulkAction === 'delete') bg-gradient-to-r from-red-600 to-rose-600
                    @elseif($bulkAction === 'approved') bg-gradient-to-r from-green-600 to-emerald-600
                    @elseif($bulkAction === 'rejected') bg-gradient-to-r from-red-600 to-rose-600
                    @elseif($bulkAction === 'filled') bg-gradient-to-r from-blue-600 to-indigo-600
                    @else bg-gradient-to-r from-yellow-600 to-amber-600
                    @endif">
                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0">
                            @if($bulkAction === 'delete')
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            @elseif($bulkAction === 'approved')
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            @elseif($bulkAction === 'rejected')
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            @elseif($bulkAction === 'filled')
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            @else
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">
                                @if($bulkAction === 'delete')
                                    Confirm Bulk Delete
                                @elseif($bulkAction === 'approved')
                                    Confirm Bulk Approval
                                @elseif($bulkAction === 'rejected')
                                    Confirm Bulk Rejection
                                @elseif($bulkAction === 'filled')
                                    Confirm Bulk Mark as Filled
                                @else
                                    Confirm Bulk Reset to Pending
                                @endif
                            </h3>
                            <p class="text-white text-opacity-90 text-sm mt-1">{{ count($selectedIds) }} item(s) selected</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <p class="text-gray-700 dark:text-gray-300 mb-6">
                        @if($bulkAction === 'delete')
                            Are you sure you want to <span class="font-bold text-red-600 dark:text-red-400">delete {{ count($selectedIds) }} item(s)</span>? This action cannot be undone.
                        @else
                            Are you sure you want to change the status of <span class="font-bold text-indigo-600 dark:text-indigo-400">{{ count($selectedIds) }} item(s)</span> to
                            <span class="font-bold
                                @if($bulkAction === 'approved') text-green-600 dark:text-green-400
                                @elseif($bulkAction === 'rejected') text-red-600 dark:text-red-400
                                @elseif($bulkAction === 'filled') text-blue-600 dark:text-blue-400
                                @else text-yellow-600 dark:text-yellow-400
                                @endif">{{ ucfirst($bulkAction) }}</span>?
                        @endif
                    </p>

                    <div class="flex gap-3 justify-end">
                        <button wire:click="closeBulkActionModal"
                                class="px-6 py-2.5 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-semibold hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                            Cancel
                        </button>
                        <button wire:click="executeBulkAction"
                                class="px-6 py-2.5
                                @if($bulkAction === 'delete') bg-red-600 hover:bg-red-700
                                @elseif($bulkAction === 'approved') bg-green-600 hover:bg-green-700
                                @elseif($bulkAction === 'rejected') bg-red-600 hover:bg-red-700
                                @elseif($bulkAction === 'filled') bg-blue-600 hover:bg-blue-700
                                @else bg-yellow-600 hover:bg-yellow-700
                                @endif
                                text-white rounded-lg font-semibold transition-colors duration-200 shadow-lg">
                            @if($bulkAction === 'delete')
                                Delete
                            @else
                                Confirm
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
