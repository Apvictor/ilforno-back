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

        <?php echo form_open('restrita/usuarios/cadastrar/', $atributos);
        ?>
        <div class="form-group row">
         <div class="col">
           <label>Nome</label>
           <div id="the-basics">
             <input class="typeahead" type="text" name="first_name" placeholder="Nome" value="<?php echo set_value('first_name')?>">
             <?php echo form_error('first_name', '<div class="text-danger">', '</div>');?>
           </div>
         </div>
         <div class="col">
           <label>Sobrenome</label>
           <div id="bloodhound">
             <input class="typeahead" type="text" name="last_name" placeholder="Sobrenome" value="<?php echo set_value('last_name')?>">
             <?php echo form_error('last_name', '<div class="text-danger">', '</div>');?>
           </div>
         </div>
       </div>
       <div class="form-group">
        <label for="exampleInputEmail3">Email</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="Email" value="<?php echo set_value('email')?>">
        <?php echo form_error('email', '<div class="text-danger">', '</div>');?>
      </div>
      <div class="form-group row">
       <div class="col">
         <label>Senha</label>
         <div id="the-basics">
           <input class="typeahead" type="password" name="password" placeholder="Senha" value="<?php echo set_value('password')?>">
           <?php echo form_error('password', '<div class="text-danger">', '</div>');?>
         </div>
       </div>
       <div class="col">
         <label>Confirmação de Senha</label>
         <div id="bloodhound">
           <input class="typeahead" type="password" name="confirm_password" placeholder="Confirmação de Senha" value="<?php echo set_value('confirm_password')?>">
           <?php echo form_error('confirm_password', '<div class="text-danger">', '</div>');?>
         </div>
       </div>
     </div>
     <button type="submit" class="btn btn-primary mr-2">Salvar</button>
     <a class="btn btn-light" href="<?php echo base_url('restrita/usuarios');?>">Voltar</a>
   </form>
 </div>
</div>
</div>