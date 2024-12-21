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
                            @if(Auth::user()->can('house-delete')||$isOwner)
                                <div class="py-4 justify-self-start">
                                    <button class="py-2 px-4 rounded-md border border-2 text-white font-medium bg-blue-700 hover:bg-blue-800
                                    dark:bg-red-600 border-gray-800 dark:bg-red-600 dark:hover:bg-red-800 dark:border-red-600 dark:hover:border-red-800"
                                    onclick="openDeleteAddressModal('{{route('house.address.delete',$house->id)}}')">
                                        Delete
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div id="map" class="w-full h-80 max-w-screen-sm rounded-lg"></div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
<div id="deleteAddressModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-80">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center">Confirm Delete</h2>
        <p class="text-gray-600 dark:text-gray-400 text-sm text-center mt-2">
            Are you sure you want to delete this item? This action cannot be undone.
        </p>
        <div class="mt-4 flex justify-center gap-4">
            <button id="cancelAddressButton" class="py-2 px-4 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-md">
                Cancel
            </button>
            <form id="deleteAddressForm" method="POST" action="{{route('house.address.delete',$house->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-md">
                    Delete
                </button>
            </form>
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

    // JavaScript to toggle the modal with item ID
function openDeleteAddressModal(actionUrl) {
    const modal = document.getElementById('deleteAddressModal');
    const deleteForm = document.getElementById('deleteAddressForm');
    const deleteItemId = document.getElementById('deleteItemId');

    modal.classList.remove('hidden'); // Show the modal
}

// Close the modal when the cancel button is clicked
document.getElementById('cancelAddressButton').addEventListener('click', () => {
    document.getElementById('deleteAddressModal').classList.add('hidden'); // Hide the modal
});

</script>
</section>