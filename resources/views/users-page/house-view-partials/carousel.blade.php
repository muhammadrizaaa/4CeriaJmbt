<section>
    <div class="dark:bg-gray-800 sm:rounded-lg">
        <div class="flex flex-col space-y-2">
            <div id="carousel" class="relative w-full">
                <!-- Carousel Wrapper -->
                <div class="h-56 overflow-hidden mt-4 md:h-96 dark:bg-black">
                    @foreach($house->housePic as $key => $items)
                        <div
                            class="carousel-item inset-0 w-full h-full transition-all duration-700 {{ $loop->first ? 'block' : 'hidden' }}" 
                            data-carousel-item="{{ $key }}">
                            <img src="{{ asset('storage/' . $items->dir) }}" class="block h-full mx-auto object-cover" alt="House Image {{ $key + 1 }}">
                        </div>
                    @endforeach
                </div>
                <!-- Slider Indicators -->
                <div class="absolute z-30 flex space-x-3 bottom-5 left-1/2 transform -translate-x-1/2">
                    @foreach($house->housePic as $key => $items)
                        <button type="button" class="indicator w-3 h-3 rounded-full bg-gray-300 dark:bg-gray-200 {{ $loop->first ? 'bg-gray-700' : '' }}" data-carousel-slide-to="{{ $key }}"></button>
                    @endforeach
                </div>
                <!-- Slider Controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-400/30 group-hover:bg-white/50 dark:group-hover:bg-gray-100/60">
                        <svg class="w-4 h-4 text-white dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-400/30 group-hover:bg-white/50 dark:group-hover:bg-gray-100/60">
                        <svg class="w-4 h-4 text-white dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
            <div class="m-8 pb-2">
                <div class="flex flex-row place-content-between">
                    <div class="flex flex-col">
                        <p class="font-black text-5xl text-gray-800 dark:text-gray-200 leading-tight">{{"RP. ".number_format($house->price, 2,",",".")}}</p>
                        <div class="flex flex-row justify-between">
                            <p class="font-medium text-base text-gray-800 dark:text-gray-500 leading-tight">
                                @if($house->street_name!=null)
                                    {{$house->street_name.", "}}
                                @endif
                                @if($house->kelurahan!=null)
                                    {{$house->kelurahan.", "}}
                                @endif
                                @if($house->kecamatan!=null)
                                    {{$house->kecamatan.", "}}
                                @endif
                                @if($house->kab_kota!=null)
                                    {{$house->kab_kota.", "}}
                                @endif
                                @if($house->province!=null)
                                    {{$house->province.", "}}
                                @endif
                                @if($house->postal_code!=null)
                                    {{ $house->postal_code}}
                                @endif
                            </p>
                        </div>
                        <p class="font-light text-sm text-gray-800 dark:text-gray-500 leading-tight">{{$house->uploadDate}}</p>
                    </div>
                    <div class="flex flex-col place-content-end">
                        <p class="font-black text-xl text-gray-800 dark:text-gray-500 leading-tight text-right">{{$house->User->username}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const items = document.querySelectorAll('.carousel-item');
            const indicators = document.querySelectorAll('.indicator');
            const prevButton = document.querySelector('[data-carousel-prev]');
            const nextButton = document.querySelector('[data-carousel-next]');
            let currentIndex = 0;
        
            // Initialize the carousel on page load
            function initializeCarousel() {
                items.forEach((item, i) => {
                    item.classList.toggle('hidden', i !== currentIndex);
                    item.classList.toggle('block', i === currentIndex);
                });
                indicators.forEach((indicator, i) => {
                    indicator.classList.toggle('bg-gray-700', i === currentIndex); // Active indicator
                    indicator.classList.toggle('bg-gray-300', i !== currentIndex); // Inactive
                    indicator.classList.toggle('dark:bg-gray-200', i !== currentIndex); // Inactive for dark mode
                });
            }
        
            // Update the carousel when changing slides
            function updateCarousel(index) {
                currentIndex = index;
                initializeCarousel();
            }
        
            // Previous button click event
            prevButton.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                updateCarousel(currentIndex);
            });
        
            // Next button click event
            nextButton.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % items.length;
                updateCarousel(currentIndex);
            });
        
            // Indicator click event
            indicators.forEach((indicator, i) => {
                indicator.addEventListener('click', () => {
                    updateCarousel(i);
                });
            });
        
            // Call initializeCarousel on page load
            initializeCarousel();
        });
    </script>
</section>