<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 24px;
            font-size: 12px;
            color: #222;
        }

        .header-table {
            width: 100%;
            border-bottom: 2px solid #000000;
            margin-bottom: 18px;
        }

        .header-table td {
            vertical-align: middle;
            padding: 0;
        }

        .logo-img {
            width: 100px;
        }

        .report-title {
            font-size: 20px;
            font-weight: bold;
            color: #000000;
            text-align: center;
            letter-spacing: 1px;
            display: block;
            width: 100%;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
        }

        .data-table th {
            background-color: #f1f5f9;
            border: 1px solid #d1d5db;
            padding: 10px 6px;
            text-align: center;
            font-weight: bold;
            color: #222;
            font-size: 12px;
        }

        .data-table td {
            border: 1px solid #d1d5db;
            padding: 8px 6px;
            text-align: center;
            font-size: 11px;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        .footer-info {
            text-align: right;
            margin-top: 24px;
            font-size: 11px;
            color: #2563eb;
        }

        .print-date {
            background: #e3f2fd;
            color: #2563eb;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 11px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <table class="header-table">
        <tr>
            <td style="width:100px;">
                <img src="{{ public_path('user2/assets/img/victory2.png') }}" class="logo-img" alt="Logo">
            </td>
        </tr>
        <span class="report-title mb-3">Laporan Pendaftaran</span>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>No Telepon</th>
                <th>Tanggal Pendaftaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftaran as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>{{ $data->no_telepon }}</td>
                <td>{{ \Carbon\Carbon::parse($data->tanggal_pendaftaran)->translatedFormat('l, d F Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-info">
        <span class="print-date" id="printDate">Dicetak pada: 13 Juni 2025</span>
    </div>
</body>
</html>