@extends('components.layoutdashboard')

@section('title', 'Dashboard | Divisi Hubungan Langganan')

@section('header-title', 'Dashboard')

@section('content')

    <!-- Menampilkan BERHASIL login -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil login!",
                text: "Selamat Datang!",
            });
        </script>

        <!-- Menampilkan SweetAlert2 untuk Success -->
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                });
            </script>
        @endif

        <!-- Menampilkan SweetAlert2 untuk Error -->
        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('error') }}',
                });
            </script>
        @endif

    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4"
        @if (Session::get('pegawai')['role'] !== 'admin') style="display: none;" @endif>
        <div class="border-2 border-indigo-500 bg-white p-6 rounded-lg shadow flex items-center">
            <div class="mr-4 text-indigo-500">
                <i class="fas fa-database text-3xl"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-indigo-500">Total Data</h2>
                <p class="text-2xl font-semibold mt-2 text-indigo-500">{{ $totalData }}</p>
            </div>
        </div>
        <div class="border-2 border-teal-500 bg-white p-6 rounded-lg shadow flex items-center">
            <div class="mr-4 text-teal-500">
                <i class="fas fa-users text-3xl"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-teal-500">Total Pegawai</h2>
                <p class="text-2xl font-semibold mt-2 text-teal-500">{{ $totalPegawai }}</p>
            </div>
        </div>
        <div class="border-2 border-yellow-500 bg-white p-6 rounded-lg shadow flex items-center">
            <div class="mr-4 text-yellow-500">
                <i class="fas fa-building text-3xl"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-yellow-500">Total Cabang</h2>
                <p class="text-2xl font-semibold mt-2 text-yellow-500">{{ $totalCabang }}</p>
            </div>
        </div>
    </div>

    <div class="mt-2">
        <h2 class="text-lg font-bold mb-4">Recent Activities</h2>
        <div class="overflow-x-auto mx-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                @if ($dashboardList->isEmpty())
                    <!-- Tampilkan pesan jika tidak ada data -->
                    <tr>
                        <td colspan="12" class="py-6 px-4 text-center text-gray-500 text-sm">
                            Tidak ada data yang diinputkan.
                        </td>
                    </tr>
                @else
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">No</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">NPA</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Nama
                                Pelanggan</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Alamat
                            </th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Stand
                                Meter</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Tarif</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Hasil
                                Temuan</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Arahan
                                Tindak Lanjut</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Cabang
                                Tujuan</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Tanggal
                                Input</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Tanggal
                                Pengecekan</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($dashboardList as $index => $dashboard)
                            <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $index + 1 }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $dashboard->npa }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ $dashboard->nama_pelanggan }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $dashboard->alamat }}
                                </td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ $dashboard->stand_meter }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $dashboard->tarif }}
                                </td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ $dashboard->hasil_temuan }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ $dashboard->arahan_tindak_lanjut }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ $dashboard->nama_cabang }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ \Carbon\Carbon::parse($dashboard->tanggal_input)->format('d F Y') }}
                                </td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ \Carbon\Carbon::parse($dashboard->tanggal_cek_ulang)->format('d F Y') }}
                                </td>
                                <td class="py-4 px-2 sm:px-4 text-center text-xs">
                                    <!-- Edit and Delete Actions -->
                                    <a href="{{ route('form.edit', $dashboard->npa) }}"
                                        class="text-blue-500 hover:text-blue-700 mr-4">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard.destroy', $dashboard->npa) }}" method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
        </div>
    </div>

@endsection
