<?php
session_start();
require_once "config.php";
if (!isset($_SESSION["is_logged"])) {
  header('location: login.php');
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK SAW | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.chained.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="" class="nav-link"><?php $str = (isset($_GET["page"])) ? (($_GET["page"] == "nilai") ? "persyaratan" : $_GET["page"]) : "home"; echo strtoupper($str)?></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">


        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">


      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= ucfirst($_SESSION["username"]) ?></a>
            <a href="logout.php" class="text-danger">keluar</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open"></li>
            <a href="?page=home" class="nav-link <?php if($_GET['page']=='home'){echo 'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

            <li class="nav-item">
              <a href="?page=bantuan" class="nav-link <?php if($_GET['page']=='bantuan'){echo 'active';} ?>" >
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Daftar Bantuan
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="?page=nilai" class="nav-link <?php if($_GET['page']=='nilai'){echo 'active';} ?>">
                <i class="nav-icon fa fa-compass"></i>
                <p>
                  Persyaratan
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview <?php 
            switch($_GET['page']){
              case 'keluarga':
                echo 'menu-open';
                break;  
              case 'kriteria':
                echo 'menu-open';
                break;  
              case 'model':
                echo 'menu-open';
                break;  
              case 'penilaian':
                echo 'menu-open';
                break;  
            }
            ?>">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-copy "></i>
                <p>
                  Data Penilaian Bantuan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=keluarga" class="nav-link <?php if($_GET['page']=='keluarga'){echo 'active';} ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Kepala Keluarga</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="?page=kriteria" class="nav-link <?php if($_GET['page']=='kriteria'){echo 'active';} ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kriteria</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="?page=model" class="nav-link <?php if($_GET['page']=='model'){echo 'active';} ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Model</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="?page=penilaian" class="nav-link <?php if($_GET['page']=='penilaian'){echo 'active';} ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penilaian</p>
                  </a>
                </li>
              </ul>
            </li>
            
          


            <li class="nav-header">REKAP LAPORAN</li>

            <li class="nav-item has-treeview <?php 
            switch($_GET['page']){
              case 'lap_seluruh':
                echo 'menu-open';
                break;  
              case 'lap_perkeluarga':
                echo 'menu-open';
                break;  
              case 'lap_pendaftaran':
                echo 'menu-open';
                break;  
            }
            
            ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  Laporan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=lap_seluruh" class="nav-link <?php if($_GET['page']=='lap_seluruh'){echo 'active';} ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Seluruh Keluarga</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="?page=lap_perkeluarga" class="nav-link <?php if($_GET['page']=='lap_perkeluarga'){echo 'active';} ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Per Keluarga</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="?page=lap_pendaftaran" class="nav-link <?php if($_GET['page']=='lap_pendaftaran'){echo 'active';} ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Per Pendaftaran</p>
                  </a>
                </li>

              </ul>


              <li class="nav-header">JENIS BANTUAN </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Rekap Bantuan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              
              <ul class="nav nav-treeview">
              <?php $query = $connection->query("SELECT * FROM bantuan "); while ($row = $query->fetch_assoc()): ?>
                <li class="nav-item">
                  <a href="?page=perhitungan&bantuan=<?=$row["jenis_bantuan"]?>" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p><?=$row["nama"]?></p>
                  </a>
                </li>
              <?php endwhile; ?>
              </ul>
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
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="?page=home">Home<span class="sr-only">(current)</span></a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          

        <div class="row">
            <div class="col-md-12">
              <?php include page($_PAGE); ?>
            </div>
        </div>

          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<footer class="main-footer">
        <strong
          >Copyright &copy; 2014-2019
          <a href="http://adminlte.io">AdminLTE.io</a>.</strong
        >
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.4
        </div>
      </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

 <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

</html>
