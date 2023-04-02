<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand" href="/index">
                <img src="{{ asset('/assets/images/pengaduan2.png') }}" style="height: 64px" alt="homepage" class="dark-logo" />

            </a>
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="mdi mdi-menu"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-start me-auto">

            </ul>
            <ul class="navbar-nav float-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" class="img-fluid" alt="" style="width: 40px">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                        <a href="/profile" class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                            Profile</a>
                        <a class="dropdown-item" href="/logout"><i class="m-r-10 mdi mdi-exit-to-app"></i>
                            Log Out</a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
