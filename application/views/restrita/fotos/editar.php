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

        <?php echo form_open('restrita/galeria/editar/'.$foto->id, $atributos);
        ?>
        
        <div class="form-group">
          <label>Foto da galeria</label>
          <div id="fileuploader_fotos">
            
          </div>
          <div id="erro_uploaded_fotos" class="text-danger">

          </div>
          <?php echo form_error('fotos', '<div class="text-danger">', '</div>');?>
        </div>
        <div class="form-group col-md-12">
            <div id="uploaded_image_fotos" class="text-danger">
              <ul style="list-style: none; display: inline-block;">
                <li>
                  <img src="<?php echo base_url('uploads/empreendimentos/fotos/'.$foto->imagem);?>" width="80" class="img-thumbnail mr-1 mb-2">
                  <input type="hidden" name="fotos" value="<?php echo $foto->imagem; ?>">
                  <a href="javascript:(void)" class="btn btn-danger d-block btn-icon p-2 mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                </li>
              </ul>
            </div>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Descrição</label>
          <input class="form-control" type="text" name="descricao" value="<?php echo $foto->descricao;?>">
          <?php echo form_error('descricao', '<div class="text-danger">', '</div>');?>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
        <a class="btn btn-light" href="<?php echo base_url('restrita/galeria');?>">Voltar</a>
      </form>
    </div>
  </div>
</div>
