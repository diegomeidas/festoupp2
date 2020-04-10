<?php

  require_once "C:festoupp/vendor/festoupp/php-classes/src/Model/Servico.php";

  $acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
  $funcao = (isset($_POST['funcao'])) ? $_POST['funcao'] : '';
  $id = (isset($_POST['id'])) ? $_POST['id'] : '';
  $dataIni = (isset($_POST['dataIni'])) ? $_POST['dataIni'] : '';
  $dataFim = (isset($_POST['dataFim'])) ? $_POST['dataFim'] : '';


  

  if($funcao == "1"){
    $ser = new Servico();
    $ser->getServico($id);
    $ser->saveDestaque($dataIni, $dataFim);
    echo (json_encode($ser)); 
  }

  if($acao == "destaques"){
    $ser = Servico::getDestaque();
    echo (json_encode($ser)); 
  }

  ?>