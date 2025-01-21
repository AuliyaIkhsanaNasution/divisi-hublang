<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        // Mengambil data dari model Pegawai
        $pegawaiList = Pegawai::getAll();

        // Mengirim data ke view
        return view('pegawai', ['pegawaiList' => $pegawaiList]);
    }

    // Menyimpan data pegawai
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Pegawai::store([
            'nama_pegawai' => $request->input('nama_pegawai'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Call the delete method in the Pegawai model
        Pegawai::destroyData($id);

        // Redirect back with a success message
        return redirect()->route('pegawai')->with('success', 'Data successfully deleted');
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'nama_pegawai' => 'required|string|max:255',
        ]);

        // Update data pegawai
        Pegawai::updatePegawai($id, [
            'nama_pegawai' => $validated['nama_pegawai']
        ]);

        return redirect()->route('pegawai')->with('success', 'pegawai berhasil diperbarui.');
    }

    public function edit($id)
    {
        // Ambil data pegawai berdasarkan ID
        $pegawai = Pegawai::findPegawaiById($id);

        // Kirim data pegawai ke view
        return view('pegawai.index', compact('pegawai'));
    }
}
