<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include('include.css')
    <title>@yield('title', 'Layanan Pengaduan Masyarakat')</title>
   
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('include.navbar')
        
        @include('include.sidebar')
        <div class="page-wrapper">
            @yield('content')
            {{-- <footer class="footer text-center">
                All Rights Reserved by Flexy Admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>.
            </footer> --}}
        </div>
    </div>
    @include('include.js')
</body>

</html>