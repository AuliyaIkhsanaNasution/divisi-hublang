@extends('components.layoutdashboard')

@section('title', 'Dashboard')

@section('header-title', 'Dashboard')

@section('content')
    <div class="p-6 bg-white min-h-screen flex items-center justify-center rounded-lg shadow-md">
        <div class="w-full max-w-3xl bg-white p-8">
            <h2 class="text-2xl font-extrabold text-center text-gray-800 mb-8">Form Input Data Hasil Pengecekan Ulang Divisi
                Hublang</h2>
            <form class="space-y-6">
                @csrf

                <!-- NPA Field -->
                <div>
                    <label for="npa" class="block text-sm font-semibold text-gray-700">NPA</label>
                    <input type="text" id="npa" name="npa" placeholder="Masukkan NPA"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700">
                </div>

                <!-- Nama Pelanggan Field -->
                <div>
                    <label for="nama_pelanggan" class="block text-sm font-semibold text-gray-700">Nama Pelanggan</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700">
                </div>

                <!-- Alamat Field -->
                <div>
                    <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="4" placeholder="Masukkan Alamat"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"></textarea>
                </div>

                <!-- Stand Meter Field -->
                <div>
                    <label for="stand_meter" class="block text-sm font-semibold text-gray-700">Stand Meter</label>
                    <input type="text" id="stand_meter" name="stand_meter" placeholder="Masukkan Stand Meter"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700">
                </div>

                <!-- Tarif Field -->
                <div>
                    <label for="tarif" class="block text-sm font-semibold text-gray-700">Tarif</label>
                    <input type="text" id="tarif" name="tarif" placeholder="Masukkan Tarif"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700">
                </div>

                <!-- Hasil Temuan Field -->
                <div>
                    <label for="hasil_temuan" class="block text-sm font-semibold text-gray-700">Hasil Temuan</label>
                    <textarea id="hasil_temuan" name="hasil_temuan" rows="4" placeholder="Masukkan Hasil Temuan"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"></textarea>
                </div>

                <!-- Arahan Tindak Lanjut Field -->
                <div>
                    <label for="arahan_tindak_lanjut" class="block text-sm font-semibold text-gray-700">Arahan Tindak
                        Lanjut</label>
                    <textarea id="arahan_tindak_lanjut" name="arahan_tindak_lanjut" rows="4"
                        placeholder="Masukkan Arahan Tindak Lanjut"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700"></textarea>
                </div>

                <!-- Cabang Tujuan Field -->
                <div>
                    <label for="cabang_tujuan" class="block text-sm font-semibold text-gray-700">Cabang Tujuan</label>
                    <select id="cabang_tujuan" name="cabang_tujuan"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700">
                        <option value="">Pilih Cabang Tujuan</option>
                        <option value="Cabang 1">Cabang 1</option>
                        <option value="Cabang 2">Cabang 2</option>
                        <option value="Cabang 3">Cabang 3</option>
                        <option value="Cabang 3">Cabang 4</option>
                        <option value="Cabang 3">Cabang 5</option>
                    </select>
                </div>

                <!-- Tanggal Input Field -->
                <div>
                    <label for="tanggal_input" class="block text-sm font-semibold text-gray-700">Tanggal Input</label>
                    <input type="date" id="tanggal_input" name="tanggal_input" value="{{ date('Y-m-d') }}"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700">
                </div>

                <!-- Tanggal Cetak Field -->
                <div>
                    <label for="tanggal_cetak" class="block text-sm font-semibold text-gray-700">Tanggal Cetak</label>
                    <input type="date" id="tanggal_cetak" name="tanggal_cetak"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700">
                </div>

                <!-- Tanggal Pengecekan Field -->
                <div>
                    <label for="tanggal_pengecekan" class="block text-sm font-semibold text-gray-700">Tanggal
                        Pengecekan</label>
                    <input type="date" id="tanggal_pengecekan" name="tanggal_pengecekan"
                        class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-700 focus:border-blue-700">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full py-3 px-6 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition focus:ring-4 focus:ring-blue-300">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
