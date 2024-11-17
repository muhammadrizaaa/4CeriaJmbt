<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail House') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('house.partialsDetail.main-data')
            @include('house.partialsDetail.dimension')
            @include('house.partialsDetail.address')
            @include('house.partialsDetail.pic')
            @include('house.partialsDetail.rooms')
        </div>
    </div>
</x-app-layout>