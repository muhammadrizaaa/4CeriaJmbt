<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="w-full h-80 md:h-96 lg:h-128"> <!-- Set different heights for responsiveness -->
                    <x-mapbox id="mapId" :draggable="true" position="relative" class="w-full h-80 md:h-96 lg:h-128" />
                    {{-- <x-mapbox id="mapId" position="relative" class="w-full h-80 md:h-96 lg:h-128"/> --}}
                    {{-- <x-mapbox-search
                        id="mapId"
                        placeholder="Search"
                        :center="[14, 17]"
                        :zoom="2"
                        :navigationControls="true"
                        geocoderPosition="top-left"
                        :rtl="true"
                        :cooperativeGestures="true"
                    /> --}}
                </div>
                
            </div>
        </div>
    </div>

</x-app-layout>
