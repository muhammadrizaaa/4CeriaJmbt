<x-app-layout>
    <x-slot:slot>
        <div class="min-h-screen bg-white ">
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
                    <div class="animateBackground"></div>
                    <div class="kalimat">
                        <h2 data-aos="fade-down" data-aos-delay="340"><span>4C</span>reative, Compherensive</h2>
                        <h1 data-aos="fade-down" data-aos-delay="440">And Cool <br>Construction</h1>
                    </div>
                    <div class="logossponsor" data-aos="fade-up" data-aos-delay="50">
                        <div class="sponsorslide">
                            <img src="Assets/google.png" width="60px" height="60px" alt="">
                            <img src="Assets/bri.png" alt="">
                            <img src="Assets/mandiri.png" alt="">
                            <img src="Assets/cimbniaga.png" width="200px" height="10px" alt="">
                            <img src="Assets/kominfo.png" width="70px" height="70px" alt="">
                            <img src="Assets/btn.png" alt="">
                            <img src="Assets/badanpertahanan.png" alt="">
                            <img src="Assets/pupr.png" alt="">
                        </div>
                        <div class="sponsorslide">
                            <img src="Assets/google.png" alt="">
                            <img src="Assets/bri.png" alt="">
                            <img src="Assets/mandiri.png" alt="">
                            <img src="Assets/cimbniaga.png" width="200px" height="10px" alt="">
                            <img src="Assets/kominfo.png" alt="">
                            <img src="Assets/btn.png" alt="">
                            <img src="Assets/badanpertahanan.png" alt="">
                            <img src="Assets/pupr.png" alt="">
                        </div>
                        <div class="sponsorslide">
                            <img src="Assets/google.png" alt="">
                            <img src="Assets/bri.png" alt="">
                            <img src="Assets/mandiri.png" alt="">
                            <img src="Assets/cimbniaga.png" width="200px" height="10px" alt="">
                            <img src="Assets/kominfo.png" alt="">
                            <img src="Assets/btn.png" alt="">
                            <img src="Assets/badanpertahanan.png" alt="">
                            <img src="Assets/pupr.png" alt="">
                        </div>
                    </div>
                </div>
                <section class="section__container plan__container">
                    <p class="subheader" data-aos="fade-up" data-aos-delay="50">Team 4 Ceria</p>
                    <h2 class="section__header" data-aos="fade-up" data-aos-delay="200">Plan your Building with
                        confidence</h2>
                    <p class="description" data-aos="fade-up" data-aos-delay="300">
                        Find 4C to help with your Dream Home, and see what to expect
                        along your journey.
                    </p>
                    <div class="plan__grid">
                        <div class="plan__content" data-aos="fade-right">
                            <span class="number" data-aos="fade-right" data-aos-delay="350">01</span>
                            <h4 data-aos="fade-right" data-aos-delay="400">Meet Our Team</h4>
                            <p data-aos="fade-right" data-aos-delay="450">
                                Get to know the individuals behind our website! <br>Learn about our diverse team
                                members,
                                their roles, <br>and their dedication to providing you with the <br> best possible
                                experience.
                            </p>
                            <span data-aos="fade-right" data-aos-delay="500" class="number">02</span>
                            <h4 data-aos="fade-right" data-aos-delay="550">Discover Top Listings</h4>
                            <p data-aos="fade-right" data-aos-delay="600">
                                Explore our handpicked selection of prime <br> properties. Find your dream home or
                                investment <br> opportunity among our top listings.
                            </p>
                            <span class="number" data-aos="fade-right" data-aos-delay="650">03</span>
                            <h4 data-aos="fade-right" data-aos-delay="700">Client Success Stories</h4>
                            <p data-aos="fade-right" data-aos-delay="750">
                                Learn from our satisfied clients' experiences. <br> See how we've helped them achieve
                                their real estate goals.
                            </p>
                        </div>
                        <img src="Assets/4CTeam.jpg" alt="plan" data-aos="fade-left" />
                    </div>
                </section>

                <div id="skilll" class="skill">
                    <div class="teksatas">
                        <h1 data-aos="fade-up" data-aos-delay="50">Here's</h1>
                        <h1 class="h1" data-aos="fade-up" data-aos-delay="100">3 Thing's About our
                            <span>Website</span></h1>
                    </div>
                    <div class="teksbawah">
                        <div class="card" data-aos="fade-up" data-aos-delay="200">
                            <img src="Assets/1.png" alt="Description for Image 1">
                            <div class="card-text">
                                <h2>Cari Rumah</h2>
                                <p>Fitur ini Berguna bagi pengguna yang sedang Membutuhkan <br> Rumah Impian <br> Cari ,
                                    Transaksi, Tempati!</p>
                            </div>
                        </div>
                        <div class="card" data-aos="fade-up" data-aos-delay="300">
                            <img src="Assets/2.png" alt="Description for Image 2">
                            <div class="card-text">
                                <h2>Konsultasi</h2>
                                <p>Selain Mencari Rumah, Kami menyediakan Konsultan yang <br> siap membantu dalam
                                    Pembangunan Anda! <br> Konsultasi, Renovasi, Tempati!</p>
                            </div>
                        </div>
                        <div class="card" data-aos="fade-up" data-aos-delay="400">
                            <img src="Assets/3.png" alt="Description for Image 3">
                            <div class="card-text">
                                <h2>Easy To Use</h2>
                                <p>Website kami berusaha membuat <br>Transaksi Beli, Bangun dan renovasi rumah menjadi
                                    lebih mudah Bergabung Dengan Kami!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($houses->count() > 0)
                <div class="content">
                    <div class="JR">
                        <h1 data-aos="fade-up" data-aos-delay="50">Mulai Cari Rumah!</h1>
                        <div class="jejeran">
                            @foreach ($houses as $index => $house)
                                <div class="pilihan" data-aos="fade-up" data-aos-delay="{{ $index * 150 + 50 }}">
                                    <img src="{{ asset($house->house_pic->dir) }}" width="100%">
                                    <div class="isipilihan">
                                        <h2>{{ $house->nama_rumah }}</h2>
                                        <ul>
                                            <li><span>Rp. {{ number_format($house->harga, 0, ',', '.') }}</span></li>
                                            <li>{{ $house->alamat }}</li>
                                            <li>
                                                <hr>
                                                <ul class="logox">
                                                    <li class="ruang"><img
                                                            src="{{ asset('assets/iconKamarTidur.png') }}">
                                                        <p>{{ $house->kamar_tidur }} Kamar Tidur</p>
                                                    </li>
                                                    <li class="ruang"><img
                                                            src="{{ asset('assets/iconKamarMandi.png') }}">
                                                        <p>{{ $house->kamar_mandi }} Kamar Mandi</p>
                                                    </li>
                                                    <li class="ruang"><img
                                                            src="{{ asset('assets/iconLuasTanah.png') }}">
                                                        <p>{{ $house->luas }} m²</p>
                                                    </li>
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
                <footer>
                    <div class="row">
                        <div class="col">
                            <img src="Assets/Logo4C.png" class="logo">
                            <p>Bersama 4C, kami komitmen untuk menjadi Website terpercaya dalam <br>mewujudkan
                                pembangunan yang berkelanjutan, mengarah pada <br> masa depan yang
                                lebih baik bagi semua.</p>
                        </div>
                        <div class="col">
                            <h3>Office <div class="underline"><span></span></div>
                            </h3>
                            <p>Indonesia</p>
                            <p>Bojongsoang, Dayeuh Kolot</p>
                            <p>Telkom University, Indonesia</p>
                            <p class="email-id">4Ceria@gmail.com</p>
                        </div>
                        <div class="col">
                            <h3>Links <div class="underline"><span></span></div>
                            </h3>
                            <ul>
                                <li><a href="beranda.php">Home</a></li>
                                <li><a href="#skilll">Services</a></li>
                                <li><a href="aboutus.php">About Us</a></li>
                                <li><a href="cariRumah.php">Cari Rumah</a></li>
                                <li><a href="">Contacts</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <h3>Contact Us! <div class="underline"><span></span></div>
                            </h3>
                            <form>
                                <img class="email" src="Assets/emailPutih.png" width="29px" height="20px">
                                <input type="text" placeholder="Enter Your Message" required>
                                <button type="submit"><img class="panah" src="Assets/panahKananPutih.png"
                                        width="10px" height="20px"></button>
                            </form>
                            <div class="socialIcon">
                                <i class="fa-brands fa-whatsapp"></i>
                                <i class="fa-solid fa-envelope"></i>
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="copyright">4Ceria © 2024 All Right Reserved</div>
                </footer>
            @else
                <p>No houses available</p>
            @endif
        </div>
        </div>
    </x-slot:slot>

</x-app-layout>
