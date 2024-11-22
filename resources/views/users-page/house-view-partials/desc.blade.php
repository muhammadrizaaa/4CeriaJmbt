<section>
    <div class="dark:bg-gray-800 rounded-lg">
        <div class="flex flex-row m-4 p-4">
            <div class="flex flex-col space-y-2 w-7/12">
                <p class="font-black text-3xl text-gray-800 dark:text-gray-200 leading-tight">House Description</p>
                <p class="mx-2 font-bold text-xl pt-2 text-start text-gray-800 dark:text-gray-200 leading-tight">{{$house->name}}</p>
                <div class="flex flex-row mx-4 space-x-6">
                    <div class="flex flex-col mx-2 space-y-2">
                        <p class="font-normal text-base text-start text-gray-800 dark:text-gray-500 leading-tight">{{"Width"}}</p>
                        <p class="font-normal text-base text-start text-gray-800 dark:text-gray-500 leading-tight">{{"Bedroom"}}</p>
                    </div>
                    <div class="flex flex-col mx-2 space-y-2 justify-items-center">
                        <p class="font-normal text-base text-gray-800 dark:text-gray-500 leading-tight">{{$house->width." M²"}}</p>
                        <p class="font-normal text-base text-gray-800 dark:text-gray-500 leading-tight">{{$house->br}}</p>
                    </div>
                    <div class="flex flex-col mx-2 space-y-2">
                        <p class="font-normal text-base text-start text-gray-800 dark:text-gray-500 leading-tight">{{"Length"}}</p>
                        <p class="font-normal text-base text-start text-gray-800 dark:text-gray-500 leading-tight">{{"Bedroom"}}</p>
                    </div>
                    <div class="flex flex-col mx-2 space-y-2">
                        <p class="font-normal text-base text-start text-gray-800 dark:text-gray-500 leading-tight">{{$house->length." M²"}}</p>
                        <p class="font-normal text-base text-start text-gray-800 dark:text-gray-500 leading-tight">{{$house->ba}}</p>
                    </div>
                    <div class="flex flex-col mx-2 space-y-2">
                        <p class="font-normal text-base text-start text-gray-800 dark:text-gray-500 leading-tight">{{"Area"}}</p>
                        <p class="font-normal text-base text-start text-gray-800 dark:text-gray-500 leading-tight">{{"Bedroom"}}</p>
                    </div>
                    <div class="flex flex-col mx-2 space-y-2">
                        <p class="font-normal text-base text-start text-gray-800 dark:text-gray-500 leading-tight">{{$house->width*$house->length." M²"}}</p>
                        <p class="font-normal text-base text-start text-gray-800 dark:text-gray-500 leading-tight">{{$house->floors}}</p>
                    </div>
                </div>
                <p class="mx-2 font-medium text-xl pt-4 text-gray-800 dark:text-gray-200 leading-tight">Additional Description</p>
                <div class="flex flex-col mx-6 pb-4">
                    
                    <p class="font-normal text-base text-start text-gray-800 dark:text-gray-500 leading-tight">{{$house->house_desc}}</p>
                </div>
            </div>
            <div id="map" class="w-5/12 rounded-lg m-4"></div>
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