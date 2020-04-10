<?php
    require_once "config.php";
    include("header.php");

    $id = isset($_GET['id']) ? $_GET['id'] : "";
?>

<p id="funcao" hidden>servico</p>
<p id="id" hidden><?php echo $id ?></p>







<!--
  <div class="borda">      
    
      <center><h1>Galeria</h1></center>
      
        <div class="wrapper">
          <div class="box" style="background-img: url(../res/img/salao/img1.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img2.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img3.jpg)"></div>

          <div class="box" style="background-img: url(../res/img/salao/img4.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img5.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img6.jpg)"></div>

          <div class="box" style="background-img: url(../res/img/salao/img1.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img3.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img5.jpg)"></div>
        </div>
        <div class="wrapper">
          <div class="box" style="background-img: url(../res/img/salao/img1.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img2.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img3.jpg)"></div>

          <div class="box" style="background-img: url(../res/img/salao/img4.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img5.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img6.jpg)"></div>

          <div class="box" style="background-img: url(../res/img/salao/img1.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img3.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img5.jpg)"></div>
        </div>
        <div class="wrapper">
          <div class="box" style="background-img: url(../res/img/salao/img1.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img2.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img3.jpg)"></div>

          <div class="box" style="background-img: url(../res/img/salao/img4.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img5.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img6.jpg)"></div>

          <div class="box" style="background-img: url(../res/img/salao/img1.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img3.jpg)"></div>
          <div class="box" style="background-img: url(../res/img/salao/img5.jpg)"></div>
        </div>
    
  </div>

-->
<br/>
<!-- <div class="container" id="alert"> 
<div class='alert alert-info alert-dismissible'>    
    <center><h2 >Orçamento solicitado com sucesso!</h2></center>
</div>
</div> -->

<!--------------------------------------------------LOGO DA EMP../resA-------------------------------------->
<!--
<div class="container">
<div class="capa">
    <div class="vitrine">
        <div class="vitrineCapa">
            <img  class="imgCapa" src="../res/img/salao/img1.jpg"/>
        
            <h1 class="local">Salão Pinheiro</h1>
        
            <div class="logo">        
                <img class="imgLogo" src="../res/img/salao/pinheiro.jpg"/>            
            </div>
        </div>                
    </div>
</div>
</div>
-->


<div class="container containerBanner">
    <div class="row mb-4 ">
        <div class="col-md-12 ">
			<div class="bannerEmpresa" id="bannerServico">
			
			    <!-- <img  class="imgCapa rounded" src="../res/site/img/servicos/5_1585248760431.jpg"/>        
                <h1 class="local" id="nomeServico">Salão Pinheiro</h1>        
                <div class="logo" id="logoServico">        
                    <img class="imgLogo" src="../res/site/img/servicos/5_1585249097791.jpg"/>            
                </div> -->
			
			</div>
        </div>
    </div>
</div>
<br/> 

<!-------------------------------------------------CARD DE INFORMAÇÕES------------------------------------>
<div class="container" style="margin-top: 30px;">
    <div class="row mb-2">
        <div class="col-md-4">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" id="card-info">
              
              <!-- <h3 class="mb-0">Salão Pinheiro</h3>
              <div class="mb-1 text-muted">Rua Lorem ipsum dolor, 93, Jardim Lorem ipsun - Presidente Prudente/SP</div>
              <div class="mb-1 text-muted"><span class="fas fa-phone">&nbsp &nbsp (18) 99727-9377 &nbsp &nbsp &nbsp &nbsp</span><span class="fab fa-whatsapp"></span></div>
              <div class="mb-1 text-muted"><span class="fas fa-phone">&nbsp &nbsp (18) 3xxx-xx22</span></div>
              <div class="mb-1 text-muted"><a href="#"><span class="fab fa-internet-explorer">&nbsp &nbsp www.festoupp.com</span></a></div>
              <div class="mb-1 text-muted"><strong>Capacidade: </strong>300 pessoas</div>
              <div class="mb-1 text-muted"><p><strong>Itens: </strong>Ar-condicionado, Geladeira, Freezer, Ventilado../res</p></div>              
            --> </div>            
          </div>
        </div>


        <div class="col-md-8">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" style="height: 400px">             
            
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3696.758221038858!2d-51.42873218521711!3d-22.097048685429492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9493f6b2053f680b%3A0x3d8f2fe7bbe9b26!2sR.+Jos%C3%A9+F%C3%A9lix+da+Silva%2C+63+-+Parque+../res.+Caranda%2C+P../res.+Prudente+-+SP%2C+19026-540!5e0!3m2!1spt-BR!2sbr!4v1551105554930" 
                    width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen>
                </iframe>            
            </div>            
          </div>
        </div>        
      </div>
</div>




<!-------------------------------------------------------GALERIA--------------------------------------->
<div class="container-fluid">
  <div class="borda" id="div-galery">    

    <p class="page-description text-center">Galeria</p>
    
    <div class="tz-gallery">

        <div class="row" id="galery" >
            <!-- <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/img1.jpg">
                    <img src="../res/img/salao/img1.jpg" alt="Park">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/img2.jpg">
                    <img src="../res/img/salao/img2.jpg" alt="Bridge">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/tunnel.jpg">
                    <img src="../res/img/salao/tunnel.jpg" alt="Tunnel">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/coast.jpg">
                    <img src="../res/img/salao/coast.jpg" alt="Coast">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/rails.jpg">
                    <img src="../res/img/salao/rails.jpg" alt="Rails">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/traffic.jpg">
                    <img src="../res/img/salao/traffic.jpg" alt="Traffic">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/rocks.jpg">
                    <img src="../res/img/salao/rocks.jpg" alt="Rocks">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/benches.jpg">
                    <img src="../res/img/salao/benches.jpg" alt="Benches">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/sky.jpg">
                    <img src="../res/img/salao/sky.jpg" alt="Sky">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/rocks.jpg">
                    <img src="../res/img/salao/rocks.jpg" alt="Rocks">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/benches.jpg">
                    <img src="../res/img/salao/benches.jpg" alt="Benches">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/sky.jpg">
                    <img src="../res/img/salao/sky.jpg" alt="Sky">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/rocks.jpg">
                    <img src="../res/img/salao/rocks.jpg" alt="Rocks">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/benches.jpg">
                    <img src="../res/img/salao/benches.jpg" alt="Benches">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/sky.jpg">
                    <img src="../res/img/salao/sky.jpg" alt="Sky">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/rocks.jpg">
                    <img src="../res/img/salao/rocks.jpg" alt="Rocks">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/benches.jpg">
                    <img src="../res/img/salao/benches.jpg" alt="Benches">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/sky.jpg">
                    <img src="../res/img/salao/sky.jpg" alt="Sky">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/img2.jpg">
                    <img src="../res/img/salao/img2.jpg" alt="Bridge">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/tunnel.jpg">
                    <img src="../res/img/salao/tunnel.jpg" alt="Tunnel">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/coast.jpg">
                    <img src="../res/img/salao/coast.jpg" alt="Coast">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/rails.jpg">
                    <img src="../res/img/salao/rails.jpg" alt="Rails">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/traffic.jpg">
                    <img src="../res/img/salao/traffic.jpg" alt="Traffic">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/rocks.jpg">
                    <img src="../res/img/salao/rocks.jpg" alt="Rocks">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/img2.jpg">
                    <img src="../res/img/salao/img2.jpg" alt="Bridge">
                </a>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/tunnel.jpg">
                    <img src="../res/img/salao/tunnel.jpg" alt="Tunnel">
                </a>
            </div>
            <div class="col col-sm-4 col-md-3 col-lg-2  col-xl-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/coast.jpg">
                    <img src="../res/img/salao/coast.jpg" alt="Coast">
                </a>
            </div>
            <div class="col col-sm-4 col-md-3 col-lg-2  col-xl-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/rails.jpg">
                    <img src="../res/img/salao/rails.jpg" alt="Rails">
                </a>
            </div>
            <div class="col col-sm-4 col-md-3 col-lg-2  col-xl-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/traffic.jpg">
                    <img src="../res/img/salao/traffic.jpg" alt="Traffic">
                </a>
            </div>
            <div class="col col-sm-4 col-md-3 col-lg-2  col-xl-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/rocks.jpg">
                    <img src="../res/img/salao/rocks.jpg" alt="Rocks">
                </a>
            </div>
            <div class="col col-sm-4 col-md-3 col-lg-2  col-xl-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/img2.jpg">
                    <img src="../res/img/salao/img2.jpg" alt="Bridge">
                </a>
            </div>
            <div class="col col-sm-4 col-md-3 col-lg-2  col-xl-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/tunnel.jpg">
                    <img src="../res/img/salao/tunnel.jpg" alt="Tunnel">
                </a>
            </div>
            <div class="col col-sm-4 col-md-3 col-lg-2  col-xl-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/coast.jpg">
                    <img src="../res/img/salao/coast.jpg" alt="Coast">
                </a>
            </div>
            <div class="col col-sm-4 col-md-3 col-lg-2  col-xl-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/rails.jpg">
                    <img src="../res/img/salao/rails.jpg" alt="Rails">
                </a>
            </div>
            <div class="col col-sm-4 col-md-3 col-lg-2  col-xl-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/traffic.jpg">
                    <img src="../res/img/salao/traffic.jpg" alt="Traffic">
                </a>
            </div>
            <div class="col col-sm-4 col-md-3 col-lg-2  col-xl-1 imgGaleria">
                <a class="lightbox" href="../res/img/salao/rocks.jpg">
                    <img src="../res/img/salao/rocks.jpg" alt="Rocks">
                </a>
            </div> -->
        </div>

    </div>

</div>
</div>


<br/>




<!---------------------------------------------FACEBOOK AND ORÇAMENTO----------------------------------->
<div class="container">
    <div class="row mb-2">
        <div class="col col-sm-12 col-md-8 col-lg-6 col-xl-6">
            <div class="jumbotron" >
                <div class="">
                
                <div  style="">       
                    <div id="fb-root"></div>
                    <script async defer src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2"></script>        
                    <div  class="fb-page" data-width="400" data-height="625" data-href="https://www.facebook.com/sapatosdaday/" data-tabs="timeline"
                        data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/sapatosdaday/" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/sapatosdaday/">Sapatos da Day</a></blockquote>
                    </div>              
                </div>
            
                </div>            
            </div>
        </div>

        

        <div class="col col-sm-12 col-md-8 col-lg-6 col-xl-6">
            <div class="jumbotron">
                <div class="">             
            
                <div class="borda2" style="background-color: white;">
                    <center><h1 style="color: black">Faça seu orçamento</h1></center>
                    <br/>
                    <form action="sPinheiro.php" method="POST">

                        <label>Nome</label>
                        <input type="text" class="form-control">
                        <br/>

                        <div class="row">
                        <div class="col-md-7">
                            <label>Data</label>
                            <input type="date" class="form-control">
                            <br/>
                        </div>
                        <div class="col-md-5">
                            <label>Qtde de pessoas</label>
                            <input type="text" class="form-control">
                            <br/>
                        </div>
                        </div>

                        <label>Telefone</label>
                        <input type="phone" class="form-control">
                        <br/>

                        <label>Email</label>
                        <input type="email" class="form-control">
                        <br/>
                        <br/>
                        <button type=""  value="" class="form-control btn-enviar">Solicitar</button>
                        
                    </form>
                </div>         
                

                </div>            
            </div>
        </div> 
    </div>
</div>


<!-- <script src="https://code.jquery.com/jquery.min.js"></script>
 --><script src="/res/site/js/jquery.min.js"></script>
<script src="/res/site/js/servico.js"></script>





<?php
  include("footer.php");
?>