<script src="<?php echo base_url('assets/vendors/ckeditor/build/ckeditor.js'); ?>"></script>
<style>
  .ck-editor__editable_inline {
    min-height: 120px;
  }
</style>

<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <?php echo $titulo; ?>
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a><?php echo $titulo; ?></a></li>
        <li class="breadcrumb-item"><a><?php echo 'Lista de ' . $titulo; ?></a></li>
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

        <?php echo form_open('restrita/assuntos/editar/' . $assunto->id, $atributos);
        ?>

        <div class="form-group">
          <div class="row">

            <div class="col-12 col-lg-4 col-xs-4">
              <label>Título</label>
              <input type="text" name="titulo" placeholder="Digite o título" class="form-control" value="<?php echo $assunto->titulo ?>">
              <?php echo form_error('titulo', '<div class="text-danger">', '</div>'); ?>
            </div>

            <div class="col-12 col-lg-4 col-xs-4">
              <label>WhatsApp</label>
              <input type="text" name="whatsapp" placeholder="Digite o nº do whatsapp" class="form-control sp_celphones" value="<?php echo $assunto->whatsapp ?>">
              <?php echo form_error('whatsapp', '<div class="text-danger">', '</div>'); ?>
            </div>

            <div class="col-12 col-lg-4 col-xs-4">
              <label>E-mail</label>
              <input type="text" name="email" placeholder="Digite o e-mail" class="form-control" value="<?php echo $assunto->email ?>">
              <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
            </div>

          </div>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
        <a class="btn btn-light" href="<?php echo base_url('restrita/assuntos'); ?>">Voltar</a>
        </form>
      </div>
    </div>
  </div>

  <script>
    function cria_titulo(id) {
      ClassicEditor
        .create(document.querySelector(id), {
          toolbar: {
            items: [

              'bold',
              'italic',
              'link',
              '|',
              'undo',
              'redo'
            ]
          },
          language: 'pt-br',
          image: {
            toolbar: [
              'imageTextAlternative',
              'imageStyle:full',
              'imageStyle:side'
            ]
          },
          table: {
            contentToolbar: [
              'tableColumn',
              'tableRow',
              'mergeTableCells',
              'tableProperties'
            ]
          },
          extraPlugins: [],
          licenseKey: '',
        })
        .then(editor => {
          window.editor = editor;
        });
    }

    cria_titulo('#titulo');
  </script>