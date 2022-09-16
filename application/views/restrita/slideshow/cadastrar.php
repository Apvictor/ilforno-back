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

        <?php echo form_open('restrita/slideshow/cadastrar/', $atributos);
        ?>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Título</label>
              <input type="text" name="titulo" placeholder="Digite o título" class="form-control" value="<?php echo set_value('titulo')?>">
              <?php echo form_error('titulo', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Subtítulo</label>
              <input type="text" name="subtitulo" placeholder="Digite o subtítulo" class="form-control" value="<?php echo set_value('subtitulo')?>">
              <?php echo form_error('subtitulo', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Descrição</label>
              <textarea name="descricao" placeholder="Digite a descrição" class="form-control"><?php echo set_value('descricao')?></textarea>
              <?php echo form_error('descricao', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Link do botão</label>
              <input type="text" name="link" placeholder="Digite o link" class="form-control" value="<?php echo set_value('link')?>">
              <?php echo form_error('link', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Imagem do slideshow</label>
          <div id="fileuploader">
            
          </div>
          <div id="erro_uploaded" class="text-danger">

          </div>
          <?php echo form_error('imagem', '<div class="text-danger">', '</div>');?>
        </div>
        <div class="form-group col-md-12">
            <div id="uploaded_image" class="text-danger">
              
            </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="">Selecione um status</option>
                <option value="1">Ativo</option>
                <option value="2">Inativo</option>
              </select>
              <?php echo form_error('status', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
        <a class="btn btn-light" href="<?php echo base_url('restrita/slideshow');?>">Voltar</a>
      </form>
    </div>
  </div>
</div>