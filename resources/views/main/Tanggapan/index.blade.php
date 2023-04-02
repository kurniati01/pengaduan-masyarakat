@extends('include.master')
@section('title', 'Tanggapan')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                    class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Dashboard</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Laporan</th>
                    <th>NIK</th>
                    <th>Tanggapan</th>
                    <th>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($tanggapan as $no => $data)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $data->pengaduan->tgl_pengaduan }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->tanggapan }}</td>
                        @if (Auth::user()->level == "admin")
                        <td>
                            <a href="/tanggapan/edit/{{ $data->id }}" class="btn btn-success" >
                                Edit
                            </a>
                            <a href="/tanggapan/delete/{{ $data->id }}" class="btn btn-danger" >
                                Hapus
                            </a>
                        </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td align="center" colspan="100">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/tanggapan/create" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Pengaduan</label>
                            <select class="form-control" @if(count($pengaduan) == 0) disabled @endif id="exampleFormControlSelect1" name="id_pengaduan" required>
                                @if (count($pengaduan) == 0)
                                    <option value="" disabled selected>Tidak Ada Data</option>
                                @else
                                    @foreach ($pengaduan as $pengaudan)
                                        <option value="{{ $pengaudan->id }}">{{ $pengaudan->isi_laporan }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Tanggapan</label>
                            <input required name="tgl_tanggapan" type="date" class="form-control" id="myDate"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggapan</label>
                            <input required name="tanggapan" type="text" class="form-control" id=""
                                aria-describedby="emailHelp">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" @if(count($pengaduan) == 0) disabled @endif>Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @include('sweetalert::alert')

    <script>
        const today = new Date().toISOString().substr(0, 10);
        document.getElementById("myDate").value = today;
    </script>
@endsection
