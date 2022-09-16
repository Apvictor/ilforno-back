<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-name">
          <?php
          $usuario = $this->core_model->getby('users', array('id' => $this->session->userdata('user_id')));

          ?>
          <p class="name text-light">Olá, <?php echo $usuario->first_name; ?>!</p>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('restrita/home') ?>">
        <i class="fa fa-home menu-icon"></i>
        <span class="menu-title">Home</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('restrita/usuarios') ?>">
        <i class="fas fa-users menu-icon"></i>
        <span class="menu-title">Administradores</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('restrita/slideshow') ?>">
        <i class="fas fa-images menu-icon"></i>
        <span class="menu-title">&nbsp;Slideshow</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('restrita/contato') ?>">
        <i class="fa fa-envelope menu-icon"></i>
        <span class="menu-title">Contato</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('restrita/social') ?>">
        <i class="fab fa-facebook menu-icon"></i>
        <span class="menu-title">&nbsp;Redes Sociais</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('restrita/empreendimentos') ?>">
        <i class="fas fa-building menu-icon"></i>
        <span class="menu-title">&nbsp;Empreendimentos</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('restrita/sobre') ?>">
        <i class="fas fa-university menu-icon"></i>
        <span class="menu-title">&nbsp;Sobre</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('restrita/diferenciais') ?>">
        <i class="fas fa-list menu-icon"></i>
        <span class="menu-title">&nbsp;Diferenciais</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('restrita/estagios') ?>">
        <i class="fas fa-percent menu-icon"></i>
        <span class="menu-title">&nbsp;Estágios</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('restrita/assuntos') ?>">
        <i class="fas fa-list-ol menu-icon"></i>
        <span class="menu-title">&nbsp;Assuntos</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('restrita/parceiros') ?>">
        <i class="fas fa-handshake menu-icon"></i>
        <span class="menu-title">&nbsp;Parceiros</span>
      </a>
    </li>
  </ul>
</nav>