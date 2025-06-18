<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Pengunjung</title>
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
            margin-top: -60px;
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
        <span class="report-title mb-3">Laporan Data Pengunjung</span>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>IP Address</th>
                <th>Browser</th>
                <th>URL</th>
                <th>Waktu Kunjungan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visitor as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->ip_address }}</td>
                <td>{{ $data->user_agent }}</td>
                <td>{{ $data->url }}</td>
                <td>{{ $data->visited_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-info">
        <span class="print-date">Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
    </div>
</body>
</html>
