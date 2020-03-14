<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') | Sistem Informasi Laboratorium</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
  <body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <!-- <div class="wrapper"> -->
    <!-- Navbar -->
    @include('layouts.include._navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="sidebar-primary elevation-4" align="center">
  <!-- Brand Logo -->
    <img src="{{ asset('admin/dist/img/poliban.png') }}" width="50px">
    <span class="brand-text font-weight-dark"><b>SISTEM INFORMASI INVENTARIS LABORATORIUM JURUSAN ADMINISTRASI BISNIS</b></span>
    <img src="{{ asset('admin/dist/img/labkombis.png') }}" width="50px">
   </aside>
    <!-- /.sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper">  aktifkan untuk menggunakan sidebar-->
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <div class="text-left">
    @yield('container')
    </div>
    <!-- /.content -->
  <!-- </div> end class wrapper-->
      <!-- /.content-wrapper -->

      <footer class="main-footer" style="margin-left: 0px">
        <div class="float-right d-none d-sm-block">
          Sistem Informasi Inventaris Laboratorium
          <br>
          <b>Jurusan Administrasi Bisnis</b>
          <br>
          <b>Politeknik Negeri Banajarmasin</b>
        </div>
        <strong>Copyright &copy; 2019-2020 <a href="#">AdminLabkomBisnis</a>.</strong> All rights
        reserved. <br>
        <b>Jl. Brigjen H Basri</b>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
  </body>
  </html>
