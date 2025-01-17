<section>
    <form method="POST" id="deleteDetailForm" action="{{route('house.detail.delete', $house->id)}}">
        @csrf
        @method('PUT')
    </form>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="px-4 py-1">
            <div class="px-4 py-2">
                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">House Dimension</h3>
            </div>
            @if($house->width==null && $house->length==null && $house->br==null && $house->ba==null && $house->floors==null )
            <div class="px-4 py-1">
                <a href="{{route('house.detail.create.form',$house->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-800 dark:border-gray-600 dark:bg-gray-600
                dark:hover:bg-gray-800 focus:outline-none dark:focus:ring-blue-800 ">Create</a>
            </div>
            @else
                <form method="POST" action="{{ route('house.detail.edit', $house->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="px-4 py-1 flex flex-row">
                        <div class="content-center px-2 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Width</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="width" value="{{$house->width}}">
                        </div>
                        <div class="content-center px-2 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Length</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="length" value="{{$house->length}}">
                        </div>
                        <div class="content-center px-2 flex flex-row">
                            <h3 class="text-gray-800 dark:text-gray-200 py-1">Area Total : {{$house->width * $house->length}} M</h3><sup class="text-gray-800 dark:text-gray-200 pt-3">2</sup>
                        </div>
                    </div>
                    
                    <div class="px-4 py-1 flex flex-row">
                        <div class="content-center px-2 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Bed Room</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="br" value="{{$house->br}}">
                        </div>
                        <div class="content-center px-2 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Bath Room</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="ba" value="{{$house->ba}}">
                        </div>
                        
                        <div class="content-center px-2 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Floors</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="floors" value="{{$house->floors}}">
                        </div>
                        <div class="mb-3">
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="hidden" name="id_house" value="{{$house->id}}">
                        </div>
                    </div>
                    <div class=" px-6 py-2">
                        <button class="py-2 px-4 rounded-md border border-2 border-gray-600 hover:bg-gray-600 dark:bg-gray-8 dark:hover:bg-gray-600
                        text-gray-900 dark:text-white" type="submit">Edit</button>
                        <button class="mx-2 py-2 px-4 rounded-md border border-2 text-white font-medium bg-blue-700 hover:bg-blue-800
                        dark:bg-red-600 border-gray-800 dark:bg-red-600 dark:hover:bg-red-800 dark:border-red-600 dark:hover:border-red-800"
                        onclick="submitDeleteDetail()" type="button">Delete</button>
                        @error('width')
                        <div class="text-red dark:text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                        @error('length')
                        <div class="text-red dark:text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                        @error('br')
                        <div class="text-red dark:text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                        @error('ba')
                        <div class="text-red dark:text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                        @error('floors')
                        <div class="text-red dark:text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            @endif
        </div>
    </div>
    <script>
        function submitDeleteDetail() {
            document.getElementById('deleteDetailForm').submit();
        }
    </script>
</section>