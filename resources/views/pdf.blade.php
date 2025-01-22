<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .text-center {
            text-align: center;
        }

        .table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
            padding: 8px;
        }

        .thead-dark th {
            background-color: #343a40;
            color: white;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            width: 100%;
        }

        .header .logo img {
            height: 90px;
            /* Sesuaikan dengan ukuran logo */
            display: inline;
        }


        .header .title {
            font-size: 18px;
            text-align: right;
        }

        /* Mengatasi masalah jika ada padding atau margin yang menyebabkan baris tidak sejajar */
        .header .logo,
        .header .title {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header dengan logo di kiri dan teks di kanan -->
        <div class="header">
            <div class="logo">
                <img src="{{ $imgSrc }}" alt="Logo">
            </div>
            <div class="title">
                Divisi Hubungan Langganan
            </div>
        </div>

        <h2 class="text-center">{{ $title }}</h2>
        <p class="text-center">{{ $periode }} </p>
        <p class="text-center">Tanggal Cetak: {{ $date }}</p>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>NPA</th>
                    <th>Nama Pegawai</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Stan Meter</th>
                    <th>Tarif</th>
                    <th>Hasil Temuan</th>
                    <th>Arahan Tindak Lanjut</th>
                    <th>Cabang Tujuan</th>
                    <th>Tanggal Input</th>
                    <th>Tanggal Pengecekan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporanList as $index => $laporan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $laporan->npa }}</td>
                        <td>{{ $laporan->nama_pegawai }}</td>
                        <td>{{ $laporan->nama_pelanggan }}</td>
                        <td>{{ $laporan->alamat }}</td>
                        <td>{{ $laporan->stand_meter }}</td>
                        <td>{{ $laporan->tarif }}</td>
                        <td>{{ $laporan->hasil_temuan }}</td>
                        <td>{{ $laporan->arahan_tindak_lanjut }}</td>
                        <td>{{ $laporan->nama_cabang }}</td>
                        <td>{{ \Carbon\Carbon::parse($laporan->tanggal_input)->format('d F Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($laporan->tanggal_cek_ulang)->format('d F Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
