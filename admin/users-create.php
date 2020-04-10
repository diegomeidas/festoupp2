<?php
  
  require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/Model/User.php');

  $user = User::verifyLogin();

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
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/users">Usuários</a></li>
    <li class="active"><a href="/admin/users/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Usuário</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/users/create" method="post">
          <div class="box-body">
            
            <div class="row">
              <div class="form-group col-md-5">
                <label for="desperson">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome">
              </div>

              <div class="form-group col-md-2">
                <label for=""></label>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" value="1" checked> Ativo
                  </label>
                </div>
              </div>

            </div>

            <div class="row">              
              <div class="form-group col-md-6">
                <label for="desemail">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail">
              </div>
            </div>
            

            <div class="row">              
              <div class="form-group col-md-1">
                <label for="nrphone">DDD</label>
                <input type="tel" class="form-control" id="ddd" name="ddd" placeholder="DDD">
              </div>
            
              <div class="form-group col-md-2">
                <label for="nrphone">Telefone</label>
                <input type="tel" class="form-control" id="numero" name="numero" placeholder="Digite o telefone">
              </div>
            
              <div class="form-group col-md-2">
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
                    <input type="checkbox" id="iswhats" value="1"> WhatsApp
                  </label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="deslogin">Login</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Digite o login">
              </div>
              
              <div class="form-group col-md-3">
                <label for="despassword">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite a senha">
              </div>
            </div>
            
            
            
            <div class="checkbox">
              <label>
                <input type="checkbox" name="isadmin" value="1"> Acesso de Administrador
              </label>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
  require_once "footer.php";
?>