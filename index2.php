<?php 
require_once "config.php";
require_once "views/header.php";
require_once "views/index.php";
require_once "views/footer.php";


/*

use \Slim\Slim;
use \FestouPP\Page;
use \FestouPP\PageAdmin;
use \FestouPP\Model\User;
use \FestouPP\Model\Principal;
use \FestouPP\Model\Upload;
use \FestouPP\Model\Servico;

//require_once "vendor/festoupp/php-classes/src/Model/Servico.class.php";


$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
	
	$users = Principal::listAll();
	$page = new Page();
	$page->setTpl("index", array(
		"users"=>$users
	));
	
	//$page = new Page();
	//$page->setTpl("index");

});

$app->get('/admin', function() {
	
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");

});

$app->get('/admin/login', function() {
    
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function(){

	User::login($_POST["login"], $_POST["password"]);
	header("Location: /admin");
	exit;

});

$app->get('/admin/logout', function(){

	User::logout();
	header("Location: /admin/login");
	exit;
});

//-----------------USUARIOS----------------------
$app->get('/admin/users', function(){

	User::verifyLogin();

	$users = User::listAll();
	$page = new PageAdmin();
	$page->setTpl("users", array(
		"users"=>$users
	));

});

$app->get('/admin/users/create', function(){

	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("users-create");
	
});

$app->get('/admin/users/:id/delete', function($iduser){

	User::verifyLogin();
	$user = new User();
	$user->get((int)$iduser);
	$user->delete();
	header("Location: /admin/users");
	exit;
	
});

//alterar
$app->get('/admin/users/:iduser', function($iduser){

	User::verifyLogin();
	$user = new User();
	$user->get((int)$iduser);
	$page = new PageAdmin();
	$page->setTpl("users-update", array(
		"user"=>$user->getValues()
	));
	
});

//inserir
$app->post('/admin/users/create', function(){

	User::verifyLogin();

	$user = new User();

	//validação do inadmin
	$_POST["isadmin"] = (isset($_POST["isadmin"])) ? 1 : 0;

	$_POST["iswhats"] = (isset($_POST["iswhats"])) ? 1 : 0;

	$_POST["status"] = (isset($_POST["status"])) ? 1 : 0;
	

	//$_POST['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT, [
	//	"cost"=>12
	//]);
	

	$user->setData($_POST);
	$user->save();
	header("Location: /admin/users");
	exit;
});

//alterar
$app->post('/admin/users/:iduser', function($iduser){

	User::verifyLogin();
	$user = new User();
	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;
	$user->get((int)$iduser);
	$user->setData($_POST);
	$user->update($iduser);
	header("Location: /admin/users");
	exit;
	
});

//------------------------IMAGENS----------
$app->get('/admin/images', function(){

	User::verifyLogin();
	$page = new PageAdmin();

	$imagens = Servico::listAllImg();
	$page->setTpl("images", array(
		"imagens"=>$imagens
	));
	
});

$app->get('/admin/images/create', function(){

	User::verifyLogin();
	$page = new PageAdmin();
	//$user = new User();
	//$user->get($_SESSION["User"]["id"]);

	$servico = new Servico();
	$servico->get($_SESSION["User"]["id_cliente"]);
	
	$page->setTpl("images-create", array(
		"servico"=>$servico->getvalues()
	));
	//$page->setTpl("images-create");
	
});

$app->get('/admin/imagesall', function(){

	User::verifyLogin();
	$page = new PageAdmin();
	//$user = new User();
	//$user->get($_SESSION["User"]["id"]);

	$servico = new Servico();
	$servico->get($_SESSION["User"]["id_cliente"]);
	
	$page->setTpl("imagesall", array(
		"servico"=>$servico->getvalues()
	));
	//$page->setTpl("images-create");
	
});




$app->post('/admin/images/create', function(){

	User::verifyLogin();
	$servico = new Servico();
	$servico->get($_SESSION["User"]["id_cliente"]);
	$ser = $servico->getvalues();
	$tipo = $_POST["RadioOptions"];

	


	if ((isset($_POST["submit"])) && (! empty($_FILES['foto']))){
		//arquivo, largura, altura, caminho_armaz, id do servico, tipo_img(galeria: 1, banner: 2, logotipo: 3)
		$upload = new Upload($_FILES['foto'],  1000, 800, $_SERVER["DOCUMENT_ROOT"]."/res/site/img/servicos/", $ser['id'], $tipo );
		$res = $upload->salvar();
	}

	if($res == '0')
	{
		echo "<script>
			alert('Tamanho excede o permitido. Tente novamente.');
			window.location.replace('/admin/images');
			</script>";
	}
	else if(substr($res, 0, 4) == 'Erro')
	{
		echo "<script>
			alert(''+$res);
			window.location.replace('/admin/images');
			</script>";		
	}
	else
	{		
		$servico->saveImg($res, "/res/site/img/servicos/", $tipo, $ser['id']);
		header('Location: /admin/images');
	}
	

	
	//header("refresh:5;url= /admin/images");
	//echo $res;
	
	exit;
});

$app->run();
*/

 ?>