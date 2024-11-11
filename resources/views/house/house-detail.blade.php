<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail House') }}
        </h2>
    </x-slot>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-1">
                    <div class="px-4 pt-2">
                        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">House Dimension</h3>
                    </div>
                    @if($house->detailHouse == null)
                    <div class="px-4 py-4">
                        <a href="{{route('house.detail.create.form',$house->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                        font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-800 dark:border-gray-600 dark:bg-gray-600
                        dark:hover:bg-gray-800 focus:outline-none dark:focus:ring-blue-800 ">Create</a>
                    </div>
                    @else
                        <form method="POST" action="{{ route('house.detail.edit', $house->detailHouse->id) }}" class="px-4 py-6 text-gray-800 dark:text-white">
                            @csrf
                            @method('PUT')
                            <div class="px-4 py-1 flex flex-row">
                                <div class="content-center px-2 flex flex-row items-center space-x-2">
                                    <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Width</label>
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                                    p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500" type="text" name="width" value="{{$house->detailHouse->width}}">
                                </div>
                                <div class="content-center px-2 flex flex-row items-center space-x-2">
                                    <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Length</label>
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                                    p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500" type="text" name="length" value="{{$house->detailHouse->length}}">
                                </div>
                                <div class="content-center px-2 flex flex-row">
                                    <h3 class="text-gray-800 dark:text-gray-200 py-1">Area Total : {{$house->detailHouse->width * $house->detailHouse->length}} M</h3><sup class="text-gray-800 dark:text-gray-200 pt-3">2</sup>
                                </div>
                            </div>
                            
                            <div class="px-4 py-1 flex flex-row">
                                <div class="content-center px-2 flex flex-row items-center space-x-2">
                                    <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Bed Room</label>
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                                    p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500" type="text" name="br" value="{{$house->detailHouse->br}}">
                                </div>
                                <div class="content-center px-2 flex flex-row items-center space-x-2">
                                    <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Bath Room</label>
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                                    p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500" type="text" name="ba" value="{{$house->detailHouse->ba}}">
                                </div>
                                
                                <div class="content-center px-2 flex flex-row items-center space-x-2">
                                    <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Floors</label>
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                                    p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500" type="text" name="floors" value="{{$house->detailHouse->floors}}">
                                </div>
                                <div class="mb-3">
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                                    p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="hidden" name="id_house" value="{{$house->detailHouse->id_house}}">
                                </div>
                            </div>
                            <div class="pb-4 px-6 pt-4">
                                <button class="my-2  rounded-md border border-2 border-gray-600 py-2 px-4 hover:bg-gray-600 dark:bg-gray-8 dark:hover:bg-gray-600
                                text-gray-900 dark:text-white" type="submit">Submit</button>
                                @foreach ($errors->all() as $message)
                                    <div class="text-red dark:text-red-600 mt-2">{{ $message }}</div>
                                @endforeach

                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-1">
                    <div class="px-4 pt-2"><h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">House Address</h3></div>
                    <div class="px-4 py-4">
                        @if($house->HouseAddress==null)
                            <a href="{{route('house.address.create.form', $house->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                            font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-800 dark:border-gray-600 dark:bg-gray-600
                            dark:hover:bg-gray-800 focus:outline-none dark:focus:ring-blue-800 ">Add</a>
                        @else
                            <div class="flex items-center">
                                <div class="flex flex-col px-3">
                                    <div class="flex flex-row">
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Coordinate :</h3>
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">{{$house->HouseAddress->coordinate}}</h3>
                                    </div>
                                    <div class="flex flex-row">
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Street Name : </h3>
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap"> {{$house->HouseAddress->street_name}}</h3>
                                    </div>
                                    <div class="flex flex-row">
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Kelurahan : </h3>
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">{{$house->HouseAddress->kelurahan}}</h3>
                                    </div>
                                    <div class="flex flex-row">
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Kecamatan : </h3>
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">{{$house->HouseAddress->kecamatan}}</h3>
                                    </div>
                                    <div class="flex flex-row">
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Kab/Kota : </h3>
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">{{$house->HouseAddress->kab_kota}}</h3>
                                    </div>
                                    <div class="flex flex-row">
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Postal Code : </h3>
                                        <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">{{$house->HouseAddress->postal_code}}</h3>
                                    </div>
                                    <div class="py-4">
                                        {{-- <a href="{{route('house.address.delete', $house->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                                            font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-800 dark:border-gray-600 dark:bg-gray-600
                                            dark:hover:bg-gray-800 focus:outline-none dark:focus:ring-blue-800 ">Add</a> --}}
                                        <form method="POST" action="{{route('house.address.delete', $house->HouseAddress->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                                            font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-800 dark:bg-red-600
                                            dark:hover:bg-red-800 focus:outline-none dark:focus:ring-blue-800" >
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div id="map"  class="w-full h-80"></div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoicml6YXJhYmIiLCJhIjoiY20zYjVja2J2MW44MDJtczJuYmg1aXV1bCJ9.eBrkXkRMbiBWXkjX6Rtvbw';

        if(@json($house->HouseAddress==null)){
        }
        else{
            const coordinateString = @json(optional($house->HouseAddress)->coordinate ?? '');
            const [lat, lng] = coordinateString.split(',').map(coord => parseFloat(coord.trim()));
            let map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [lng, lat],
                zoom: 13
            });
            var marker = new mapboxgl.Marker()
            .setLngLat([lng, lat])
            .addTo(map);

        // Center the map on the marker whenever the marker is clicked
        marker.getElement().addEventListener('click', () => {
            map.flyTo({ center: [lng, lat], zoom: 14 });
        });
        }
    </script>
</x-app-layout>