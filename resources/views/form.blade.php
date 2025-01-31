@extends('components.layoutdashboard')

@section('title', 'Input Data Pengecekan Meter | Divisi Hubungan Langganan')

@section('header-title', 'Dashboard')

@section('content')

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div class="p-6 bg-white min-h-screen flex items-center justify-center rounded-lg shadow-md">
        <div class="w-full max-w-3xl bg-white p-8">
            <h2 class="text-2xl text-center text-gray-800 mb-8">
                Formulir Input Data Pengecekan Ulang Meter Pelanggan Divisi Hubungan Langganan
            </h2>
            <!-- Form Edit atau Create -->
            <form action="{{ isset($data) ? route('form.update', $data->npa) : route('form.store') }}" method="POST"
                class="space-y-4">
                @csrf
                @if (isset($data))
                    @method('PUT') <!-- Menandakan update -->
                @endif

                <!-- NPA Field -->
                <div>
                    <label for="npa" class="block text-sm font-semibold text-gray-700">NPA</label>
                    <input type="text" id="npa" name="npa" placeholder="Masukkan NPA"
                        value="{{ old('npa', $data->npa ?? '') }}"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"
                        required @if (isset($data)) readonly @endif>
                </div>

                <!-- Tanggal Input Field -->
                <div>
                    <label for="tanggal_input" class="block text-sm font-semibold text-gray-700">Tanggal Input</label>
                    <input type="date" id="tanggal_input" name="tanggal_input"
                        value="{{ old('tanggal_input', $data->tanggal_input ?? date('Y-m-d')) }}"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700">
                </div>

                <!-- Tanggal Pengecekan Field -->
                <div>
                    <label for="tanggal_cek_ulang" class="block text-sm font-semibold text-gray-700">Tanggal Cek
                        Ulang</label>
                    <input type="date" id="tanggal_cek_ulang" name="tanggal_cek_ulang"
                        value="{{ old('tanggal_cek_ulang', $data->tanggal_cek_ulang ?? '') }}"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"
                        required>
                </div>

                <!-- Nama Pelanggan Field -->
                <div>
                    <label for="nama_pelanggan" class="block text-sm font-semibold text-gray-700">Nama Pelanggan</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan"
                        value="{{ old('nama_pelanggan', $data->nama_pelanggan ?? '') }}"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"
                        required>
                </div>

                <!-- Alamat Field -->
                <div>
                    <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="4" placeholder="Masukkan Alamat"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"
                        required>{{ old('alamat', $data->alamat ?? '') }}</textarea>
                </div>

                <!-- Stand Meter Field -->
                <div>
                    <label for="stand_meter" class="block text-sm font-semibold text-gray-700">Stand Meter</label>
                    <input type="text" id="stand_meter" name="stand_meter" placeholder="Masukkan Stand Meter"
                        value="{{ old('stand_meter', $data->stand_meter ?? '') }}"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"
                        required>
                </div>

                <!-- Tarif Field -->
                <div>
                    <label for="tarif" class="block text-sm font-semibold text-gray-700">Tarif</label>
                    <input type="text" id="tarif" name="tarif" placeholder="Masukkan Tarif"
                        value="{{ old('tarif', $data->tarif ?? '') }}"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"
                        required>
                </div>

                <!-- Hasil Temuan Field -->
                <div>
                    <label for="hasil_temuan" class="block text-sm font-semibold text-gray-700">Hasil Temuan</label>
                    <textarea id="hasil_temuan" name="hasil_temuan" rows="4" placeholder="Masukkan Hasil Temuan"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"
                        required>{{ old('hasil_temuan', $data->hasil_temuan ?? '') }}</textarea>
                </div>

                <!-- Arahan Tindak Lanjut Field -->
                <div>
                    <label for="arahan_tindak_lanjut" class="block text-sm font-semibold text-gray-700">Arahan Tindak
                        Lanjut</label>
                    <textarea id="arahan_tindak_lanjut" name="arahan_tindak_lanjut" rows="4"
                        placeholder="Masukkan Arahan Tindak Lanjut"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"
                        required>{{ old('arahan_tindak_lanjut', $data->arahan_tindak_lanjut ?? '') }}</textarea>
                </div>

                <!-- Cabang Tujuan Field -->
                <div>
                    <label for="cabang_tujuan" class="block text-sm font-semibold text-gray-700">Cabang Tujuan</label>
                    <select id="cabang_tujuan" name="cabang_id"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"
                        required>
                        <option value="">Pilih Cabang Tujuan</option>
                        @foreach ($cabang as $item)
                            <option value="{{ $item->id_cabang }}"
                                {{ isset($data) && $data->cabang_id == $item->id_cabang ? 'selected' : '' }}>
                                {{ $item->nama_cabang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal Cetak Field -->
                {{-- <div>
                    <label for="tanggal_cetak" class="block text-sm font-semibold text-gray-700">Tanggal Cetak</label>
                    <input type="date" id="tanggal_cetak" name="tanggal_cetak"
                        value="{{ old('tanggal_cetak', $data->tanggal_cetak ?? '') }}"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"
                        required>
                </div> --}}

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full py-3 px-6 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition focus:ring-4 focus:ring-blue-300">
                        {{ isset($data) ? 'Update' : 'Submit' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
