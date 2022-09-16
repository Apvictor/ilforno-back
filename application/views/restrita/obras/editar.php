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

        <?php echo form_open('restrita/obras/editar/' . $obras->id, $atributos);
        ?>
        <div class="form-group">
          <div class="row">
            <div class="col-lg-4 col-xs-4">
              <label>Empreendimento</label>
              <select name="empreendimento_id" class="form-control">
                <option value="">Selecione um empreendimento</option>
                <?php
                foreach ($empreendimentos as $empreendimento) {
                ?>
                  <option value="<?php echo $empreendimento->id; ?>" <?php echo ($empreendimento->id == $obras->empreendimento_id ? 'selected' : ''); ?>><?php echo $empreendimento->nome; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('empreendimento_id', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12 col-lg-4 col-xs-4">
              <label>Caminho</label>
              <input type="text" name="caminho" placeholder="Digite o caminho" class="form-control" value="<?php echo $obras->caminho ?>">
              <?php echo form_error('caminho', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Editar</button>
        <a class="btn btn-light" href="<?php echo base_url('restrita/obra'); ?>">Voltar</a>
        </form>
      </div>
    </div>
  </div>