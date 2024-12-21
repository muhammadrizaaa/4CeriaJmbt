<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail House') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('users-page.house.partialsDetail.main-data')
            @if(!$house->width==null && !$house->length==null && !$house->br==null && !$house->ba==null && !$house->floors==null || $isOwner)
            @include('users-page.house.partialsDetail.dimension')
            @endif
            @if(!$house->coordinate == null && !$house->street_name == null && !$house->kelurahan == null && !$house->kecamatan == null && !$house->kab_kota == null && !$house->postal_code == null || $isOwner)
            @include('users-page.house.partialsDetail.address')
            @endif
            @if(!$house->housePic->isEmpty()||$isOwner)
            @include('users-page.house.partialsDetail.pic')
            @endif
            @include('users-page.house.partialsDetail.rooms')

        </div>
    </div>
</x-app-layout>