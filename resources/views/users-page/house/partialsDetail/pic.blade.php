<section>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-4">
        <div class="px-4 py-1">
            <div class="px-4 py-2">
                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">House Pics</h3>
                <div class="px-2 py-1 flex flex-row gap-4 justify-center">
                    <!-- Upload Form -->
                    @if($isOwner)
                    <div class="flex flex-col w-1/4">
                        <form method="POST" action="{{ route('house.pic.create', $house->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap" for="file_input">Upload file</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50
                            dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file" name="house_pic">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG Or JPG (MAX. 800x400px).</p>
                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                            font-medium rounded-lg text-sm px-5 py-2.5 my-2 border border-gray-800 dark:border-gray-600 dark:bg-gray-600
                            dark:hover:bg-gray-800 focus:outline-none dark:focus:ring-blue-800" type="submit">Add</button>
                            @if(session('success'))
                                <div class="mt-2 text-sm text-gray-500 dark:text-gray-300">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="text-red dark:text-red-600 mt-2">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @error('house_pic')
                                <div class="text-red dark:text-red-600 mt-2">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>
                    @endif

                    <!-- House Pictures -->
                    <div class="flex flex-col w-3/4">
                        <div class="bg-white dark:bg-gray-900 h-full rounded-lg overflow-y-auto">
                            
                                @if($house->housePic->isEmpty())
                                    <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center m-2">No Picture</h3>
                                @else
                                    <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center m-2">List Of Pictures</h3>
                                    <div class="grid grid-cols-2 md:grid-cols-2 gap-2 m-2">
                                    @foreach($house->housePic as $items)

                                    <div id="deletePicModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
                                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-80">
                                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center">Confirm Delete</h2>
                                            <p class="text-gray-600 dark:text-gray-400 text-sm text-center mt-2">
                                                Are you sure you want to delete this item (ID: <span id="deleteItemId" class="font-bold"></span>)? This action cannot be undone.
                                            </p>
                                            <div class="mt-4 flex justify-center gap-4">
                                                <button id="cancelPicButton" class="py-2 px-4 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-md">
                                                    Cancel
                                                </button>
                                                <form id="deletePicForm" method="POST" action="{{route('house.pic.delete', $items->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative flex flex-col">
                                        <img class="w-full aspect-video object-cover rounded-lg" src="{{ asset('storage/'.$items->dir) }}" alt="">
                                        @if(Auth::user()->can('house-delete')||$isOwner)
                                        <button onclick="openDeletePicModal()" class="my-2 py-2 px-4 rounded-md border border-2 text-white font-medium bg-blue-700 hover:bg-blue-800
                                        dark:bg-red-600 border-gray-800 dark:hover:bg-red-800 dark:border-red-600 dark:hover:border-red-800
                                        justify-self-center">
                                            Delete
                                        </button>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeletePicModal() {
            const modal = document.getElementById('deletePicModal');
            const deleteForm = document.getElementById('deletePicForm');
            const deleteItemId = document.getElementById('deleteItemId');

            modal.classList.remove('hidden'); // Show the modal
    }

    // Close the modal when the cancel button is clicked
    document.getElementById('cancelPicButton').addEventListener('click', () => {
        document.getElementById('deletePicModal').classList.add('hidden'); // Hide the modal
    });
    </script>
</section>
