<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rumahDijual.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
        .navbar {
            background-color: white;
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            justify-content: space-between;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.25) ;
            z-index: 1000;
        }
        .navbar .logoss {
            margin-left: 12px;
            margin-right: 42px;
        }
        .navbar img {
            width: auto;
            width: 50px;
            height: 50px;
        }
        .fotoAtas img {
            border-radius: 20px;
        }
        .kiriNavbar {
            display: flex;
        }
        .kiriNavbar ul {
            display: flex;
            align-items: center;
            gap: 30px;
        }
        .kiriNavbar ul li {
            list-style: none
        }
        .kiriNavbar ul li a {
            text-decoration: none;
            color: #0f172a;
            font-size: 14px;
            transition: 0.3s ease;
            border-radius: 10px;
        }
        .kiriNavbar ul li:hover a{
            color: white;
            background-color: #fd1d1d;
            padding: 4px 6px;
            border-radius: 10px;
        }
        .kiriNavbar ul li:last-child a {
            margin: 0;
        }
        
        
        
        .btn {
            border: none;
            align-self: flex-start;
            transition: ease-in-out 0.4s;
            color: #fd1d1d;

        }
        .btn:hover {
        font-size: 14px;
        letter-spacing: 0.4px;
        }
        .btn:active .btn{
            background-color: #fd1d1d;
        }
        .tab-menu {
            display: flex;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
        }
        .tab-link {
            flex: 1;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            background-color: #f1f1f1;
            border: none;
            outline: none;
            transition: background-color 0.3s ease;
        }
        .tab-link:hover {
            background-color: #ddd;
        }
        .tab-link.active {
            background-color: white;
            border-bottom: 2px solid #fd1d1d;
        }
        .tab-content {
            display: none;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }
        .navbar {
            border-bottom: 1px solid #ddd;
            margin-bottom: 40px;
            top: 0;
            position: sticky;
            background-color: white;
            z-index: 1000;
        }
        .tab-content.active {
            display: block;
        }
        .profile-image {
    width: 150px; /* Sesuaikan dengan kebutuhan */
    height: 150px; /* Sesuaikan dengan kebutuhan */
    object-fit: cover; /* Mengatur agar gambar tidak terdistorsi */
    border-radius: 50%; /* Membuat gambar berbentuk lingkaran */
    border: 2px solid #ddd; /* Tambahkan border jika diinginkan */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan efek bayangan */
}

        
            </style>
    <title>Document</title>
</head>
<body>
    <div class="navbar">
        <div class="kiriNavbar">
            <img class="logoss" src="{{ asset('Assets/Logo4C.png') }}" width="84px" height="82px" alt="">
            <ul>
                <li><a href="">Beranda</a></li>
                <li><a href="">Cari Rumah</a></li>
                <li><a href="">Jual Rumah</a></li>
            </ul>
        </div>
    </div>
    
    <div class="tab-menu">
        <button class="tab-link active" onclick="openTab(event, 'profile')">Profile</button>
        <button class="tab-link" onclick="openTab(event, 'rumahDijual')">Rumah Dijual</button>
        <button class="tab-link" onclick="openTab(event, 'aboutus')">About Us</button>
    </div>
    
    <div id="profile" class="tab-content active">
        <h3 class="sambutan">Welcome, {{ $user->username }}</h3>

        <div class="atasboss">
            <img src="{{asset('assets/davin.profile.jpg')}}" alt="" class="profile-image">   
            <div class="nameemail">
                <h3 class="namanyadisini">{{ $user->username }}</h3>
                <h3 class="emailinimah">{{ $user->email }}</h3>
                <button type="button" id="editButton" class="btn" onclick="enableEdit()">Edit Profile</button>
            </div>
            <div class="tomboltombol">
    
            </div>
        </div>
        <form action="{{ route('updateProfile', Auth::id()) }}" method="POST">
            @method("PUT")
            @csrf
            <div class="container">
                <div class="kelompok">
                    <div class="atas">
                        <div class="kiri">
                            <div class="dataPenting">
                                <ul>
                                    <li>
                                        <h5>Username</h5>
                                        <input type="text" id="username" name="update_username" value="{{ $user->username }}" disabled>
                                    </li>
                                    @foreach ($errors->all() as $error)
                                        <h4>{{$error}}</h4>
                                    @endforeach
                                    <li>
                                        <h5>Phone Number</h5>
                                        <input type="text" id="phone_number" name="update_pNumber" value="{{ $user->phone_number }}" disabled>
                                    </li>
                                    <li>
                                        <h5>Password</h5>
                                        <input type="password" id="password" name="update_password" placeholder="New password" disabled>
                                    </li>
                                </ul>
                            </div>
                        </div>
    
                        <div class="kanan">
                            <div class="dataGPenting">
                                <ul>
                                    <li>
                                        <h5>Name</h5>
                                        <input type="text" name="update_name" value="{{ $user->name }}" disabled>
                                    </li>
                                    <li>
                                        <h5>Email</h5>
                                        <input type="email" id="email" name="update_email" value="{{ $user->email }}" disabled>
                                    </li>
                                    <li>
                                        <h5>Deskripsi</h5>
                                        <input type="text" id="deskripsi" name="update_deskripsi" value="{{ $user->Deskripsi }}" size="100" disabled>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
    
                    <div class="bawah">
                        <input type="submit" value="Update Profile" class="btn" id="updateButton" style="display: none">
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <div id="rumahDijual" class="tab-content">
        @if($houses->count() > 0)
            @foreach($houses as $house)
                <div class="pilihan">
                    <img src="{{ asset($house->gambar_rumah) }}">
                    <div class="isipilihan">
                        <h2>{{ $house->nama_rumah }}</h2>
                        <ul>
                            <li><span>{{ 'Rp. ' . number_format($house->harga, 0, ',', '.') }}</span></li>
                            <li>{{ $house->alamat }}</li>
                            <li>
                                <ul class="logox">
                                    <li class="ruang"><img src="{{ asset('assets/iconKamarTidur.png') }}"><p>{{ $house->kamar_tidur }} Kamar Tidur</p></li>
                                    <li class="ruang"><img src="{{ asset('assets/iconKamarMandi.png') }}"><p>{{ $house->kamar_mandi }} Kamar Mandi</p></li>
                                    <li class="ruang"><img src="{{ asset('assets/iconLuasTanah.png') }}"><p>{{ $house->luas }} m²</p></li>
                                </ul>
                            </li>
                        </ul>
                        <button onclick="window.location='{{ route('editRumah', $house->id) }}'">Edit</button>
                        <button onclick="confirmDelete({{ $house->id }})">Hapus</button>
                    </div>
                </div>
            @endforeach
    
            {{ $houses->links() }}
        @else
            <p>Data Masih Kosong</p>
        @endif
    </div>
    
    <div id="aboutus" class="tab-content">
        <div class="content">
        <div class="dalem">
            <div class="header">
                 <div class="isiHeader">
                   
          <br>
          <br  id="isi">
          <div class="isic">
            <div class="isi" >
                <div class="kiriinibos">
                <div class="forc">
              <h2 data-aos="fade-right" data-aos-delay="50">
                 Tentang 4C
              </h2>
              <img data-aos="fade-right" data-aos-delay="50" src="Assets/Logo4C.png" alt="">
              </div>
              <p data-aos="fade-right" data-aos-delay="150">4C Adalah aplikasi dengan tema Konstruksi / Pembangunan dengan tujuan menjadi perantara pengguna umum untuk target penggunanya adalah pengguna Umum dan untuk fitur utamanya adalah  jual beli Rumah  </p>
              </div>
              <img class="fotot" src="Assets/4CTeam.jpg" data-aos="fade-right" data-aos-delay="200">
             </div>

        
            <div class="kisah">
                <div class="kiriinibos1">
                <h2 data-aos="fade-right" data-aos-delay="50">Awal mula</h2>
                <p data-aos="fade-right" data-aos-delay="150">Kami hadir untuk mempermudah kepemilikan properti dan membantu pencari rumah menemukan pilihan terbaik. Dengan fitur analisis harga, perencana keuangan, dan pencarian berbasis peta, kami memastikan segalanya mudah dan tepat.</p>
                     </div>
                     <img class="fotot" src="Assets/4CTeam.jpg" data-aos="fade-right" data-aos-delay="250">
            </div>
        
                <div class="kepemimpinan" >
                        <H1 data-aos="fade-up" data-aos-delay="50" class="Header"> Kepemimpinan </H1>
                        
                        <div class="isikepemimpinan">  
                            <div class="teks">
                                <H1 data-aos="fade-right" data-aos-delay="50">Davin Akmal Yasha</H1>
                                <H3 data-aos="fade-right" data-aos-delay="100"> Grup CEO & Co-founder</H3><br>
                                <p data-aos="fade-right" data-aos-delay="150">Davin merupakan salah satu pendiri dari 4C sejak didirikan pada tahun 2024. Sebelum ia mendirikan 4C ia adalah seorang mahasiswa Telkom University, setelah lulus dari Telkom davin bermimpi untuk membangun sebuah perusahaan dengan bertujuan menciptakan Pembangunan indonesia yang Creative Compherensive dan Cool.</p>
                            </div>
            
                            <div class="PP">
                                <img src="{{asset('assets/davin.profile.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="isikepemimpinan">  
                            <div class="teks">
                                <H1 data-aos="fade-right" data-aos-delay="50">Riza Rabbani</H1>
                                <H3 data-aos="fade-right" data-aos-delay="100"> Grup CEO & Co-founder> Grup CEO & Co-founder</H3> <br>
                                <p data-aos="fade-right" data-aos-delay="150">Riza merupakan salah satu pendiri dari 4C juga. Sebelumnya dia juga seorang mahasiswa Telkom University. Setelah lulus dia bertemu dengan davin yang pada saat itu dapin mengajak riza untuk ikut berkontibusi untuk menciptakan 4C dan akhirnya riza pun ikut dalam pembuatan 4C </p>
                            </div>
            
                            <div class="PP">
                                <img src="{{asset('assets/rija.profile.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="isikepemimpinan">  
                            <div class="teks">
                                <H1 data-aos="fade-right" data-aos-delay="50">Riza Rabbani>Muhammad Daffa</H1>
                                <H3 data-aos="fade-right" data-aos-delay="100">OB</H3><br>
                                <p data-aos="fade-right" data-aos-delay="150">Dapa juga merupakan salah satu pendiri dari 4C. Dia sebelumnya adalah juragan toko besi / bangunan dengan menyediakan alat alat dan perlengkapan untuk segala macam yang dibutuhkan untuk pembangunan. Dapa bergabung dengan 4C karena Dapin mengajak bekerja sama dengannya untuk bisa menganalisis produksi, biaya dalam pembangunan </p>
                            </div>
            
                            <div class="PP">
                                <img src="{{asset('assets/dapa.profile.jpg')}}" alt="">
                            </div>
                        </div>
                        
                        <div class="isikepemimpinan">  
                            <div class="teks">
                                <H1 data-aos="fade-right" data-aos-delay="50">Athallah Khansa Ziven</H1>
                                <H3 data-aos="fade-right" data-aos-delay="100"> Grup CEO & Co-founder</H3><br>
                                <p data-aos="fade-right" data-aos-delay="150">Athallah sama juga dengan pendiri lainnya dari 4C. Sebelum bergabung dengan 4C, Athallah menjabat sebagai Kepala Sumber Daya Manusia Global di sebuah perusahaan publik di mana dia mengarahkan manajemen perubahan dan membangun kembali tim dan proses operasional. Beliau diakui atas kepemimpinannya, profesionalismenya, dan integritasnya yang tinggi serta memperoleh penghargaan seperti HR Manager of the Year Asia pada tahun 2024. Ia dikenal karena menyeimbangkan antara kasih sayang dan keteguhan, serta mendorong perubahan positif.</p>
                            </div>
            
                            <div class="PP">
                                <img src="{{asset('assets/pen.profile.jpg')}}" alt="">
                            </div>
                        </div>
                       
                </div>
            </div>
    
            <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
            <script>
                AOS.init();
            </script>
     </div> 
        </div>
        
        
        <script>
           function openTab(evt, tabName) {
        const contents = document.querySelectorAll('.tab-content');
        contents.forEach(content => content.classList.remove('active'));
        const links = document.querySelectorAll('.tab-link');
        links.forEach(link => link.classList.remove('active'));
        document.getElementById(tabName).classList.add('active');
        evt.currentTarget.classList.add('active');
    }
        </script>
    
    <script>
         function openTab(evt, tabName) {
    const contents = document.querySelectorAll('.tab-content');
    contents.forEach(content => content.classList.remove('active'));
    const links = document.querySelectorAll('.tab-link');
    links.forEach(link => link.classList.remove('active'));
    document.getElementById(tabName).classList.add('active');
    evt.currentTarget.classList.add('active');
}

    function openTab(evt, tabName) {
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.style.display = 'none';
        });

        document.getElementById(tabName).style.display = 'block';
        document.querySelectorAll('.tab-link').forEach(btn => {
            btn.classList.remove('active');
        });

        if (evt) {
            evt.currentTarget.classList.add('active');
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        const urlParams = new URLSearchParams(window.location.search);
        const tab = urlParams.get('tab'); 
        if (tab) {
            document.querySelector(`button[onclick="openTab(event, '${tab}')"]`).click();
        } else {
            document.querySelector('button[onclick="openTab(event, \'profile\')"]').click();
        }
    });

    document.addEventListener('scroll', () => {
            const fireLine = document.getElementById('fireLine');
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercentage = scrollTop / docHeight;
            fireLine.style.height = `${scrollPercentage * 100}%`;

            if (scrollPercentage > 0) {
                fireLine.classList.add('active');
            } else {
                fireLine.classList.remove('active');
            }
        });

            function enableEdit() {
                const editButton = document.getElementById('editButton');
                const updateButton = document.getElementById('updateButton');
                document.querySelectorAll('input[type="text"], input[type="password"], input[type="email"]').forEach(input => {
                    input.disabled = false;
                });
                document.querySelectorAll('input').forEach(input => {
                    input.style.border = "1px solid #ddd";
                });
                editButton.textContent = "Batalkan"
                updateButton.style.display = "inline-block";

                editButton.onclick = function() {
                    cancelEdit();
                };
            }

            function cancelEdit() {
                const editButton = document.getElementById('editButton');
                const updateButton = document.getElementById('updateButton');
                document.querySelectorAll('input[type="text"], input[type="password"], input[type="email"]').forEach(input => {
                    input.disabled = true;
                });

                document.querySelectorAll('input').forEach(input => {
                    input.style.border = "none";
                });
                editButton.textContent = "Edit Profile";
                updateButton.style.display = "none";
                editButton.onclick = function() {
                    enableEdit();
                };
            }                                                                   
        // function enableEdit() {
        //     document.querySelectorAll('input').forEach(input => input.disabled = false);
        //     document.getElementById('editButton').innerText = "Cancel";
        //     document.getElementById('editButton').onclick = cancelEdit;
        // }
    
        // function cancelEdit() {
        //     document.querySelectorAll('input').forEach(input => input.disabled = true);
        //     document.getElementById('editButton').innerText = "Edit Profile";
        //     document.getElementById('editButton').onclick = enableEdit;
        // }
    
        // function confirmDelete(id) {
        //     if (confirm('Hapus Rumah Ini?')) {
        //         window.location.href = `/hapusRumah/${id}`;
        //     }
        // }
    </script>

</body>
</html>