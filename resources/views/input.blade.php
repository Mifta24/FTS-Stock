<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                ➕ {{ __('Add New Need') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <livewire:need-form />
        </div>
    </div>
</x-app-layout>
