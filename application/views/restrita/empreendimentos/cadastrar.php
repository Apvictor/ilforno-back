<script src="<?php echo base_url('assets/vendors/ckeditor/build/ckeditor.js'); ?>"></script>
<style>
  .ck-editor__editable_inline {
    min-height: 120px;
  }
</style>
<script type="text/javascript">
  function newInput(varorigem, vardestino) {
    var destino = document.getElementById(vardestino);
    var novadiv = document.createElement("div");
    var itens = document.getElementById(varorigem);
    novadiv.innerHTML = itens.innerHTML;
    destino.appendChild(novadiv);
  }

  function removeInput(vardestino) {
    var inputs = document.getElementById(vardestino);
    inputs.removeChild(inputs.lastChild);
  }
</script>
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

        <?php echo form_open('restrita/empreendimentos/cadastrar/', $atributos);
        ?>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Cidade</label>
              <select name="cidade_id" class="form-control">
                <option value="">Selecione uma cidade</option>
                <?php
                foreach ($cidades as $cidade) {
                ?>
                  <option value="<?php echo $cidade->id; ?>" <?php echo set_select('cidade_id', $cidade->id, false); ?>><?php echo $cidade->nome; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('cidade_id', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Categoria</label>
              <select name="categoria_id" class="form-control">
                <option value="">Selecione uma categoria</option>
                <option value="1" <?php echo set_select('categoria_id', '1', false); ?>>Residencial</option>
                <option value="2" <?php echo set_select('categoria_id', '2', false); ?>>Comercial</option>
              </select>
              <?php echo form_error('categoria_id', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Nome</label>
              <textarea class="form-control" id="nome" name="nome" placeholder="Digite o nome" rows="6"><?php echo set_value('nome'); ?></textarea>
              <?php echo form_error('nome', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Imagem do logo</label>
          <div id="fileuploader_logo">

          </div>
          <div id="erro_uploaded_logo" class="text-danger">

          </div>
          <?php echo form_error('logo', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="form-group col-md-12">
          <div id="uploaded_image_logo" class="text-danger">
          </div>
        </div>
        <div class="form-group">
          <label>Imagem do banner 1</label>
          <div id="fileuploader_bannerum">

          </div>
          <div id="erro_uploaded_bannerum" class="text-danger">
          </div>
          <?php echo form_error('banner1', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="form-group col-md-12">
          <div id="uploaded_image_bannerum" class="text-danger">
          </div>
        </div>
        <div class="form-group">
          <label>Imagem do banner 2</label>
          <div id="fileuploader_bannerdois">

          </div>
          <div id="erro_uploaded_bannerdois" class="text-danger">
          </div>
          <?php echo form_error('banner2', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="form-group col-md-12">
          <div id="uploaded_image_bannerdois" class="text-danger">
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12 col-lg-4 col-xs-4">
              <label>Metragem</label>
              <input type="text" name="metragem" placeholder="Digite a metragem" class="form-control" value="<?php echo set_value('metragem') ?>">
              <?php echo form_error('metragem', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="col-12 col-lg-4 col-xs-4">
              <label>Quartos</label>
              <input type="text" name="quartos" placeholder="Digite o nº de quartos" class="form-control" value="<?php echo set_value('quartos') ?>">
              <?php echo form_error('quartos', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="col-12 col-lg-4 col-xs-4">
              <label>Vagas</label>
              <input type="text" name="vagas" placeholder="Digite o nº de vagas" class="form-control" value="<?php echo set_value('vagas') ?>">
              <?php echo form_error('vagas', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Local</label>
              <input type="text" name="local" placeholder="Digite o nome do local" class="form-control" value="<?php echo set_value('local') ?>">
              <?php echo form_error('local', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Descrição</label>
              <textarea name="descricao" id="descricao" placeholder="Digite a descrição" class="form-control"><?php echo set_value('descricao') ?></textarea>
              <?php echo form_error('descricao', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12 col-lg-4 col-xs-4">
              <label>Instagram</label>
              <input type="text" name="instagram" placeholder="Digite o link do instagram" class="form-control" value="<?php echo set_value('instagram') ?>">
              <?php echo form_error('instagram', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="col-12 col-lg-4 col-xs-4">
              <label>Youtube</label>
              <input type="text" name="youtube" placeholder="Digite o link do  youtube" class="form-control" value="<?php echo set_value('youtube') ?>">
              <?php echo form_error('youtube', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="col-12 col-lg-4 col-xs-4">
              <label>Facebook</label>
              <input type="text" name="facebook" placeholder="Digite o link do Facebook" class="form-control" value="<?php echo set_value('facebook') ?>">
              <?php echo form_error('facebook', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-12 col-lg-6 col-xs-12">
              <label>E-mail Destinatário</label>
              <input type="text" name="email_destinatario" placeholder="Digite o e-mail" class="form-control" value="<?php echo set_value('email_destinatario') ?>">
              <?php echo form_error('email_destinatario', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="col-12 col-lg-6 col-xs-12">
              <label>WhatsApp</label>
              <input type="text" name="whatsapp" placeholder="Digite o nº do whatsapp" class="form-control sp_celphones" value="<?php echo set_value('whatsapp') ?>">
              <?php echo form_error('whatsapp', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">Ficha</label>
          <textarea class="form-control" id="ficha" name="texto_ficha" rows="6"><?php echo set_value('texto_ficha'); ?></textarea>
          <?php echo form_error('texto_ficha', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label>Imagem da Ficha</label>
          <div id="fileuploader_ficha">

          </div>
          <div id="erro_uploaded_ficha" class="text-danger">

          </div>
          <?php echo form_error('imagem_ficha', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="form-group col-md-12">
          <div id="uploaded_image_ficha" class="text-danger">
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12 col-lg-3">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="">Selecione um status</option>
                <option value="1" <?php echo set_select('status', '1', false); ?>>Lançamento em breve</option>
                <option value="2" <?php echo set_select('status', '2', false); ?>>Lançamento</option>
                <option value="3" <?php echo set_select('status', '3', false); ?>>Em construção</option>
                <option value="4" <?php echo set_select('status', '4', false); ?>>Pronto pra morar</option>
              </select>
              <?php echo form_error('status', '<div class="text-danger">', '</div>'); ?>
            </div>

            <div class="col-12 col-lg-3">
              <label>Hotsite</label>
              <select name="hotsite" class="form-control">
                <option value="">Selecione um item</option>
                <option value="1" <?php echo set_select('hotsite', '1', false); ?>>Ativo</option>
                <option value="0" <?php echo set_select('hotsite', '0', false); ?>>Inativo</option>
              </select>
              <?php echo form_error('hotsite', '<div class="text-danger">', '</div>'); ?>
            </div>

            <div class="col-12 col-lg-3">
              <label>Destaque</label>
              <select name="destaque" class="form-control">
                <option value="">Selecione um item</option>
                <option value="1" <?php echo set_select('destaque', '1', false) ?>>Destacar</option>
                <option value="2" <?php echo set_select('destaque', '2', false) ?>>Não destacar</option>
              </select>
              <?php echo form_error('destaque', '<div class="text-danger">', '</div>'); ?>
            </div>

            <div class="col-12 col-lg-3">
              <label>Ativação</label>
              <select name="ativacao" class="form-control">
                <option value="">Selecione um item</option>
                <option value="1" <?php echo set_select('ativacao', '1', false) ?>>Ativo</option>
                <option value="2" <?php echo set_select('ativacao', '2', false) ?>>Inativo</option>
              </select>
              <?php echo form_error('ativacao', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>

        <h3>Diferenciais</h3>

        <div id="diferenciais" class="form-group">
          <div class="row  mt-3">
            <div class="col-lg-12">
              <label for="exampleInputEmail3">Diferencial</label>
              <select name="diferenciais[]" class="form-control" id="produto_id">
                <option value="">Selecione um diferencial</option>
                <?php
                foreach ($diferenciais as $diferencial) {
                ?>
                  <option value="<?php echo $diferencial->id; ?>" <?php echo set_select('diferenciais[]', $diferencial->id, false); ?>><?php echo $diferencial->titulo; ?></option>
                <?php
                }
                ?>
              </select>

            </div>
          </div>
          <div class="row  mt-3">
            <div class="col-lg-12">
              <label for="exampleInputEmail3">Descrição</label>
              <textarea name="descricao_diferencial[]" placeholder="Digite a descrição" class="form-control descricao_diferencial"><?php echo set_value('descricao_diferencial') ?></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div id="newdiferencial"></div>
        </div>

        <div class="form-group">
          <a class="btn btn-info" style="color:white;" onclick="newInput('diferenciais','newdiferencial')"><i class="fas fa-plus"></i></a>
          <a class="btn btn-danger" style="color:white;" onclick="removeInput('newdiferencial')"><i class="fas fa-minus-circle"></i></a>
        </div>



        <h3>Estágios da Obra</h3>

        <div id="estagios" class="form-group">
          <div class="row  mt-3">
            <div class="col-lg-6">
              <label for="exampleInputEmail3">Estágio</label>
              <select name="estagios[]" class="form-control" id="produto_id" style="height: 45px;">
                <option value="">Selecione um estágio</option>
                <?php
                foreach ($estagios as $estagio) {
                ?>
                  <option value="<?php echo $estagio->id; ?>" <?php echo set_select('estagios[]', $estagio->id, false); ?>><?php echo $estagio->titulo; ?></option>
                <?php
                }
                ?>
              </select>

            </div>
            <div class="col-lg-6">
              <label for="exampleInputEmail3">Percentual</label>
              <input type="number" name="percentual_estagio[]" placeholder="Digite o Percentual" class="form-control"><?php echo set_value('percentual_estagio') ?></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div id="newestagio"></div>
        </div>

        <div class="form-group">
          <a class="btn btn-info" style="color:white;" onclick="newInput('estagios','newestagio')"><i class="fas fa-plus"></i></a>
          <a class="btn btn-danger" style="color:white;" onclick="removeInput('newestagio')"><i class="fas fa-minus-circle"></i></a>
        </div>

        <h3>Parceiros</h3>

        <div id="parceiros" class="form-group">
          <div class="row  mt-3">
            <div class="col-lg-12">
              <label for="exampleInputEmail3">Parceiro</label>
              <select name="parceiros[]" class="form-control">
                <option value="">Selecione um parceiro</option>
                <?php
                foreach ($parceiros as $parceiro) {
                ?>
                  <option value="<?php echo $parceiro->id; ?>" <?php echo set_select('parceiros[]', $parceiro->id, false); ?>><?php echo $parceiro->titulo; ?></option>
                <?php
                }
                ?>
              </select>

            </div>
          </div>
        </div>

        <div class="form-group">
          <div id="newparceiro"></div>
        </div>

        <div class="form-group">
          <a class="btn btn-info" style="color:white;" onclick="newInput('parceiros','newparceiro')"><i class="fas fa-plus"></i></a>
          <a class="btn btn-danger" style="color:white;" onclick="removeInput('newparceiro')"><i class="fas fa-minus-circle"></i></a>
        </div>




        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
        <a class="btn btn-light" href="<?php echo base_url('restrita/empreendimentos'); ?>">Voltar</a>
        </form>
      </div>
    </div>
  </div>

  <script>
    function cria_caixa(id) {
      ClassicEditor
        .create(document.querySelector(id), {
          toolbar: {
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

    cria_caixa('#ficha');
    cria_caixa('#descricao');

    //cria_caixa('.descricao_diferencial');

    cria_titulo('#nome');
  </script>