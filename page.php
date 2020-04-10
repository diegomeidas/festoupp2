<?php
  require_once "config.php";
  include("header.php");

  
  /* $funcao = isset($_GET['f']) ? $_GET['f'] : ""; */
  $tipo = isset($_GET['t']) ? $_GET['t'] : "";
  $categoria = isset($_GET['c']) ? $_GET['c'] : "";
?>
<!---------------------------------------------Carousel-------------------------------------------->
<br>

<p id="funcao" hidden>pagina</p>
<p id="tipo" hidden><?php echo $tipo ?></p>
<p id="categoria" hidden><?php echo $categoria ?></p>


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

<!-- 
<div class="carrosel" style="margin: -5px;">  
<div class="shadow p-3 mb-5 bg-white rounded">
<div class="bd-example">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../res/img/buffet.jpg" class="d-block w-100 rounded" alt="...">
            <div class="carousel-caption d-none d-md-block carroselimage">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../res/img/fotografo.jpg" class="d-block w-100 rounded" alt="...">
            <div class="carousel-caption d-none d-md-block carroselimage">
              <h5>Second slide label</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../res/img/salao.jpg" class="d-block w-100 rounded" alt="...">
            <div class="carousel-caption d-none d-md-block carroselimage">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
</div>
  </div>
 -->
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
                                                  <img src="<?php if($value["codigo_img"] != '' ){ 
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




<h1>Salões</h1>
  <div class="container-fluid">
    
    <div class="card-page">
      <div class="row" id="linha">
        <!--js function-->
      </div>
    </div>
  </div>
  <br><br>
<!------------------------------------------------------CARD------------------------------------------------------>
<!-- <div class="jumbotron">
    <div class="row" id="">
      <div class="col-md-3">
          <div class="card" >
              <a href="sPinheiro.php"><img src="../res/img/buffet.jpg" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <p id="nome"><strong></strong></p>
                <p id="descricao" class="card-text"></p>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="card" >
              <img src="../res/img/salao.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p><strong>Salão de Festas Pinheiro</strong></p>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                  content.</p>
              </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" >
                <img src="../res/img/fotografo.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p><strong>Salão de Festas Pinheiro</strong></p>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                </div>
              </div>
          </div>

          <div class="col-md-3">
              <div class="card" >
                  <img src="../res/img/salao.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p><strong>Salão de Festas Pinheiro</strong></p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                      content.</p>
                  </div>
                </div>
            </div>
    </div>

    <br/>


    <div class="row">
            <div class="col-md-3">
                <div class="card" >
                    <img src="../res/img/buffet.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p><strong>Salão de Festas Pinheiro</strong></p>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p>
                    </div>
                  </div>
            </div>
            <div class="col-md-3">
                <div class="card" >
                    <img src="../res/img/salao.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="card" >
                      <img src="../res/img/fotografo.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                          content.</p>
                      </div>
                    </div>
                </div>
      
                <div class="col-md-3">
                    <div class="card" >
                        <img src="../res/img/salao.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                        </div>
                      </div>
                  </div>
          </div>
  </div>

 -->
    

  </div>

<!--   <script src="https://code.jquery.com/jquery.min.js"></script>
 -->  <script src="/res/site/js/jquery.min.js"></script>
  <script src="/res/site/js/servico.js"></script>

  <?php
  include'footer.php'
?>