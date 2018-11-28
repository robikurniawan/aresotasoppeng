<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>:: Administrator ::</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css');?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
  <!-- Ionicons -->

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.11/dist/css/AdminLTE.min.css');?>">

  <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css');?>">


  <style media="screen">
  .modal-header {
    border-bottom-color: #2196F3;
    color: #ffffff;
    background: #2196f3;
    border-radius: 10px 10px 0px 0px;
  }
  /* @media (min-width: 768px) */
  .modal-content {
    -webkit-box-shadow: #a5a5a5c4;
    box-shadow: -1px 1px 20px 5px #a5a5a5c4;
    border-radius: 10px;
    margin-top: 70px;
  }

  .modal{
    background: rgba(6, 6, 6, 0.63);
  }

  .modal-body{
    padding:20px 50px;
  }
  h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6{
    font-family: Helvetica Neue, Segoe UI, Helvetica, Arial, sans-serif;
    font-weight: 400;
  }

  .skin-blue-light .sidebar-menu>li>a{
    font-weight: 500;
  }

  .form-control{
    border-radius: 5px;
  }

  .skin-blue-light .sidebar-menu>li:hover>a, .skin-blue-light .sidebar-menu>li.active>a{
      border-left: 4px solid #3096f3;
  }

  table th{
    text-align:center;
  }
  table thead{
    background-color:#3097f345;
  }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


<script>
function scroll(){

	var box = document.getElementById('scrollChat');
	box.scrollTop = box.scrollHeight;

}
</script>

 <script src="<?= base_url()?>assets/js/grafik/highcharts.js"></script>
      <script src="<?= base_url()?>assets/js/grafik/exporting.js"></script>
      <script src="<?= base_url()?>assets/js/grafik/export-data.js"></script>


</head>
<body class="hold-transition skin-blue-light sidebar-mini" onload="scroll();" style="font-family:Helvetica Neue, Segoe UI, Helvetica, Arial, sans-serif;">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('index.php/home');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>SP</span>
      <!-- logo for regular state and mobile devices  CV. Aresota Sopppeng  -->
      <span class="logo-lg"><b>CV. </b>Aresota Sopppeng</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"> -->
              <!-- <img src="<?php echo base_url('assets/image/avatar.svg');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION["nama"]; ?></span> -->
               <a href="<?php echo base_url('index.php/auth/logout');?>" class="dropdown-toggle">Keluar</a>

            <!-- </a> -->

          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/image/avatar.svg');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["nama"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <li><a href="<?= base_url('home/index')?>"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <?php 
          if ($this->session->userdata('level') == "produksi") {
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-link"></i> <span>Bahan Baku </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('bahan_baku/pengiriman')?>"><i class="fa fa-link"></i> <span>Persediaan</span>  </a></li>
            <li><a href="<?= base_url('bahan_baku')?>"><i class="fa fa-link"></i> <span>Permintaan </span></a></li>

          </ul>
        </li>
        <?php
          }elseif ($this->session->userdata('level') == "gudang") {
        ?>
          <li><a href="<?= base_url('bahan_baku/persediaan')?>"><i class="fa fa-link"></i> <span>Input Persediaan</span>  </a></li>
        <?php
          }elseif( $this->session->userdata('level') == "admin" ) {
        ?>
          
          <li><a href="<?= base_url('bahan_baku/persediaan')?>"><i class="fa fa-link"></i> <span>Persediaan Bahan Baku </span>  </a></li>
          <li><a href="<?= base_url('bahan_baku')?>"><i class="fa fa-link"></i> <span>Permintaan Bahan Baku </span>  </a></li>
          <li><a href="<?= base_url('bahan_baku/preorder')?>"><i class="fa fa-link"></i> <span>Preorder Bahan Baku </span>  </a></li>
          <!-- <li><a href="<?= base_url('laporan')?>"><i class="fa fa-link"></i> <span>Laporan </span></a></li> -->
        

        <li class="treeview">
          <a href="#">
            <i class="fa fa-link"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url()?>bahan"><i class="fa fa-link"></i> <span>Daftar Bahan Baku </span>  </a></li>

            <li><a href="<?= base_url()?>jenis_bahan"><i class="fa fa-link"></i> <span>Jenis Bahan Baku </span>  </a></li>
            <li><a href="<?= base_url()?>supplier"><i class="fa fa-link"></i> <span>Supplier </span>  </a></li>

          </ul>
        </li>
        <?php 
          }else{
        ?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-link"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url()?>bahan_baku/persediaan"><i class="fa fa-link"></i> <span> Bahan Baku </span>  </a></li>
            <li><a href="<?= base_url()?>bahan_baku/preorder"><i class="fa fa-link"></i> <span>Preorder </span>  </a></li>
          </ul>
        </li>
        
        <?php 
          }
        ?>














    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper" id="contentLTE"> -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">

      <div class="row">
        <div style="margin-top:10px;">
        <?php
        $notifikasi = $this->session->flashdata('notifikasi');
        echo notifikasi($notifikasi);
      ?>
        </div>

      </div>

    </div>

      <?php echo $contents ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017-2019 <a href="https://robikurniawan.com">CV. Aresota Sopppeng</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>

<script src="<?php echo base_url('assets/DataTables-1.10.15/media/js/jquery.dataTables.js');?>"></script>
<script src="<?php echo base_url('assets/DataTables-1.10.15/media/js/dataTables.bootstrap.min.js');?>"></script>

<link rel="stylesheet" href="<?php echo base_url('assets/DataTables-1.10.15/media/css/dataTables.bootstrap.min.css');?>">

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/dist/js/app.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/dist/js/demo.js');?>"></script>

<script type="text/javascript">
  $('#table').DataTable();

  $('#table1').DataTable();

  $('#table2').DataTable();

  $('#table3').DataTable();

  $('#table4').DataTable();

  $('#table5').DataTable();
</script>




</body>
</html>
