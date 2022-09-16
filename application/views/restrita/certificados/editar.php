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

        <?php echo form_open('restrita/certificados/editar/'.$certificado->id, $atributos);
        ?>
        
        <div class="form-group">
          <label>Imagem do certificado</label>
          <div id="fileuploader_certificado">
            
          </div>
          <div id="erro_uploaded_certificado" class="text-danger">

          </div>
          <?php echo form_error('imagem', '<div class="text-danger">', '</div>');?>
        </div>
        <div class="form-group col-md-12">
            <div id="uploaded_image_certificado" class="text-danger">
              <ul style="list-style: none; display: inline-block;">
                <li>
                  <img src="<?php echo base_url('uploads/sobre/certificados/'.$certificado->imagem);?>" width="80" class="img-thumbnail mr-1 mb-2">
                  <input type="hidden" name="imagem" value="<?php echo $certificado->imagem; ?>">
                  <a href="javascript:(void)" class="btn btn-danger d-block btn-icon p-2 mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                </li>
              </ul>
            </div>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Texto</label>
          <textarea class="form-control" id="texto" name="texto" rows="6"><?php echo $certificado->texto;?></textarea>
          <?php echo form_error('texto', '<div class="text-danger">', '</div>');?>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
        <a class="btn btn-light" href="<?php echo base_url('restrita/certificados');?>">Voltar</a>
      </form>
    </div>
  </div>
</div>
<script>
  
  function cria_caixa(id){
    ClassicEditor
        .create( document.querySelector( id ), {
          toolbar:{
            items: [
              
              'bold',
              'italic',
              'link',
              'bulletedList',
              'numberedList',
              '|',
              'indent',
              'outdent',
              '|',
              'blockQuote',
              'insertTable',
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

    cria_caixa('#texto');

</script>