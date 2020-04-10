<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/Model.php');
require_once($_SERVER["DOCUMENT_ROOT"]. '/vendor/festoupp/php-classes/src/DB/Sql.php');

//var_dump("TESTE");exit;
 
    class Upload extends Model{
        private $arquivo;
        private $altura;
        private $largura;
        private $pasta;
        private $id;
        private $tipoimg;
        
 
        function __construct($arquivo, $largura, $altura, $pasta, $id, $tipoimg){
            $this->arquivo = $arquivo;
            $this->altura  = $altura;
            $this->largura = $largura;
            $this->pasta   = $pasta;
            $this->id = $id;
            $this->tipoimg = $tipoimg;
        }
         
        private function getExtensao(){
            //retorna a extensao da imagem 
            $v1 =  explode('.', $this->arquivo['name']);
            $v2 = end($v1);
            return $extensao = strtolower($v2);
        }
         
        private function ehImagem($extensao){
            $extensoes = array('gif', 'jpeg', 'jpg', 'png');     // extensoes permitidas
            if (in_array($extensao, $extensoes))
                return true;    
        }
         
        //largura, altura, tipo, localizacao da imagem original
        private function redimensionar($imgLarg, $imgAlt, $tipo, $img_localizacao){

            if($this->tipoimg == '1'){
                
                if($imgAlt > $this->altura || $imgLarg > $this->largura){

                    if ( $imgLarg > $imgAlt ){
                        $novaLarg = $this->largura;
                        $novaAlt = round( ($novaLarg / $imgLarg) * $imgAlt );
                       
                    }
                    elseif ( $imgAlt > $imgLarg ){
                        
                        $novaAlt = $this->altura;
                        $novaLarg = round( ($novaAlt / $imgAlt) * $imgLarg );
                        
                    }
                    else // altura == largura
                        $novaAltura = $novaLargura = max($this->largura, $this->altura);                 
                }
            }
            else if($this->tipoimg == '2') {

                

                if($imgAlt > $imgLarg || $imgAlt == $imgLarg) {
                    return "1";
                }

                if($imgLarg > $imgAlt){
                    $novaLarg = "1200";
                    $novaAlt = "500";//round( ($novaLarg / $imgLarg) * $imgAlt );
                }
            }   
            else{
                
                if($imgAlt > 1000){
                    $novaLarg = "1000";
                    $novaAlt = "1000";
                }else{
                    $novaLarg = $imgLarg;
                    $novaAlt = $imgAlt;
                }
            }

            //cria uma nova imagem com o novo tamanho   
            $novaimagem = imagecreatetruecolor($novaLarg, $novaAlt); 
            
            
             
            switch ($tipo){
                case 1: // gif                    
                    $origem = imagecreatefromgif($img_localizacao);
                    imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
                    $novaLarg, $novaAlt, $imgLarg, $imgAlt);
                    imagegif($novaimagem, $img_localizacao, 1);
                    break;
                case 2: // jpg                    
                    $origem = imagecreatefromjpeg($img_localizacao);                    
                    imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
                    $novaLarg, $novaAlt, $imgLarg, $imgAlt);
                    imagejpeg($novaimagem, $img_localizacao);                    
                    break;
                case 3: // png
                    
                    //$png = imagecreatetruecolor(800, 600);
                    imagesavealpha($novaimagem, true);
                    $trans_colour = imagecolorallocatealpha($novaimagem, 0, 0, 0, 127);
                    imagefill($novaimagem, 0, 0, $trans_colour);  

                    $origem = imagecreatefrompng($img_localizacao);
                    imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
                    $novaLarg, $novaAlt, $imgLarg, $imgAlt);
                    imagepng($novaimagem, $img_localizacao, 5, PNG_ALL_FILTERS);
                    break;
            }
             
            //destroi as imagens criadas
            imagedestroy($novaimagem);
            imagedestroy($origem);
        }
         
        public function salvar(){  
            
            $extensao = $this->getExtensao();
             
            //gera um nome unico para a imagem em funcao do tempo
            $novo_nome = $this->id . '_' . date("dmYHis") . '.' . $extensao;
            //localizacao do arquivo 
            $destino = $this->pasta . $novo_nome;
             
            //move o arquivo
            if (! move_uploaded_file($this->arquivo['tmp_name'], $destino)){
                if ($this->arquivo['error'] == 1)
                    return "0";
                else{
                    return "Erro " . $this->arquivo['error'];
                }
                    
            }
                 
            if ($this->ehImagem($extensao)){                                             
                //pega a largura, altura, tipo e atributo da imagem
                list($largura, $altura, $tipo, $atributo) = getimagesize($destino);
                $res = $this->redimensionar($largura, $altura, $tipo, $destino);
                if($res == '1')
                    return $res;
            }
            return $novo_nome;
        }                       
    }
?>