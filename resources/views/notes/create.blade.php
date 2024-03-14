<x-app-layout  :title=$title>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Create Note") }}
                    
                </div>
            </div>
            <form method="post" action="{{ route('notes.store') }}" class="mt-6 space-y-6">
                @csrf
        
                <div>
                    <x-input-label for="title" :value="__('title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>
        
                <div>
                    <x-input-label for="title" :value="__('body')" />
                    <x-textarea-input id="body" name="body" type="text" class="mt-1 block w-full"></x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('body')" />
                </div>
        
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>
        
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
