@extends('components.layoutdashboard')

@section('title', 'Data Cabang')

@section('header-title', 'Dashboard')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-700 text-left">Data Cabang</h1>
        <button id="openModalButton"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Tambah Data Cabang
        </button>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Tambah Data Cabang</h2>
                <button id="closeModalButton" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            <form id="cabangForm" method="POST">
                @csrf
                <input type="hidden" id="method_field" name="_method" value="POST">
                <div class="mb-4">
                    <label for="nama_cabang" class="block text-sm font-medium text-gray-700 mb-2">Nama Cabang</label>
                    <input type="text" id="nama_cabang" name="nama_cabang"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeModalButton2"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-2">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel data cabang --}}
    <div class="overflow-x-auto mx-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">No</th>
                    <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Nama Cabang</th>
                    <th class="py-4 px-6 text-center text-sm font-medium uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($cabangList as $index => $cabang)
                    <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                        <td class="py-4 px-6 text-gray-700 text-center">{{ $index + 1 }}</td>
                        <td class="py-4 px-6 text-gray-700 text-center">{{ $cabang->nama_cabang }}</td>
                        <td class="py-4 px-2 sm:px-4 text-center text-xs">
                            <!-- Edit and Delete Actions -->
                            <button type="button" class="text-blue-500 hover:text-blue-700 mr-4" id="openModalButtonEdit"
                                data-nama-cabang="{{ $cabang->nama_cabang }}" data-id="{{ $cabang->id_cabang }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('cabang.destroy', $cabang->id_cabang) }}" method="POST"
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
                @empty
                    <tr>
                        <td colspan="2" class="py-4 px-6 text-gray-700 text-center">Tidak ada data cabang</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
