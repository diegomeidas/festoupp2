<?php 

require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/Model.php');
require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/DB/Sql.php');

class Principal extends Model {	

	
	public static function listAll(){

		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_servico a 
							LEFT JOIN tb_imagem b ON a.id_servico = b.id_servico
							WHERE b.tipo_img = 2");
	}

	public static function listPagina($tipo, $cat){

		$sql = new Sql();
		return $sql->select("SELECT a.*, b.caminho_img, b.codigo_img 
							FROM tb_servico a
							LEFT JOIN tb_imagem b ON b.id_servico = a.id_servico AND b.tipo_img = 2
							WHERE a.tipo_ser = $tipo AND (

							CASE WHEN $cat = 1 THEN a.categoria_ser IN(1, 4, 5)
							ELSE 
								CASE WHEN $cat = 2 THEN a.categoria_ser IN(2, 4, 6)  
								ELSE 
									CASE WHEN $cat = 3 THEN a.categoria_ser IN(3, 5, 6)
									ELSE 
										CASE WHEN $cat = 7 THEN a.categoria_ser IN(1,2,3,4,5,6,7)  
										END
									END
								END 
							END)
							ORDER BY nome_ser");
	}

	public static function listImagens($id){

		$sql = new Sql();
		return $sql->select("SELECT * 
							FROM tb_imagem  
							WHERE id_servico = $id ");
	}

	public static function listDestaques(){

		$sql = new Sql();
		$res = $sql->select("SELECT * 
							FROM tb_destaque a
							INNER JOIN tb_servico b ON a.id_servico = b.id_servico
							INNER JOIN tb_cliente c ON c.id_cliente = b.id_cliente 
							LEFT JOIN tb_imagem d ON d.id_servico = b.id_servico AND d.tipo_img = 2
							ORDER BY b.nome_ser"
		);

		//var_dump($res);exit;
		return $res;
	}

	public static function listSlides(){

		$sql = new Sql();
		$res = $sql->select("SELECT * 
							FROM tb_destaque a
							INNER JOIN tb_servico b ON a.id_servico = b.id_servico
							INNER JOIN tb_cliente c ON c.id_cliente = b.id_cliente 
							LEFT JOIN tb_imagem d ON d.id_servico = b.id_servico AND d.tipo_img = 3"
		);

		//var_dump($res);exit;
		return $res;
	}

	public static function getServico($id){

		$sql = new Sql();
		return $sql->select("SELECT * 
							FROM tb_servico a 
							LEFT JOIN tb_contato b on b.id_servico = a.id_servico  
							WHERE a.id_servico = $id ");
	}


}

 ?>