@extends('components.layoutdashboard')

@section('title', 'Dashboard')

@section('header-title', 'Laporan')

@section('content')

    <div class="mt-2">
        <h2 class="text-xl text-center mb-4">Rekapitulasi Laporan Inputan Pengecekan Ulang Meter Pelanggan</h2>
        <div class="overflow-x-auto mx-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead class="bg-gradient-to-r from-blue-500 to-purple-600 text-white">
                    <tr>
                        <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">No</th>
                        <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">NPA</th>
                        <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Nama Pegawai
                        </th>
                        <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Nama Pelanggan
                        </th>
                        <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Alamat</th>
                        <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Stand Meter
                        </th>
                        <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Tarif</th>
                        <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Hasil Temuan
                        </th>
                        <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Arahan Tindak
                            Lanjut</th>
                        <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Cabang Tujuan
                        </th>
                        <th class="py-4 px-2 sm:px-4 text-center text-xs font-medium uppercase tracking-wide">Tanggal Input
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
                            <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $laporan->pegawai_id }}</td>
                            <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $laporan->nama_pelanggan }}
                            </td>
                            <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $laporan->alamat }}</td>
                            <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $laporan->stand_meter }}
                            </td>
                            <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                {{ $laporan->tarif }}
                            </td>
                            <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $laporan->hasil_temuan }}
                            </td>
                            <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">
                                {{ $laporan->arahan_tindak_lanjut }}</td>
                            <td class="py-4 px-2 sm:px-4 text-gray-700 text-center text-xs">{{ $laporan->cabang_id }}
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
            </table>
        </div>
    </div>

@endsection
