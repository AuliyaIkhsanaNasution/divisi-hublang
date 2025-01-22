<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Laporan;
use Dompdf\Dompdf;

class LaporanController extends Controller
{
    public function index()
    {
        // Mengambil data dari model Laporan
        $laporanList = Laporan::getAllLaporan();

        // Mengirim data ke view
        return view('laporan', [
            'laporanList' => $laporanList
        ]);
    }

    public function exportPdf()
    {
        // Ambil data dari model
        $laporanList = Laporan::getAllLaporan();

        // Data untuk dikirim ke view
        $data = [
            'title' => 'Rekapitulasi Laporan Inputan Pengecekan Ulang Meter Pelanggan',
            'laporanList' => $laporanList,
            'date' => now()->format('d F Y'),
        ];

        // Generate PDF menggunakan Dompdf
        $dompdf = new Dompdf();
        $html = view('pdf', $data)->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Menampilkan PDF di browser tanpa mendownload
        return response($dompdf->output(), 200)
            ->header('Content-Type', 'application/pdf');
    }
}
