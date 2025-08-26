<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator - Sistem Informasi Keuangan</title>
    <!-- Favicons -->
    <link href="../gambar/sistem/logo.png" rel="icon">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="./css/style.css">

  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


<!-- ✅ Tambahkan CSS ini di <head> atau sebelum </body> -->
<style>
  @media (max-width: 768px) {
    .card-body {
      width: 270px;
      
        gap: 15px;
    }
    .card-list {
        margin-left: -30px;
        gap: 15px;
    }
    .swiper-slide{
        margin-left: -30px;
    }

  }
  
  .swal-wide {
    width: 400px !important;
    padding: 20px !important;
    font-size: 16px !important;
  }
  .swal-title-big {
    font-size: 20px !important;
  }
  .swal-text-big {
    font-size: 16px !important;
  }
  .swal-btn-big {
    font-size: 16px !important;
    padding: 8px 18px !important;
  }


  .swal-wide {
    width: 400px !important;
    padding: 20px !important;
    font-size: 16px !important;
  }
  .swal-title-big {
    font-size: 20px !important;
  }
  .swal-text-big {
    font-size: 16px !important;
  }
  .swal-btn-big {
    font-size: 16px !important;
    padding: 8px 18px !important;
  }




</style>



  <?php
  include '../koneksi.php';
  session_start();
  if ($_SESSION['status'] != "administrator_logedin") {
    header("location:../index.php?alert=belum_login");
  }
  ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">

  <style>
    #table-datatable {
      width: 100% !important;
    }

    #table-datatable .sorting_disabled {
      border: 1px solid #f4f4f4;
    }
  </style>
  <div class="wrapper">

    <header class="main-header">
      <a href="index.php" class="logo">
        <span class="logo-mini"><b><i class="fa fa-money"></i></b> </span>
        <span class="logo-lg"><b>DESA SOMOGEDE</b></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                $id_user = $_SESSION['id'];
                $profil = mysqli_query($koneksi, "select * from user where user_id='$id_user'");
                $profil = mysqli_fetch_assoc($profil);
                if ($profil['user_foto'] == "") {
                ?>
                  <img src="../gambar/sistem/user.png" class="user-image">
                <?php } else { ?>
                  <img src="../gambar/user/<?php echo $profil['user_foto'] ?>" class="user-image">
                <?php } ?>
                <span class="hidden-xs"><?php echo $_SESSION['nama']; ?> - <?php echo $_SESSION['level']; ?></span>
              </a>
            </li>
            <li>
  <a href="#" onclick="konfirmasiLogout(event)">
    <i class="fa fa-sign-out"></i> LOGOUT
  </a>
</li>

          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php
        $id_user = $_SESSION['id'];
        $profil = mysqli_query($koneksi, "select * from user where user_id='$id_user'");
        $profil = mysqli_fetch_assoc($profil);
        if ($profil['user_foto'] == "") {
        ?>
          <img src="../gambar/sistem/user.png" class="img-circle" style="max-height:45px;">
        <?php } else { ?>
          <img src="../gambar/user/<?php echo $profil['user_foto'] ?>" class="img-circle" style="max-height:45px;">
        <?php } ?>
      </div>
     


      <div class="pull-left info">
        <p><?php echo $_SESSION['nama']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
<!-- 
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>

      <li>
        <a href="index.php">
          <i class="fa fa-dashboard"></i> <span style="margin-left:10px;">DASHBOARD</span>
        </a>
      </li>

      <li>
        <a href="kategori.php">
          <i class="fa-solid fa-layer-group"></i> <span style="margin-left:10px;">DATA KATEGORI</span>
        </a>
      </li>

      <li>
        <a href="transaksi.php">
          <i class="fa-solid fa-credit-card"></i> <span style="margin-left:10px;">DATA TRANSAKSI</span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa-solid fa-book"></i>
          <span style="margin-left:10px;">HUTANG PIUTANG</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="hutang.php"><i class="fa fa-circle-o"></i> <span style="margin-left:5px;">Catatan Hutang</span></a></li>
          <li><a href="piutang.php"><i class="fa fa-circle-o"></i> <span style="margin-left:5px;">Catatan Piutang</span></a></li>
        </ul>
      </li>

      <li>
        <a href="pejabat.php">
          <i class="fa-solid fa-user-tie"></i> <span style="margin-left:10px;">DATA PENGURUS</span>
        </a>
      </li>

      <li>
        <a href="bank.php">
          <i class="fa fa-building"></i> <span style="margin-left:10px;">REKENING BANK</span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span style="margin-left:10px;">DATA PENGGUNA</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="user.php"><i class="fa fa-circle-o"></i> <span style="margin-left:5px;">Data Pengguna</span></a></li>
          <li><a href="user_tambah.php"><i class="fa fa-circle-o"></i> <span style="margin-left:5px;">Tambah Pengguna</span></a></li>
        </ul>
      </li>

      <li>
        <a href="laporan.php">
          <i class="fa-solid fa-book-open"></i> <span style="margin-left:10px;">LAPORAN</span>
        </a>
      </li>

      <li>
        <a href="gantipassword.php">
          <i class="fa fa-lock"></i> <span style="margin-left:10px;">GANTI PASSWORD</span>
        </a>
      </li>
    </ul> -->


    <?php $page = basename($_SERVER['PHP_SELF']); ?>



<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>

  <li class="<?= ($page == 'index.php') ? 'active' : '' ?>">
    <a href="index.php">
      <i class="fa fa-dashboard"></i> <span style="margin-left:10px;">DASHBOARD</span>
    </a>
  </li>

  <li class="<?= ($page == 'kategori.php') ? 'active' : '' ?>">
    <a href="kategori.php">
      <i class="fa-solid fa-layer-group"></i> <span style="margin-left:10px;">DATA KATEGORI</span>
    </a>
  </li>

  <li class="<?= ($page == 'transaksi.php') ? 'active' : '' ?>">
    <a href="transaksi.php">
      <i class="fa-solid fa-credit-card"></i> <span style="margin-left:10px;">DATA TRANSAKSI</span>
    </a>
  </li>

  <li class="treeview <?= ($page == 'hutang.php' || $page == 'piutang.php') ? 'active' : '' ?>">
    <a href="#">
      <i class="fa-solid fa-book"></i>
      <span style="margin-left:10px;">HUTANG PIUTANG</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="<?= ($page == 'hutang.php') ? 'active' : '' ?>"><a href="hutang.php"><i class="fa fa-circle-o"></i> <span style="margin-left:5px;">Catatan Hutang</span></a></li>
      <li class="<?= ($page == 'piutang.php') ? 'active' : '' ?>"><a href="piutang.php"><i class="fa fa-circle-o"></i> <span style="margin-left:5px;">Catatan Piutang</span></a></li>
    </ul>
  </li>

  <li class="<?= ($page == 'pejabat.php') ? 'active' : '' ?>">
    <a href="pejabat.php">
      <i class="fa-solid fa-user-tie"></i> <span style="margin-left:10px;">DATA PENGURUS</span>
    </a>
  </li>

  <li class="<?= ($page == 'bank.php') ? 'active' : '' ?>">
    <a href="bank.php">
      <i class="fa fa-building"></i> <span style="margin-left:10px;">REKENING BANK</span>
    </a>
  </li>

  <li class="treeview <?= ($page == 'user.php' || $page == 'user_tambah.php') ? 'active' : '' ?>">
    <a href="#">
      <i class="fa fa-users"></i>
      <span style="margin-left:10px;">DATA PENGGUNA</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="<?= ($page == 'user.php') ? 'active' : '' ?>"><a href="user.php"><i class="fa fa-circle-o"></i> <span style="margin-left:5px;">Data Pengguna</span></a></li>
      <li class="<?= ($page == 'user_tambah.php') ? 'active' : '' ?>"><a href="user_tambah.php"><i class="fa fa-circle-o"></i> <span style="margin-left:5px;">Tambah Pengguna</span></a></li>
    </ul>
  </li>

  <li class="<?= ($page == 'laporan.php') ? 'active' : '' ?>">
    <a href="laporan.php">
      <i class="fa-solid fa-book-open"></i> <span style="margin-left:10px;">LAPORAN</span>
    </a>
  </li>

  <li class="<?= ($page == 'gantipassword.php') ? 'active' : '' ?>">
    <a href="gantipassword.php">
      <i class="fa fa-lock"></i> <span style="margin-left:10px;">GANTI PASSWORD</span>
    </a>
  </li>
</ul>


  </section>
</aside>
