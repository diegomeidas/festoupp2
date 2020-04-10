<?php
  require_once "header.php";
  $id = (isset($_POST['id'])) ? $_POST['id'] : '';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Usuários
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/users">Usuários</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/admin/images/create" class="btn btn-success" id="btnAddImage">Adicionar Imagem</a>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#" id="btnAdicionarImg">
                Adicionar
              </button>
              
            </div>
            <a href="/admin/images" class="btn btn-primary" id="btnModalGaleria">Galeria</a>
            <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="" id="btnModalGaleria">
              Galeria
            </button>-->

            <div class="box-body no-padding">

              <!-- 

                <div class="row">
                  <div class="col-md-4">
                    <h3>Banner</h3>
                    <img src="/res/admin/dist/img/photo4.jpg" alt="..." class="img-thumbnail">
                  </div>
                  <div class="col-md-3"></div>
                  <div class="col-md-4">
                    <h3>Logotipo</h3>
                    <img src="/res/admin/dist/img/photo4.jpg" alt="..." class="img-thumbnail">
                  </div>
                </div>              --> 
                
                <h3>Galeria</h3>
                <div class="" id="imgModalAdd">

                <!--

                  {loop="$imagens"}
                  <div class="col-md-3" style="margin-top: 30px; max-width: 300px; margin-right: 5px; margin-left: 5px; border: 1px solid black; border-radius: 5px;">
                    <div style="padding: 10px">
                      <img src="{$value.caminho}{$value.codigo}" alt="Galeria" class="img-thumbnail" id="" style="max-height: 200px;">
                      <div class="row">              
                        <div class="col-md-12">
                          <button type="button" style="margin-top: 5px; background-color: lightgray;"
                          class="btn btn-default form-control btnEscolha" onClick="ProdutoEscolhido(' + i + ')">Editar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  {/loop}
                -->

                  <?php 

/*
                  require_once "C:festoupp/vendor/festoupp/php-classes/src/Model/Servico.php";    
                  
                  //$id = (isset($_POST['id'])) ? $_POST['id'] : '';

                  $servico = Servico::listImg($id); 
                  $counter1=-1;  
                  if( isset($servico) && ( is_array($servico) || $servico instanceof Traversable ) && sizeof($servico) ) 
                      foreach( $servico as $key1 => $value1 )
                      { 
                          $counter1++; 
                          ?>
                          <div class="col-md-3" style="margin-top: 30px; max-width: 300px; margin-right: 5px; margin-left: 5px; border: 1px solid black; border-radius: 5px;">
                            <div style="padding: 10px">
                            <img src="<?php echo htmlspecialchars($value1["caminho_img"].$value1["codigo_img"], ENT_COMPAT, 'UTF-8', FALSE ); ?> " alt="Galeria" class="img-thumbnail" id="" style="max-height: 200px;">

                              <div class="row">              
                                <div class="col-md-12">
                                  <button type="button" style="margin-top: 5px; background-color: lightgray;"
                                  class="btn btn-default form-control btnEscolha" onClick="ProdutoEscolhido(' + i + ')">Editar</button>
                                </div>
                              </div>
                            </div>
                          </div>                          
                         
                          <?php 
                          
                      } 
                      */?>

                  
                </div>
                <div class="" id="result">
                  
                </div>
            
              
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- Modal Galeria-->
<div class="modal fade" id="modalGaleria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgModalTitle">Imagens de </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-4">
            <h3>Banner</h3>
            <img src="/res/admin/dist/img/photo4.jpg" alt="..." class="img-thumbnail">
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-4">
            <h3>Logotipo</h3>
            <img src="/res/admin/dist/img/photo4.jpg" alt="..." class="img-thumbnail">
          </div>
        </div>              
        
        <h3>Galeria</h3>
        <div class="" id="imgModalAdd">
          
        </div>
        <div class="" id="result">
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Adicionar imagem-->
<div class="modal fade" id="modalAdicioar" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarImg" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgModalTitle">Imagens de </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" action="/admin/images/create" enctype='multipart/form-data' method="post">
          <div class="box-body">

            <div class="row" style="margin-top: 20px;">
              <div class="radio-inline radio-group" style="border: 1px solid black; border-radius: 5px; padding: 5px; left: 15px;"> <!---->
                <p>Tipo de imagem </p>
                <label class="radio-inline">
                <input type="radio" name="RadioOptions" id="inlineRadio1" value="1" checked> Galeria
              </label>
              <label class="radio-inline">
                <input type="radio" name="RadioOptions" id="inlineRadio2" value="2"> Banner
              </label>
              <label class="radio-inline">
                <input type="radio" name="RadioOptions" id="inlineRadio3" value="3"> Logotipo
              </label>
            </div>
            </div>

            <div class="form-group col-md-5" style="border: 1px solid black; border-radius: 5px; margin-top: 20px;">
              <label for="foto">Imagem</label>
              <input class="btn" type='file' name='foto' value='Cadastrar foto' style="border-radius: 5px;">
            </div>

          </div>
          
          <div class="box-footer">
            <button type="submit" name='submit' class="btn btn-success">Cadastrar</button>
          </div>
        
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>





<?php
  require_once "footer.php";
?>

<script src="/res/admin/dist/js/imagem.js"></script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>