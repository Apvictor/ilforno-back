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
        <!-- Envia mensagem de erro -->
        <?php if($message = $this->session->flashdata('erro')){?>
          <div class="alert alert-fill-danger" role="alert">
            <i class="fa fa-exclamation-triangle"></i>
            <?php echo $message; ?>
            <button class="close" data-dismiss="alert">
              <span>&times;</span>
            </button>
          </div>
        <?php } ?>
        <!-- Envia mensagem de erro -->
        <?php if($message = $this->session->flashdata('sucesso')){?>
          <div class="alert alert-fill-success" role="alert">
            <i class="fas fa-check"></i>
            <?php echo $message; ?>
            <button class="close" data-dismiss="alert">
              <span>&times;</span>
            </button>
          </div>
        <?php } ?>
        <p class="card-description">
          Digite as informações para adicionar <?php echo $titulo; ?>
        </p>
        <?php 

        $atributos = array(
          'name' => 'form_cadastrar',
          'class' => 'forms-sample'
        );

        ?>

        <?php echo form_open('restrita/contato', $atributos);
        ?>
        <div class="form-group">
          <div class="row">
            <div class="col-12 col-lg-6 col-xs-12">
              <label>Telefone</label>
              <input type="text" name="telefone" placeholder="Digite o nº do telefone" class="form-control phone_with_ddd" value="<?php echo $contato->telefone;?>">
              <?php echo form_error('telefone', '<div class="text-danger">', '</div>');?>
            </div>
            <div class="col-12  col-lg-6 col-xs-12">
              <label>Whatsapp</label>
              <input type="text" name="whatsapp" placeholder="Digite o nº do whatsapp" class="form-control sp_celphones" value="<?php echo $contato->whatsapp;?>">
              <?php echo form_error('whatsapp', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>E-mail</label>
              <input type="email" name="email" placeholder="Digite o e-mail" class="form-control" value="<?php echo $contato->email;?>">
              <?php echo form_error('email', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Endereço</label>
              <input type="text" name="endereco" placeholder="Digite o endereço" class="form-control" value="<?php echo $contato->endereco;?>">
              <?php echo form_error('endereco', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12 col-lg-10 col-xs-10">
              <label>Cidade</label>
              <input type="text" name="cidade" placeholder="Digite a Cidade" class="form-control" value="<?php echo $contato->cidade;?>">
              <?php echo form_error('cidade', '<div class="text-danger">', '</div>');?>
            </div>
            <div class="col-12  col-lg-2 col-xs-2">
              <label>UF</label>
              <input type="text" name="uf" placeholder="Digite a UF" class="form-control" value="<?php echo $contato->uf;?>">
              <?php echo form_error('uf', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
      </form>
    </div>
  </div>
</div>