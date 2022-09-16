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

        <?php echo form_open('restrita/galeria/cadastrar_fotos/', $atributos);
        ?>

        <div class="form-group">
          <label>Empreendimento</label>
          <select name="empreendimento_id" class="form-control">
            <option value="">Selecione um empreendimento</option>
            <?php 
            foreach($empreendimentos as $empreendimento){
            ?>
            <option value="<?php echo $empreendimento->id;?>" <?php echo set_select('empreendimento_id',$empreendimento->id, false);?>><?php echo $empreendimento->nome;?></option>
            <?php
            }
            ?>
          </select>
          <?php echo form_error('empreendimento_id','<div class="text-danger">', '</div>');?>
        </div>
        
        <div class="form-group">
          <label>Importe as fotos da galeria</label>
          <div id="fileuploader_fotos">
            
          </div>
          <div id="erro_uploaded_fotos" class="text-danger">

          </div>
          <?php echo form_error('fotos', '<div class="text-danger">', '</div>');?>
        </div>
        <div class="form-group col-md-12">
            <div id="uploaded_image_fotos" class="text-danger">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Continuar</button>
        <a class="btn btn-light" href="<?php echo base_url('restrita/galeria');?>">Voltar</a>
      </form>
    </div>
  </div>
</div>
