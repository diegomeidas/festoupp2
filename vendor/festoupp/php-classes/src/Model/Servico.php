<?php 

require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/Model.php');
require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/DB/Sql.php');

class Servico extends Model{

	const CAMINHO = "";
	const RES = "/res/site/img/servicos/";
	

	public static function listAll(){

		$sql = new Sql();
		return $sql->select("SELECT a.id_usuario, a.isadmin, b.*, c.* 
							FROM tb_usuario a
							INNER JOIN tb_cliente b ON b.id_cliente = a.id_cliente 
							INNER JOIN tb_servico c ON b.id_cliente = c.id_cliente AND c.id_servico > 0 
							ORDER BY b.nome");
	}

	

	public static function listUser($iduser){

		$sql = new Sql();
		return $sql->select("SELECT a.id_usuario, a.isadmin, b.*, c.* 
							FROM tb_usuario a
							INNER JOIN tb_cliente b ON b.id_cliente = a.id_cliente 
							LEFT JOIN tb_servico c ON b.id_cliente = c.id_cliente 							
							WHERE a.id_usuario = $iduser");
	}

	public static function listCli(){

		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_cliente a WHERE a.status = 1 ORDER BY a.nome");
	}
	
	public static function listClientes($letras){

		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuario a 
					INNER JOIN tb_cliente b ON a.id_cliente = b.id_cliente 
					WHERE b.nome LIKE '%$letras%' ORDER BY b.nome");
    }
    
    public static function listAllImg(){
		
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_imagem");
	}

	public static function listImg($id){
		
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_imagem a
							INNER JOIN tb_servico b ON a.id_servico = b.id_servico
							WHERE a.id_servico = $id");
	}

	public static function listDestaque(){
		$today = date("m-d-y");
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_servico a
							INNER JOIN tb_destaque b ON a.id_servico = b.id_servico
							WHERE b.dt_fim <= $today");
	}

	public static function listServicoCliente($id){
		//$today = date("m-d-y");
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_servico a
							LEFT JOIN tb_cliente b ON a.id_cliente = b.id_cliente
							WHERE b.id_cliente = $id");
	}

	public function get($iduser){

		$sql = new Sql();
		$res = $sql->select("select a.nome_ser, a.id_servico, a.caminho_ser, a.res_ser 
							from tb_servico a 
							inner join tb_cliente b where a.id_cliente = b.id_cliente AND b.id_cliente = :id", array(
			":id"=>$iduser
		));
		$this->setData($res[0]);
	}

	public function getServico($id){

		$sql = new Sql();
		$res = $sql->select("SELECT * 
							FROM tb_servico  
							WHERE id_servico = $id"
		);

		$this->setData($res[0]);
	}

	public static function getDestaque(){

		$sql = new Sql();
		$res = $sql->select("SELECT * 
							FROM tb_destaque a
							INNER JOIN tb_servico b ON a.id_servico = b.id_servico
							INNER JOIN tb_cliente c ON c.id_cliente = b.id_cliente 
							ORDER BY b.nome_ser"
		);

		//var_dump($res);exit;
		return $res;
	}

	public function tipo($tipo){
		if($tipo == 1) return "/salao";
		else if($tipo == 2) return "/buffet";
		else if($tipo == 3) return "/decoracao";
		else if($tipo == 4) return "/trage";
		else if($tipo == 5) return "/midia";
		else if($tipo == 6) return "/organizacao";
		else if($tipo == 7) return "/doce";
		else if($tipo == 8) return "/convite";
	}

	public function save(){

        $sql = new Sql();
        try {
            $id = $sql->queryLastId("INSERT INTO tb_servico(nome_ser, descricao_ser, tipo_ser, categoria_ser, caminho_ser, res_ser, capacidade_ser, status_ser, itens_ser, id_cliente) 
						values(:nome, :descricao, :tipo, :categoria, :caminho, :res, :capacidade, :ativo, :itens, :cliente)", array(
				":nome"=>$this->getnome_ser(),
				":descricao"=>$this->getdescricao_ser(),
				":tipo"=>(int)$this->gettipo_ser(),
				":categoria"=>(int)$this->getcategoria_ser(),
                ":caminho"=>$this->tipo((int)$this->gettipo_ser()),
				":res"=>Servico::RES,
				":capacidade"=>(int)$this->getcapacidade_ser(),
				":ativo"=>(int)$this->getstatus_ser(),
				":itens"=>$this->getitens_ser(),
				":cliente"=>(int)$this->getid_cliente()
			));

			$sql->query("INSERT INTO tb_social(email, site, facebook, instagram, id_servico) 
						values(:email, :site, :facebook, :instagram, :id_servico)", array(
				":email"=>$this->getemail(),
				":site"=>$this->getsite(),
				":facebook"=>$this->getfacebook(),
				":instagram"=>$this->getinstagram(),
                ":id_servico"=>(int)$id
			));

			if($this->getlogradouro() != ''){
				$sql->query("INSERT INTO tb_endereco(logradouro, num, bairro, cidade, uf, id_servico) 
						values(:logr, :num, :bai, :cid, :uf, :id_servico)", array(
				":logr"=>$this->getlogradouro(),
				":num"=>$this->getnumeral(),
				":bai"=>$this->getbairro(),
				":cid"=>$this->getcidade(),
				":uf"=>$this->getuf(),
                ":id_servico"=>(int)$id
			));
			}

			//var_dump($id);exit;
			if($this->getnumero_ser() != ''){

				$sql->query("INSERT INTO tb_contato(ddd, numero, tipo, iswhats, id_servico) 
						values(:ddd, :numero, :tipo, :iswhats, :id_servico)", array(
				":ddd"=>(int)$this->getddd_ser(),
				":numero"=>(int)$this->getnumero_ser(),
				":tipo"=>(int)$this->gettipo(),
				":iswhats"=>(int)$this->getiswhats(),
				":id_servico"=>(int)$id
			));
			}
			

			if($this->getnumero2_ser() != ''){

				$sql->query("INSERT INTO tb_contato(ddd, numero, tipo, iswhats, id_servico) 
						values(:ddd, :numero, :tipo, :iswhats, :id_servico)", array(
				":ddd"=>(int)$this->getddd2_ser(),
				":numero"=>(int)$this->getnumero2_ser(),
				":tipo"=>(int)$this->gettipo2(),
				":iswhats"=>(int)$this->getiswhats2(),
				":id_servico"=>(int)$id
            ));
			}
			
        } catch (Exception $e) {
            var_dump($e->getMessage());
            exit;
        }		
		//$this->setData($res[0]);
	}

	public function saveDestaque($dataIni, $dataFim){

        $sql = new Sql();
        try {
            $sql->query("INSERT INTO tb_destaque(tipo, dt_ini, dt_fim, id_servico) 
						values(:tipo, :dataini, :datafim, :id)", array(
				":tipo"=>$this->gettipo_ser(),
				":dataini"=>$dataIni,
				":datafim"=>$dataFim,
				":id"=>(int)$this->getid_servico()		
            ));
        } catch (Exception $e) {
            var_dump($e->getMessage());
            exit;
        }		
		//$this->setData($res[0]);
	}

	public function update(){

		/* var_dump(
			$this->getnome_ser(),
			$this->getdescricao_ser(),
			(int)$this->gettipo_ser(),
			$this->getcategoria_ser(),
			(int)$this->getcapacidade_ser(),
			(int)$this->getstatus_ser(),
			$this->getitens_ser(),
			(int)$this->getid_servico()	
		);
		exit;  */

		$sql = new Sql();
        try {
			$idServico = (int)$this->getid_servico();
            $sql->query("UPDATE tb_servico SET 
				nome_ser = :nome, 
				descricao_ser = :descricao, 
				tipo_ser = :tipo, 
				categoria_ser = :categoria, 
				capacidade_ser = :capacidade, 
				status_ser = :ativo, 
				itens_ser = :itens
				WHERE id_servico = $idServico", array(
					":nome"=>$this->getnome_ser(),
					":descricao"=>$this->getdescricao_ser(),
					":tipo"=>(int)$this->gettipo_ser(),
					":categoria"=>(int)$this->getcategoria_ser(),
					":capacidade"=>(int)$this->getcapacidade_ser(),
					":ativo"=>(int)$this->getstatus_ser(),
					":itens"=>$this->getitens_ser()	
            ));
        } catch (Exception $e) {
            var_dump($e->getMessage());
            exit;
        }		

	}


	public function saveImg($codigo, $caminho, $tipo, $idServico){
		
        $sql = new Sql();
        try {
            $sql->query("INSERT INTO tb_imagem(codigo_img, caminho_img, tipo_img, id_servico) values(:codigo, :caminho, :tipo, :idServico)", array(
                ":codigo"=>$codigo,
                ":caminho"=>$caminho,
                ":tipo"=>(int)$tipo,
                ":idServico"=>(int)$idServico			
            ));
        } catch (Exception $e) {
            var_dump($e->getMessage());
            exit;
        }		
		//$this->setData($res[0]);
	}

	

	

	
	
	public function selectImg($tipo, $idser){

		$sql = new Sql();
		return $sql->select("SELECT id_imagem FROM tb_imagem WHERE tipo_img = :tipo AND id_servico = :ser", array(
			":tipo"=>(int)$tipo,
			":ser"=>(int)$idser
		));
	}
	
	public function delete(){

		$sql = new Sql();
		$sql->query("DELETE FROM tb_servico WHERE id_servico = :id", array(
			":id"=>$this->getid_servico()
		));
	}

	public function deleteContato(){

		$sql = new Sql();
		$sql->query("DELETE FROM tb_contato WHERE id_servico = :id", array(
			":id"=>$this->getid_servico()
		));
	}

	public function deleteEndereco(){

		$sql = new Sql();
		$sql->query("DELETE FROM tb_endereco WHERE id_servico = :id", array(
			":id"=>$this->getid_servico()
		));
	}

	public function deleteAllImg(){

		$sql = new Sql();
		$sql->query("DELETE FROM tb_imagem WHERE id_servico = :id", array(
			":id"=>$this->getid_servico()
		));
	}

	public function deleteImg($id){

		$sql = new Sql();
		$sql->query("DELETE FROM tb_imagem WHERE id_imagem = :id", array(
			":id"=>(int)$id
		));
	}

}

 ?>