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
    <a class="btn btn-dark" href="<?php echo base_url('restrita/sobre');?>"><i class="fas fa-arrow-left mr-3"></i>Voltar</a>
    <div class="card-body">
      <h4 class="card-title" style="text-transform: none;"><?php echo $subtitulo; ?></h4>
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
          <div class="col-lg-2">
            <a class="btn btn-primary btn-fw p-2" href="<?php echo base_url('restrita/historia/cadastrar'); ?>"><i class="fas fa-plus mr-3"></i>Adicionar</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>Ano</th>
                  <th>Ícone</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
               <?php
               foreach ($historias as $historia) {
                 ?>
                  <tr>
                    <td><?php echo $historia->ano;?></td>
                    <td><img src="<?php echo base_url('uploads/sobre/historia/'.$historia->icone);?>"></td>
                    <td>
                      <button class="btn btn-danger p-2" onclick="showSwal('warning-message-and-cancel', 'historia', <?php echo $historia->id;?>, 'delete')"><i class="fas fa-trash-alt"></i></button>
                      <a class="btn btn-info p-2" href="<?php echo base_url('restrita/historia/editar/'.$historia->id);?>"><i class="fas fa-pencil-alt btn-icon-append"></i></a>
                    </td>
                  </tr>
                   <?php 
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