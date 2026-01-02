<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700">
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6">
        <h3 class="text-2xl font-bold text-white flex items-center gap-2">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            Add New Need
        </h3>
        <p class="text-blue-100 text-sm mt-1">Fill in the details below to create a new need request</p>
    </div>

    <div class="p-8">
        @if (session()->has('message'))
            <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/30 dark:to-emerald-900/30 border border-green-200 dark:border-green-700 text-green-700 dark:text-green-300 rounded-xl flex items-center gap-3 shadow-sm animate-pulse">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span class="text-red-500">*</span> Item Name
                    </label>
                    <input type="text" wire:model="item_name" placeholder="e.g., Printer Paper A4"
                           class="w-full border-2 border-gray-200 dark:border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500">
                    @error('item_name') <span class="text-red-500 text-xs flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span class="text-red-500">*</span> Unit
                    </label>
                    <input type="text" wire:model="unit" placeholder="pcs, box, kg, liter, etc"
                           class="w-full border-2 border-gray-200 dark:border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500">
                    @error('unit') <span class="text-red-500 text-xs flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span class="text-red-500">*</span> Quantity
                    </label>
                    <input type="number" wire:model="quantity" min="1" placeholder="0"
                           class="w-full border-2 border-gray-200 dark:border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500">
                    @error('quantity') <span class="text-red-500 text-xs flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Estimated Price (Rp)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-3.5 text-gray-500 dark:text-gray-400 font-semibold">Rp</span>
                        <input type="number" wire:model="estimated_price" min="0" step="0.01" placeholder="0"
                               class="w-full border-2 border-gray-200 dark:border-gray-600 rounded-lg pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500">
                    </div>
                    @error('estimated_price') <span class="text-red-500 text-xs flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span class="text-red-500">*</span> Needed Date
                    </label>
                    <input type="date" wire:model="needed_date"
                           class="w-full border-2 border-gray-200 dark:border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    @error('needed_date') <span class="text-red-500 text-xs flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Description</label>
                    <textarea wire:model="description" rows="3" placeholder="Provide detailed description of the item..."
                              class="w-full border-2 border-gray-200 dark:border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 resize-none bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"></textarea>
                    @error('description') <span class="text-red-500 text-xs flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Additional Notes</label>
                    <textarea wire:model="notes" rows="2" placeholder="Any additional information or special requirements..."
                              class="w-full border-2 border-gray-200 dark:border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 resize-none bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"></textarea>
                    @error('notes') <span class="text-red-500 text-xs flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                        </svg>
                        File Attachments
                        <span class="text-xs text-gray-500 dark:text-gray-400 font-normal">(Max 5 files)</span>
                    </label>
                    <input type="file" wire:model="attachments" multiple
                           accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.gif"
                           class="w-full border-2 border-gray-200 dark:border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 dark:file:bg-indigo-900/30 file:text-indigo-700 dark:file:text-indigo-300 hover:file:bg-indigo-100 dark:hover:file:bg-indigo-900/50 file:cursor-pointer cursor-pointer">
                    @error('attachments.*') <span class="text-red-500 text-xs flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                    @if($attachments)
                        <div class="mt-2 space-y-2">
                            @foreach($attachments as $index => $file)
                                <div class="flex items-center gap-2 bg-gray-50 dark:bg-gray-700 rounded-lg p-2">
                                    <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700 dark:text-gray-300 flex-1">{{ $file->getClientOriginalName() }}</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ number_format($file->getSize() / 1024, 1) }} KB</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-8 flex items-center gap-4">
                <button type="submit"
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Save Need
                </button>
                <a href="{{ route('dashboard') }}"
                   class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
