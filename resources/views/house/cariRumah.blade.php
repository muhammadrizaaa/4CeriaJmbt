<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    <title>Cari Rumah</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/CariRumah.css') }}">
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.css" rel="stylesheet">
    <link href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
    <script src="{{ asset('js/cariRumah.js') }}"></script>
    <style>
#success-message {
            display: none;
            position: fixed;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            background-color: white;
            color:#fd1d1d;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            z-index: 1000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transition: opacity 0.5s ease, top 0.5s ease;
        }

        #success-message.show {
            display: block;
            opacity: 1;
        }

        #progress-bar {
            width: 100%;
            height: 5px;
            border-radius: 20px;
            background-color: #fd1d1d;
            margin-top: 15px;
            animation: shrink 2s linear forwards;
        }

        @keyframes shrink {
            from { width: 100%; }
            to { width: 0; }
        }
        
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }    </style>
</head>

<body>
    @if ($flash_message)
        <div id="success-message">
            {{ $flash_message }}
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
        <div class="kiriNavbar">
            <img class="logoss" src="{{ asset('Assets/Logo4C.png') }}" width="84px" height="82px" alt="">
            <ul>
                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                <li><a href="{{ route('cariRumah') }}">Cari Rumah</a></li>
                <li><a href="{{ route('tambahDataRumah') }}">Jual Rumah</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <div class="profile">
                <img src="{{ asset('Assets/davin.profile.jpg') }}" alt="">
                <button class="dropbtn">{{ session('user.username') }}</button>
            </div>
            <div class="dropdown-content" id="myDropdown">
                <div class="profile-section">
                    <img class="profileguys" src="{{ asset('Assets/davin.profile.jpg') }}" alt="Profile Picture">
                    <h3 class="username">{{ session('user.username') }}</h3>
                </div>
                <hr>
                <ul class="ini">
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('rumahDijual') }}">Rumah Dijual</a></li>
                    <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                    <li><a href="{{ route('logout') }}">LogOut</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="dalem">
        <div class="header">
            <div class="mapsrumah" id="map"></div>
        </div>
        <div class="content">
            <div class="filter">
                <form method="GET" id="filter" autocomplete="off">
                    <div class="form-fields">
                        <div class="cart">
                            <h5>Provinsi</h5>
                            <input type="text" placeholder="Provinsi" name="kota" id="province-input" value="{{ $kota }}">
                        </div>
                        <!-- Form fields lainnya -->
                    </div>
                    <button type="submit">Filter</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
