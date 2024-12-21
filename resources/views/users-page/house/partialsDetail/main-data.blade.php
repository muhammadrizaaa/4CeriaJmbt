<section>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-4">
        <div class="px-4 py-1">
            <form method="POST" action="{{route('house.edit', $house->id)}}">
                @csrf
                @method('PUT')
                <div class="px-4 py-2">
                    <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">House Main Data</h3>
                </div>
                <div class="px-4 py-1 flex flex-row">
                    <div class="content-center px-2 flex flex-row items-center space-x-2">
                        <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Name</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                        p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                        dark:focus:border-blue-500" type="text" name="name" value="{{$house->name}}">
                    </div>
                    <div class="content-center px-2 flex flex-row items-center space-x-2">
                        <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Price</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                        p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                        dark:focus:border-blue-500" type="text" name="price" value="{{$house->price}}">
                    </div>
                    {{-- <div class="content-center px-2 flex flex-row">
                        <h3 class="text-gray-800 dark:text-gray-200 py-1">Area Total : {{$house->detailHouse->width * $house->detailHouse->length}} M</h3><sup class="text-gray-800 dark:text-gray-200 pt-3">2</sup>
                    </div> --}}
                </div>
                
                <div class="px-4 py-1 flex flex-row">
                    <div class="content-center px-2 flex flex-row items-center space-x-2 w-full">
                        <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Desc</label>
                        <textarea name="house_desc" id="" class="block p-2.5 w-3/4 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500
                        focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                        dark:focus:border-blue-500">{{$house->house_desc}}</textarea>
                    </div>
                </div>
                @if(Auth::user()->can('house-delete')||$isOwner)
                <button class="my-2 rounded-md border border-2 border-gray-600 py-2 px-4 ml-6 hover:bg-gray-600 dark:bg-gray-8 dark:hover:bg-gray-600
                                text-gray-900 dark:text-white" type="submit">Edit</button>
                                <button class="my-2 rounded-md border border-2 border-red-600 py-2 px-4 mx-2 hover:bg-gray-600 dark:bg-red-600 dark:hover:bg-red-800
                                dark:hover:border-red-800 text-gray-900 dark:text-white" type="button" onclick="openDeleteHouseModal()">Delete House</button>
                @endif
            </form>
        </div>
    </div>
    <div id="deleteHouseModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-80">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center">Confirm Delete</h2>
            <p class="text-gray-600 dark:text-gray-400 text-sm text-center mt-2">
                Are you sure you want to delete this house? This action cannot be undone.
            </p>
            <p class="text-gray-600 dark:text-gray-400 text-sm text-center mt-2">
                Type the house name first below to delete this house!
            </p>
            <input type="text" id="confirmDeleteHouse" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
            dark:focus:border-blue-500">
            <p class="text-red-600 dark:text-red-400 text-sm text-left mt-2" id="falseHouseName"></p>

            <div class="mt-4 flex justify-center gap-4">
                <button id="cancelHouseButton" class="py-2 px-4 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-md">
                    Cancel
                </button>
                <form id="deleteHouseForm" method="POST" action="{{route('user-house-delete',$house->id)}}">
                    @csrf
                    @method('delete')
                    <button type="button" onclick="submitDeleteHouse()" class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-md">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function submitDeleteHouse() {
            if (document.getElementById('confirmDeleteHouse').value == @json($house->name)) {
                console.log('House name matches!');
                document.getElementById('deleteHouseForm').submit();
            }
            else{
                const falseHouse = "House name doesn't match!";
                document.getElementById('falseHouseName').textContent=falseHouse;
            }
            
        }
        function openDeleteHouseModal(actionUrl) {
            const modal = document.getElementById('deleteHouseModal');
            const deleteForm = document.getElementById('deleteHouseForm');
            const deleteItemId = document.getElementById('deleteItemId');

            modal.classList.remove('hidden'); // Show the modal
        }

        // Close the modal when the cancel button is clicked
        document.getElementById('cancelHouseButton').addEventListener('click', () => {
        document.getElementById('deleteHouseModal').classList.add('hidden');
        });

    </script>
</section>