<!DOCTYPE html>
<html lang="pt-br">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistema | <?php echo $titulo; ?></title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" type="image/ico"/>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/iconfonts/font-awesome/css/all.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.base.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.addons.css')?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/adicionais.css')?>">
  <!-- endinject -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
 <?php
  if(isset($styles)){
    foreach ($styles as $style) {
  ?>
      <link rel="stylesheet" href="<?php echo base_url('assets/'.$style)?>">
  <?php  
    }
  }
  ?>
</head>
<body>
<div class="container-scroller">
<?php $this->load->view('restrita/template/navbar');?>

<div class="container-fluid page-body-wrapper">
  <?php $this->load->view('restrita/template/sidebar');?>
  <div class="main-panel">
