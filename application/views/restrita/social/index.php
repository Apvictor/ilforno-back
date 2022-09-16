<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <?php echo $titulo; ?>
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a><?php echo $titulo; ?></a></li>
        <li class="breadcrumb-item"><a><?php echo 'Lista de '.$titulo; ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $subtitulo; ?></li>
      </ol>
    </nav>

  </div>

  <div class="col-12 grid-margin stretch-card">
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
        <p class="card-description">
          Digite as informações para adicionar <?php echo $titulo; ?>
        </p>
        <?php 

        $atributos = array(
          'name' => 'form_cadastrar',
          'class' => 'forms-sample'
        );

        ?>

        <?php echo form_open('restrita/social', $atributos);
        ?>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Instagram</label>
              <input type="text" name="instagram" placeholder="Digite o link do Instagram" class="form-control" value="<?php echo $social->instagram;?>">
              <?php echo form_error('instagram', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Facebook</label>
              <input type="text" name="facebook" placeholder="Digite o link do Facebook" class="form-control" value="<?php echo $social->facebook;?>">
              <?php echo form_error('facebook', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>LinkedIn</label>
              <input type="text" name="linkedin" placeholder="Digite o link do LinkedIn" class="form-control" value="<?php echo $social->linkedin;?>">
              <?php echo form_error('linkedin', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
      </form>
    </div>
  </div>
</div>