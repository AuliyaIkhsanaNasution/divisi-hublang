<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;

class LaporanController extends Controller
{
    public function index()
    {
        // Mengambil data dari model Dashboard
        $laporanList = Dashboard::getAll();

        // Mengirim data ke view
        return view('laporan', [
            'laporanList' => $laporanList
        ]);
    }

    // public function destroy($npa)
    // {
    //     // Call the delete method in the Dashboard model
    //     Dashboard::destroyData($npa);

    //     // Redirect back with a success message
    //     return redirect()->route('dashboard')->with('success', 'Data successfully deleted');
    // }
}
