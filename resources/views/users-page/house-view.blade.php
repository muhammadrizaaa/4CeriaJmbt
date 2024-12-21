<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('users-page.house-view-partials.carousel')
            @include('users-page.house-view-partials.desc')
            <div class="dark:bg-gray-800 rounded-lg">
                <div class="flex flex-col m-4 p-4 space-y-4">
                    <div>
                        <p class="font-black text-3xl text-gray-800 dark:text-gray-200 leading-tight">Rooms List</p>
                        
                        @foreach($house->room as $items)
                        <div class="relative dark:bg-gray-700 rounded-lg p-4">
                            <div class="flex flex-row items-center">
                                <div class="text-gray-200 font-medium self-start flex-shrink-0">
                                    {{$loop->index+1 .". "}}
                                </div>
                                <div class="mx-4 pr-4">
                                    <p class="text-gray-200 font-medium">{{$items->name}}</p>
                                    <p class="text-gray-400 text-sm">
                                        {{$items->width." M² X ".$items->length." M² : ".$items->width * $items->length." M²"}}
                                    </p>
                                </div>
                                <div class="ml-2 flex-grow self-start">
                                    <p class="text-gray-400 text-sm">{{$items->desc}}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    {{-- <a class="py-2 px-4 rounded-md border border-gray-600 hover:bg-gray-700 text-gray-900 dark:text-white dark:border-gray-500 
                                    dark:hover:bg-gray-500" href="{{route('house.room.detail',$items->id)}}">Detail</a> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
