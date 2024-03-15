<x-app-layout  :title=$title>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-gray-100 dark:bg-gray-800 p-5 w-60 mb-2 rounded">
                <h1>{{ $note->title }}</h1>
            </div>
            <div class="text-gray-100 p-6 dark:bg-gray-800 rounded">
                <h2>body:</h2>
                <p>{{ $note->body }}</p>
            </div>
            <div class="text-gray-100 dark:bg-gray-800 p-5 w-250 mb-2 rounded">
                <div class="flex items-center gap-4">
                    <x-secondary-button>{{ __('Delete') }}</x-secondary-button>
                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
