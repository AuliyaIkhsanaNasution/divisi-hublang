<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;


class CabangController extends Controller
{
    public function index()
    {
        // Mengambil data dari model
        $cabangList = Cabang::getAll();

        // Mengirim data ke view
        return view('cabang', ['cabangList' => $cabangList]);
    }


    // Menyimpan data cabang
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_cabang' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Cabang::store([
            'nama_cabang' => $request->input('nama_cabang'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data cabang berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Call the delete method in the cabang model
        Cabang::destroyData($id);

        // Redirect back with a success message
        return redirect()->route('cabang')->with('success', 'Data successfully deleted');
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'nama_cabang' => 'required|string|max:255',
        ]);

        // Update data cabang
        Cabang::updateCabang($id, [
            'nama_cabang' => $validated['nama_cabang']
        ]);

        return redirect()->route('cabang.index')->with('success', 'Cabang berhasil diperbarui.');
    }

    public function edit($id)
    {
        // Ambil data cabang berdasarkan ID
        $cabang = Cabang::findCabangById($id);

        // Kirim data cabang ke view
        return view('cabang.index', compact('cabang'));
    }
}
