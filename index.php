<?php 
include("config.php");
include("header.php");
?>
    
    
<div class="container">
    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <div class="" id="bxslider-home4">

                <?php 
                    require_once "C:festoupp/vendor/festoupp/php-classes/src/Model/Principal.php";  
                    $principal = Principal::listDestaques(); 
                    $counter = -1;  
                    if( isset($principal) && sizeof($principal) ){ 
                        foreach( $principal as $key => $value )
                        { 
                            $counter++; 
                            ?>
                            <div>                
                                <a href="#"><img src="<?php echo $value["caminho_img"].$value["codigo_img"]; ?> " alt="Slide"></a>
                                
                                <div class="carousel-caption d-none d-md-block carroselimage">
                                    <a href="#"><h2><strong><?php echo $value["nome_ser"]; ?> </strong></h2></a>
                                    <p class="ppp"><?php echo $value["descricao_ser"]; ?> </p>
                                </div>
                            </div>                
                            <?php 
                        }
                    } 
                ?>	
            </div>
        </div><!-- ./Slider -->
    </div> <!-- End slider area -->
</div>
    
    
<!-- <div class="maincontent-area">
    "<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Destaques</h2>
                    <div class="card-page">
                    <div class="product-carousel" id="product">

                        <?php 

                            require_once "C:festoupp/vendor/festoupp/php-classes/src/Model/Principal.php";    
                            
                            //implementar
                            $principal = Principal::listAll(); 
                            $counter1=-1;  
                            if( isset($principal) && ( is_array($principal) || $principal instanceof Traversable ) && sizeof($principal) ){ 
                                foreach( $principal as $key1 => $value1 )
                                { 
                                    $counter1++; 
                                    ?>
                                    <div class="product">
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img src="<?php echo htmlspecialchars($value1["caminho_img"].$value1["codigo_img"], ENT_COMPAT, 'UTF-8', FALSE ); ?> " alt="Produtos">
                                                <div class="product-hover">                                        
                                                    <a href="<?php echo htmlspecialchars( $value1["caminho_ser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="view-details-link"><i class="fa fa-arrow-circle-right"></i> Visitar</a>
                                                </div>
                                            </div>
                                            <h4><?php echo htmlspecialchars( $value1["nome_ser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
                                            <p><?php echo htmlspecialchars( $value1["descricao_ser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>                                    
                                        </div>
                                    </div>
                                    <?php 
                                }
                            } 
                        ?>

                    </div>
                </div>
            </div>
        </div>
                        </div>
    </div>
</div> --> <!-- End main content area -->



<div class="maincontent-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Destaques</h2>
                    <div class="card-page">
                    <div class="product-carousel" id="product">

                        <?php 

                            require_once "C:festoupp/vendor/festoupp/php-classes/src/Model/Principal.php";  
                            $principal = Principal::listDestaques(); 
                            $counter = -1;  
                            if( isset($principal) && sizeof($principal) ) {
                                foreach( $principal as $key => $value )
                                { 
                                    $counter++; 
                                    ?>
                                    <div class="product">
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img src="<?php if($value["codigo_img"] != '' ||  $value["codigo_img"] != NULL){ 
                                                echo $value["caminho_img"].$value["codigo_img"];
                                                }else{
                                                    echo "/res/site/img/servicos/festoupp.png";
                                                } ?> " alt="Produtos">
                                                <div class="product-hover">                                        
                                                    <a href="page-servico.php?id=<?php echo $value["id_servico"]; ?>" class="view-details-link"><i class="fa fa-arrow-circle-right"></i> Visitar</a>
                                                </div>
                                            </div>
                                            <h4><?php echo $value["nome_ser"]; ?></h4>
                                            <p><?php echo $value["descricao_ser"]; ?></p>                                    
                                        </div>
                                    </div>
                                    <?php 
                                } 
                            }
                        ?>
                    </div>                        
                </div>
            </div>
        </div>
                        </div>
    </div>
</div> <!-- End main content area -->


<!-- <script src="https://code.jquery.com/jquery.min.js"></script>
 --><script src="/res/site/js/jquery.min.js"></script>
<script src="/res/site/js/principal.js"></script>

<?php 
include("footer.php");
?>


