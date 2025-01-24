@extends('components.layoutdashboard')

@section('title', 'Laporan | Divisi Hubungan Langganan')

@section('header-title', 'Laporan')

@section('content')
    <div class="relative">
        <div class="flex justify-end">
            <button id="toggleFormButton"
                class="bg-blue-500 text-white px-8 py-2 mx-4 rounded-lg text-sm hover:bg-blue-600 transition duration-200">
                Filter
            </button>
            <a href="{{ route('pdf', request()->all()) }}" target="_blank"
                class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition duration-200">
                Cetak PDF
            </a>
        </div>

        <!-- Form yang muncul/dihilangkan -->
        <div id="filterForm" class="absolute right-0 mt-2 w-96 bg-white shadow-lg rounded-lg p-4 hidden">
            <form method="GET" action="{{ route('laporan.filter') }}" class="space-y-4">
                <!-- Tanggal Mulai -->
                <div>
                    <label for="start_date" class="block text-sm font-medium">Tanggal Mulai</label>
                    <input type="date" id="start_date" name="start_date" value="{{ request()->start_date }}"
                        class="mt-1 w-full border rounded px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Tanggal Selesai -->
                <div>
                    <label for="end_date" class="block text-sm font-medium">Tanggal Selesai</label>
                    <input type="date" id="end_date" name="end_date" value="{{ request()->end_date }}"
                        class="mt-1 w-full border rounded px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Nama Pegawai -->
                <div>
                    <label for="pegawai_id" class="block text-sm font-medium">Nama Pegawai</label>
                    <select id="pegawai_id" name="pegawai_id"
                        class="mt-1 w-full border rounded px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Semua Pegawai --</option>
                        @foreach ($pegawaiList as $pegawai)
                            <option value="{{ $pegawai->id_pegawai }}"
                                {{ request()->pegawai_id == $pegawai->id_pegawai ? 'selected' : '' }}>
                                {{ $pegawai->nama_pegawai }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Stand Meter -->
                <div>
                    <label for="stand_meter" class="block text-sm font-medium">Stand Meter</label>
                    <input type="text" id="stand_meter" name="stand_meter" value="{{ request()->stand_meter }}"
                        class="mt-1 w-full border rounded px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan nilai stand meter">
                </div>

                <!-- Hasil Temuan -->
                <div>
                    <label for="hasil_temuan" class="block text-sm font-medium">Hasil Temuan</label>
                    <input type="text" id="hasil_temuan" name="hasil_temuan" value="{{ request()->hasil_temuan }}"
                        class="mt-1 w-full border rounded px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan hasil temuan">
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg text-sm hover:bg-blue-600 transition duration-200">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="">
        <h2 class="text-xl text-center mb-4">Laporan Hasil Pengecekan Ulang Divisi Hublang</h2>
        <div class="overflow-x-auto mx-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                @if ($laporanList->isEmpty())
                    <!-- Tampilkan pesan jika tidak ada data -->
                    <tr>
                        <td colspan="12" class="py-6 px-4 text-center text-gray-500 text-sm">
                            Tidak ada data yang sesuai.
                        </td>
                    </tr>
                @else
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">No</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">NPA</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Nama
                                Pegawai
                            </th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Nama
                                Pelanggan
                            </th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Alamat
                            </th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Stand
                                Meter
                            </th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Tarif</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Hasil
                                Temuan
                            </th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Arahan
                                Tindak
                                Lanjut</th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Cabang
                                Tujuan
                            </th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Tanggal
                                Input
                            </th>
                            <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Tanggal
                                Pengecekan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($laporanList as $index => $laporan)
                            <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $index + 1 }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $laporan->npa }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ $laporan->nama_pegawai }}
                                </td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ $laporan->nama_pelanggan }}
                                </td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $laporan->alamat }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $laporan->stand_meter }}
                                </td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $laporan->tarif }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ $laporan->hasil_temuan }}
                                </td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ $laporan->arahan_tindak_lanjut }}</td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $laporan->nama_cabang }}
                                </td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ \Carbon\Carbon::parse($laporan->tanggal_input)->format('d F Y') }}
                                </td>
                                <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                    {{ \Carbon\Carbon::parse($laporan->tanggal_cek_ulang)->format('d F Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
        </div>
    </div>

@endsection
