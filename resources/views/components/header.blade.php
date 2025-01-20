<header class="bg-white shadow p-4 flex items-center justify-between">
    <!-- Judul di kiri -->
    <h1 class="text-2xl font-semibold text-black">@yield('header-title', 'Dashboard')</h1>

    <!-- Tulisan di kanan -->
    <span class="text-black font-medium">{{ session('pegawai')['nama_pegawai'] ?? 'Guest' }}</span>
</header>

</header>
