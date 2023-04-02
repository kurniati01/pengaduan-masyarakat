@extends('include.master')
@section('title', 'Print')
@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="/index" class="link"><i
                                    class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Print / Cetak</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Print / Cetak</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        {{-- Print Data User --}}
        <div>
            <h4>Print Data User</h4>
            <div>
                <a href="/print/user" class="btn btn-info col-md-12 text-white" target="_blank">
                    <i class="m-r-10 mdi mdi-cloud-print"></i>
                    Print
                </a>
            </div>
        </div>

        {{-- Print Data Pengaduan --}}
        <div class="mt-5">
            <form action="/print/pengaduan" method="get">
                <div class="d-flex">
                    <div class="col-md-6">
                        <h4>Print Data Pengaduan</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <select class="custom-select col-md-4" name="jen_kel">
                            <option disabled selected>Sesuai NIK</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->nik }}">{{ $item->nik }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-info col-md-12 text-white mt-3">
                        <i class="m-r-10 mdi mdi-cloud-print"></i>
                        Print
                    </button>
                </div>
            </form>
        </div>

        {{-- Print Data Tanggapan --}}
        <div class="mt-5">
            <h4>Print Data Tanggapan</h4>
            <div>
                <a href="/print/tanggapan" class="btn btn-info col-md-12 text-white">
                    <i class="m-r-10 mdi mdi-cloud-print"></i>
                    Print
                </a>
            </div>
        </div>
    </div>
@endsection
