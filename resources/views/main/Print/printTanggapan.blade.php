{{-- <!DOCTYPE html>
<html lang="en">
<head>
    @include('include.css')
    <title>Document</title>
</head>
<body>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>ID Pengaduan</th>
                <th>Tanggal Tanggapan</th>
                <th>Tanggapan</th>
                <th>NIK Pelapor</th>
            </tr>
        </thead>
        <tbody>
            @forelse($user as $data)
                <tr>
                    <td>{{ $data->id_pengaduan }}</td>
                    <td>{{ $data->tgl_tanggapan }}</td>
                    <td>{{ $data->tanggapan }}</td>
                    <td>{{ $data->nik }}</td>
                </tr>
            @empty
                <tr>
                    <td align="center" colspan="100">No data found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @include('include.js')
</body>
</html> --}}
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
    <center>
        <h1>
            Data User
        </h1>
    </center>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Tanggal Tanggapan</th>
                <th>Tanggapan</th>
                <th>NIK Pelapor</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tanggapan as $data)
                <tr>
                    <td>{{ $data->tgl_tanggapan }}</td>
                    <td>{{ $data->tanggapan }}</td>
                    <td>{{ $data->nik }}</td>
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
