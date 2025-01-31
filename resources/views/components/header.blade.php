<header class="flex items-center justify-between p-4 bg-white shadow">
    <div class="flex items-center gap-2">
        <button id="hamburger-button" class="z-10 p-2 text-white bg-gray-800 rounded-md md:hidden">
            ☰
        </button>

        <!-- Judul di kiri -->
        <h1 class="text-2xl font-semibold text-black">@yield('header-title', 'Dashboard')</h1>
    </div>

    <!-- Tulisan di kanan -->
    <span class="font-medium text-black">{{ session('pegawai')['nama'] ?? 'Guest' }}</span>
</header>
