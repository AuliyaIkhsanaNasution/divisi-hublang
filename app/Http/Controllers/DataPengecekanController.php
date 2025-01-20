<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPengecekan;
use App\Models\Cabang;
use Illuminate\Support\Facades\Session;

class DataPengecekanController extends Controller
{
    /**
     * Menampilkan form input data.
     */
    public function create()
    {
        // Ambil semua data cabang dan pegawai dari session
        $cabang = Cabang::getAll(); // Method `getAll` dari model `Cabang`
        $pegawai = Session::get('pegawai'); // Pastikan session pegawai tersedia

        return view('form', compact('cabang', 'pegawai'));
    }

    /**
     * Menyimpan data dari form ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'npa' => 'required|integer',
            'nama_pelanggan' => 'required|string',
            'alamat' => 'required|string',
            'stand_meter' => 'required|string',
            'tarif' => 'required|string',
            'hasil_temuan' => 'required|string',
            'arahan_tindak_lanjut' => 'required|string',
            'id_cabang' => 'required|integer',
            'tanggal_input' => 'required|date',
        ]);


        // Ambil data pegawai dari session
        $pegawai = Session::get('pegawai');

        // Simpan data ke dalam database
        $data = [
            'npa' => $request->npa,
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'stand_meter' => $request->stand_meter,
            'tarif' => $request->tarif,
            'hasil_temuan' => $request->hasil_temuan,
            'arahan_tindak_lanjut' => $request->arahan_tindak_lanjut,
            'id_cabang' => $request->id_cabang,
            'tanggal_input' => $request->tanggal_input,
            'tanggal_cetak' => $request->tanggal_cetak,
            'tanggal_pengecekan' => $request->tanggal_pengecekan,
            'id_pegawai' => $pegawai['id'], // ID pegawai dari session
        ];

        // Gunakan Query Builder untuk menyimpan data
        DataPengecekan::create($data);

        // Redirect ke form dengan pesan sukses
        return redirect()->route('form')->with('success', 'Data berhasil disimpan.');
    }
}
