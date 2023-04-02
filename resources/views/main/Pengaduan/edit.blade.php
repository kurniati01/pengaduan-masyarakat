@extends('include.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                  <li class="breadcrumb-item"><a href="/pengaduan/index" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Edit Pengaduan</h1>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <img src="{{url('images')}}/{{$pengaduan->foto}}" width="300" />
                    </center>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="/pengaduan/update/{{ $pengaduan->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Tanggal Pengaduan</label>
                            <div class="col-md-12">
                                <input name="tgl_pengaduan" type="hidden" value="{{ $pengaduan->tgl_pengaduan }}"
                                    class="form-control form-control-line">
                                <input name="tgl_pengaduan" type="date" value="{{ $pengaduan->tgl_pengaduan }}"
                                    class="form-control form-control-line" @if(Auth::user()->level != 'admin' ) disabled @endif>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">NIK</label>
                            <div class="col-md-12">
                                <input name="nik" type="hidden" value="{{ $pengaduan->nik }}"
                                    class="form-control form-control-line">
                                <input name="nik" type="text" value="{{ $pengaduan->nik }}"
                                    class="form-control form-control-line" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Isi Laporan</label>
                            <div class="col-md-12">
                                <input name="isi_laporan" type="hidden" value="{{ $pengaduan->isi_laporan }}"
                                    class="form-control form-control-line">
                                <input name="isi_laporan" type="text" value="{{ $pengaduan->isi_laporan }}"
                                    class="form-control form-control-line" @if(Auth::user()->level != 'admin' ) disabled @endif>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Foto Laporan</label>
                            <div class="col-md-12">
                                <input name="foto" type="file" value="{{ $pengaduan->foto }}"
                                    class="form-control form-control-line" @if(Auth::user()->level != 'admin' ) disabled @endif>
                                <input name="foto" type="hidden" value="{{ $pengaduan->foto }}"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Status</label>
                            <div class="col-md-12 form-control-line text-center">
                                <select class="form-control" id="exampleFormControlSelect1" name="status" @if(Auth::user()->level != 'petugas' ) disabled @endif>
                                    <option value="terkirim">Terkirim</option>
                                    <option value="proses">Proses</option>
                                    <option value="sukses">Sukses</option>
                                </select>
                                <input name="foto" type="hidden" value="{{ $pengaduan->status }}"
                                class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <a href="/pengaduan/index" class="btn btn-danger text-white">Back</a>
                            </div>
                            @if (Auth::user()->level == 'admin' || Auth::user()->level == 'petugas')
                            <div class="col-sm-6 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info text-white">Update</button>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
