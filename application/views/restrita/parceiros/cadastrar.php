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
        <p class="card-description">
          Digite as informações para adicionar <?php echo $titulo; ?>
        </p>
        <?php 

        $atributos = array(
          'name' => 'form_cadastrar',
          'class' => 'forms-sample'
        );

        ?>

        <?php echo form_open('restrita/parceiros/cadastrar/', $atributos);
        ?>
        
        <div class="form-group">
          <label>Logo do parceiro</label>
          <div id="fileuploader_parceiros">
            
          </div>
          <div id="erro_uploaded_parceiros" class="text-danger">

          </div>
          <?php echo form_error('logo', '<div class="text-danger">', '</div>');?>
        </div>
        <div class="form-group col-md-12">
            <div id="uploaded_image_parceiros" class="text-danger">
            </div>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Título</label>
          <input type="text" class="form-control" name="titulo" placeholder="Digite o título" value="<?php echo set_value('titulo');?>">
          <?php echo form_error('titulo', '<div class="text-danger">', '</div>');?>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Link</label>
          <input type="text" class="form-control" name="link" placeholder="Digite o link" value="<?php echo set_value('link');?>">
          <?php echo form_error('link', '<div class="text-danger">', '</div>');?>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
        <a class="btn btn-light" href="<?php echo base_url('restrita/parceiros');?>">Voltar</a>
      </form>
    </div>
  </div>
</div>
