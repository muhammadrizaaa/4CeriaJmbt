<section>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 space-y-2">
                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">You Might Love This</h1>
                <div class="grid grid-cols-3 gap-2 place-content-center">
                    @foreach($houseList as $items)
                        <div class="dark:bg-gray-700 sm:rounded-lg hover:dark:bg-gray-600">
                            <a href="{{route('house.view', $items->id)}}">
                                <div class="m-4 flex flex-col">
                                    @if($items->housePic->isNotEmpty())
                                    <div class="dark:bg-black mb-2 grid w-full place-items-center h-48 overflow-hidden rounded-lg">
                                        <img class="h-full object-cover" src="{{asset('storage/'.$items->housePic->first()->dir)}}" alt="">
                                    </div>
                                    
                                    @else
                                    <div class="dark:bg-black mb-2 grid w-full place-items-center h-48 overflow-hidden rounded-lg">
                                        <img class="max-h-40 max-w-full object-contain" src="{{asset('storage/default/house/unavailable.png')}}" alt="">
                                    </div>
                                    
                                    @endif
                                    <p class="font-black text-xl text-gray-800 dark:text-gray-200 leading-tight">{{"RP. ".$items->price}}</p>
                                    @if($items->width == null || $items->length == null)
                                    @else
                                    <div class="flex flex-row gap-1">
                                        <h1 class="font-light text-sm text-gray-800 dark:text-gray-400 leading-tight">{{$items->width." M² X ".$items->length." M²"}}</h1>
                                        {{-- <h1 class="font-light text-sm text-gray-800 dark:text-gray-400 leading-tight">Length</h1>
                                        <h1 class="font-light text-sm text-gray-800 dark:text-gray-400 leading-tight">Area</h1> --}}
                                    </div>
                                    @endif
                                    <p class="font-light text-sm text-gray-800 dark:text-gray-500 leading-tight">{{$items->name}}</p>
                                    <div class="flex flex-row justify-between">
                                        <p class="font-light text-sm text-gray-800 dark:text-gray-500 leading-tight">
                                            @if($items->street_name!=null)
                                                {{$items->street_name.", "}}
                                            @endif
                                            @if($items->kelurahan!=null)
                                                {{$items->kelurahan.", "}}
                                            @endif
                                            @if($items->kecamatan!=null)
                                                {{$items->kecamatan.", "}}
                                            @endif
                                            @if($items->kab_kota!=null)
                                                {{$items->kab_kota.", "}}
                                            @endif
                                            @if($items->province!=null)
                                                {{$items->province.", "}}
                                            @endif
                                            @if($items->postal_code!=null)
                                                {{ $items->postal_code}}
                                            @endif
                                        </p>
                                        <p class="font-light w-2/5 text-sm text-gray-800 dark:text-gray-500 leading-tight text-right">{{$items->uploadDate}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>