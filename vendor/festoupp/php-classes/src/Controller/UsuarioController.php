<?php

  require_once "C:festoupp/vendor/festoupp/php-classes/src/Model/User.php";
  //require_once "../php-classes/src/Model.php"; 
  //require_once "../php-classes/src/Model";

  $acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';

  $funcao = (isset($_POST['funcao'])) ? $_POST['funcao'] : '';
  $usu = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
  $id = (isset($_POST['id'])) ? $_POST['id'] : '';
  $log = (isset($_POST['log'])) ? $_POST['log'] : '';
  $pas = (isset($_POST['pas'])) ? $_POST['pas'] : '';

  

  if($funcao == "login"){
    $user = new User();
    $user = $user->login($log, $pas);
    if($user == "1")
      echo "Não foi possível fazer login";
    else
      echo (json_encode($user->getValues()));  
  }

  if($funcao == "logout"){
    $user = User::logout();
    echo (json_encode($user));
  }

  if($funcao == "dados"){    
    $user = new User();
    $user->getDados();
    echo (json_encode($user->getValues()));  
  }
  
  if($acao == "allUsers"){

    $usu = $_SESSION["User"];

    if((int)$usu["isadmin"] == 1 )
    {
      $users = User::listAll();
    }
    else
    {
      $users = User::listUser((int)$usu["id_usuario"]);
    }
    echo (json_encode($users));  
  }

  //var_dump($funcao);exit;

  if($funcao == "1"){
    $user = new User();
    $user->setData($usu);
    $user->save();
    echo (json_encode($user)); 
  }

  if($funcao == "2"){
    $user = new User();
    $user->setData($usu);
    $user->update();
    echo (json_encode($user));   
  }

  if($funcao == "3"){
    $user = new User();
    $user->setData($usu);
    $user->delete();
    echo (json_encode($user));   
  }

  

  


 
  /*
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