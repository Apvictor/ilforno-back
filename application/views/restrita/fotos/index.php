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
    <a class="btn btn-dark" href="<?php echo base_url('restrita/empreendimentos');?>"><i class="fas fa-arrow-left mr-3"></i>Voltar</a>
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

      <div class="row mb-4">
        <div class="col-lg-2">
          <a class="btn btn-primary btn-fw p-2" href="<?php echo base_url('restrita/galeria/cadastrar_fotos'); ?>"><i class="fas fa-plus mr-3"></i>Adicionar</a>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Empreedimento</th>
                  <th>Foto</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
               <?php
               foreach ($fotos as $foto) {
                 ?>
                  <tr>
                    <td><?php echo $foto->id;?></td>
                    <td><?php echo $this->core_model->getby('empreendimentos',array('id'=>$foto->empreendimento_id))->nome;?></td>
                    <td><img src="<?php echo base_url('uploads/empreendimentos/fotos/'.$foto->imagem);?>"> | <b><?php echo (empty($foto->descricao)? 'Sem legenda' : word_limiter($foto->descricao,4));?></b></td>
                    <td>
                      <button class="btn btn-danger p-2" onclick="showSwal('warning-message-and-cancel', 'galeria', <?php echo $foto->id;?>, 'delete')"><i class="fas fa-trash-alt"></i></button>
                      <a class="btn btn-info p-2" href="<?php echo base_url('restrita/galeria/editar/'.$foto->id);?>"><i class="fas fa-pencil-alt btn-icon-append"></i></a>
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