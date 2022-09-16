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

        <?php echo form_open('restrita/galeria/cadastrar_legendas/'.$empreendimento_id, $atributos);
        ?>
        <input type="hidden" name="confirma" value="1">
        <div class="row mb-5">
          <?php
          foreach($fotos as $foto){
            if(empty($foto->descricao)):
          ?>  
          <input type="hidden" name="foto_id[]" value="<?php echo $foto->id;?>"> 
          <div class="col-lg-6 card-icone-sobre">
            <div class="text-center p-2">
              <img src="<?php echo base_url('uploads/empreendimentos/fotos/'.$foto->imagem);?>" width="100px">
            </div>

            <div class="form-group">
              <label for="exampleTextarea1">Descrição</label>
              <input class="form-control" type="text" name="descricao[]" value="<?php echo set_value('descricao');?>">
              <?php echo form_error('descricao', '<div class="text-danger">', '</div>');?>
            </div>
          </div>

          <?php
          endif;
          }
          ?>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
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

    cria_caixa('#descricao');

</script>