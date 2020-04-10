<?php
  
  require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/Model/User.php');

  User::verifyLogin();
  User::verifyAdmin();

  require_once "header.php";

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Destaques
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Destaque</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
        <div class="box-header">
          <a id="btnAddDestaque" class="btn btn-success">Cadastrar Destaque</a>
        </div>

        <div class="box-body no-padding">
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 200px">Cliente</th>
                <th>Serviço</th>
                <th>Tipo</th>
                <th>Início</th>
                <th>Fim</th>
                <th style="width: 140px">&nbsp;</th>
              </tr>
            </thead>
            <tbody id="tbody">                
              <!--implementado em JS-->
            </tbody>
          </table>
        </div>
          <!-- /.box-body -->
  	  </div>
    </div>
  </div>

  <div class="result"></div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--page scripts-->



<!-- Modal Adicionar/Alterar-->
<div class="modal fade" id="modalAddDestaque" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarImg" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      

      <div class="" style="background-color: #ecf0f5;">

        <div class="modal-header">
          <h3 class="modal-title">Cadastrar Destaque</h3>
        </div>

        <div class="modal-body">
          <!-- Main content -->
          <section class="content">

            <div class="row">            
              <div class="col-md-12" >
                <div class="box box-success" style="background-color: #ffffff !important;">
                  
                  <!-- form start -->
                  <div class="box-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">

                      <div>                         
                      
                        <div class="row">
                          <div class="form-group col-md-7">
                            <label for="cliente">Cliente</label>
                            <!--<input type="text" class="form-control" id="cliente" name="cliente" placeholder="Digite o nome">
                            
                            <select name="tipo" id="cliente" class="form-control">
                              <option selected value="1">Digite o nome</option>
                              </select>-->

                            <select name="tipo" id="cliente" class="form-control" >
                              <option value="">Selecione o Cliente</option>
                              <?php
                                require_once "C:festoupp/vendor/festoupp/php-classes/src/Model/Servico.php";
                                $serv = Servico::listCli();
                                                                
                                if(count($serv)){
                                  foreach ($serv as $res) {
                                ?>                                             
                                  <option value="<?php echo $res['id_cliente'];?>" ><?php echo $res['nome'];?></option> 
                                <?php      
                                  }
                                }
                              ?>
                            </select>
                              
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7">
                            <label for="cliente">Serviço</label>
                            <select name="servico" id="servico" class="form-control">

                            </select>
                          </div>
                        </div>

                        


                        <div class="form-group">
                          <div class="row">
                            <div class="form-group col-md-5">
                              <label>Date:</label>
                              <div class="input-group input-group-in btn-icon-left btn-default pull-right " >
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  <input id="datePicker" data-input="daterangepicker" class="form-control input-sm">
                              </div>
                            </div>                            
                          </div>
                        </div>

                        <div class="box-footer">
                          <button id="btnCadastrarDestaque" class="btn btn-success">Cadastrar</button>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
            </div>
          </section>
          <!-- /.content -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!--MODAL CONFIRM-->
<div class="modal" tabindex="-1" role="dialog" id="modalConfirm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirma exclusão?</h5>
      </div>
      <div class="modal-body">
        <p id="cliente"> </p>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnConfirm" class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="result"></div>


<?php
  require_once "footer.php";
?>

<script src="/res/admin/dist/js/destaque.js"></script>
<!-- <script src="/res/admin/dist/js/funcoes.js"></script>
 -->
<script src="/res/admin/dist/daterangepicker/moment.min.js"></script> 
<script src="/res/admin/dist/daterangepicker/daterangepicker.js"></script>

</body>
</html>