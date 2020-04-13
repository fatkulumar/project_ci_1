<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="<?= base_url() ?>/assets/jquery.js"></script>
  <!-- <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/datatables/media/css/jquery.dataTables.min.css">

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
<!-- 
    <ul class="navbar-nav">
     
    </ul> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <?php $count=$this->db->query("select count(*) as haha from tb_task")->row_array(); ?>
      <?php $level_admin = $this->session->userdata("level"); ?>
      <?php if($level_admin  == 1):?>
        <?php 
          $jml_task = count($task); 
          if($jml_task > 0):
          ?>
            <li class="mr-3">
              <!-- <a href='<?= base_url('admin/konfir_baca/1') ?>'></a> -->
                  <div class="dropdown">
                    <?php echo count($task) ?>
                    <div class="fas fa-bell mr-5"  id="dropDownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                    <div class="dropdown-menu" aria-labelledby="dropDownNotif">
                      <?php foreach($task as $tas): ?>
                        <a class="dropdown-item" href="<?= base_url('admin/taskku/' . $tas->id_task) ?>"><?= $tas->keterangan ?></a>
                      <?php endforeach ?>
                        
                    </div>
                    <!-- <a class="fas fa-bell" href=""></a> -->
                  </div>
            </li>
              
            </a>
          <?php else: ?>
            <li class="mr-3">
              <div  class="fas fa-bell">
                <b style="color: black"><?php echo count($task) ?></b>
              </div>
          <?php endif ?>
      <?php elseif($level_admin = $this->session->userdata("level") == 0): ?>
        <li class="mr-3"><a href='<?= base_url('admin/task') ?>'><i class="fas fa-bell"></i><?=$count['haha']?></a></li> 
      <?php endif ?>

      <li>
        <div class="dropdown mr-5">
          <a class="fas fa-cog dropdown-toggle mr-5"  id="dropDownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
          <div class="dropdown-menu" aria-labelledby="dropDownButton">
            <a href="<?= base_url('admin/profil') ?>" class="dropdown-item">Profil</a>
            <a href="<?= base_url('login/logout') ?>" class="dropdown-item">Logout</a>
          </div>
        </div>
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
          <a href="#" class="d-block"><?= $this->session->userdata("nama") ?></a>
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
                <a href="<?= base_url('admin/karyawan') ?>" class="<?php if($page == 'karyawan' || $page == 'v_e_karyawan' || $page == 'v_t_karyawan'){echo 'nav-link active';}else{echo 'nav-link';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Karyawan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/divisi') ?>" class="<?php if($page == 'divisi' || $page == 'v_e_divisi' || $page == 'v_t_divisi'){echo 'nav-link active';}else{echo 'nav-link';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Divisi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/pekerjaan') ?>" class="<?php if($page == 'pekerjaan' || $page == 'v_e_pekerjaan' || $page == 'v_t_pekerjaan'){echo 'nav-link active';}else{echo 'nav-link';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pekerjaan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/registrasi') ?>" class="<?php if($page == 'registrasi' || $page == 'v_e_registrasi' || $page == 'v_t_registrasi'){echo 'nav-link active';}else{echo 'nav-link';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/jabatan') ?>" class="<?php if($page == 'jabatan' || $page == 'v_e_jabatan' || $page == 'v_t_jabatan'){echo 'nav-link active';}else{echo 'nav-link';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?= base_url('admin/task') ?>" class="<?php if($page == 'task' || $page == 'v_e_task' || $page == 'v_t_task'){echo 'nav-link active';}else{echo 'nav-link';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Task </p>
                  <?php if($level_admin = $this->session->userdata("level") == 1):?>
                      <span class='badge badge-danger navbar-badge'><?php echo count($task) ?></span>
                  <?php elseif($level_admin = $this->session->userdata("level") == 0): ?>
                    <span class='badge badge-danger navbar-badge'><?=$count['haha']?></span>
                  <?php endif ?>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/sts_pekerjaan') ?>" class="<?php if($page == 'sts_pekerjaan' || $page == 'v_e_sts_pekerjaan' || $page == 'v_t_sts_pekerjaan'){echo 'nav-link active';}else{echo 'nav-link';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status Pekerjaan</p>
                </a>
              </li>

              <?php $levelku = $this->session->userdata('level'); ?>
              <?php if($levelku == 0): ?>

              <li class="nav-item">
                <a href="<?= base_url('admin/aktifitas') ?>" class="<?php if($page == 'aktifitas'){echo 'nav-link active';}else{echo 'nav-link';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aktifitas</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/laporan') ?>" class="<?php if($page == 'laporan' || $page == 'v_e_laporan' || $page == 'v_t_laporan'){echo 'nav-link active';}else{echo 'nav-link';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>

              <?php endif ?>
              <li class="nav-item">
                <a href="<?= base_url('admin/chat') ?>" class="<?php if($page == 'chat' || $page == 'v_e_chat' || $page == 'v_t_chat'){echo 'nav-link active';}else{echo 'nav-link';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chat</p>
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
        if($page == "jabatan"){
          $jabatan = $jabatan;
          $this->load->view("v_jabatan", $jabatan);
        }elseif($page == "divisi"){
          $this->load->view("v_divisi");
        }elseif($page == "v_e_jabatan"){
          $jabatan = $jabatan;
          $this->load->view("v_e_jabatan", $jabatan);
        }elseif($page == "v_t_divisi"){
          $this->load->view("v_t_divisi");
        }elseif($page == "v_e_divisi"){
          $this->load->view("v_e_divisi");
        }elseif($page == "v_t_jabatan"){
          $this->load->view("v_t_jabatan");
        }elseif($page == "registrasi"){
          $this->load->view("v_registrasi");
        }elseif($page == "v_t_registrasi"){
          $this->load->view("v_t_registrasi");
        }elseif($page == "v_e_registrasi"){
          $this->load->view("v_e_registrasi");
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
        }elseif($page == "taskku"){
          $this->load->view("v_taskku");
        }elseif($page == "taskUserAll"){
          $this->load->view("v_taskUserAll");
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
        }elseif($page == "sts_pekerjaan"){
          $this->load->view("v_sts_pekerjaan");
        }elseif($page == "v_t_sts_pekerjaan"){
          $this->load->view("v_t_sts_pekerjaan");
        }elseif($page == "v_e_sts_pekerjaan"){
          $this->load->view("v_e_sts_pekerjaan");
        }elseif($page == "karyawan"){
          $this->load->view("v_karyawan");
        }elseif($page == "v_t_karyawan"){
          $this->load->view("v_t_karyawan");
        }elseif($page == "v_e_karyawan"){
          $this->load->view("v_e_karyawan");
        }elseif($page == "aktifitas"){
          $this->load->view("v_aktifitas");
        }elseif($page == "grafik"){
          $this->load->view("v_grafik");
        }elseif($page == "chat"){
          $this->load->view("v_chat");
        }elseif($page == "laporan"){
          $this->load->view("v_laporan");
        }elseif($page == "home"){
          echo "tidak ada yang dikirim";
        }
      ?>
      

      <br>
      level : <?= $this->session->userdata('level'); ?>
      <br>
      
      <?php
        $id_login = $this->session->userdata('id_login');
        foreach ($id_login as $id) {
          echo "id_login " . $id->id_registrasi;
        }
      ?> 
    

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

<!-- <script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
<script src="<?= base_url() ?>/assets/datatables/media/js/jquery.dataTables.min.js"></script>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<!-- overlayScrollbars -->
<!-- AdminLTE App -->

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="dist/js/demo.js"></script> -->

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<!-- <script src="<?= base_url() ?>/assets/adminlte/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>/assets/adminlte/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>/assets/adminlte/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>/assets/adminlte/plugins/jquery-mapael/maps/usa_states.min.js"></script> -->
<!-- ChartJS -->

<!-- PAGE SCRIPTS -->
<script src="<?= base_url() ?>/assets/grafik/grafik.php"></script>

<!--<script src="<?= base_url() ?>/assets/datatables/media/js/dataTables.bootstrap.min.js"></script>-->
</body>
</html>
