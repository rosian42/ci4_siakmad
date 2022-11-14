<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<meta name="<?=csrf_token()?>" content="<?=csrf_hash()?>" class="csrf">-->
  <title><?=(empty(konfigurasi_get('web_title')['konfigurasi_value']))?konfigurasi_get('web_title')['konfigurasi_default']:konfigurasi_get('web_title')['konfigurasi_value'];?> <?=(empty(konfigurasi_get('tagline')['konfigurasi_value']))?" | ".konfigurasi_get('tagline')['konfigurasi_default']:" | ".konfigurasi_get('tagline')['konfigurasi_value'];?> </title>
  <meta name="description" content="<?=(empty(konfigurasi_get('meta_description')['konfigurasi_value']))?konfigurasi_get('meta_description')['konfigurasi_default']:konfigurasi_get('meta_description')['konfigurasi_value'];?>">
    <meta name="keyword" content="<?=(empty(konfigurasi_get('meta_keyword')['konfigurasi_value']))?konfigurasi_get('meta_keyword')['konfigurasi_default']:konfigurasi_get('meta_keyword')['konfigurasi_value'];?>">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="<?=(empty(konfigurasi_get('favicon')['konfigurasi_value']))?base_url(konfigurasi_get('favicon')['konfigurasi_default']):base_url(konfigurasi_get('favicon')['konfigurasi_value']);?>" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/fontawesome-free/css/all.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<div class="wrapper">

  <!-- Navbar 
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    
    <ul class="navbar-nav ml-auto">
      
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
   /.navbar -->
<?= $this->renderSection('content');?>

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- overlayScrollbars -->
<script src="<?=base_url('assets/admin');?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE for demo purposes 
<script src="<?=base_url('assets/admin');?>/dist/js/demo.js"></script>-->
</body>
</html>
