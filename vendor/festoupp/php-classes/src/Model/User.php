<?php 

//namespace FestouPP\Model;

//use \FestouPP\Model;
//use \FestouPP\DB\Sql;
//require_once "../Model.php";
//require_once "../DB/Sql.php";
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/Model.php');
require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/DB/Sql.php');



class User extends Model {

	const SESSION = "User";
	

	public function login($login, $password)
	{

		$db = new Sql();		

		$results = $db->select("SELECT * FROM tb_usuario a
								INNER JOIN tb_cliente b ON a.id_cliente = b.id_cliente
								WHERE a.login = :LOGIN", array(
			":LOGIN"=>$login
		));

		if (count($results) === 0) {
			return "1";
		}

		$data = $results[0];

		//if (password_verify($password, $data["password"])) {
		if ($password == $data["password"]) {

			$user = new User();
			$user->setData($data);

			//cria uma nova sessão	
			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {

			return "1";
		}
	}

	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;
	}

	public static function verifyLogin($isadmin = true)
	{

		//var_dump($_SESSION[User::SESSION]);
		//exit;

		if (
			!isset($_SESSION[User::SESSION])
			|| 
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["id_usuario"] > 0
			||
			(bool)$_SESSION[User::SESSION]["id_usuario"] !== $isadmin
		) 
		{			
			header("Location: /views/admin/login.php");
			exit;
		}
	}

	public static function verifyAdmin()
	{
		$user = (isset($_SESSION[User::SESSION])) ? (int)$_SESSION[User::SESSION]["isadmin"] : 0;

		if ( $user != 1 ) 
		{			
			header("Location: /views/admin/index.php");
			exit;
		}
		
	}

	public static function listAll(){

		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuario a 
							INNER JOIN tb_cliente b ON a.id_cliente = b.id_cliente 
							LEFT JOIN tb_contato c ON b.id_cliente = c.id_cliente
							ORDER BY b.nome");
	}

	public static function listUser($iduser){

		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuario a 
							INNER JOIN tb_cliente b ON a.id_cliente = b.id_cliente 
							LEFT JOIN tb_contato c ON b.id_cliente = c.id_cliente
							WHERE a.id_usuario = $iduser
							");
	}

	//metodo para salvar usuarios no banco
	public function save(){

		/*
		var_dump($this->getnome(),
			(int)$this->getstatus(),
			$this->getlogin(),
			$this->getpassword(),
			$this->getemail(),
			(int)$this->getisadmin(),
			(int)$this->getddd(),
			(int)$this->getnumero(),
			(int)$this->gettipo(),
			(int)$this->getiswhats());
		exit;
		*/

		$sql = new Sql();
		$res = $sql->select("CALL sp_inserir_usuario(:nome, :status, :login, :password, :email, :isadmin, :ddd , :numero, :tipo, :iswhats)", array(
			":nome"=>$this->getnome(),
			":status"=>(int)$this->getstatus(),
			":login"=>$this->getlogin(),
			":password"=>$this->getpassword(),
			":email"=>$this->getemail(),
			":isadmin"=>(int)$this->getisadmin(),
			":ddd"=>(int)$this->getddd(),
			":numero"=>(int)$this->getnumero(),
			":tipo"=>(int)$this->gettipo(),
			":iswhats"=>(int)$this->getiswhats()			
		));
		
		$this->setData($res[0]);

	}

	public function get($iduser){

		$sql = new Sql();
		$res = $sql->select("select * from tb_usuario a inner join tb_cliente b where a.id_cliente = b.id_cliente AND a.id_usuario = :id", array(
			":id"=>$iduser
		));

		$this->setData($res[0]);
	}

	
	public function getDados(){

		//var_dump((int)$_SESSION[User::SESSION]["id_usuario"]);exit;

		$sql = new Sql();
		$res = $sql->select("SELECT a.id_usuario, a.isadmin, b.*, c.*, d.* 
							FROM tb_usuario a 
							INNER JOIN tb_cliente b ON a.id_cliente = b.id_cliente
							LEFT JOIN tb_servico c ON c.id_cliente = b.id_cliente 
							LEFT JOIN tb_imagem d ON d.id_servico = c.id_servico AND d.tipo_img = 3							
							WHERE a.id_usuario = :id LIMIT 1", array(
			":id"=>(int)$_SESSION[User::SESSION]["id_usuario"]
		));

		$this->setData($res[0]);
	}
	
	public function update(){

		$sql = new Sql();
		$res = $sql->select("CALL sp_alterar_usuario(:nome, :status, :login, :password, :email, :isadmin, :ddd , :numero, :tipo, :iswhats)", array(
			":nome"=>$this->getnome(),
			":status"=>(int)$this->getstatus(),
			":login"=>$this->getlogin(),
			":password"=>$this->getpassword(),
			":email"=>$this->getemail(),
			":isadmin"=>(int)$this->getisadmin(),
			":ddd"=>(int)$this->getddd(),
			":numero"=>(int)$this->getnumero(),
			":tipo"=>(int)$this->gettipo(),
			":iswhats"=>(int)$this->getiswhats()	
		));

		$this->setData($res[0]);

	}
	
	public function delete(){

		$sql = new Sql();
		$sql->query("CALL sp_deletar_usuario(:id)", array(
			":id"=>(int)$this->getid_usuario()
		));
	}

}

 ?>