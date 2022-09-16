<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo text-white" href="<?php echo base_url('restrita/home') ?>">
      <img src="<?php echo base_url('assets/images/logo.png'); ?>">
    </a>
    <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('restrita/home') ?>">
      <img src="<?php echo base_url('assets/images/favicon.png') ?>" alt="logo" />
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span style="color:#fff;" class="fas fa-bars"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <i class="fas fa-user text-white"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <?php
          $usuario = $this->core_model->getby('users', array('id' => $this->session->userdata('user_id')));
          ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url('restrita/usuarios/atualizar/' . $usuario->id); ?>">
            <i class="fas fa-user text-primary"></i>
            Perfil
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">
            <i class="fas fa-power-off text-primary"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="fas fa-bars"></span>
    </button>
  </div>
</nav>