<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
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
            margin: 0;
            padding: 0;
            font-size: 15px
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 8px
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
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .header .logo,
        .header .title,
        .header .division {
            display: table-cell;
            vertical-align: top;
        }

        .header .logo {
            width: 25%;
            text-align: center;
        }


        .header .title {
            width: 50%;
            text-align: center;
            font-size: 28px;
            font-weight: bold
        }

        .header .division {
            width: 25%;
            text-align: right;
            font-size: 20px;
        }

        .header .logo img {
            max-width: 30%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="{{ $imgSrc }}" alt="Logo">
            </div>
            <div class="title text-center">
                {{ $title }}
            </div>
            <div class="division">
                Divisi Hubungan Langganan
            </div>
        </div>

        <p class="text-center">{{ $periode }}</p>
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
