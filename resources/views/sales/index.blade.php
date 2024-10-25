@include('pages.header')

<x-app-layout>
    <div class="d-flex">
       <!-- Main Content -->
        <div class="flex-grow p-6">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('POS Sales') }}
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@include('pages.footer');