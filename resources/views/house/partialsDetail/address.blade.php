<section>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-4">
        <div class="px-4 py-1">
            <div class="px-4 pt-2"><h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">House Address</h3></div>
            <div class="px-4 py-4">
                @if($house->coordinate == null && $house->street_name == null && $house->kelurahan == null && $house->kecamatan == null && $house->kab_kota == null && $house->postal_code == null)
                    <a href="{{route('house.address.create.form', $house->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                    font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-800 dark:border-gray-600 dark:bg-gray-600
                    dark:hover:bg-gray-800 focus:outline-none dark:focus:ring-blue-800 ">Add</a>
                @else
                    <div class="flex items-center place-content-between">
                        <div class="flex flex-col px-3">
                            
                            <div class="flex flex-row">
                                <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Street Name : </h3>
                                <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap"> {{$house->street_name}}</h3>
                            </div>
                            @if($house->kelurahan!=null)
                                <div class="flex flex-row">
                                    <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Kelurahan : </h3>
                                    <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">{{$house->kelurahan}}</h3>
                                </div>
                            @endif

                            @if ($house->kecamatan!=null)
                                <div class="flex flex-row">
                                    <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Kecamatan : </h3>
                                    <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">{{$house->kecamatan}}</h3>
                                </div>
                            @endif
                            <div class="flex flex-row">
                                <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Kab/Kota : </h3>
                                <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">{{$house->kab_kota}}</h3>
                            </div>
                            @if($house->province!=null)
                                <div class="flex flex-row">
                                    <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Province : </h3>
                                    <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">{{$house->province}}</h3>
                                </div>
                            @endif
                            <div class="flex flex-row">
                                <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Postal Code : </h3>
                                <h3 class="text-gray-800 dark:text-gray-200 whitespace-nowrap">{{$house->postal_code}}</h3>
                            </div>
                            <div class="py-4 justify-self-start">
                                <form method="POST" action="{{route('house.address.delete', $house->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="py-2 px-4 rounded-md border border-2 text-white font-medium bg-blue-700 hover:bg-blue-800
                                    dark:bg-red-600 border-gray-800 dark:bg-red-600 dark:hover:bg-red-800 dark:border-red-600 dark:hover:border-red-800">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div id="map" class="w-full h-80 max-w-screen-sm rounded-lg"></div>
                    </div>
                @endif
            </div>
        </div>
    </div>
<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoicml6YXJhYmIiLCJhIjoiY20zYjVja2J2MW44MDJtczJuYmg1aXV1bCJ9.eBrkXkRMbiBWXkjX6Rtvbw';

    if(@json($house==null)){
    }
    else{
        const coordinateString = @json(optional($house)->coordinate ?? '');
        const [lat, lng] = coordinateString.split(',').map(coord => parseFloat(coord.trim()));
        let map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/dark-v11',
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
</section>