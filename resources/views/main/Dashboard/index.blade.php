@extends('include.master')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pengaduan Masyarakat</h4>
                    </div>
                    <div class="comment-widgets scrollable">
                        @foreach ($pengaduan as $item)
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2"><img src="{{ Avatar::create($item->user->name)->toBase64() }}"
                                    alt="user" width="50" class="rounded-circle"></div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">{{ explode(' ', $item->user->name)[0] }} ***</h6>
                                <span class="m-b-15 d-block">{{ $item->isi_laporan }}</span>
                                <div class="comment-footer">
                                    <span class="text-muted float-end">{{ $item->tgl_pengaduan }}</span>
                                    @if ($item->status == 'terkirim')
                                        <span class="badge bg-primary">{{ $item->status }}</span>
                                    @elseif($item->status == 'proses')
                                        <span class="badge bg-warning">{{ $item->status }}</span>
                                    @else
                                        <span class="badge bg-success">{{ $item->status }}</span>

                                    @endif

                                </div>
                            </div>
                        </div>
                            @foreach ($tanggapan as $tanggap)
                                @if ($tanggap -> id_pengaduan == $item->id)
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Admin</h6>
                                        <span class="m-b-15 d-block">{{ $tanggap->tanggapan }}</span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-end">{{ $tanggap->tgl_tanggapan }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
