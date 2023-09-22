<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{ url('/assets/images/sislab_logo.png') }}">

<!-- Libs CSS -->
<link href="{{ url('/assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ url('/assets/libs/dropzone/dist/dropzone.css') }}"  rel="stylesheet">
<link href="{{ url('/assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />
<link href="{{ url('/assets/libs/prismjs/themes/prism-okaidia.css') }}" rel="stylesheet">

<!-- Theme CSS -->
<link rel="stylesheet" href="{{ url('/assets/css/theme.min.css') }}">
    <title>SISLAB POLINDRA</title>
</head>

<body class="bg-light">
    <div id="db-wrapper">
        <!-- navbar vertical -->
        <!-- Sidebar -->
        <nav class="navbar-vertical navbar">
            <div class="nav-scroller">
                <!-- Brand logo -->
                <a class="navbar-brand" href="#">
                    <h2 style="color: cornflowerblue">SISLAB</h2>
                    {{-- <img src="./assets/images/brand/logo/logo.svg" alt="" /> --}}
                </a>
                <!-- Navbar nav -->
                <ul class="navbar-nav flex-column" id="sideNavbar">
                    <li class="nav-item">
                        <a class="nav-link has-arrow collapsed " href="{{ route('dashboard') }}">
                            <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                        </a>

                    </li>


                    {{-- <!-- Nav item -->
                    <li class="nav-item">
                        <div class="navbar-heading">Layouts & Pages</div>
                    </li> --}}


                    <!-- Nav item -->
                    @if(Auth::user()->role == 'superadmin')
                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse"
                            data-bs-target="#navPages" aria-expanded="false" aria-controls="navPages">
                            <i data-feather="layers" class="nav-icon icon-xs me-2">
                            </i> Data Pengguna
                        </a>

                        <div id="navPages" class="collapse " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('tampil_mahasiswa')}}">
                                        Data Mahasiswa
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow   " href="{{route('tampil_admin')}}">
                                        Data Admin
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link " href="{{route('admin_tampil_barang')}}">
                            <i data-feather="sidebar" class="nav-icon icon-xs me-2">
                            </i>
                            Barang
                        </a>
                    </li> --}}
                    @endif


                    <!-- Nav item -->
                    {{-- <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse"
                            data-bs-target="#navAuthentication" aria-expanded="false" aria-controls="navAuthentication">
                            <i data-feather="lock" class="nav-icon icon-xs me-2">
                            </i> Authentication
                        </a>
                        <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('login') }}"> Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  " href="{{ route('register') }}"> Sign Up</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('forgot.password') }}">
                                        Forget Password
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li> --}}

                    {{-- @if (Auth::user()->role=='admin' || Auth::user()->role=='mahasiswa' )
                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse"
                            data-bs-target="#navItem" aria-expanded="false" aria-controls="navItem">
                            <i data-feather="package" class="nav-icon icon-xs me-2">
                            </i> Data Barang
                        </a>
                        <div id="navItem" class="collapse " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="#">
                                        Semua Barang
                                    </a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link " href="#">
                                        SUBBAG
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow   " href="#">
                                        Lab TI
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow   " href="#">
                                        Lab Mesin
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow   " href="#">
                                        Lab TPTU
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow   " href="#">
                                        Lab Keperawatan
                                    </a>
                                </li> --}}
                            {{-- </ul>
                        </div>
                    </li> 
                    @endif --}}
                    

                    {{-- Akses Admin --}}
                    @if(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('admin_tampil_barang')}}">
                            <i data-feather="sidebar" class="nav-icon icon-xs me-2">
                            </i>
                            Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('adm_permintaan_pinjaman')}}">
                            <i data-feather="sidebar" class="nav-icon icon-xs me-2">
                            </i>
                            Permintaan Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('adm_peminjaman')}}">
                            <i data-feather="sidebar" class="nav-icon icon-xs me-2">
                            </i>
                            Sedang Dipinjam
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link has-arrow " href="{{route('adm_pengembalian')}}">
                            <i data-feather="clipboard" class="nav-icon icon-xs me-2">
                            </i> Pengembalian
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link has-arrow " href="#">
                            <i data-feather="git-pull-request" class="nav-icon icon-xs me-2">
                            </i> Riwayat Peminjaman
                        </a>
                    </li> --}}
                    @endif

                    @if(Auth::user()->role == 'mahasiswa')

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('tampil_lab') }}">
                            <i data-feather="sidebar" class="nav-icon icon-xs me-2">
                            </i>
                            Lab & Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('keranjangku') }}">
                            <i data-feather="sidebar" class="nav-icon icon-xs me-2">
                            </i>
                            Akan Dipinjam
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('mhs_peminjaman') }}">
                            <i data-feather="sidebar" class="nav-icon icon-xs me-2">
                            </i>
                            Peminjaman
                        </a>
                    </li>
                    
                    @endif



                </ul>

            </div>
        </nav>
        <!-- Page content -->
        <div id="page-content">
            <div class="header @@classList">
                <!-- navbar -->
                <nav class="navbar-classic navbar navbar-expand-lg">
                    <a id="nav-toggle" href="#"><i data-feather="menu" class="nav-icon me-2 icon-xs"></i></a>
                    <div class="ms-lg-3 d-none d-md-none d-lg-block">
                        <!-- Form -->
                        <form class="d-flex align-items-center">
                            <input type="search" class="form-control" placeholder="Search" />
                        </form>
                    </div>
                    <!--Navbar nav -->
                    <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
                        {{-- <li class="dropdown stopevent">
                            <a class="btn btn-light btn-icon rounded-circle indicator
          indicator-primary text-muted"
                                href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icon-xs" data-feather="bell"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"
                                aria-labelledby="dropdownNotification">
                                <div>
                                    <div
                                        class="border-bottom px-3 pt-2 pb-3 d-flex
              justify-content-between align-items-center">
                                        <p class="mb-0 text-dark fw-medium fs-4">Notifications</p>
                                        <a href="#" class="text-muted">
                                            <span>
                                                <i class="me-1 icon-xxs" data-feather="settings"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <!-- List group -->
                                    <ul class="list-group list-group-flush notification-list-scroll">
                                        <!-- List group item -->
                                        <li class="list-group-item bg-light">


                                            <a href="#" class="text-muted">
                                                <h5 class=" mb-1">Rishi Chopra</h5>
                                                <p class="mb-0">
                                                    Mauris blandit erat id nunc blandit, ac eleifend dolor pretium.
                                                </p>
                                            </a>



                                        </li>
                                        <!-- List group item -->
                                        <li class="list-group-item">


                                            <a href="#" class="text-muted">
                                                <h5 class=" mb-1">Neha Kannned</h5>
                                                <p class="mb-0">
                                                    Proin at elit vel est condimentum elementum id in ante. Maecenas et
                                                    sapien metus.
                                                </p>
                                            </a>



                                        </li>
                                        <!-- List group item -->
                                        <li class="list-group-item">


                                            <a href="#" class="text-muted">
                                                <h5 class=" mb-1">Nirmala Chauhan</h5>
                                                <p class="mb-0">
                                                    Morbi maximus urna lobortis elit sollicitudin sollicitudieget elit
                                                    vel pretium.
                                                </p>
                                            </a>



                                        </li>
                                        <!-- List group item -->
                                        <li class="list-group-item">


                                            <a href="#" class="text-muted">
                                                <h5 class=" mb-1">Sina Ray</h5>
                                                <p class="mb-0">
                                                    Sed aliquam augue sit amet mauris volutpat hendrerit sed nunc eu
                                                    diam.
                                                </p>
                                            </a>



                                        </li>
                                    </ul>
                                    <div class="border-top px-3 py-2 text-center">
                                        <a href="#" class="text-inherit fw-semi-bold">
                                            View all Notifications
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li> --}}
                        <!-- List -->
                        <li class="dropdown ms-2">
                            <a class="rounded-circle" href="#" role="button" id="dropdownUser"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="{{ url('/assets/images/avatar/avatar-1.jpg') }}"
                                        class="rounded-circle" />
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                <div class="px-4 pb-0 pt-2">


                                    <div class="lh-1 ">
                                        <h5 class="mb-1">@if (Auth::user()->role == 'superadmin')
                                            Super Admin
                                        @elseif (Auth::user()->role == 'admin')
                                            KA/Admin Lab
                                        @elseif (Auth::user()->role == 'mahasiswa')
                                            Mahasiswa
                                        @endif</h5>
                                        {{-- <a href="#" class="text-inherit fs-6">View my profile</a> --}}
                                    </div>
                                    <div class=" dropdown-divider mt-3 mb-2"></div>
                                </div>

                                <ul class="list-unstyled">

                                    {{-- <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>Edit
                                            Profile
                                        </a>
                                    </li> --}}
                                    <li>
                                    {{-- <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="me-2 icon-xxs dropdown-item-icon"
                                                data-feather="settings"></i>Account Settings
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>Keluar
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </nav>
            </div>

            @yield('content')

            <!-- Scripts -->
            <!-- Libs JS -->
            <script src="{{ url('/assets/libs/jquery/dist/jquery.min.js') }}"></script>
            <script src="{{ url('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ url('/assets/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
            <script src="{{ url('/assets/libs/feather-icons/dist/feather.min.js') }}"></script>
            <script src="{{ url('/assets/libs/prismjs/prism.js') }}"></script>
            <script src="{{ url('/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
            <script src="{{ url('/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
            <script src="{{ url('/assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js') }}"></script>
            <script src="{{ url('/assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js') }}"></script>
            
            <!-- Theme JS -->
            <script src="{{ url('/assets/js/theme.min.js') }}"></script>



</body>

</html>
