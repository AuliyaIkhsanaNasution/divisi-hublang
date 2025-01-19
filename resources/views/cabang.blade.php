@extends('components.layoutdashboard')

@section('title', 'Dashboard')

@section('header-title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-700 mb-6 text-left">Data Cabang</h1>
    {{-- Tabel data cabang --}}
    <div class="overflow-x-auto mx-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
            <thead class="bg-gradient-to-r from-blue-500 to-purple-600 text-white">
                <tr>
                    <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">No</th>
                    <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Nama Cabang</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($cabangList as $index => $cabang)
                    <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                        <td class="py-4 px-6 text-gray-700 text-center">{{ $index + 1 }}</td>
                        <td class="py-4 px-6 text-gray-700 text-center">{{ $cabang->nama_cabang }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="py-4 px-6 text-gray-700 text-center">Tidak ada data cabang</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
