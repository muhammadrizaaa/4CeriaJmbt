<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail House') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('users-page.house.partialsDetail.main-data')
            @include('users-page.house.partialsDetail.dimension')
            @include('users-page.house.partialsDetail.address')
            @include('users-page.house.partialsDetail.pic')
            @include('users-page.house.partialsDetail.rooms')
        </div>
    </div>
</x-app-layout>