<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Bootstrap Select -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.css')}}">

  <!-- Image Uploader JQuery -->
  <link type="text/css" rel="stylesheet" href="{{asset('plugins/image-uploader/css/image-uploader.css')}}">

<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.css')}}">
<!-- IonIcons -->
{{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}

<!-- Theme style -->
<link rel="stylesheet" href="{{asset('css/adminlte.css')}}">

<link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">

  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">

  <link rel="stylesheet" href="{{asset('plugins/load-awesome/css/ball-pulse-sync.css')}}">

  <link href=https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap4.css rel=stylesheet>

    @livewireStyles()
    <style>
        .btn-circle.btn-sm {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            font-size: 8px;
            text-align: center;
        }
        .btn-circle.btn-md {
            width: 50px;
            height: 50px;
            padding: 7px 10px;
            border-radius: 25px;
            font-size: 10px;
            text-align: center;
        }
        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            border-radius: 35px;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 shadow-sm">
<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    {{--
    <li class="nav-item d-none d-sm-inline-block">
    <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link">Contact</a>
    </li> --}}
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        {{-- {{Auth::user()->username}} --}}
        <ion-icon name="person-circle"></ion-icon>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">Halo, {{-- Auth::user()->username --}}</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
        Pengaturan Akun
        <span class="float-right text-muted text-sm">
            <ion-icon style="font-size: 24px" name="options"></ion-icon>
        </span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="/" class="dropdown-item">
        Logout
        <span class="float-right text-muted text-sm">
            <ion-icon style="font-size: 24px" name="log-out"></ion-icon>
        </span>
        </a>
    </li>
</ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="{{URL::to('/dashboard')}}" class="brand-link">
        <img src="{{asset('img/groove-logo.png')}}" alt="AdminLTE Logo" class="w-75 img-fluid ">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                {{-- <li class="nav-header">Menu</li> --}}
            <li class="nav-item @yield('main')">
            <a href="{{URL::to('/dashboard')}}" class="nav-link @yield('home')">
                <ion-icon name="stats-chart"></ion-icon>
                <p>
                Dashboard
                </p>
            </a>
            </li>
            <li class="nav-header text-bold text-secondary border-top">Keuangan</li>
            <li class="nav-item @yield('finance')">
                <a href="#" class="nav-link">
                    <ion-icon name="cash"></ion-icon>
                    <p>
                    Keuangan
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{URL::to('/dashboard/finance')}}"" class="nav-link @yield('finance-list')">
                        <ion-icon name="cash"></ion-icon>
                        <p>Data Keuangan</p>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/dashboard/finance/create/project-invoice')}}" class="nav-link @yield('create-invoice')">
                            <ion-icon name="document"></ion-icon>
                            <p>Buat Invoice Proyek</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/dashboard/finance/create/project-ledgers')}}" class="nav-link @yield('add-ledgers')">
                            <ion-icon name="create"></ion-icon>
                            <p>Catat Pengeluaran Proyek</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <ion-icon name="bag-add"></ion-icon>
                            <p>Catat Pembelian Barang</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header text-bold text-secondary border-top">Proyek</li>
            <li class="nav-item @yield('project')">
                <a href="#" class="nav-link">
                    <ion-icon name="documents"></ion-icon>
                    <p>
                    Proyek
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{URL::to('/dashboard/project')}}" class="nav-link @yield('project-list')">
                        <ion-icon name="document-text"></ion-icon>
                        <p>Data Proyek</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{URL::to('/dashboard/project/add')}}" class="nav-link @yield('add-project')">
                        <ion-icon name="document-attach"></ion-icon>
                        <p>Tambah Proyek</p>
                    </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header text-bold text-secondary border-top">Pegawai</li>
            <li class="nav-item @yield('employee')">
                <a href="#" class="nav-link">
                    <ion-icon name="id-card"></ion-icon>
                    <p>
                    Pegawai
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                    <a href="{{URL::to('/dashboard/employee')}}" class="nav-link @yield('employee-list')">
                        <ion-icon  name="people-circle"></ion-icon>
                        <p>Data Pegawai</p>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/dashboard/employee/attendance-list')}}" class="nav-link @yield('attendance-list')">
                            <ion-icon name="keypad"></ion-icon>
                            <p>Data Absensi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/dashboard/employee/assign-fingerprint')}}" class="nav-link @yield('assign-fingerprint')">
                            <ion-icon name="finger-print"></ion-icon>
                            <p>Assign Fingerprint</p>
                        </a>
                    </li>
                </ul>
                </li>
                <li class="nav-header text-bold text-secondary border-top">Inventory</li>
                <li class="nav-item @yield('supplies')">
                    <a href="{{URL::to('/dashboard/supply')}}" class="nav-link @yield('supplies-data')">
                        <ion-icon name="bag-handle"></ion-icon>
                        <p>Data Barang</p>
                    </a>
                </li>
                <li class="nav-header text-bold text-secondary border-top">Pengaturan</li>
                <li class="nav-item @yield('account')">
                    <a href="/dashboard/account/settings" class="nav-link @yield('account-settings')">
                        <ion-icon name="options"></ion-icon>
                        <p>
                        Pengaturan Akun
                        </p>
                    </a>
                </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">@yield('header-text')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a> / {{ucfirst(Request::segment(2))}}</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

@yield('content')

</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
<strong>Copyright &copy; {{date("Y")}} <a href="#">Groove Creative</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
    Dashboard Made Using <a rel='noreferrer noopener' target="_blank" href="https://adminlte.io">AdminLTE</a> -
    <b>Version</b> 3.1.0
</div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('js/adminlte.js')}}"></script>

<!-- Bootstrap Select -->
<script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('js/pages/dashboard3.js')}}"></script> --}}
<!-- Ionicons -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>

<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- BS-Stepper -->
<script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>

{{-- <script src="{{asset('plugins/jquery-mask/js/jquery.mask.js')}}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> --}}

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{asset('plugins/clipboard-js/clipboard.js')}}"></script>

<!-- Image Uploader JQuery -->
<script src="{{asset('plugins/image-uploader/js/image-uploader.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@livewireScripts()

@stack('scripts')

<script src="{{asset('js/script.js')}}"></script>


    <script src=https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.js></script>


</body>
</html>