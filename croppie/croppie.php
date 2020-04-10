<?php
	$idImagem = isset($_GET['idimg']) ? $_GET['idimg'] : '0';
?>
<html>
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Croppie - Foliotek</title>

        <!-- <meta name="description" content="Croppie is an easy to use javascript image cropper.">

        <meta property="og:title" content="Croppie - a javascript image cropper">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://foliotek.github.io/Croppie">
        <meta property="og:description" content="Croppie is an easy to use javascript image cropper.">
        <meta property="og:image" content="https://foliotek.github.io/Croppie/demo/hero.png">

        <link href='//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'> -->
        <link rel="Stylesheet" href="/res/admin/dist/croppie/css/prism.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link rel="Stylesheet" type="text/css" href="bower_components/sweetalert/dist/sweetalert.css" /> -->
        <link rel="Stylesheet" href="/res/admin/dist/croppie/css/croppie.css" />
        <link rel="Stylesheet" href="/res/admin/dist/croppie/css/demo.css" />
        <!-- <link rel="icon" href="//foliotek.github.io/favico-64.png" /> -->

        <link rel="Stylesheet" href="/res/admin/dist/croppie/css/bootstrap.css" />
        <link rel="Stylesheet" href="/res/default/css/toastr.min.css" />

        <style>
		.fa{
			font-size: none !important;
		}
		
		.check{
			background-color: #777; 
			border-radius: 3px; 
			color: #fff; 
			font-size: 12px; 
			padding: 4px;
			margin-right: 20px;
		}	
		
		
		</style>
    </head>
    <body>		
				<p id="idImg"><?php echo $idImagem ?></p>
                <nav class="navbar navbar-inverse navbar-fixed-top" style="padding-bottom: 0px; text-align: center;">
				  <div class="container">	
				  
				  
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">FestouPP - Croppie</a>
					</div>
				  
				  
				  
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li>
							<a class="btn2 file-btn botoes" title="upload" style="margin: 10px 40px">
								<span class="fa fa-upload" aria-hidden="true"></span>
								<input type="file" id="upload" class="btn-info" value="Choose a file" accept="image/*" />
							</a>
						</li>
						<li><a id="liTipo" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tipo Recorte <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li id="banner"><a href="#">Banner</a></li>
							<li role="separator" class="divider"></li>
							<li id="logo"><a href="#">Logo</a></li>
							<li role="separator" class="divider"></li>
							<li id="galeriah"><a href="#">Galeria H</a></li>			
							<li role="separator" class="divider"></li>							
							<li id="galeriav"><a href="#">Galeria V</a></li>
						  </ul>
					  </li>
					  
					  <li><input type="text" id="inputTipo" class="form-control" style="margin-top: 10px; width: 100px; font-size: 12px;" disabled></li>
					  
					  <li>
						<button type="button" id="btnRotate" title="girar" class="btn btn-warning rotate_right hidden-xs-up w-100 float-right mr-0 " 
							data-deg="90" style="margin: 10px 0 0 60px">
							<span class="fa fa-repeat" aria-hidden="true"></span>
						</button>
					  </li>
						
					  <li>
						<button id="btnResult" class="btn btn-info upload-result" title="salvar" style="margin: 10px">
							<span class="fa fa-download" aria-hidden="true"></span>
						</button>
					  </li>
						
					  </ul>
					  
					  <ul class="nav navbar-nav navbar-right">
						<li><a href="#" class="navbar-link">Voltar</a></li>
						
					  </ul>
					</div><!-- /.navbar-collapse -->
								  
				  
				  
				  
				  
				  
				  
				  
					
						<!-- <a class="btn file-btn botoes" title="upload">
							<span class="fa fa-upload" aria-hidden="true"></span>
							<input type="file" id="upload" class="btn btn-info" value="Choose a file" accept="image/*" />
						</a>
						
						<input type="radio" id="banner" name="banner" value="2">							
						<label class="check" for="banner">Banner</label>
					
						<input type="radio" id="logo" name="logo" value="3">
						<label class="check" for="logo">Logo</label>
					
						<input type="radio" id="galeriah" name="galeriah" value="1">
						<label class="check" for="galeriah">Galeria H</label>
					
						<input type="radio" id="galeriav" name="galeriav" value="1">
						<label class="check" for="galeriav">Galeria V</label>						
					
						<button type="button" id="btnRotate" title="girar" class="btn btn-warning rotate_right hidden-xs-up w-100 float-right mr-0 botoes" 
						data-deg="90" style="margin-left: 60px;">
							<span class="fa fa-repeat" aria-hidden="true"></span>
						</button>
					
						<button id="btnResult" class="btn btn-info upload-result botoes" title="salvar" style="">
						<span class="fa fa-download" aria-hidden="true"></span>
						</button>
						
						<p class="navbar-text navbar-right" style="margin-top: 25px;"> <a href="#" class="navbar-link">Voltar</a></p> -->
						
						
					
				  </div>
				  
				  <!-- <button id="btnResult" class="btn btn-danger botoes navbar-right" title="voltar" style="">
					<span class="fa fa-close" aria-hidden="true"></span>
					</button> -->
				</nav>
				
                <div class="demo-wrap upload-demo">
                    
                    <div class="row" style="margin: 40px;">
                        
                        <div class="row">
						
							<div class="col-sm-1 col-md-1 col-lg-1"></div>
							
                            <div class="col-sm-10 col-md-10 col-lg-10">
							
                                <div class="upload-msg" style="">
                                    <img src="/res/admin/dist/croppie/img/group.png" width="300" height="auto"/>
									<p>Upload image</p>
                                </div>
								
                                <div class="upload-demo-wrap" style="height: 60rem;">
                                    <div id="upload-demo"></div>
                                </div>
                            </div>
							
							<div class="col-sm-1 col-md-1 col-lg-1"></div>
                        


                        
                            <!-- <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1" style="text-align: center;">
								<div class="row">
									<a class="btn file-btn" style="margin: 10px 0px" title="upload">
										<span class="fa fa-upload" aria-hidden="true"></span>
										<input type="file" id="upload" class="btn btn-info" value="Choose a file" accept="image/*" />
									</a>
								</div>
								
								<div class="row">
									<div class="check">
										<input type="radio" id="banner" name="banner" value="2">
										<span for="banner">Banner</span><br>
									
										<input type="radio" id="logo" name="logo" value="3">
										<span for="logo">Logo</span><br>
									
										<input type="radio" id="galeriah" name="galeriah" value="1">
										<span for="galeriah">Galeria H</span><br>
									
										<input type="radio" id="galeriav" name="galeriav" value="1">
										<span for="galeriav">Galeria V</span><br>
									</div>
								</div>
								<br>
								
								<div class="row">
									<button type="button" id="btnRotate" title="girar" class="btn btn-info rotate_right hidden-xs-up w-100 float-right mr-0" 
									data-deg="90">
										<span class="fa fa-repeat" aria-hidden="true"></span>
									</button>
								</div>
								
								<div class="row" style="margin: 10px 0px">
									<button id="btnResult" class="btn btn-info upload-result" title="salvar">
									<span class="fa fa-download" aria-hidden="true"></span>
									</button>
								</div>
                                
                            </div> -->
                        </div>
						
                    </div>
					
					<div class="row" style="margin: 40px;">
							<div class="col-md-12">
								<div id="result"></div>
							</div>
						</div>
                </div>
				
				
				
        <footer>
            <!-- Copyright &copy; <span id="year">2017</span> | Foliotek -->
        </footer>
        <script src="/res/admin/dist/croppie/js/jquery.min.js"></script>
		<script src="/res/default/js/jquery.mask.js"></script>
        <script src="/res/admin/dist/croppie/js/bootstrap.js"></script>
        <!-- <script src="demo/js/jquery.min.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="bower_components/jquery/dist/jquery.min.js"><\/script>')</script> -->
        <script src="/res/admin/dist/croppie/js/prism.js"></script>
        <!-- <script src="bower_components/sweetalert/dist/sweetalert.min.js"></script> -->

        <script src="/res/admin/dist/croppie/js/croppie.js"></script>
        
        <!-- <script src="js/demo.js"></script> -->
        <script src="/res/admin/dist/js/servico.js"></script>
        <script src="/res/default/js/toastr.min.js"></script>
		
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
        <!-- <script src="bower_components/exif-js/exif.js"></script> -->
        <script>
            /* document.getElementById('year').innerHTML = (new Date).getFullYear(); */
            Demo.init();
        </script>
        <!-- <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-2398527-4');ga('send','pageview');
        </script> -->
        <!-- <style href="https://github.com/foliotek/croppie" class="github-corner"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; left: 0; transform: scale(-1, 1); -webkit-transform: sale(-1, 1);"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style></a> -->
    </body>
</html>
