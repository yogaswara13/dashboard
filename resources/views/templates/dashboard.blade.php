<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/css/adminlte.css')}}">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.css')}}">

  <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css')}}">


  <head>
    {{-- contoh untuk memanggil dokumen css secara keseluruhan --}}
  <link rel="stylesheet" href="(nama dokumen css yang ingin dipanggil)">

  </head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed hold-transition">
<div class="wrapper">
 <!-- ================================================ Navbar =================================================-->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu"  href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{URL::to('/home')}}" class="nav-link">Beranda</a>
      </li>
       <li class="nav-item">
            <a href="{{ URL::to('/logout') }}" class="nav-link">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              Keluar
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <ul class="navbar-nav nav-link">
          <li class="breadcrumb-item ">{{ $subMenu }}</li>
          <li class="breadcrumb-item ">{{ $menu }}</li>
          <li class="breadcrumb-item ">Dashboard</li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

 <!-- ====================================================== Sidebar ==================================================-->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!--  Logo -->
    <a href="{{URL::to('/home')}}" class="brand-link sidebar-light-primary">
      <img src="{{asset('assets/img/LogoUnpas.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Fakultas Teknik Unpas </span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ session('users')->path_to_foto }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <span class="d-block font-weight-bold">{{ session('users')->nama }} | <a class="text-primary" href="{{ route('profile') }}"> Lihat Profil </a> </span>
          </div>
        </div>
        <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
            <li class="nav-item">
              <a href="home" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Data Fakultas Teknik
                </p>
                <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ URL::to('/detail-fakultas/mahasiswa') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mahasiswa</p>
                  </a>
                  <a href="{{URL::to('/detail-fakultas/dosen')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dosen</p>
                  </a>
                  <a href="{{URL::to('/detail-fakultas/alumni')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alumni</p>
                  </a>
                </li>
              </ul>
              <hr>
            </li>
            <li class="nav-item ">
              <a href="home" class="nav-link ">
                <i class="nav-icon fas fa-digital-tachograph"></i>
                <p>
                  Data Program Studi
                </p>
                <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{URL::to('/detail-jurusan/prodi?id=90bb3ac41b638d28dc15e71ce55a4c56&kode=301')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      Teknik Industri
                    </a>
                    <a href="{{URL::to('/detail-jurusan/prodi?id=e3633bcde320de542b5d20595fb12386&kode=302')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Teknologi Pangan</p>
                    </a>
                    <a href="{{URL::to('/detail-jurusan/prodi?id=8448a6d153f21df9b5dd3aec314823d7&kode=303')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Teknik Mesin</p>
                    </a>
                    <a href="{{URL::to('/detail-jurusan/prodi?id=672e0fa539fe218b3604a950f84f4e70&kode=304')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Teknik Informatika</p>
                    </a>
                    <a href="{{URL::to('/detail-jurusan/prodi?id=f281215b788ddf2ee06b4bbc90f10a7f&kode=305')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Teknik Lingkungan</p>
                    </a>
                    <a href="{{URL::to('/detail-jurusan/prodi?id=277d23d933b15f9d8b4daf134c60bf48&kode=306')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Teknik PWK</p>
                    </a>
                  </li>
                </ul>
                <hr>
            </li>

          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 {{-- ================================================ Content ======================================================== --}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->




  {{-- ================================================ Footer ======================================================== --}}
    <!-- ./wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; {{ date('Y') }} <a href="https://www.teknik.unpas.ac.id/">Fakultas Teknik Universitas Pasundan</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>
</div>
<!-- ============================================== SCRIPTS ========================================================== -->
  <!-- jQuery -->
  <script src="{{asset('assets/plugins/jquery/jquery.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
  <!-- AdminLTE -->
  <script src="{{asset('assets/js/adminlte.js')}}"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="{{asset('assets/plugins/chart.js/Chart.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  {{-- <script src="{{asset('assets/js/pages/dashboard3.js')}}"></script> --}}

  <!-- Bootstrap 4 -->
  <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('assets/plugins/overlayScrollbars/js/OverlayScrollbars.min.js')}}"></script>
  <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
  <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.all.js')}}"></script>



  <!-- Page specific script -->
  <!-- ChartJS -->
  <script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });

  </script>


@stack('scripts')



</body>
</html>
