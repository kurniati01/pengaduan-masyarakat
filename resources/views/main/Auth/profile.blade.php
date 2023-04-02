@extends('include.master')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                    class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Profile</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}"
                                class="rounded-circle" width="150" />
                            <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6>{{ Auth::user()->email }}</h6>
                        <small class="text-muted p-t-30 db">Phone</small>
                        <h6>{{ Auth::user()->telp }}</h6> <small class="text-muted p-t-30 db">Address</small>
                        <h6>{{ Auth::user()->alamat }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" method="POST" action="{{ url('profile') }}">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Examp : john si penakluk"
                                        value="{{ $user->name }}" name="name"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">NIK</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Examp : 3276****" value="{{ Auth::user()->nik }}"
                                        name="nik" class="form-control form-control-line">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="Examp : john@admin.com"
                                        value="{{ Auth::user()->email }}" class="form-control form-control-line"
                                        name="email" id="example-email">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" placeholder="examp : ****"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Confirm Password</label>
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control form-control-line"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="text" name="telp" placeholder="Examp : 083****"
                                        value="{{ Auth::user()->telp }}" class="form-control form-control-line">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Jenis Kelamin</label>
                                <div class="col-md-12">
                                    <select class="custom-select" name="jen_kel">
                                        <option value="laki-laki" @if (auth::user()->jen_kel == 'laki-laki') selected @endif>
                                            Laki-laki</option>
                                        <option value="perempuan" @if (auth::user()->jen_kel == 'perempuan') selected @endif>
                                            perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Provinsi</label>
                                <div class="col-md-12">
                                    <select class="custom-select" id="selectProvinsi">
                                        <option selected>Pilih Provinsi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Kota</label>
                                <div class="col-md-12">
                                    <select class="custom-select" id="selectKota">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Kecamatan</label>
                                <div class="col-md-12">
                                    <select class="custom-select" id="selectKecamatan">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Kelurahan</label>
                                <div class="col-md-12">
                                    <select class="custom-select" id="selectKelurahan">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Alamat</label>
                                <div class="col-md-12">
                                    <textarea rows="5" id="alamat" name="alamat" required class="form-control form-control-line">{{ Auth::user()->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success text-white">Update </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectProvinsi = document.getElementById('selectProvinsi');
        let selectKota = document.getElementById('selectKota');
        let selectKecamatan = document.getElementById('selectKecamatan');
        let selectKelurahan = document.getElementById('selectKelurahan');
        let alamat = document.getElementById('alamat');
        document.addEventListener("DOMContentLoaded", function() {
            fetchProvinsi();
            // fetchKota();
            // fetchKecamatan();
            // fetchKelurahan();
            getValueToAlamat();
        });
        const config = {
            method: "GET"
        };
        async function fetchProvinsi() {
            const URL = 'http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
            await fetch(URL, config)
                .then(response => response.json())
                .then(provinsi => {
                    if (provinsi !== null || undefined) {
                        provinsi.map(data => {
                            let opt = document.createElement('option');
                            opt.value = data.id;
                            opt.innerHTML = data.name;
                            selectProvinsi.appendChild(opt);
                        })
                    } else {
                        let opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Data tidak tersedia";
                        selectKelurahan.appendChild(opt);
                    }
                }).catch(error => alert(`Data provinsi tidak ada`));
        }
        async function fetchKota(id) {
            const URL =
                `http://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id === undefined || null ? "" : id}.json`;
            await fetch(URL, config)
                .then(response => response.json())
                .then(kota => {
                    if (kota !== null || undefined) {
                        kota.map(data => {
                            let opt = document.createElement('option');
                            opt.value = data.id;
                            opt.innerHTML = data.name;
                            selectKota.appendChild(opt);
                        })
                    } else {
                        let opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Data tidak tersedia";
                        selectKelurahan.appendChild(opt);
                    }
                });
        }
        async function fetchKecamatan(id) {
            const URL =
                `http://www.emsifa.com/api-wilayah-indonesia/api/districts/${id === undefined || null ? "" : id}.json`;
            await fetch(URL, config)
                .then(response => response.json())
                .then(kecamatan => {
                    if (kecamatan !== null || undefined) {
                        kecamatan.map(data => {
                            let opt = document.createElement('option');
                            opt.value = data.id;
                            opt.innerHTML = data.name;
                            selectKecamatan.appendChild(opt);
                        })
                    } else {
                        let opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Data tidak tersedia";
                        selectKelurahan.appendChild(opt);
                    }
                });
        }
        async function fetchKelurahan(id) {
            const URL =
                `http://www.emsifa.com/api-wilayah-indonesia/api/villages/${id === undefined || null ? "" : id}.json`;
            await fetch(URL, config)
                .then(response => response.json())
                .then(kelurahan => {
                    if (kelurahan !== null || undefined) {
                        kelurahan.map(data => {
                            let opt = document.createElement('option');
                            opt.value = data.id;
                            opt.innerHTML = data.name;
                            selectKelurahan.appendChild(opt);
                        })
                    } else {
                        let opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Data tidak tersedia";
                        selectKelurahan.appendChild(opt);
                    }
                });
        }
        // selectProvinsi.addEventListener('change', () => {
        //     console.log(selectProvinsi.options[selectProvinsi.selectedIndex].text);
        // })
        selectProvinsi.addEventListener('change', () => {
            fetchKota(selectProvinsi.value);
            selectKota.style.display = "block";
            selectKota.innerHTML = '';
            selectKecamatan.innerHTML = '';
            selectKelurahan.innerHTML = '';
        });
        selectKota.addEventListener('change', () => {
            fetchKecamatan(selectKota.value);
            selectKecamatan.style.display = "block";
            selectKecamatan.innerHTML = '';
            selectKelurahan.innerHTML = '';
        });
        selectKecamatan.addEventListener('change', () => {
            fetchKelurahan(selectKecamatan.value);
            selectKelurahan.style.display = "block";
            selectKelurahan.innerHTML = '';
        });

        function getValueToAlamat() {
            alamat.addEventListener('change', () => {
                let alamatText = alamat.value;
                document.getElementById('alamat').value =
                    `${alamatText}, ${selectKelurahan.options[selectKelurahan.selectedIndex].text}, ${selectKecamatan.options[selectKecamatan.selectedIndex].text}, ${selectKota.options[selectKota.selectedIndex].text}, ${selectProvinsi.options[selectProvinsi.selectedIndex].text}, `;
                // console.log(`${alamatText}, ${selectKelurahan.options[selectKelurahan.selectedIndex].text}, ${selectKecamatan.options[selectKecamatan.selectedIndex].text}, ${selectKota.options[selectKota.selectedIndex].text}, ${selectProvinsi.options[selectProvinsi.selectedIndex].text}, `);
            });
        }
    </script>
@endsection
