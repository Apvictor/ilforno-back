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

        <?php echo form_open('restrita/slideshow/editar/'.$foto->id, $atributos);
        ?>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Título</label>
              <input type="text" name="titulo" placeholder="Digite o título" class="form-control" value="<?php echo $foto->titulo;?>">
              <?php echo form_error('titulo', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Subtítulo</label>
              <input type="text" name="subtitulo" placeholder="Digite o subtítulo" class="form-control" value="<?php echo $foto->subtitulo;?>">
              <?php echo form_error('subtitulo', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Descrição</label>
              <textarea name="descricao" placeholder="Digite a descrição" class="form-control"><?php echo $foto->descricao;?></textarea>
              <?php echo form_error('descricao', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Link do botão</label>
              <input type="text" name="link" placeholder="Digite o link" class="form-control" value="<?php echo $foto->link;?>">
              <?php echo form_error('link', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Imagem do Slide</label>
          <div id="fileuploader">
            
          </div>
          <div id="erro_uploaded" class="text-danger">

          </div>
          <?php echo form_error('imagem', '<div class="text-danger">', '</div>');?>
        </div>
        <div class="form-group col-md-12">
          <div id="uploaded_image" class="text-danger">
              <ul style="list-style: none; display: inline-block;">
                <li>
                  <img src="<?php echo base_url('uploads/slideshow/'.$foto->imagem)?>" width="80" class="img-thumbnail mr-1 mb-2">
                  <input type="hidden" name="imagem" value="<?php echo $foto->imagem; ?>">
                  <a href="javascript:(void)" class="btn btn-danger d-block btn-icon p-2 mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                </li>
              </ul>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="">Selecione um status</option>
                <option value="1" <?php echo ($foto->status==1 ? 'selected' : '');?>>Ativo</option>
                <option value="2" <?php echo ($foto->status==2 ? 'selected' : '');?>>Inativo</option>
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