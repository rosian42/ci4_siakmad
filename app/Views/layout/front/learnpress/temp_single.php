<!DOCTYPE html>
<html dir="ltr" lang="id">

<!-- blog-single-right-sidebar19:08-->
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="<?=(empty(konfigurasi_get('meta_description')['konfigurasi_value']))?konfigurasi_get('meta_description')['konfigurasi_default']:konfigurasi_get('meta_description')['konfigurasi_value'];?>">
<meta name="keyword" content="<?=(isset($post['post_keyword']))?$post['post_keyword'].",":""?><?=(empty(konfigurasi_get('meta_keyword')['konfigurasi_value']))?konfigurasi_get('meta_keyword')['konfigurasi_default']:konfigurasi_get('meta_keyword')['konfigurasi_value'];?>">
<meta property="og:type" content="article" />
<meta property="og:title" content="<?=$post['post_title'];?> | <?=(empty(konfigurasi_get('web_title')['konfigurasi_value']))?konfigurasi_get('web_title')['konfigurasi_default']:konfigurasi_get('web_title')['konfigurasi_value'];?>" />
<meta property="og:description" content="" />
<meta property="og:url" content="<?php echo set_post_link($post['post_id']);?>" />
<meta property="og:image" content="<?=base_url($post['post_thumbnail']);?>" />

<!-- Page Title -->
<title><?=$post['post_title'];?> | <?=(empty(konfigurasi_get('web_title')['konfigurasi_value']))?konfigurasi_get('web_title')['konfigurasi_default']:konfigurasi_get('web_title')['konfigurasi_value'];?></title>

<!-- Favicon and Touch Icons -->
<link rel="shortcut icon" href="<?=(empty(konfigurasi_get('favicon')['konfigurasi_value']))?base_url(konfigurasi_get('favicon')['konfigurasi_default']):base_url(konfigurasi_get('favicon')['konfigurasi_value']);?>" type="image/x-icon">
<link href="<?=(empty(konfigurasi_get('favicon')['konfigurasi_value']))?base_url(konfigurasi_get('favicon')['konfigurasi_default']):base_url(konfigurasi_get('favicon')['konfigurasi_value']);?>" rel="apple-touch-icon">
<link href="<?=(empty(konfigurasi_get('favicon')['konfigurasi_value']))?base_url(konfigurasi_get('favicon')['konfigurasi_default']):base_url(konfigurasi_get('favicon')['konfigurasi_value']);?>" rel="apple-touch-icon" sizes="72x72">
<link href="<?=(empty(konfigurasi_get('favicon')['konfigurasi_value']))?base_url(konfigurasi_get('favicon')['konfigurasi_default']):base_url(konfigurasi_get('favicon')['konfigurasi_value']);?>" rel="apple-touch-icon" sizes="114x114">
<link href="<?=(empty(konfigurasi_get('favicon')['konfigurasi_value']))?base_url(konfigurasi_get('favicon')['konfigurasi_default']):base_url(konfigurasi_get('favicon')['konfigurasi_value']);?>" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="<?=base_url('assets/learnpress');?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/learnpress');?>/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/learnpress');?>/css/animate.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/learnpress');?>/css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="<?=base_url('assets/learnpress');?>/css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?=base_url('assets/learnpress');?>/css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="<?=base_url('assets/learnpress');?>/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?=base_url('assets/learnpress');?>/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?=base_url('assets/learnpress');?>/css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- CSS | Theme Color -->
<link href="<?=base_url('assets/learnpress');?>/css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="<?=base_url('assets/learnpress');?>/js/jquery-2.2.4.min.js"></script>
<script src="<?=base_url('assets/learnpress');?>/js/jquery-ui.min.js"></script>
<script src="<?=base_url('assets/learnpress');?>/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?=base_url('assets/learnpress');?>/js/jquery-plugin-collection.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      	<div class="col-md-2">
            <div class="preloader-floating-circles">
	              <div class="f_circleG" id="frotateG_01"></div>
	              <div class="f_circleG" id="frotateG_02"></div>
	              <div class="f_circleG" id="frotateG_03"></div>
	              <div class="f_circleG" id="frotateG_04"></div>
	              <div class="f_circleG" id="frotateG_05"></div>
	              <div class="f_circleG" id="frotateG_06"></div>
	              <div class="f_circleG" id="frotateG_07"></div>
	              <div class="f_circleG" id="frotateG_08"></div>
            </div>
        </div>
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
  
  <?=$this->include('layout/front/learnpress/navbar');?>
  
  <!-- Start main-content -->
	<?= $this->renderSection('content');?>
  
  <!-- end main-content -->

  <!-- Footer -->
  <?=$this->include('layout/front/learnpress/footer');?>