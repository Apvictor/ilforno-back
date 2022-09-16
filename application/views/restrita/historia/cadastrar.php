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

        <?php echo form_open('restrita/historia/cadastrar/', $atributos);
        ?>
        
        <div class="form-group">
          <label>Imagem do história</label>
          <div id="fileuploader_historia">
            
          </div>
          <div id="erro_uploaded_historia" class="text-danger">

          </div>
          <?php echo form_error('icone', '<div class="text-danger">', '</div>');?>
        </div>
        <div class="form-group col-md-12">
            <div id="uploaded_image_historia" class="text-danger">
            </div>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Ano</label>
          <input class="form-control" type="number" name="ano" value="<?php echo set_value('ano');?>">
          <?php echo form_error('ano', '<div class="text-danger">', '</div>');?>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Texto</label>
          <textarea class="form-control" id="texto" name="texto" rows="6"><?php echo set_value('texto');?></textarea>
          <?php echo form_error('texto', '<div class="text-danger">', '</div>');?>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
        <a class="btn btn-light" href="<?php echo base_url('restrita/historia');?>">Voltar</a>
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