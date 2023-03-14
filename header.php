<?php
error_reporting(0);
session_start();

$koneksi = new mysqli("localhost", "root", "", "bappeda_ahp");
include('page/pembobotan/fungsi.php');

?>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK Proyek Pembangunan Daerah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

</head>

<body class="hold-transition skin-black sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <div style="color: black;padding: 10px 0px 5px 40px;float: right;font-size: 16px;">
            <div align="text-center">
              <span><?php
                    $array_hr = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
                    $hr = $array_hr[date('N')];
                    $tgl = date('j');
                    $array_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    $bln = $array_bln[date('n')];
                    $thn = date('Y');
                    echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " ";
                    ?>
              </span>

              &nbsp;
              <a href="logout.php" class="btn btn-danger">Logout</a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item"></a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item"></a>
              </div>
            </div>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->

        <li class="nav-item" style="padding: 10px 0px 5px 0px;float: right;font-size: 16px;">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index.php" class="brand-link">
        <img src="../../img/logo1.png" alt="Logo1" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light"><b>SPK Bappeda Inhu</b></span>
        <!--  <img src="img/header-logo.png" class="user-image pngimg-responsive"> -->
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../assets/dist/img/avatar5.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="../../index.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                  <i class="right badge badge-danger"></i>
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
                <p>
                  Data Master
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../?page=pembangunan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Proyek Pembangunan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../?page=kriteria" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Kriteria</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../../?page=bobot_kriteria" class="nav-link">
                <i class="far fa-edit nav-icon"></i>
                <p>Pembobotan Kriteria</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Pembobotan Alternatif
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php
                for ($i = 0; $i <= (getJumlahKriteria() - 1); $i++) {
                  echo "<li class='nav-item'>";
                  echo "<a class='nav-link' href='../../page/pembobotan/bobot_alternatif.php?c=" . ($i + 1) . "'><i class='nav-icon far fa-circle'></i>" . getKriteriaNama($i) . "</a>";
                  echo "</li>";
                } ?>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Data Analisa
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../?page=akriteria" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Analisa Kriteria</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../?page=aalternatif" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Analisa Alternatif</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../?page=perangkingan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perangkingan</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Visualisasi
                  <i class="right badge-danger right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../?page=peta" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Peta</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../?page=visualisasi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Visualisasi Peta</p>
                  </a>
                </li>
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

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">

            <!-- ./col -->

            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->

          <?php
          error_reporting(1);
          $page = $_GET['page'];
          $aksi = $_GET['aksi'];

          if ($page == "pembangunan") {
            if ($aksi == "") {
              include "page/pembangunan/pembangunan.php";
            } elseif ($aksi == "tambah") {
              include "page/pembangunan/tambah.php";
            } elseif ($aksi == "ubah") {
              include "page/pembangunan/ubah.php";
            } elseif ($aksi == "hapus") {
              include "page/pembangunan/hapus.php";
            }
          } elseif ($page == "kriteria") {
            if ($aksi == "") {
              include "page/kriteria/kriteria.php";
            } elseif ($aksi == "tambah") {
              include "page/kriteria/tambah.php";
            } elseif ($aksi == "ubah") {
              include "page/kriteria/ubah.php";
            } elseif ($aksi == "hapus") {
              include "page/kriteria/hapus.php";
            }
          } elseif ($page == "bobot_kriteria") {
            if ($aksi == "") {
              include "page/pembobotan/bobot_kriteria.php";
            }
          } elseif ($page == "bobot_alternatif") {
            if ($aksi == "") {
              for ($i = 0; $i <= (getJumlahKriteria() - 1); $i++) {
                include "page/pembobotan/bobot_alternatif.php?c='" . ($i + 1) . "'";
              }
            }
          } elseif ($page == "akriteria") {
            if ($aksi == "") {
              include "page/akriteria/akriteria.php";
            }
          } elseif ($page == "aalternatif") {
            if ($aksi == "") {
              include "page/aalternatif/aalternatif.php";
            }
          } elseif ($page == "perangkingan") {
            if ($aksi == "") {
              include "page/perangkingan/perangkingan.php";
            }
          } elseif ($page == "peta") {
            if ($aksi == "") {
              include "page/peta/peta.php";
            } elseif ($aksi == "tambah") {
              include "page/peta/tambah.php";
            } elseif ($aksi == "ubah") {
              include "page/peta/ubah.php";
            } elseif ($aksi == "hapus") {
              include "page/peta/hapus.php";
            }
          } elseif ($page == "visualisasi") {
            if ($aksi == "") {
              include "page/visualisasi/visualisasi.php";
            } elseif ($aksi == "") {
              include "page/visualisasi/visualisasi_tampil.php";
            } elseif ($aksi == "ubah") {
              include "page/visualisasi/ubah.php";
            } elseif ($aksi == "hapus") {
              include "page/visualisasi/hapus.php";
            }
          } elseif ($page == "visualisasi_tampil") {
            include "page/visualisasi/visualisasi_tampil.php";
          }

          ?>