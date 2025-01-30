<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter filter dari request
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $pegawaiId = $request->pegawai_id;
        $standMeter = $request->stand_meter;
        $hasilTemuan = $request->hasil_temuan;
        $npa = $request->npa;

        // Query data dengan filter
        $laporanList = Laporan::getFilteredLaporan($startDate, $endDate, $pegawaiId, $standMeter, $hasilTemuan, $npa);

        // Mengirim data pegawai untuk dropdown
        $pegawaiList = DB::table('pegawai')->select('id_pegawai', 'nama_pegawai')->get();

        // Kirim data ke view
        return view('laporan', [
            'laporanList' => $laporanList,
            'pegawaiList' => $pegawaiList
        ]);
    }

    public function exportPdf(Request $request)
    {
        // Ambil parameter filter dari request
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $pegawaiId = $request->pegawai_id;
        $standMeter = $request->stand_meter;
        $hasilTemuan = $request->hasil_temuan;
        $npa = $request->npa;

        // Query data dengan filter
        $laporanList = Laporan::getFilteredLaporan($startDate, $endDate, $pegawaiId, $standMeter, $hasilTemuan, $npa);

        // Format periode untuk ditampilkan
        $periode = $this->formatPeriode($startDate, $endDate);

        // Path gambar logo
        $path = public_path('img/logo.png');

        // Membaca file gambar dan mengonversi menjadi base64
        $imageData = base64_encode(file_get_contents($path));

        // Menambahkan prefix untuk Base64 Image (tergantung jenis gambar, bisa png, jpeg, dll)
        $imgSrc = 'data:image/png;base64,' . $imageData;

        // Data untuk PDF
        $data = [
            'title' => 'Rekapitulasi Hasil Pengecekan Ulang Divisi Hublang',
            'laporanList' => $laporanList,
            'periode' => $periode,
            'date' => now()->format('d F Y'),
            'imgSrc' => $imgSrc // Kirim image Base64 ke view
        ];

        // Generate PDF menggunakan Dompdf
        $dompdf = new Dompdf();
        $html = view('pdf', $data)->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return response($dompdf->output(), 200)
            ->header('Content-Type', 'application/pdf');
    }

    private function formatPeriode($startDate, $endDate)
    {
        if ($startDate && $endDate) {
            return "Periode: " . date('d-m-Y', strtotime($startDate)) . " s/d " . date('d-m-Y', strtotime($endDate));
        } elseif ($startDate) {
            return "Periode Mulai: " . date('d-m-Y', strtotime($startDate));
        } elseif ($endDate) {
            return "Periode Sampai: " . date('d-m-Y', strtotime($endDate));
        } else {
            return "Periode: Semua Waktu";
        }
    }
}
