<?php
 
  
  require_once "C:festoupp/vendor/festoupp/php-classes/src/Model/Principal.php";

  $acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
  $tipo = (isset($_GET['tipo'])) ? $_GET['tipo'] : '';
  $cat = (isset($_GET['cat'])) ? $_GET['cat'] : '';
  $id = (isset($_GET['id'])) ? $_GET['id'] : '';

  $funcao = (isset($_POST['funcao'])) ? $_POST['funcao'] : '';
  $servico = (isset($_POST['servico'])) ? $_POST['servico'] : '';


  

  
  if($acao == "pagina"){
    $serv = Principal::listPagina($tipo, $cat);
    echo (json_encode($serv)); 
  }

  if($acao == "servico"){
    $serv = Principal::getServico($id);
    echo (json_encode($serv)); 
  }

  if($acao == "imagens"){
    $serv = Principal::listImagens($id);
    echo (json_encode($serv)); 
  }
  
  
  //implementar
  //$principal = Principal::listAll();
  //echo (json_encode($principal));  
  //exit();
 
  /*  
  * Recebe os dados da requisição  
  */ 
  /* 
  $acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';  
  $sal = (isset($_GET['salao'])) ? $_GET['salao'] : '';  
 

  if ($acao == "ver"):  

    $sql = new Sql();
    $res = $sql->select("SELECT * FROM tb_imagem");
 
 
    $pdo = Conexao::getInstance();  
 
  
    $salao = new salao($pdo);  
 
    //echo $salao->getTabelaSaloes($sal);  
    echo (json_encode($salao->geAllSalao()));  
  endif;  
  */
  ?>