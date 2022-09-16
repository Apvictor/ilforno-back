  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <?php echo $titulo; ?>
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a><?php echo $titulo; ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $subtitulo; ?></li>
        </ol>
      </nav>
    </div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?php echo $subtitulo; ?></h4>
        <!-- Envia mensagem de erro -->
        <?php if($message = $this->session->flashdata('erro')){?>
          <div class="alert alert-fill-danger" role="alert">
            <i class="fa fa-exclamation-triangle"></i>
            <?php echo $message; ?>
            <button class="close" data-dismiss="alert">
              <span>&times;</span>
            </button>
          </div>
        <?php } ?>
        <!-- Envia mensagem de erro -->
        <?php if($message = $this->session->flashdata('sucesso')){?>
          <div class="alert alert-fill-success" role="alert">
            <i class="fas fa-check"></i>
            <?php echo $message; ?>
            <button class="close" data-dismiss="alert">
              <span>&times;</span>
            </button>
          </div>
        <?php } ?>
        <div class="container">
         <div class="row mb-4">
          <a class="btn btn-primary btn-fw p-2" href="<?php echo base_url('restrita/usuarios/cadastrar');?>"><i class="fas fa-plus mr-3"></i>Adicionar</a>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($usuarios as $usuario) {
                  if($this->ion_auth->is_admin($usuario->id)){
                  ?>
                  <tr>
                    <td><?php echo $usuario->id; ?></td>
                    <td><?php echo $usuario->first_name.' '.$usuario->last_name; ?></td>
                    <td><?php echo $usuario->email; ?></td>
                    <td>
                      <?php
                      if ($usuario->active==1){
                        $status="Ativo";
                        $cor="badge-success";
                      }else{
                        $status="Inativo";
                        $cor="badge-danger";
                      }
                      ?>
                      <label class="badge <?php echo $cor; ?> badge-pill"><?php echo $status; ?></label>
                    </td>
                    <td>
                      <?php
                      if($usuario->id<>$this->session->userdata('user_id')):
                      ?>
                      <button class="btn btn-danger p-2" onclick="showSwal('warning-message-and-cancel', 'usuarios', <?php echo $usuario->id?>, 'delete')"><i class="fas fa-trash-alt"></i></button>
                      <?php
                      endif;
                      ?>
                      <a class="btn btn-info p-2" href="<?php echo base_url('restrita/usuarios/atualizar/'.$usuario->id);?>"><i class="fas fa-pencil-alt btn-icon-append"></i></a>
                    </td>
                  </tr>
                  <?php 
                }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>