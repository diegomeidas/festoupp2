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
    Lista de Usuários
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Usuários</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
        <div class="box-header">
          <a id="btnAddUser" class="btn btn-success">Cadastrar Usuário</a>
        </div>

        <div class="box-body no-padding">
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 200px">Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Tipo</th>
                <th>Whats</th>
                <th>Login</th>
                <th>Admin</th>
                <th>Ativo</th>
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
<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarImg" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <div class="" style="background-color: #ecf0f5;">
        <br>
        <h3 id="imgModalTitle" style="margin-left: 30px">Usuário <span class="badge badge-secondary" id="titleAddUser"></span></h3>        
        
        <div class="modal-body">

          <!-- Main content -->
          <section class="content">

            <div class="row">            
              <div class="col-md-12" >
                <div class="box box-success" style="background-color: #ffffff !important;">
                  <!-- <div class="box-header with-border">
                    <h3 class="box-title">Novo Usuário</h3>
                  </div>
                  /.box-header -->
                  <!-- form start -->
                  <div class="box-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">

                      <div>                       
                          
                          <div class="row">
                            <div class="form-group col-md-8">
                              <label for="desperson">Nome</label>
                              <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
                            </div>

                            <div class="form-group col-md-2">
                              <label for=""></label>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" class="checkbox" name="status" id="status" value="1" checked> Ativo
                                </label>
                              </div>
                            </div>

                          </div>

                          <div class="row">              
                            <div class="form-group col-md-9">
                              <label for="desemail">E-mail</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail">
                            </div>
                          </div>
                          

                          <div class="row">              
                            <div class="form-group col-md-2">
                              <label for="nrphone">DDD</label>
                              <input type="tel" class="form-control" id="ddd" name="ddd" placeholder="DDD" required>
                            </div>
                          
                            <div class="form-group col-md-3">
                              <label for="nrphone">Telefone</label>
                              <input type="tel" class="form-control" id="numero" name="numero" placeholder="Digite o telefone" required>
                            </div>
                          
                            <div class="form-group col-md-3">
                              <label for="tipo">Tipo</label>
                              <select name="tipo" id="tipo" class="form-control">
                                <option selected value="1">Celular</option>
                                <option value="2">Residencial</option>
                              </select>
                            </div>

                            <div class="form-group col-md-2">
                              <label for=""></label>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" class="checkbox" name="iswhats" id="iswhats" value="1"> WhatsApp
                                </label>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-4">
                              <label for="deslogin">Login</label>
                              <input type="text" class="form-control" id="login" name="login" placeholder="Digite o login" required>
                            </div>
                            
                            <div class="form-group col-md-4">
                              <label for="despassword">Senha</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Digite a senha" required>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for=""></label>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" class="checkbox" name="isadmin" id="isadmin" value="1">Administrador
                              </label>
                            </div>
                          </div>
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                          <button id="btnCadastrar" class="btn btn-success">Cadastrar</button>
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
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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

<script src="/res/admin/dist/js/usuario.js"></script>

</body>
</html>