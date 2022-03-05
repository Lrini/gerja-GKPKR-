<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GEREJA KRISTEN KEHIDUPAN ROHANI</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!--datatables-->
  <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">GKPKR KUPANG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"> <?php
            include "../koneksi.php";
            echo $_SESSION['user'];
          ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Renungan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="galeri.php" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Galeri
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="minggu.php" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Pelayan Mingguan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pemuda.php" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Ibadah Pemuda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="wanita.php" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Ibadah Kaum Wanita
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="doa.php" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Ibadah doa dan pujian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../login.php" class="nav-link">
              <i class="nav-icon fas fa-arrow-alt-circle-left"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
   