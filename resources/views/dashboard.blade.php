@extends('components.layoutdashboard')

@section('title', 'Dashboard')

@section('header-title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="border-2 border-indigo-500 bg-white border-gradient-to-r p-6 rounded-lg shadow flex items-center ">
            <div class="mr-4 text-indigo-500">
                <i class="fas fa-database text-3xl"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-indigo-500">Total Data</h2>
                <p class="text-2xl font-semibold mt-2 text-indigo-500">0</p>
            </div>
        </div>
        <div class="border-2 border-teal-500 bg-white border-gradient-to-r p-6 rounded-lg shadow flex items-center">
            <div class="mr-4 text-teal-500">
                <i class="fas fa-users text-3xl"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-teal-500">Total Pegawai</h2>
                <p class="text-2xl font-semibold mt-2 text-teal-500">14</p>
            </div>
        </div>
        <div class="border-2 border-yellow-500 bg-white border-gradient-to-r p-6 rounded-lg shadow flex items-center">
            <div class="mr-4 text-yellow-500">
                <i class="fas fa-building text-3xl"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-yellow-500">Total Cabang</h2>
                <p class="text-2xl font-semibold mt-2 text-yellow-500">20</p>
            </div>
        </div>
    </div>
    <div class="mt-8">
        <h2 class="text-lg font-bold mb-4">Recent Activities</h2>
        {{-- <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-gray-600">No recent activities available.</p>
        </div> --}}
        <div class="overflow-x-auto mx-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead class="bg-gradient-to-r from-blue-500 to-purple-600 text-white">
                    <tr>
                        <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">No</th>
                        <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">NPA</th>
                        <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Nama Pelanggan</th>
                        <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Alamat</th>
                        <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Stand Meter</th>
                        <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Tarif</th>
                        <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Hasil Temuan</th>
                        <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Arahan Tindak Lanjut
                        </th>
                        <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Cabang Tujuan</th>
                        <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Tanggal Input</th>
                        <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Tanggal Pengecekan
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($pelangganList as $index => $pelanggan)
                        <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                            <td class="py-4 px-6 text-gray-700 text-center">{{ $index + 1 }}</td>
                            <td class="py-4 px-6 text-gray-700 text-center">{{ $pelanggan->npa }}</td>
                            <td class="py-4 px-6 text-gray-700 text-center">{{ $pelanggan->nama_pelanggan }}</td>
                            <td class="py-4 px-6 text-gray-700 text-center">{{ $pelanggan->alamat }}</td>
                            <td class="py-4 px-6 text-gray-700 text-center">{{ $pelanggan->stand_meter }}</td>
                            <td class="py-4 px-6 text-gray-700 text-center">{{ $pelanggan->tarif }}</td>
                            <td class="py-4 px-6 text-gray-700 text-center">{{ $pelanggan->hasil_temuan }}</td>
                            <td class="py-4 px-6 text-gray-700 text-center">{{ $pelanggan->arahan_tindak_lanjut }}</td>
                            <td class="py-4 px-6 text-gray-700 text-center">{{ $pelanggan->cabang_tujuan }}</td>
                            <td class="py-4 px-6 text-gray-700 text-center">{{ $pelanggan->tanggal_input }}</td>
                            <td class="py-4 px-6 text-gray-700 text-center">{{ $pelanggan->tanggal_pengecekan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
