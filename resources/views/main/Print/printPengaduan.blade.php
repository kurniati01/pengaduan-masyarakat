<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Tanggal Pengaduan</th>
                <th>Pelapor</th>
                <th>Laporan</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengaduan as $data)
                <tr>
                    <td>{{ $data->tgl_pengaduan }}</td>
                    <td>{{ $data->user->name ?? '' }}</td>
                    <td>{{ $data->isi_laporan }}</td>
                    <td>{{ $data->foto }}</td>
                </tr>
            @empty
                <tr>
                    <td align="center" colspan="100">No data found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
