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
    </script>
</section>