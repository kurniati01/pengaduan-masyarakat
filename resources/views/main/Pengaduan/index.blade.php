@extends('include.master')
@section('title', 'Pengaduan')
@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="/index" class="link"><i
                                    class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Pengaduan</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @if (Auth::user()->level == 'admin' || Auth::user()->level == 'petugas')
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Tanggal Pengaduan</th>
                        <th>Pelapor</th>
                        <th>Laporan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengaduan as $data)
                        <tr>
                            <td>{{ $data->tgl_pengaduan }}</td>
                            <td>{{ $data->user->name ?? '' }}</td>
                            <td>{{ $data->isi_laporan }}</td>
                            <td>
                                @if (Auth::user()->level == 'petugas')
                                        <a href="/pengaduan/edit/{{ $data->id }}" class="btn btn-info text-white" style="width: 40px">
                                            <i class="m-r-10 mdi mdi-eye"></i>
                                        </a>
                                @elseif(Auth::user()->level == 'admin')
                                    <a class="btn btn-info text-white" href="/pengaduan/edit/{{ $data->id }}" disabled >
                                        Edit
                                    </a>
                                    <a class="btn btn-danger text-white" href="/pengaduan/delete/{{ $data->id }}" disabled>
                                        Hapus
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="100">No data found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @else
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah
                </button>
            </div>
            @forelse($pengaduan as $data)
                <div class="alert alert-info mt-3 d-flex justify-content-between" role="alert">
                    <span class="mt-2">{{ $data->isi_laporan }} | {{ $data->tgl_pengaduan }}</span>
                    <div>
                        <a href="/pengaduan/edit/{{ $data->id }}" class="btn btn-info text-white" style="width: 40px">
                            <i class="m-r-10 mdi mdi-eye"></i>
                        </a>
                        <button type="button" class="{{ $data->status == 'proses' ? 'btn btn-warning' : 'btn btn-success' }}"
                            disabled>
                            <span>{{ $data->status }}</span>
                        </button>
                    </div>
                </div>
            @empty
                <div class="alert alert-info d-flex justify-content-center mt-3" role="alert" onclick="">
                    <span>No Data Available.</span>
                </div>
            @endforelse
        @endif
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
                <form action="/pengaduan/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tanggal Pengaduan</label>
                            <input required name="tgl_pengaduan" type="date" class="form-control" id="myDate"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="">Laporan</label>
                            <input required name="isi_laporan" type="text" class="form-control" id=""
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input required name="foto" type="file" class="form-control" id=""
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
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
