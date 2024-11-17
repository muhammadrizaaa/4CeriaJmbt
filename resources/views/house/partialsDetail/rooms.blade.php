<section>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-4">
        <div class="px-4 py-1">
            <div class="px-4 py-2">
                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Rooms List</h3>
                <div class="px-2 py-1 flex flex-row gap-4">
                    <!-- Upload Form -->
                    <div class="flex flex-col w-1/4">
                        <form method="POST" action="{{ route('house.room.create') }}">
                            @csrf
                            @method('POST')
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap" for="file_input">Room Name</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                            dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="text" name="name">
                            @error('name')
                                <div class="text-red dark:text-red-600 mt-2">{{ $message }}</div>
                            @enderror
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap" for="file_input">Width</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                            dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="text" name="width">
                            @error('width')
                                <div class="text-red dark:text-red-600 mt-2">{{ $message }}</div>
                            @enderror
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap" for="file_input">Length</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                            dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="text" name="length">
                            @error('length')
                                <div class="text-red dark:text-red-600 mt-2">{{ $message }}</div>
                            @enderror
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap" for="file_input">Description</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                            dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="text" name="desc">
                            @error('desc')
                                <div class="text-red dark:text-red-600 mt-2">{{ $message }}</div>
                            @enderror
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                            dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="hidden" name="id_house" value="{{$house->id}}">
                            
                            <button class="my-2 py-2 px-4 rounded-md border border-2 border-gray-600 hover:bg-gray-600 dark:bg-gray-8 dark:hover:bg-gray-600
                            text-gray-900 dark:text-white" type="submit">Create</button>
                            @if(session('success1'))
                                <div class="alert alert-success">
                                    {{ session('success1') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-error">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </form>
                    </div>

                    <div class="flex flex-col w-3/4">
                        <div class="bg-white dark:bg-gray-900 h-full rounded-lg overflow-y-auto">
                            @if($house->room->isEmpty())
                                <h3 class="mt-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                                    No Data Rooms Available
                                </h3>
                            @else
                                <div class="grid grid-cols-1 gap-2 p-4">
                                    <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">Room List</p>
                                    @foreach($house->room as $items)
                                        <div class="relative dark:bg-gray-700 rounded-lg p-4">
                                            <div class="flex flex-row items-center">
                                                <div class="text-gray-200 font-medium self-start flex-shrink-0">
                                                    {{$increment++.". "}}
                                                </div>
                                                <div class="ml-2 flex-grow">
                                                    <p class="text-gray-200 font-medium">{{$items->name}}</p>
                                                    <p class="text-gray-400 text-sm">
                                                        {{$items->width." M² X ".$items->length." M² : ".$items->width * $items->length." M²"}}
                                                    </p>
                                                    <p class="text-gray-400 text-sm">{{$items->desc}}</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <a class="py-2 px-4 rounded-md border border-gray-600 hover:bg-gray-700 text-gray-900 dark:text-white dark:border-gray-500 
                                                    dark:hover:bg-gray-500" href="{{route('house.room.detail',$items->id)}}">Detail</a>
                                                </div>
                                            </div>
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
</section>
