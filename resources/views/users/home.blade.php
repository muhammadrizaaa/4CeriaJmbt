<x-app-layout>
    <x-slot:slot>
        @if ($flashMessage)
    <div id="success-message">
        {{ $flashMessage }}
        <div id="progress-bar"></div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const message = document.getElementById('success-message');
            message.classList.add('show');

            setTimeout(() => {
                message.style.animation = 'fadeOut 1.5s';
            }, 1500); 

            setTimeout(() => {
                message.style.display = 'none';
            }, 2000); 
        });
    </script>
@endif

<div class="navbar">
    <!-- Navbar content -->
</div>

<div class="dalem">
    <div class="header">
        <!-- Header content -->
    </div>

    @if ($houses->count() == 3)
        <div class="content">
            <div class="JR">
                <h1 data-aos="fade-up" data-aos-delay="50">Mulai Cari Rumah!</h1>
                <div class="jejeran">
                    @foreach ($houses as $index => $house)
                        <div class="pilihan" data-aos="fade-up" data-aos-delay="{{ $index * 150 + 50 }}">
                            <img src="{{ $house->house_pic->dir }}" width="100%">
                            <div class="isipilihan">
                                <h2>{{ $house->nama_rumah }}</h2>
                                <ul>
                                    <li><span>Rp. {{ number_format($house->harga, 0, ',', '.') }}</span></li>
                                    <li>{{ $house->alamat }}</li>
                                    <li>
                                        <hr>
                                        <ul class="logox">
                                            <li class="ruang"><img src="{{asset('assets/iconKamarMandi.png')}}"><p>{{ $house->kamar_tidur }} Kamar Tidur</p></li>
                                            <li class="ruang"><img src="{{asset('assets/iconKamarMandi.png')}}"><p>{{ $house->kamar_mandi }} Kamar Mandi</p></li>
                                            <li class="ruang"><img src="{{asset('assets/iconKamarMandi.png')}}"><p>{{ $house->luas }} m²</p></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h2 class="detail"><a href="{{ route('cariRumah') }}">See More</a></h2>
            </div>
        </div>
    @else
        <p>No houses available</p>
    @endif
</div>
    </x-slot:slot>
    
</x-app-layout>

