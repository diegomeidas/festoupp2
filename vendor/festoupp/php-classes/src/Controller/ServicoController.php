<?php

  require_once "C:festoupp/vendor/festoupp/php-classes/src/Model/Servico.php";

  $acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
  $letras = (isset($_GET['letras'])) ? $_GET['letras'] : '';
  $id = (isset($_GET['id'])) ? $_GET['id'] : '';

  $funcao = (isset($_POST['funcao'])) ? $_POST['funcao'] : '';
  $servico = (isset($_POST['servico'])) ? $_POST['servico'] : '';


  

  
  if($acao == "allServices"){
    $usu = $_SESSION["User"];

    if((int)$usu["isadmin"] == 1 )
    {
      $serv = Servico::listAll();
    }
    else
    {
      $serv = Servico::listUser((int)$usu["id_usuario"]);
    }
    echo (json_encode($serv));  
  }

  if($acao == "getCliente"){
    $serv = Servico::listClientes($letras);
    echo (json_encode($serv));  
  }

  if($acao == "galeria"){
    $serv = Servico::listImg($id);
    echo (json_encode($serv));  
  }

  if($acao == "destaques"){
    $serv = Servico::listDestaque($id);
    echo (json_encode($serv));  
  }

  if($acao == "servicoCliente"){
    $serv = Servico::listServicoCliente($id);
    echo (json_encode($serv));  
  }

  if($funcao == "1"){    
    $ser = new Servico();
    $ser->setData($servico);
    $ser->save();
    echo (json_encode($ser)); 
  }

  if($funcao == "2"){    
    $ser = new Servico();
    $ser->setData($servico);
    $ser->update();
    echo (json_encode($ser)); 
  }

  if($funcao == "3"){
    $ser = new Servico();
    $ser->setData($servico);
    $ser->delete();
    $ser->deleteContato();
    $ser->deleteEndereco();
    $ser->deleteAllImg();
    echo (json_encode($ser));   
  }

  if($funcao == "4"){    
    $ser = new Servico();
    $ser->deleteImg($servico);
    echo (json_encode($ser)); 
  }

  ?>