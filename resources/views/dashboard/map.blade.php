<section>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 space-y-2">
                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Check Around UUU</h1>
                <div id="map"  class="w-full h-80"></div>
            </div>
        </div>
    </div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoicml6YXJhYmIiLCJhIjoiY20zYjVja2J2MW44MDJtczJuYmg1aXV1bCJ9.eBrkXkRMbiBWXkjX6Rtvbw';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/dark-v11',
            center: [106.82767329965759, -6.185708854733704],
            zoom: 8
        });
        const houseCoordinates = @json($houseList->pluck('coordinate'));
        const house = @json($houseList);

        house.forEach(house=>{
            if(house.coordinate){
                let [latitude, longtitude] = house.coordinate.split(',').map(coord => parseFloat(coord.trim()));

                const marker = new mapboxgl.Marker().setLngLat([longtitude, latitude]).addTo(map);

                const popup = new mapboxgl.Popup({
                    offset: 25,
                    closeButton: false 
                    }).setHTML(`<div class="bg-gray-800 text-white p-3 rounded shadow-lg text-sm">
                    <strong class="block font-semibold">House Price:</strong> ${house.price}
                    <strong class="block font-semibold">House Name:</strong> ${house.name}
                </div>`);

                marker.getElement().addEventListener('mouseenter', () => {
                    popup.setLngLat([longtitude, latitude]).addTo(map);
                });

                // Remove popup when not hovering
                marker.getElement().addEventListener('mouseleave', () => {
                    popup.remove();
                });

                marker.getElement().addEventListener('click', () => {
                window.location.href = `{{ route('house.view', ':id') }}`.replace(':id', house.id);
            });

            }
        })
        let geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            placeholder: 'Search for places', // Placeholder text for search input
            marker: {
                color: 'blue'
            },
        });
        map.addControl(geocoder);

        geocoder.on('result', (event) => {
            const coords = event.result.geometry.coordinates;
            console.log("Coordinates:", coords); // Logs the coordinates of the searched location
        });
    </script>
</section>