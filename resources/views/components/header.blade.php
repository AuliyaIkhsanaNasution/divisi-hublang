<header class="flex items-center justify-between p-4 bg-white shadow">
    <!-- Judul di kiri -->
    <h1 class="text-2xl font-semibold text-black">@yield('header-title', 'Dashboard')</h1>

    <!-- Tulisan di kanan -->
    <span class="font-medium text-black">{{ session('pegawai')['nama'] ?? 'Guest' }}</span>
</header>
