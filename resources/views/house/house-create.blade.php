<x-app-layout>
    <body>
        <div class="px-4">
        <form method="POST" action="{{ route('house.create') }}" class="px-4 py-6 text-gray-800 dark:text-white">
            @csrf
            @method('POST')
            {{-- <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="nama_penumpang">Nama Penumpang</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="user_id" id="user_id">
                    <option value="" disabled {{is_null($tiket->user->id) ? 'selected':''}}> Select User </option>
                    @foreach($user as $key)
                    <option value= "{{$key->id}}" {{$tiket->user->id == $key->id ?  'selected' : ''}}>
                        {{$key->name}}
                    </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div> --}}
            <div class="mb-3">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="name">Name</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" name="name" value="{{old('name')}}">
                @error('name')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div>
            
            
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="price">Price</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" name="price" value="{{old('price')}}">
                @error('price')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="house_desc">House Description</label>
                <textarea name="house_desc" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500
                focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{old('house_desc')}}</textarea>
                @error('house_desc')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div>
    
            <button class="my-2  rounded-md border border-2 border-primary-800 py-2 px-4 hover:bg-gray-800 dark:hover:bg-gray-800 text-gray-900 dark:text-white"
            type="submit">Submit</button>
    
        </form>
    </div>
    
    </body>
    
    </x-app-layout>