<?php

  
  require_once "C:festoupp/vendor/festoupp/php-classes/src/Model/Upload.php";
  require_once "C:festoupp/vendor/festoupp/php-classes/src/Model/Servico.php";

	$servico = new Servico();
	$servico->get($_SESSION["User"]["id_cliente"]);
	$ser = $servico->getvalues();
	//$tipo = $_POST["RadioOptions"];
	//$file = (isset($_FILES['Uploaded'])) ? $_FILES['Uploaded'] : 'sem img' ;
	//$nome = (isset($_POST['ArquivoTemp'])) ? $_POST['ArquivoTemp'] : 'sem nome';

	//var_dump($ser['id_servico']);exit;
	$tipo = (isset($_POST['tipoImg'])) ? $_POST['tipoImg'] : "";
	$idser = (isset($_POST['idImg'])) ? $_POST['idImg'] : "";
	$nome = (isset($_POST['nome'])) ? $_POST['nome'] : "";
	$imagem = (isset($_POST['imagem'])) ? $_POST['imagem'] : "";
	$extensao = (isset($_POST['extensao'])) ? $_POST['extensao'] : "";



	$destino = $_SERVER["DOCUMENT_ROOT"]."/res/site/img/servicos/";
	//$destino = "C:/festoupp/res/site/img/servicos/";

	$file = base64_decode($imagem);
	$photo = imagecreatefromstring($file);


	//cria uma nova imagem com o novo tamanho   
	//$novaimagem = imagecreatetruecolor($novaLarg, $novaAlt); 
            
	//var_dump($extensao);exit;
             
	switch ($extensao){

		

		case ".gif": // gif 
		case ".GIF":
			//$origem = imagecreatefromgif($img_localizacao);
			//imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $novaLarg, $novaAlt, $imgLarg, $imgAlt);
			imagegif($photo, $destino.$nome, 1);
			break;
		case ".jpg": // jpg 
		case ".JPG":
		case ".jpeg":
		case ".JPEG":
			//$origem = imagecreatefromjpeg($photo);      						
			imagejpeg($photo, $destino.$nome, 100);
			break;
		case ".png": // png
		case ".PNG":
			//$png = imagecreatetruecolor(800, 600);
			imagesavealpha($photo, true);
			$trans_colour = imagecolorallocatealpha($photo, 0, 0, 0, 127);
			imagefill($photo, 0, 0, $trans_colour);  

			//$origem = imagecreatefrompng($photo);
			//imagecopyresampled($photo, $origem, 0, 0, 0, 0, $novaLarg, $novaAlt, $imgLarg, $imgAlt);
			imagepng($photo, $destino.$nome, 5, PNG_ALL_FILTERS);
			break;
	}


	

	

	//----------------------------------------------------------------
	//move o arquivo
	/* $destino = "/res/site/img/servicos/".$nome;
	if (! move_uploaded_file($imagem, $destino)){
		if ($this->arquivo['error'] == 1)
			echo "Tamanho excede o permitido. Tente novamente.";
		else{
			echo "Erro " . $this->arquivo['error'];
		}
			
	} */
	//----------------------------------------------------------------

	//var_dump($tipo, $idser, $nome);exit;

	if($nome != "")
	{
		if((int)$tipo == 2){
			$result = $servico->selectImg((int)$tipo, (int)$idser);
			if(count($result) >= 1){
				foreach ($result[0] as $value) {
					$servico->deleteImg($value);
				}
			}
	
		}else if((int)$tipo == 3){
			$result = $servico->selectImg((int)$tipo, (int)$idser);
			if(count($result) >= 1){
				foreach ($result[0] as $value) {
					$servico->deleteImg($value);
				}
			}
		}

		$servico->saveImg($nome, "/res/site/img/servicos/", $tipo, $idser);
		echo (json_encode($servico));
	}	


	/* if (!empty($_FILES['imagem']) && $tipo != ""){
		//arquivo, largura, altura, caminho_armaz, id do servico, tipo_img(galeria: 1, banner: 2, logotipo: 3)
		$upload = new Upload($_FILES['imagem'],  1000, 800, $_SERVER["DOCUMENT_ROOT"]."/res/site/img/servicos/", $idser, $tipo );
		$res = $upload->salvar();
	}else{
		echo json_encode("Erro ao inserir imagem");
	}

	
	//var_dump($res);exit;
	

	if($res == '0')
	{
		echo "Tamanho excede o permitido. Tente novamente.";
	}
	else if($res == '1')
	{
		echo "Imagem inválida para Banner";
	}
	else if(substr($res, 0, 4) == 'Erro')
	{
		echo ""+$res;	
	}
	else
	{		
		if((int)$tipo == 2){
			$result = $servico->selectImg((int)$tipo, (int)$idser);
			if(count($result) >= 1){
				foreach ($result[0] as $value) {
					$servico->deleteImg($value);
				}
			}
	
		}else if((int)$tipo == 3){
			$result = $servico->selectImg((int)$tipo, (int)$idser);
			if(count($result) >= 1){
				foreach ($result[0] as $value) {
					$servico->deleteImg($value);
				}
			}
		}


		
		$servico->saveImg($res, "/res/site/img/servicos/", $tipo, $idser);
		echo (json_encode($servico)); 
	}
	*/
	

	
	//header("refresh:5;url= /admin/images");
	//echo $res;
	
	//exit;  
 
   
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