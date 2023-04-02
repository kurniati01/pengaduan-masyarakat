<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'selected' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>

                <li class="sidebar-item {{ request()->routeIs('pengaduan*') ? 'selected' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('pengaduan') }}"
                        aria-expanded="false"><i class="m-r-10 mdi mdi-comment-outline"></i><span
                            class="hide-menu">Pengaduan</span></a></li>

                @if (auth::user()->level == 'admin' || auth::user()->level == 'petugas')
                    <li class="sidebar-item {{ request()->routeIs('tanggapan*') ? 'selected' : '' }}"> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('tanggapan') }}"
                            aria-expanded="false"><i class="m-r-10 mdi mdi-comment-outline"></i><span
                                class="hide-menu">Tanggapan</span></a></li>

                @endif
                @if (auth::user()->level == 'admin')
                    <li class="sidebar-item {{ request()->routeIs('print*') ? 'selected' : '' }}"> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('print') }}"
                            aria-expanded="false"><i class="m-r-10 mdi mdi-cloud-print"></i><span class="hide-menu">Print /
                                Cetak</span></a></li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
