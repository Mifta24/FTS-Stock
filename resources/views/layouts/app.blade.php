<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Dark Mode Script -->
        <script>
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Keyboard Shortcuts Help Modal -->
        <div id="shortcutsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 dark:bg-opacity-70 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-md w-full mx-4">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-indigo-600 to-purple-600">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                            </svg>
                            Keyboard Shortcuts
                        </h3>
                        <button onclick="document.getElementById('shortcutsModal').classList.add('hidden')"
                                class="text-white hover:text-gray-200 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-700 dark:text-gray-300">Go to Dashboard</span>
                            <kbd class="px-3 py-1 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded text-sm font-mono text-gray-700 dark:text-gray-300">D</kbd>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-700 dark:text-gray-300">Add New Need</span>
                            <kbd class="px-3 py-1 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded text-sm font-mono text-gray-700 dark:text-gray-300">N</kbd>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-700 dark:text-gray-300">Focus Search</span>
                            <kbd class="px-3 py-1 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded text-sm font-mono text-gray-700 dark:text-gray-300">S</kbd>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-700 dark:text-gray-300">Export Excel</span>
                            <kbd class="px-3 py-1 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded text-sm font-mono text-gray-700 dark:text-gray-300">E</kbd>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-700 dark:text-gray-300">Export PDF</span>
                            <kbd class="px-3 py-1 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded text-sm font-mono text-gray-700 dark:text-gray-300">P</kbd>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-gray-700 dark:text-gray-300">Toggle Dark Mode</span>
                            <kbd class="px-3 py-1 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded text-sm font-mono text-gray-700 dark:text-gray-300">T</kbd>
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <span class="text-gray-700 dark:text-gray-300">Show Shortcuts</span>
                            <kbd class="px-3 py-1 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded text-sm font-mono text-gray-700 dark:text-gray-300">?</kbd>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Keyboard Shortcuts Script -->
        <script>
            document.addEventListener('keydown', function(e) {
                // Ignore if user is typing in input/textarea
                if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;

                // Get the key pressed
                const key = e.key.toLowerCase();

                switch(key) {
                    case 'd':
                        window.location.href = '{{ route('dashboard') }}';
                        break;
                    case 'n':
                        window.location.href = '{{ route('input') }}';
                        break;
                    case 's':
                        e.preventDefault();
                        const searchInput = document.querySelector('input[placeholder*=\"Search\"]');
                        if (searchInput) searchInput.focus();
                        break;
                    case 'e':
                        const exportBtn = document.querySelector('[wire\\\\:click=\"export\"]');
                        if (exportBtn) exportBtn.click();
                        break;
                    case 'p':
                        const pdfBtn = document.querySelector('[wire\\\\:click=\"exportPdf\"]');
                        if (pdfBtn) pdfBtn.click();
                        break;
                    case 't':
                        const darkModeBtn = document.querySelector('[onclick*=\"toggleDarkMode\"]');
                        if (darkModeBtn) darkModeBtn.click();
                        break;
                    case '?':
                        e.preventDefault();
                        document.getElementById('shortcutsModal').classList.toggle('hidden');
                        break;
                    case 'escape':
                        document.getElementById('shortcutsModal').classList.add('hidden');
                        break;
                }
            });
        </script>

        @stack('scripts')
    </body>
</html>
