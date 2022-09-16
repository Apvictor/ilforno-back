<script src="<?php echo base_url('assets/vendors/ckeditor/build/ckeditor.js'); ?>"></script>
<style>
  .ck-editor__editable_inline{
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

        <?php echo form_open('restrita/parceiros/editar/'.$parceiro->id, $atributos);
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
              <ul style="list-style: none; display: inline-block;">
                <li>
                  <img src="<?php echo base_url('uploads/empreendimentos/parceiros/'.$parceiro->logo);?>" width="80" class="img-thumbnail mr-1 mb-2">
                  <input type="hidden" name="logo" value="<?php echo $parceiro->logo; ?>">
                  <a href="javascript:(void)" class="btn btn-danger d-block btn-icon p-2 mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                </li>
              </ul>
            </div>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Título</label>
          <input type="text" class="form-control" name="titulo" value="<?php echo $parceiro->titulo;?>">
          <?php echo form_error('titulo', '<div class="text-danger">', '</div>');?>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Link</label>
          <input type="text" class="form-control" name="link" value="<?php echo $parceiro->link;?>">
          <?php echo form_error('link', '<div class="text-danger">', '</div>');?>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
        <a class="btn btn-light" href="<?php echo base_url('restrita/diferenciais');?>">Voltar</a>
      </form>
    </div>
  </div>
</div>

<script>

    function cria_titulo(id){
    ClassicEditor
        .create( document.querySelector( id ), {
          toolbar:{
            items: [
              
              'bold',
              'italic',
              'link',
              '|',
              'undo',
              'redo'
            ]
          },
          language:'pt-br',
          image:{
            toolbar:[
              'imageTextAlternative',
              'imageStyle:full',
              'imageStyle:side'
            ]
          },
          table:{
            contentToolbar:[
              'tableColumn',
              'tableRow',
              'mergeTableCells',
              'tableProperties'
            ]
          },
          extraPlugins: [ ],
          licenseKey: '',
        } )
        .then( editor => {
          window.editor = editor;
        } );
    }

    cria_titulo('#titulo');

</script>
