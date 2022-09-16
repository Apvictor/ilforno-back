<div class="content-wrapper">
    <div class="page-header">

        <h3 class="page-title">
            <?php    
            echo 'Seja bem vindo, '.$usuario->first_name.'!';
            ?>
            
        </h3>
    </div>
    
    <div class="row grid-margin">
        <div class="col-12">
            <div class="row">
                <div class="statistica col-lg-3">
                    <div class="row">
                       <h2 class="mr-5"><?php echo $administradores;?></h2>
                       <div class="ml-5">
                           <i class="fas fa-user"></i>
                       </div>
                    </div>
                    <div class="row mt-4">
                       <h5>Administradores</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>