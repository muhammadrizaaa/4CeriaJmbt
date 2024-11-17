<x-guest-layout>
<body>
    <!-- Judul Halaman -->
    <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">
        Masuk 
    </h2>

    <!-- Form Login -->
    <form id="login-form" class="space-y-6" action="#" method="POST" onsubmit="return validateForm()">
        @csrf

        <!-- Input Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-900">
                Alamat Email
            </label>
            <div class="mt-2">
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    autocomplete="email" 
                    required 
                    class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm 
                           ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm">
            </div>
            <p id="email-error" class="text-sm text-red-600 hidden">Masukkan alamat email yang valid.</p>
        </div>

        <!-- Input Password -->
        <div class = "password-container">
            <label for="password" class="block text-sm font-medium text-gray-900">
                Password
            </label>
            <div class="relative mt-2">
                <input 
                    id="password" 
                    name="password" 
                    type="password" 
                    autocomplete="current-password" 
                    required 
                    class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm 
                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm pr-10">
                <button 
                    type="button" 
                    onclick="togglePasswordVisibility()" 
                    class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
                    <img 
                        src="/images/icons/eye.png" 
                        alt="Show password" 
                        id="password-icon" 
                        class="h-5 w-5">
                </button>
            </div>
                <a href="/forgot-password" class="forgot-password">
                Lupa password?
                </a>
            <p id="password-error" class="text-sm text-red-600 hidden">Password harus memiliki minimal 8 karakter.</p>
        </div>

        <!-- Tombol Masuk -->
        <div>
            <button 
                type="submit" 
                class="flex w-full justify-center rounded-md bg-[#9F2A2A] px-3 py-1.5 text-sm font-semibold text-white shadow-sm 
                       hover:bg-[#9F2A2A] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
                Masuk
            </button>
        </div>
    </form>

    <!-- Tautan Daftar -->
    <p class="mt-10 text-center text-sm text-gray-500">
        Belum punya akun?
        <a href="/register" class="font-semibold text-[#9F2A2A] opacity-100 hover:opacity-45">
            Daftar di sini
        </a>
    </p>
</x-guest-layout>

