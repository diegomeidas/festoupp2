<?php
  
  require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/Model/User.php');

  $user = User::verifyLogin();

  require_once "header.php";

?>
<!--------------------------------------------------------------PRINCIPAL  ---------------------------->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Serviços
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Serviços</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">

        <?php
          if($_SESSION[User::SESSION]['isadmin'] == 1)
          {
        ?>
            <div class="box-header">
              <a id="btnAddServico" class="btn btn-success">Cadastrar Serviço</a>
            </div>
        <?php
          }
        ?>

        <div class="box-body no-padding">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Cliente</th>
                <th>Ativo</th>
                <th>Serviço</th>
                <!-- <th>Descrição</th> --> 
                <th>Tipo</th>                
                <th>Ativo</th>
                <th style="width: 210px">&nbsp;</th>
              </tr>
            </thead>
            <tbody id="tbodyservice">                
              <!--implementado em JS-->
            </tbody>
          </table>
        </div>
          <!-- /.box-body -->
  	  </div>
    </div>
  </div>

</section>
<!-- /.content -->


<div id="result"></div>
</div>
<!-- /.content-wrapper -->

<!--page scripts-->


<!--------------------------------------------------------------MODAIS---------------------------->

<!-- Modal Adicionar/Alterar-->
<div class="modal fade" id="modalAddServico" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <div class="" style="background-color: #ecf0f5;">
        
        <br>
        <h3 id="imgModalTitle" style="margin-left: 30px">Serviço <span class="badge badge-secondary" id="titleAddServico">CADASTRANDO</span></h3>        
        

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
                    <div class="col-md-1"></div>
                    <div class="col-md-10">

                      <form method="GET" id="formCadastrarEditarServico">

                        <p>Dados</p>
                        <div class="dados">

                        <div class="row">

                          <div class="form-group col-md-8">

                            
                              <label for="cliente">Cliente</label>
                              <!--<input type="text" class="form-control" id="cliente" name="cliente" placeholder="Digite o nome">
                              
                              <select name="tipo" id="cliente" class="form-control">
                                <option selected value="1">Digite o nome</option>
                                </select>-->

                              <select name="tipo" id="cliente" class="form-control" >
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
                            

                            
                              <label for="tipo_ser">Tipo de Serviço</label>
                              <select name="tipo_ser" id="tipo_ser" class="form-control" data-msg-required="Informe um tipo de serviço" required>
                                <option selected value="1">Salão</option>
                                <option value="2">Buffet</option>
                                <option value="3">Decoração</option>
                                <option value="4">Aluguel de Trages</option>
                                <option value="5">Foto / Vídeo</option>
                                <option value="6">Organização</option>
                                <option value="7">Bolos e Doces</option>
                                <option value="8">Convite</option>
                              </select>
                            
                              
                          </div>


                          <div class="form-group col-md-4">
                            
                            <label for="categoria">Categoria</label>
                            <div class="checkbox">
                              <label for="checkCasamento">
                                <input type="checkbox" class="checkbox" name="checkCasamento" name="checkOption" id="checkCasamento" value="1" checked> Casamento
                              </label>
                            </div>                              
                          
                            <div class="checkbox">
                              <label for="checkFormatura">
                                <input type="checkbox" class="checkbox" name="checkFormatura" name="checkOption" id="checkFormatura" value="1" checked> Formatura
                              </label>
                            </div>                              
                          
                            <div class="checkbox">
                              <label for="checkAniversario">
                                <input type="checkbox" class="checkbox" name="checkAniversario" name="checkOption" id="checkAniversario" value="1" checked> Aniversário
                              </label>
                            </div> 
                          </div>

                        </div>
                          
                        <div class="row">
                          <div class="form-group col-md-8">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"  data-msg-required="Informe nome do serviço" placeholder="Nome do serviço" required>
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
                          <div class="form-group col-md-10">
                            <label for="descricao">Descrição</label>
                            <textarea type="text" class="form-control" id="descricao" name="descricao" rows="2" maxlength="140" placeholder="Informe a descriçao do serviço"></textarea>
                          </div>
                        </div>                         

                        <div class="row">
                          <div class="form-group col-md-2">
                            <label for="capacidade">Capacidade</label>
                            <input type="number" class="form-control" id="capacidade" name="capacidade" placeholder="">
                          </div>
                          
                          <div class="form-group col-md-8">
                            <label for="itens">Itens</label>
                            <textarea class="form-control" id="itens" name="itens" rows="3" maxlength="190" placeholder="Informe os itens ou detalhes"></textarea>
                          </div>
                        </div>
                      
                      
                      </div><!-- end dado -->

                      <br>

                      <p>Contato</p>
                      <div class="contato">



                        <div class="row">              
                          <div class="form-group col-md-2">
                            <label for="ddd">DDD</label>
                            <input type="tel" class="form-control" id="ddd" name="ddd" maxlength="2" placeholder="">
                          </div>
                        
                          <div class="form-group col-md-3">
                            <label for="numero">Telefone</label>
                            <input type="tel" class="form-control" id="numero" name="numero" maxlength="9" placeholder="">
                          </div>
                        
                          <div class="form-group col-md-3">
                            <label for="tipo">Tipo</label>
                            <select name="tipo" id="tipo" class="form-control">
                              <option value="1">Celular</option>
                              <option value="2">Residencial</option>
                            </select>
                          </div>

                          <div class="form-group col-md-2">
                            <label for=""></label>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" class="checkbox" id="iswhats" name="iswhats" value="1"> WhatsApp
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="row">              
                          <div class="form-group col-md-2">
                            <label for="ddd">DDD</label>
                            <input type="tel" class="form-control" id="ddd2" name="ddd" maxlength="2" placeholder="">
                          </div>
                        
                          <div class="form-group col-md-3">
                            <label for="numero">Telefone</label>
                            <input type="tel" class="form-control" id="numero2" name="numero" maxlength="9" placeholder="">
                          </div>
                        
                          <div class="form-group col-md-3">
                            <label for="tipo2">Tipo</label>
                            <select name="tipo2" id="tipo2" class="form-control">
                              <option value="1">Celular</option>
                              <option value="2">Residencial</option>
                            </select>
                          </div>

                          <div class="form-group col-md-2">
                            <label for=""></label>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" class="checkbox" id="iswhats2" name="iswhats2" value="1"> WhatsApp
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-10">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" maxlength="140" data-msg-email="Email inválido!" placeholder="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-10">
                            <label for="site">Site</label>
                            <input type="text" class="form-control" id="site" name="site" placeholder="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-4">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="">
                          </div>
                          <div class="form-group col-md-2"></div>
                          <div class="form-group col-md-4">
                            <label for="instagram">Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram" placeholder="">
                          </div>
                        </div>


                      </div><!-- end contato -->

                      <br>

                      <p>Endereço</p>
                      <div class="endereco">

                        <div class="row">
                          <div class="form-group col-md-8">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro" maxlength="140" placeholder="Rua / Av">
                          </div>
                          
                          <div class="form-group col-md-2">
                            <label for="numeral">Número</label>
                            <input type="number" class="form-control" id="numeral" name="numeral" placeholder=""></input>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-10">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" maxlength="44" placeholder="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7">
                            <label for="cidade">Cidade</label>
                            <select name="cidade" id="cidade" class="form-control">                              
                              <option selected value="1">Presidente Prudente</option>
                              <option value="1">Adamantina</option>
                              <option value="1">Alfredo Marcondes</option>
                              <option value="1">Álvares Machado</option>
                              <option value="1">Anhumas</option>
                              <option value="1">Assis</option>
                              <option value="1">Bastos</option>
                              <option value="1">Dracena</option>
                              <option value="1">Emilianópolis</option>
                              <option value="1">Flora Rica</option>
                              <option value="1">Flórida Paulista</option>
                              <option value="1">Florínia</option>
                              <option value="1">Iacri</option>
                              <option value="1">Iepê</option>
                              <option value="1">Indiana</option>
                              <option value="1">Inúbia Paulista</option>
                              <option value="1">João Ramalho</option>
                              <option value="1">Junqueirópolis</option>
                              <option value="1">Lucélia</option>
                              <option value="1">Mairiporã</option>
                              <option value="1">Marabá Paulista</option>
                              <option value="1">Mariápolis</option>
                              <option value="1">Martinópolis</option>
                              <option value="1">Mirante do Paranapanema</option>
                              <option value="1">Mirassol</option>
                              <option value="1">Osvaldo Cruz</option>
                              <option value="1">Pacaembu</option>
                              <option value="1">Paraguaçu Paulista</option>
                              <option value="1">Parapuã</option>
                              <option value="1">Pirapozinho</option>
                              <option value="1">Pracinha</option>
                              <option value="1">Presidente Bernardes</option>
                              <option value="1">Presidente Epitácio</option>
                              <option value="1">Presidente Prudente</option>
                              <option value="1">Presidente Venceslau</option>
                              <option value="1">Rancharia</option>
                              <option value="1">Regente Feijó</option>
                              <option value="1">Ribeirão dos Índios</option>
                              <option value="1">Sagres</option>
                              <option value="1">Sandovalina</option>
                              <option value="1">Santo Anastácio</option>
                              <option value="1">Santo Expedito</option>
                              <option value="1">Taciba</option>
                              <option value="1">Teodoro Sampaio</option>
                              <option value="1">Tupã</option>
                              <option value="1">Tupi Paulista</option>
                            </select>
                          </div>

                          <div class="form-group col-md-3">
                            <label for="uf">UF</label>
                            <select name="uf" id="uf" class="form-control">
                              <option selected value="1">SP</option>
                            </select>
                          </div>
                        </div>

                      </div><!-- end endereço -->
                        

                        <!-- /.box-body -->
                        <div class="box-footer">
                          <button type="submit" id="btnCadastrarServico" class="btn btn-success">Cadastrar</button>
                        </div>
                      </form>

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






<!-- Modal Galeria-->
<div class="modal fade" id="modalGaleria" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <div class="" style="background-color: #ecf0f5;">
        
        <br>
        <h3 id="imgModalTitle" style="margin-left: 30px">Galeria de Imagens<span class="badge badge-secondary" id="titleAddServico"></span></h3>
        
        <div class="modal-body">
          
          <!--content add image-->
          <section id="contentAddImg" style="display: none;">
            <div class="col-md-12">
              <div class="box box-success">

                <div class="box-body no-padding"> 
                  <h3 style="margin-left: 15px;">Adicionar Imagem</h3>
                </div> 

                <div class="row">

                  <div class="col-md-1"></div>
                  <div class="col-md-3"> 
                    <div class="radio-inline radio-group" style="margin: 20px; border: 1px solid black; border-radius: 5px; padding: 5px; left: 15px;"> <!---->
                      <label class="control-label label-sm" style="margin-right: 15px;">Tipo de imagem </label>
                      <label class="radio" style="margin-left: 20px;" >
                        <input type="radio" name="RadioOptions" id="rbGaleria" value="1"> Galeria
                      </label>
                      <label class="radio" style="margin-left: 20px;">
                        <input type="radio" name="RadioOptions" id="rbBanner" value="2"> Banner
                      </label>
                      <label class="radio" style="margin-left: 20px;">
                        <input type="radio" name="RadioOptions" id="rbLogo" value="3"> Logotipo
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-7">
                    <div class="col-md-12 form-group">
                        <label for="fupArquivo" title="Arquivo" class="control-label label-sm"></label>                                                               
                        <input type="file" class="form-control-file" name="Arquivo" id="fileinput_widget" /> 
                        <br />            
                        <div id="imgCadastro" class="fileinput-preview thumbnail" data-trigger="fileinput" 
                        style="width: 250px; height: auto;"></div>
                    </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button id="btnAddImg" type="button" class="btn btn-success">Cadastrar</button>
                  <button type="button" class="btn btn-default" id="btnFecharImg">Fechar</button>
                </div>   
              </div>
            </div>
                     
          </section>
          

          <!-- Main content -->
          <section class="content">

            <div class="row">
              <div class="col-md-12">
                <div class="box box-primary">
                      
                      <div class="box-header">
                        <!--<a href="/admin/images/create" class="btn btn-success" id="btnAddImage">Adicionar Imagem</a>-->
                        <!--data-toggle="modal" data-target="#modalAdicioarImg"-->
                        <button type="button" class="btn btn-primary" id="btnAdicionarImg">
                          Adicionar
                        </button>
                        
                      </div>

                      <div class="box-body no-padding">               
                          
                          <!--<h3 style="margin-left: 15px;">Galeria de imagens</h3>-->
                          <div class="" id="imgModalAdd">
                            <!--servico.js-->
                          </div>
                          <div class="" id="result"></div>            
                        
                      </div>
                      <!-- /.box-body -->
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


<!-- Modal Adicionar imagem-->
<div class="modal fade" id="modalAdicioarImg" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarImg" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="imgModalTitle">Imagens de </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="row">
        <div class="col-md-2"></div>                           
        <div class="col-md-8">

          <div class="row" style="margin-top: 20px;">
            <div class="radio-inline radio-group" style="border: 1px solid black; border-radius: 5px; padding: 5px; left: 15px;"> <!---->
              <label class="control-label label-sm" style="margin-right: 15px;">Tipo de imagem </label>
              <label class="radio-inline">
                <input type="radio" name="RadioOptions" id="rbGaleria" value="1"> Galeria
              </label>
              <label class="radio-inline">
                <input type="radio" name="RadioOptions" id="rbBanner" value="2"> Banner
              </label>
              <label class="radio-inline">
                <input type="radio" name="RadioOptions" id="rbLogo" value="3"> Logotipo
              </label>
            </div>
          </div>


          <div class="col-md-12 form-group">
              <label for="fupArquivo" title="Arquivo" class="control-label label-sm"></label>                                                               
              <input type="file" class="form-control-file" name="Arquivo" id="fileinput_widget" /> 
              <br />            
              <div id="imgCadastro" class="fileinput-preview thumbnail" data-trigger="fileinput" 
              style="width: 250px; height: auto;"></div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
        
      </div>
      <div class="modal-footer">
      <button id="btnAddImg" type="button" class="btn btn-success">Cadastrar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
    <div id="result"></div>
  </div>
</div>




<!--MODAL CONFIRM-->
<div class="modal" tabindex="-1" role="dialog" id="modalConfirm">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirma exclusão?</h4>
      </div>
      <div class="modal-body">
        <p id="servico"></p>
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

<script src="/res/admin/dist/js/servico.js"></script>


</body>
</html>