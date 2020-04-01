<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="<?= base_url() ?>/assets/jquery.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('login/logout') ?>" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url() ?>/assets/adminlte/dist/img/AdminLTELogo.png" alt="SI Management" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>/assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!-- <a href="<?= base_url('admin/registrasi') ?>" class="nav-link active"> -->
                <a href="<?= base_url('admin/registrasi') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/jabatan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/divisi') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Divisi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/pekerjaan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pekerjaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/task') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Task</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/sts_kawin') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status Kawin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/profil') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil</p>
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <?php
        if($page == "Jabatan"){
          $jabatan = $jabatan;
          $this->load->view("v_jabatan", $jabatan);
        }elseif($page == "Divisi"){
          $this->load->view("v_divisi");
        }elseif($page == "v_e_jabatan"){
          $jabatan = $jabatan;
          $this->load->view("v_e_jabatan", $jabatan);
        }elseif($page == "v_t_divisi"){
          $this->load->view("v_t_divisi");
        }elseif($page == "v_e_divisi"){
          $divisi = $divisi;
          $this->load->view("v_e_divisi", $divisi);
        }elseif($page == "v_t_jabatan"){
          $id_divisi = $id_divisi;
          $this->load->view("v_t_jabatan");
        }elseif($page == "Registrasi"){
          $this->load->view("v_registrasi");
        }elseif($page == "v_t_registrasi"){
          $this->load->view("v_t_registrasi");
        }elseif($page == "v_e_registrasi"){
          $registrasi = $registrasi; 
          $this->load->view("v_e_registrasi", $registrasi);
        }elseif($page == "pekerjaan"){
          $this->load->view("v_pekerjaan");
        }elseif($page == "pekerjaan"){
          $this->load->view("v_pekerjaan");
        }elseif($page == "v_e_pekerjaan"){
          $this->load->view("v_e_pekerjaan");
        }elseif($page == "v_t_pekerjaan"){
          $this->load->view("v_t_pekerjaan");
        }elseif($page == "task"){
          $this->load->view("v_task");
        }elseif($page == "v_t_task"){
          $this->load->view("v_t_task");
        }elseif($page == "v_e_task"){
          $this->load->view("v_e_task");
        }elseif($page == "profil"){
          $this->load->view("v_profil");
        }elseif($page == "v_t_profil"){
          $this->load->view("v_t_profil");
        }elseif($page == "v_e_profil"){
          $this->load->view("v_e_profil");
        }elseif($page == "sts_kawin"){
          $this->load->view("v_sts_kawin");
        }elseif($page == "v_t_sts_kawin"){
          $this->load->view("v_t_sts_kawin");
        }elseif($page == "v_e_sts_kawin"){
          $this->load->view("v_e_sts_kawin");
        }elseif($page == "home"){
          echo "tidak ada yang dikirim";
        }
      ?>
      <br>
<?= $this->session->userdata("status") ?>

      
      <!-- disini kontennya -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0
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
<script src="<?= base_url() ?>/assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>/assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/demo.js"></script>
</body>
</html>
