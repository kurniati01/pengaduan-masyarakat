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
                <th>NIK</th>
                <th>Name</th>
                <th>Email</th>
                <th>Jenkel</th>
                <th>Alamat</th>
                <th>Telpon</th>
            </tr>
        </thead>
        <tbody>
            @forelse($user as $data)
                <tr>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->jen_kel }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->telp }}</td>
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
