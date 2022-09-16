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

        <?php echo form_open('restrita/diferenciais/editar/'.$diferencial->id, $atributos);
        ?>
        
        <div class="form-group">
          <label>Imagem do diferencial</label>
          <div id="fileuploader_diferenciais">
            
          </div>
          <div id="erro_uploaded_diferenciais" class="text-danger">

          </div>
          <?php echo form_error('icone', '<div class="text-danger">', '</div>');?>
        </div>
        <div class="form-group col-md-12">
            <div id="uploaded_image_diferenciais" class="text-danger">
              <ul style="list-style: none; display: inline-block;">
                <li>
                  <img src="<?php echo base_url('uploads/empreendimentos/diferenciais/'.$diferencial->icone);?>" width="80" class="img-thumbnail mr-1 mb-2">
                  <input type="hidden" name="icone" value="<?php echo $diferencial->icone; ?>">
                  <a href="javascript:(void)" class="btn btn-danger d-block btn-icon p-2 mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                </li>
              </ul>
            </div>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Título</label>
          <textarea class="form-control" id="titulo" name="titulo" rows="6"><?php echo $diferencial->titulo;?></textarea>
          <?php echo form_error('titulo', '<div class="text-danger">', '</div>');?>
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
