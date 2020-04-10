var Demo = (function() {

	function output(node) {
		var existing = $('#result .croppie-result');
		if (existing.length > 0) {
			existing[0].parentNode.replaceChild(node, existing[0]);
		}
		else {
			$('#result')[0].appendChild(node);
		}
	}

	function popupResult(result) {
		var html;
		if (result.html) {
			html = result.html;
		}
		if (result.src) {
			html = '<img src="' + result.src + '" />';
			var img = new Image();
			img.src = result.src;
			output(img);
		}
		/* swal({
			title: '',
			html: true,
			text: html,
			allowOutsideClick: true
		});
		setTimeout(function(){
			$('.sweet-alert').css('margin', function() {
				var top = -1 * ($(this).height() / 2),
					left = -1 * ($(this).width() / 2);

				return top + 'px 0 0 ' + left + 'px';
			});
		}, 1); */
	}

	
	
	var new_image = '', crop_type = 'square', original_image = '', ratio_width = '320', 
					ratio_height='180', pixels_w = '', pixels_h = '', ratio_aspect = '';

	
	
	function reset_image($uploadCrop) {
		$uploadCrop ? $uploadCrop.croppie('destroy') : '';
		
		$('#upload-demo').removeClass("cr-original-image").addClass("img-fluid mx-auto d-block");
		$(".image_overlay .view.overlay").prepend($(".image_overlay .view.overlay > div").html());
		$(".image_overlay .view.overlay > div").remove();
	}
	
	function initCropImage(width, height, type, enable_resize) {
		var $uploadCrop = $('#upload-demo').croppie({
			enableExif: true,
			enableOrientation: true,
			enableZoom: true,
			enforceBoundary: true,
			mouseWheelZoom: true,
			showZoomer: true,
			enableResize: enable_resize,
			/*customClass: "wowy",*/
			viewport: {
				width: width,
				height: height,
				type: type/*circle*/
			}/*,
			 boundary: {
			 width: "100%",
			 height: "100%"
			 }*/
		});
		return($uploadCrop);
	}

	//ODD------------------------------------
	function demoUpload() {
		
		$('#liTipo').prop( "disabled", true );
		$('#liTipo').off('click');
		$('#btnRotate').prop( "disabled", true );
		$('#btnResult').prop( "disabled", true );
		
		var tipo  = 1;
		var lar = 600, alt = 400;		
		var $uploadCrop;
		var crop_type = 'square';
		
		$('#banner').click(function(){
			tipo = 2;	
			lar = 800;
			alt = 300;

			$('#inputTipo').val('BANNER');	
			
			reset_image($uploadCrop);
			$uploadCrop = initCropImage(lar, alt, crop_type,  false);
			//$("#upload-demo").removeClass("img-fluid mx-auto d-block");
			$uploadCrop.croppie('bind', {
				url: new_image
			});
		});
		$('#logo').click(function(){
			tipo = 3;	
			lar = 500;
			alt = 500;	

			$('#inputTipo').val('LOGO');
			
			reset_image($uploadCrop);
			$uploadCrop = initCropImage(lar, alt, crop_type,  false);
			//$("#upload-demo").removeClass("img-fluid mx-auto d-block");
			$uploadCrop.croppie('bind', {
				url: new_image
			});	
		});
		$('#galeriah').click(function(){
			tipo = 1;
			lar = 600;
			alt = 400;	

			$('#inputTipo').val('GALERIA H');
			
			reset_image($uploadCrop);
			$uploadCrop = initCropImage(lar, alt, crop_type,  false);
			//$("#upload-demo").removeClass("img-fluid mx-auto d-block");
			$uploadCrop.croppie('bind', {
				url: new_image
			});		
		});

		$('#galeriav').click(function(){
			tipo = 1;
			lar = 400;
			alt = 600;	

			$('#inputTipo').val('GALERIA V');
			
			reset_image($uploadCrop);
			$uploadCrop = initCropImage(lar, alt, crop_type,  false);
			//$("#upload-demo").removeClass("img-fluid mx-auto d-block");
			$uploadCrop.croppie('bind', {
				url: new_image
			});		
		});
		
		

		function readFile(input) {
 			if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
					$('.upload-demo').addClass('ready');
					$('#liTipo').prop( "disabled", false );
					$('#liTipo').on('click');
					$('#btnRotate').prop( "disabled", false );
					$('#btnResult').prop( "disabled", false );
	            	$uploadCrop.croppie('bind', {
	            		url: e.target.result
	            	}).then(function(){
	            		console.log('jQuery bind complete');
	            	});
					
					new_image = e.target.result;	//NEW
	            	
	            }
	            
	            reader.readAsDataURL(input.files[0]);
	        }
	        else {
		        swal("Sorry - you're browser doesn't support the FileReader API");
		    }
		}

		$uploadCrop = $('#upload-demo').croppie({
			viewport: {
				width: lar,
				height: alt,
				type: 'square'	//'circle'
			},
			enableExif: true,
			enableOrientation: true,
		});

		$('#upload').on('change', function () { 
			readFile(this); 
		});
		
		$('.upload-result').on('click', function (ev) {
			
			getImagem();

			$uploadCrop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function (resp) {
				popupResult({
					src: resp
				});
			});
		});


		$('.rotate_left, .rotate_right').on('click', function (ev) {
			$uploadCrop.croppie('rotate', parseInt($(this).data('deg')));
		});

		
	}

	function getImagem(){

		
	
		let tipoImg = '';
		if($('#banner').is(':checked')){
			tipoImg = $('#banner').val();
		}else if($('#logo').is(':checked')){
			tipoImg = $('#logo').val();
		}else if($('#galeriah').is(':checked')){
			tipoImg = $('#galeriah').val();
		}else if($('#galeriav').is(':checked')){
			tipoImg = $('#galeriav').val();
		}
	
		if(tipoImg == '') {
			toastr.warning('Informe o Tipo de imagem');
		}else{
	
			var file = $("#upload").get(0).files;

			if (file != 'undefined' && file.length > 0) {
	
				//var nome = $("#fileinput_widget").get(0).files[0].name;
				//var extensao = nome.substring(nome.length - 4);
				var data = new FormData();
				//var imgname = _idImagem + '_' + date + extensao; //codigo 
	
				//data.append("ArquivoTemp", $("#fileinput_widget").get(0).files[0].name);
				//data.append("ArquivoTemp", imgname);
				data.append("imagem", file[0]);
				data.append("tipoimg", tipoImg);
				//data.append("idImg", _idImagem);
				
				
				//SetImagem(data);
	
				//var ajax = new XMLHttpRequest();
				//ajax.upload.addEventListener("progress", progressHandler, false);
				//ajax.addEventListener("load", completeHandler, false);
				//ajax.open("POST", "../../../../vendor/festoupp/php-classes/src/Controller/ImagemController.php", true);
				//ajax.send(data);
	
				/*
				if (_modCadastrar == 1) {
					SetProduto('cadastrar', 'lanche', _iten);
				}
				else if (_modCadastrar == 2) {
					SetProduto('alterar', 'lanche', _iten);
				}
				*/
			}
			else {
				toastr.warning('Escolha um arquivo');
			}
		}
	}

	

	/* function bindNavigation () {
		var $html = $('html');
		$('nav a').on('click', function (ev) {
			var lnk = $(ev.currentTarget),
				href = lnk.attr('href'),
				targetTop = $('a[name=' + href.substring(1) + ']').offset().top;

			$html.animate({ scrollTop: targetTop });
			ev.preventDefault();
		});
	} */

	function init() {
		//bindNavigation();
		//demoMain();
		//demoBasic();	
		//demoVanilla();	
		//demoResizer();
		demoUpload();
		//demoHidden();
	}

	return {
		init: init
	};
})();


// Full version of `log` that:
//  * Prevents errors on console methods when no console present.
//  * Exposes a global 'log' function that preserves line numbering and formatting.
(function () {
  var method;
  var noop = function () { };
  var methods = [
      'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
      'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
      'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
      'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {}); 
  while (length--) {
    method = methods[length]; 
    // Only stub undefined methods.
    if (!console[method]) {
        console[method] = noop;
    }
  } 
  if (Function.prototype.bind) {
    window.log = Function.prototype.bind.call(console.log, console);
  }
  else {
    window.log = function() { 
      Function.prototype.apply.call(console.log, console, arguments);
    };
  }
})();

function SetImagem(dados){
    $.ajax({   
        async: false,
        url: "../../../../vendor/festoupp/php-classes/src/Controller/ImagemController.php",//'../controller/salaoController.php',   
        type : 'POST', 
        data : dados,
        dataType: 'json',
        processData: false,  
        contentType: false,        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(data){ 
            $('#modalAdicioarImg').modal('hide');
           // _servicos = data;
           //$('#modalAddServico').modal('hide');
            //GetServico();
            LimpaModalAddImg();
            GetGaleria();
        },   
        error: function(erro, er){   
            $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
            toastr.warning(erro.responseText);
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          
        }   
    });  
}
