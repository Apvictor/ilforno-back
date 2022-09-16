<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistema | <?php echo $titulo; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/iconfonts/font-awesome/css/all.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.base.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.addons.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/adicionais.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth" style="background:#c43131 ;">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">


              <div class="brand-logo text-center">
                <img src="<?php echo base_url('assets/images/logo.png');?>">
              </div>
              <!-- Envia mensagem de erro -->
            <?php if($message = $this->session->flashdata('erro')){?>
              <div class="alert alert-fill-danger" role="alert">
                <i class="fa fa-exclamation-triangle"></i>
                <?php echo $message; ?>
              </div>
            <?php } ?>

              <h4 class="text-center">Seja bem vindo!</h4><br>
              <h6 class="font-weight-light">Digite os dados para efetuar login.</h6>
            
              <?php 

              $atributos = array(
                'name' => 'form_login'
              );

              ?>

            <?php echo form_open('login/auth', $atributos); ?>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg rounded" id="exampleInputEmail1" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg rounded" id="exampleInputPassword1" placeholder="Senha">
                </div>
                <div class="mb-5 my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input name="remember" type="checkbox" class="form-check-input">
                      Lembrar de mim
                    </label>
                  </div>
                </div>
                <div>
                  <button class="btn btn-block btn-login-color auth-form-btn font-weight-bold">Entrar</button>
                </div>
              <?php form_close();?>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js')?>"></script>
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.addons.js')?>"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url('assets/js/off-canvas.js')?>"></script>
  <script src="<?php echo base_url('assets/js/hoverable-collapse.js')?>"></script>
  <script src="<?php echo base_url('assets/js/misc.js')?>"></script>
  <script src="<?php echo base_url('assets/js/settings.js')?>"></script>
  <script src="<?php echo base_url('assets/js/todolist.js')?>"></script>
  <!-- endinject -->
</body>
</html>
