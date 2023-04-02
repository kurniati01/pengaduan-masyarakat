<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.css')
    <title>Register</title>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-8 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="/postregis" method="post">
                                @csrf
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase" style="color: #FFF">Register</h2>
                                    <p class="text-white-50 mb-5">Regis to make an account!</p>
                                    <div class="d-flex">
                                        <div class="form-outline form-white mb-4 col-md-6">
                                            <input placeholder="examp : 3276***" type="number" name="nik"
                                                id="typeEmailX" class="form-control form-control-lg" />
                                            @if ($errors->has('nik'))
                                                <span class="text-danger">{{ $errors->first('nik') }}</span>
                                            @else
                                                <label class="form-label" for="typeEmailX">NIK</label>
                                            @endif
                                        </div>
                                        <div class="form-outline form-white mb-4 col-md-6">
                                            <input placeholder="examp : John ler" type="text" name="name"
                                                id="typeEmailX" class="form-control form-control-lg" />
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @else
                                                <label class="form-label" for="typeEmailX">Name</label>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="form-outline form-white mb-4 col-md-6">
                                            <input placeholder="examp : john@examp.com" type="email" name="email"
                                                id="typeEmailX" class="form-control form-control-lg" />
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @else
                                                <label class="form-label" for="typeEmailX">Email</label>
                                            @endif
                                        </div>
                                        <div class="form-outline form-white mb-4 col-md-6">
                                            <input placeholder="examp : *****" type="password" name="password"
                                                id="typeEmailX" class="form-control form-control-lg" />
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @else
                                                <label class="form-label" for="typeEmailX">Password</label>
                                            @endif
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Sign Up</button>
                                </div>
                            </form>
                            <div>
                                <p class="mb-0">Have an account? <a href="{{ route('login') }}"
                                        class="text-white-50 fw-bold">Sign in</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('include.js')
</body>

</html>
