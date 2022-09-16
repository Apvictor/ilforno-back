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
        <li class="breadcrumb-item active" aria-current="page"><?php echo $subtitulo; ?></li>
      </ol>
    </nav>

  </div>

  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Informações complementares:</h4>
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

        <div class="row mb-4">
          <div class="col-lg-2">
            <a class="btn btn-primary btn-fw p-2" href="<?php echo base_url('restrita/premios'); ?>"><i class="fas fa-trophy mr-3"></i>Prêmios</a>
          </div>
          <div class="col-lg-2">
            <a class="btn btn-primary btn-fw p-2" href="<?php echo base_url('restrita/certificados'); ?>"><i class="fas fa-certificate mr-3"></i>Certificados</a>
          </div>
          <div class="col-lg-2">
            <a class="btn btn-primary btn-fw p-2" href="<?php echo base_url('restrita/historia'); ?>"><i class="fas fa-calendar mr-3"></i>Linha do tempo</a>
          </div>
        </div>



        <p class="card-description">
          Digite as informações para adicionar <?php echo $titulo; ?>
        </p>
        <?php 

        $atributos = array(
          'name' => 'form_cadastrar',
          'class' => 'forms-sample'
        );

        ?>

        <?php echo form_open('restrita/sobre', $atributos);
        ?>
        <div class="form-group">
          <div class="row">
            <div class="col-12 col-lg-12 col-xs-12">
              <label>Titulo</label>
              <textarea class="form-control" id="titulo" placeholder="Digite o título" name="titulo" rows="6"><?php echo $sobre->titulo;?></textarea>
              <?php echo form_error('titulo', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Banner principal</label>
          <div id="fileuploader_banner">
            
          </div>
          <div id="erro_uploaded_banner" class="text-danger">

          </div>
          <?php echo form_error('banner', '<div class="text-danger">', '</div>');?>
        </div>
        <div class="form-group col-md-12">
            <div id="uploaded_image_banner" class="text-danger">
              <ul style="list-style: none; display: inline-block;">
                <li>
                  <?php 
                  if(empty($sobre->banner)){
                  ?>
                  <small>Nenhuma imagem salva por aqui</small>
                  <?php
                  }else{
                  ?>
                  <img src="<?php echo base_url('uploads/sobre/'.$sobre->banner);?>" width="80" class="img-thumbnail mr-1 mb-2">
                  <input type="hidden" name="banner" value="<?php echo $sobre->banner; ?>">
                  <a href="javascript:(void)" class="btn btn-danger d-block btn-icon p-2 mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                  <?php
                  }
                  ?>
                </li>
              </ul>
            </div>
        </div>
        <hr>
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Título 2:</label>
              <textarea class="form-control" id="titulo2" placeholder="Digite o título" name="titulo2" rows="6"><?php echo $sobre->titulo2;?></textarea>
              <?php echo form_error('titulo2', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Texto</label>
          <textarea class="form-control" id="texto" placeholder="Digite o texto" name="texto" rows="6"><?php echo $sobre->texto;?></textarea>
          <?php echo form_error('texto', '<div class="text-danger">', '</div>');?>
        </div>
        <hr>
        <div class="form-group">
          <div class="row">
            <div class="col-12 col-lg-3 card-icone-sobre">
              <div class="form-group text-center">
                <label>Ícone 1</label>
                <div id="fileuploader_icone1">
                  
                </div>
                <div id="erro_uploaded_icone1" class="text-danger">

                </div>
                <?php echo form_error('icone_item1', '<div class="text-danger">', '</div>');?>
              </div>
              <div class="form-group text-center">
                  <div id="uploaded_image_icone1" class="text-danger">
                    <ul style="list-style: none; display: inline-block;">
                      <li>
                        <?php 
                        if(empty($sobre->icone_item1)){
                        ?>
                        <small>Nenhuma imagem salva por aqui</small>
                        <?php
                        }else{
                        ?>
                        <img src="<?php echo base_url('uploads/sobre/'.$sobre->icone_item1);?>" width="80" class="img-thumbnail mr-1 mb-2">
                        <input type="hidden" name="icone_item1" value="<?php echo $sobre->icone_item1; ?>">
                        <a href="javascript:(void)" class="btn btn-danger d-block btn-icon p-2 mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                        <?php
                        }
                        ?>
                      </li>
                    </ul>
                  </div>
              </div>
              <div class="form-group text-center">
                <input type="text" name="titulo_item1" placeholder="Digite o título" class="form-control" value="<?php echo $sobre->titulo_item1;?>">
                <?php echo form_error('titulo_item1', '<div class="text-danger">', '</div>');?>
              </div>
            </div>
            <div class="col-12 col-lg-3 card-icone-sobre">
              <div class="form-group text-center">
                <label>Ícone 2</label>
                <div id="fileuploader_icone2">
                  
                </div>
                <div id="erro_uploaded_icone2" class="text-danger">

                </div>
                <?php echo form_error('icone_item2', '<div class="text-danger">', '</div>');?>
              </div>
              <div class="form-group text-center">
                  <div id="uploaded_image_icone2" class="text-danger">
                    <ul style="list-style: none; display: inline-block;">
                      <li>
                        <?php 
                        if(empty($sobre->icone_item2)){
                        ?>
                        <small>Nenhuma imagem salva por aqui</small>
                        <?php
                        }else{
                        ?>
                        <img src="<?php echo base_url('uploads/sobre/'.$sobre->icone_item2);?>" width="80" class="img-thumbnail mr-1 mb-2">
                        <input type="hidden" name="icone_item2" value="<?php echo $sobre->icone_item2; ?>">
                        <a href="javascript:(void)" class="btn btn-danger d-block btn-icon p-2 mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                        <?php
                        }
                        ?>
                      </li>
                    </ul>
                  </div>
              </div>
              <div class="form-group text-center">
                <input type="text" name="titulo_item2" placeholder="Digite o título" class="form-control" value="<?php echo $sobre->titulo_item2;?>">
                <?php echo form_error('titulo_item2', '<div class="text-danger">', '</div>');?>
              </div>
            </div>
            <div class="col-12 col-lg-3 card-icone-sobre">
              <div class="form-group text-center">
                <label>Ícone 3</label>
                <div id="fileuploader_icone3">
                  
                </div>
                <div id="erro_uploaded_icone3" class="text-danger">

                </div>
                <?php echo form_error('icone_item3', '<div class="text-danger">', '</div>');?>
              </div>
              <div class="form-group text-center">
                  <div id="uploaded_image_icone3" class="text-danger">
                    <ul style="list-style: none; display: inline-block;">
                      <li>
                        <?php 
                        if(empty($sobre->icone_item3)){
                        ?>
                        <small>Nenhuma imagem salva por aqui</small>
                        <?php
                        }else{
                        ?>
                        <img src="<?php echo base_url('uploads/sobre/'.$sobre->icone_item3);?>" width="80" class="img-thumbnail mr-1 mb-2">
                        <input type="hidden" name="icone_item3" value="<?php echo $sobre->icone_item3; ?>">
                        <a href="javascript:(void)" class="btn btn-danger d-block btn-icon p-2 mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                        <?php
                        }
                        ?>
                      </li>
                    </ul>
                  </div>
              </div>
              <div class="form-group text-center">
                <input type="text" name="titulo_item3" placeholder="Digite o título" class="form-control" value="<?php echo $sobre->titulo_item3;?>">
                <?php echo form_error('titulo_item3', '<div class="text-danger">', '</div>');?>
              </div>
            </div>
            <div class="col-12 col-lg-3 card-icone-sobre">
              <div class="form-group text-center">
                <label>Ícone 4</label>
                <div id="fileuploader_icone4">
                  
                </div>
                <div id="erro_uploaded_icone4" class="text-danger">

                </div>
                <?php echo form_error('icone_item4', '<div class="text-danger">', '</div>');?>
              </div>
              <div class="form-group text-center">
                  <div id="uploaded_image_icone4" class="text-danger">
                    <ul style="list-style: none; display: inline-block;">
                      <li>
                        <?php 
                        if(empty($sobre->icone_item4)){
                        ?>
                        <small>Nenhuma imagem salva por aqui</small>
                        <?php
                        }else{
                        ?>
                        <img src="<?php echo base_url('uploads/sobre/'.$sobre->icone_item4);?>" width="80" class="img-thumbnail mr-1 mb-2">
                        <input type="hidden" name="icone_item4" value="<?php echo $sobre->icone_item4; ?>">
                        <a href="javascript:(void)" class="btn btn-danger d-block btn-icon p-2 mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                        <?php
                        }
                        ?>
                      </li>
                    </ul>
                  </div>
              </div>
              <div class="form-group text-center">
                <input type="text" name="titulo_item4" placeholder="Digite o título" class="form-control" value="<?php echo $sobre->titulo_item4;?>">
                <?php echo form_error('titulo_item4', '<div class="text-danger">', '</div>');?>
              </div>
            </div>
          </div>
        </div>

        <hr>


        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Título 3:</label>
              <textarea id="titulo3" name="titulo3" placeholder="Digite o título 3" class="form-control"><?php echo $sobre->titulo3;?></textarea>
              <?php echo form_error('titulo3', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <label>Nome do fundador:</label>
              <textarea id="nome" name="nome" placeholder="Digite o nome do fundador" class="form-control"><?php echo $sobre->nome;?></textarea>
              <?php echo form_error('nome', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Texto 2</label>
          <textarea class="form-control" id="texto2" name="texto2" rows="6"><?php echo $sobre->texto2;?></textarea>
          <?php echo form_error('texto2', '<div class="text-danger">', '</div>');?>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12 col-lg-4">
              <label>Projetos realizados:</label>
              <input type="text" name="projetos_realizados" placeholder="Digite o número" class="form-control" value="<?php echo $sobre->projetos_realizados;?>">
              <?php echo form_error('projetos_realizados', '<div class="text-danger">', '</div>');?>
            </div>
            <div class="col-12 col-lg-4">
              <label>Unidades entregues:</label>
              <input type="text" name="unidades_entregues" placeholder="Digite o número" class="form-control" value="<?php echo $sobre->unidades_entregues;?>">
              <?php echo form_error('unidades_entregues', '<div class="text-danger">', '</div>');?>
            </div>
            <div class="col-12 col-lg-4">
              <label>M² construídos:</label>
              <input type="text" name="metros_construidos" placeholder="Digite número" class="form-control" value="<?php echo $sobre->metros_construidos;?>">
              <?php echo form_error('metros_construidos', '<div class="text-danger">', '</div>');?>
            </div>
          </div>
        </div>

        <hr>

        <div class="form-group">
          <label for="exampleTextarea1">Misssão</label>
          <textarea class="form-control" id="missao" name="missao" rows="6"><?php echo $sobre->missao;?></textarea>
          <?php echo form_error('missao', '<div class="text-danger">', '</div>');?>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Visão</label>
          <textarea class="form-control" id="visao" name="visao" rows="6"><?php echo $sobre->visao;?></textarea>
          <?php echo form_error('visao', '<div class="text-danger">', '</div>');?>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Valores</label>
          <textarea class="form-control" id="valores" name="valores" rows="6"><?php echo $sobre->valores;?></textarea>
          <?php echo form_error('valores', '<div class="text-danger">', '</div>');?>
        </div>

        <hr>

         <div class="form-group">
          <label>Ícone de sustentabilidade</label>
          <div id="fileuploader_sustentabilidade">
            
          </div>
          <div id="erro_uploaded_sustentabilidade" class="text-danger">

          </div>
          <?php echo form_error('icone_sustentabilidade', '<div class="text-danger">', '</div>');?>
        </div>
        <div class="form-group col-md-12">
            <div id="uploaded_image_sustentabilidade" class="text-danger">
              <ul style="list-style: none; display: inline-block;">
                <li>
                  <?php 
                  if(empty($sobre->icone_sustentabilidade)){
                  ?>
                  <small>Nenhuma imagem salva por aqui</small>
                  <?php
                  }else{
                  ?>
                  <img src="<?php echo base_url('uploads/sobre/'.$sobre->icone_sustentabilidade);?>" width="80" class="img-thumbnail mr-1 mb-2">
                  <input type="hidden" name="icone_sustentabilidade" value="<?php echo $sobre->icone_sustentabilidade; ?>">
                  <a href="javascript:(void)" class="btn btn-danger d-block btn-icon p-2 mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                  <?php
                  }
                  ?>
                </li>
              </ul>
            </div>
        </div>

        <div class="form-group">
          <label for="exampleTextarea1">Texto da Sustentabilidade</label>
          <textarea id="texto_sustentabilidade" name="texto_sustentabilidade" placeholder="Digite o texto" class="form-control"><?php echo $sobre->texto_sustentabilidade;?></textarea>
          <?php echo form_error('texto_sustentabilidade', '<div class="text-danger">', '</div>');?>
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

            cria_caixa('#missao');
            cria_caixa('#visao');
            cria_caixa('#valores');
            cria_caixa('#texto2');
            cria_caixa('#texto');
            cria_caixa('#texto_sustentabilidade');
            

            cria_titulo('#titulo');
            cria_titulo('#titulo2');
            cria_titulo('#titulo3');
            cria_titulo('#nome');

        </script>
        
        <button type="submit" class="btn btn-primary mr-2">Salvar</button>
      </form>
    </div>
  </div>
</div>