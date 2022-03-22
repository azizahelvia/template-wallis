<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Azizah Elvia" content="Wallis">

    <title>Wallis - Dompet Digital Sekolah</title>

    <link rel="shortcut icon" href="{{ asset('img/wallet-solid.png') }}" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Datatables CSS CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-solid fa-wallet"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Wallis</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ $page == "Home" ? "active" : "" }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ Auth::user()->role->name }}
        </div>

        @if (Auth::user()->role_id === 1)
            <!-- Menu Data User -->
            <li class="nav-item {{ $page == "Data User" ? "active" : "" }}">
                <a class="nav-link" href="{{ route('datauser.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data User</span></a>
            </li>

            <!-- Menu Data Transaksi -->
            <li class="nav-item {{ $page == "Data Transaksi" ? "active" : "" }}">
                <a class="nav-link" href="{{ route('datatransaction.index') }}">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Data Belanja</span></a>
            </li>

            <!-- Menu Riwayat Transaksi -->
            <li class="nav-item {{ $page == "Riwayat Transaksi" ? "active" : "" }}">
                <a class="nav-link" href="{{ route('transactionhistory.index') }}">
                    <i class="fas fa-fw fa-clock-rotate-left"></i>
                    <span>Riwayat Transaksi</span></a>
            </li>
        @endif

        @if (Auth::user()->role_id === 2)
            <li class="nav-item {{ $page == "Pengajuan Saldo" ? "active" : "" }}">
                <a class="nav-link" href="{{ route('topupbalance.index') }}">
                    <i class="fa-solid fa-comments-dollar"></i>
                    <span>Pengajuan Saldo</span></a>
            </li>
            <li class="nav-item {{ $page == "Riwayat Pengajuan Saldo" ? "active" : "" }}">
                <a class="nav-link" href="{{ route('topupbalance.history') }}">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Riwayat Pengajuan Saldo</span></a>
            </li>
        @endif

        @if (Auth::user()->role_id === 3)
            <li class="nav-item {{ $page == "Kasir Kantin" ? "active" : "" }}">
                <a class="nav-link" href="{{ route('casheermerchant.index') }}">
                    <i class="fa-solid fa-cash-register"></i>
                    <span>Kasir</span></a>
            </li>
            <li class="nav-item {{ $page == "Data Barang" ? "active" : "" }}">
                <a class="nav-link" href="{{ route('entryinventory.index') }}">
                    <i class="fa-solid fa-box"></i>
                    <span>Data Barang</span></a>
            </li>
            <li class="nav-item {{ $page == "Riwayat Transaksi kantin" ? "active" : "" }}">
                <a class="nav-link" href="{{ route('casheermerchant.history') }}">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span>Riwayat Transaksi</span></a>
            </li>
        @endif

        @if (Auth::user()->role_id === 4)
            <li class="nav-item {{ $page == "Topup Saldo" ? "active" : "" }}">
                <a class="nav-link" href="{{ route('topupsaldo.index') }}">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    <span>Topup Saldo</span></a>
            </li>
            <li class="nav-item {{ $page == "Belanja" ? "active" : "" }}">
                <a class="nav-link" href="{{ route('belanjasiswa.index') }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Belanja</span></a>
            </li>
            <li class="nav-item {{ $page == "Riwayat Transaksi Siswa" ? "active" : "" }}">
                <a class="nav-link" href="{{ route('riwayatsiswa.index') }}">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span>Riwayat Transaksi</span></a>
            </li>
        @endif
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                {{ Auth::user()->name }} ({{ Auth::user()->role->name }})
                            </span>
                            <img class="img-profile rounded-circle"
                                src="{{ asset('img/user-logo.png') }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- End of Topbar -->

            @yield('content')

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Made by Cyreziev 2022</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
</div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Datatables JS CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">

</body>

</html>
