//VARIAVEIS
var _servicos = null;
var _servico = null;
var _funcao = '';
var _index = null;
var _letras = '';
var _galeria = null;
var _idImagem = null;
var _idServico = null;
var _file;
var _tipoImg = '1';
var _src;
var _imgname;
var _extensao;

$(document).ready(function(){

    // croppie
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
    //croppie end

    $( "#formCadastrarEditarServico" ).validate({
        debug: true,
        rules: {
            nome: {
                required: true,               
            },
            tipo_ser:{
                required: true,
            },
            email:{
                email: true
            },
            checkOption: {
                required: true,
                minlength: 1
            }            
        },
        messages:{            
            nome: "Informe o nome do serviço",
            email: "Informe um email válido",
            checkOption: "Selecione ao menos uma categoria"
        }
    });



    GetServico();
    
    $('#btnAddServico').click(function(){
        _funcao = '1';
        $('#modalAddServico').modal('show');
        LimpaTelaCadastro();
    });

    $('#cliente').keypress(function(char){
        SelecionaCliente(char);
    });

    $('#btnCadastrarServico').click(function(){
        //Validar();
        if(FormToObj())
            SetServico();
    }); 
    
    
    
    $('#btnAdicionarImg').click(function(){        
        //$('#modalAdicioarImg').modal('show');
        
        
        //$('#contentAddImg').fadeIn(1000); 
        
        //redireciona
        /* window.location.href = "/views/crop/crop-simples.php?idimg="+_idImagem;  */
        window.location.href = "/croppie/croppie.php?idimg=" + _idImagem; 

    });

    $('#btnFecharImg').click(function(){
        $('#contentAddImg').fadeOut(1000);
    });
    
    

    $('#modalGaleria').on('hidden.bs.modal', function (e) {
        $('#contentAddImg').fadeOut(1000);
    })

    
    

    //UPLOAD DE IMAGEM
    /* $('.fileinput').on('change.bs.fileinput', function () {
        $('#hfNomeArquivo').val('');
    });

    //ccarega imagem qdo seleciona
    $("#fileinput_widget").change(function () {
        upload(this);
    });

    $('#btnAddImg').click(function () {
        //getImagem();
    }); */

    $('#btn-crop').click(function(){
        getImagem();        
    });

    

    /*
    $('#modalAddServico').on('hidden.bs.modal', function (e) {
        LimpaTelaCadastro();
    });

    $('#btnCadastrar').click(function(){
        $('#modalAddServico').modal('hide');
        FormToObj();
        SetUser();
    });
    */

    $('#btnConfirm').click(function(){
        $('#modalConfirm').modal('hide');
        DeleteServico();
    });
    

});

//FUNÇÕES

//--------------------mascaras start
var options =  {
    onKeyPress: function(cep, e, field, options) {
        var masks = ['0000-0000', '00000-0000'];
        var mask = (cep.length>7) ? masks[1] : masks[0];
        $('#numero').mask(mask, options);
    }
};    
$('#numero').mask('0000-0000', options);

var options2 =  {
    onKeyPress: function(cep, e, field, options) {
        var masks = ['0000-0000', '00000-0000'];
        var mask = (cep.length>7) ? masks[1] : masks[0];
        $('#numero2').mask(mask, options);
    }
};    
$('#numero2').mask('0000-0000', options2);

//--------------------mascaras end

//--------------funções croppie
var Demo = (function() {

	function output(node) {
		var existing = $('#result .croppie-result');
		if (existing.length > 0) {
			existing[0].parentNode.replaceChild(node, existing[0]);
		}
		else {
            $('#result')[0].appendChild(node);
            dataAppend(node.src);
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
        //$('#galeriah').prop('checked', true);
        
       
		
		//var tipo  = 1;
		var lar = 600, alt = 400;		
		var $uploadCrop;
		var crop_type = 'square';
		
		$('#banner').click(function(){
            _tipoImg = '2';
            /* $('#banner').prop('checked', true);
            $('#logo').prop('checked', false);
            $('#galeriah').prop('checked', false);
            $('#galeriav').prop('checked', false); */

            $('#inputTipo').val('BANNER');

			//tipo = 2;	
			lar = 800;
			alt = 300;
			reset_image($uploadCrop);
			$uploadCrop = initCropImage(lar, alt, crop_type,  false);
			$uploadCrop.croppie('bind', {
				url: new_image
			});
		});
		$('#logo').click(function(){
            _tipoImg = '3';
           /*  $('#logo').prop('checked', true);
            $('#banner').prop('checked', false);
            $('#galeriah').prop('checked', false);
            $('#galeriav').prop('checked', false); */

            $('#inputTipo').val('LOGO');

			//tipo = 3;	
			lar = 500;
			alt = 500;
			reset_image($uploadCrop);
			$uploadCrop = initCropImage(lar, alt, crop_type,  false);
			$uploadCrop.croppie('bind', {
				url: new_image
			});	
		});
		$('#galeriah').click(function(){
            _tipoImg = '1';
            /* $('#galeriah').prop('checked', true);
            $('#logo').prop('checked', false);
            $('#galeriav').prop('checked', false);
            $('#banner').prop('checked', false); */

            $('#inputTipo').val('GALERIA H');

			//tipo = 1;
			lar = 600;
			alt = 400;	
			reset_image($uploadCrop);
			$uploadCrop = initCropImage(lar, alt, crop_type,  false);
			$uploadCrop.croppie('bind', {
				url: new_image
			});		
		});

		$('#galeriav').click(function(){
            _tipoImg = '1';
            /* $('#galeriav').prop('checked', true);
            $('#logo').prop('checked', false);
            $('#banner').prop('checked', false);
            $('#galeriah').prop('checked', false);
 */
            $('#inputTipo').val('GALERIA V');

			//tipo = 1;
			lar = 400;
			alt = 600;
			reset_image($uploadCrop);
			$uploadCrop = initCropImage(lar, alt, crop_type,  false);
			$uploadCrop.croppie('bind', {
				url: new_image
			});		
        });
        
		function readFile(input) {
 			if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
                    $('.upload-demo').addClass('ready');
                    
                    $('#inputTipo').val('GALERIA H');
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

            if(_tipoImg == '') {
                toastr.warning('Informe o Tipo de imagem');
            }
            else{
                $uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (resp) {
                    _src = resp;
                    popupResult({
                        src: resp                    
                    });
                });
            }
            

			
		});


		$('.rotate_left, .rotate_right').on('click', function (ev) {
			$uploadCrop.croppie('rotate', parseInt($(this).data('deg')));
		});

		
    }
    
    function dataAppend(img){

        let imgBase64 = img.split(",");
        imgBase64 = imgBase64[1];        
        //var file = $("#result").get(0).files; 

        if (imgBase64 != 'undefined' && imgBase64.length > 0) {

            let idImg = $('#idImg').text();
            var data = new FormData();
            data.append("imagem", imgBase64);
            data.append("tipoImg", _tipoImg);
            data.append("idImg", idImg);
            data.append("nome", _imgname);
            data.append("extensao", _extensao);
    
            SetImagem(data);

            //var ajax = new XMLHttpRequest();
            //ajax.upload.addEventListener("progress", progressHandler, false);
            //ajax.addEventListener("load", completeHandler, false);
            //ajax.open("POST", "../../../../vendor/festoupp/php-classes/src/Controller/ImagemController.php", true);
            //ajax.send(data);
        }
        else {
            toastr.warning('Escolha um arquivo');
        }
    }

	function getImagem(){

        let date = Date.now();
        let idImg = $('#idImg').text();
        let nome =  $("#upload").get(0).files[0].name;
        _extensao = nome.substring(nome.length - 4);
        _imgname = idImg + '_' + date + _extensao; 
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
		demoUpload();
	}

	return {
		init: init
	};
})();
//--------------funções croppie end


function Validar(){

    
}

function FormToObj(){
    
    let sta, isw, isw2;
    if($('#status').is( ":checked" )) sta = '1';
    else sta = '0';
    if($('#iswhats').is( ":checked" )) isw = '1';
    else isw = '0';
    if($('#iswhats2').is( ":checked" )) isw2 = '1';
    else isw2 = '0';

    let cat = '0';
    //casamento
    if( $('#checkCasamento').is( ":checked" ) && !$('#checkFormatura').is( ":checked" ) && !$('#checkAniversario').is( ":checked" )) 
        cat = '1';
    //formatura
    else if( !$('#checkCasamento').is( ":checked" ) && $('#checkFormatura').is( ":checked" ) && !$('#checkAniversario').is( ":checked" ))
        cat = '2'; 
    //aniversario
    else if( !$('#checkCasamento').is( ":checked" ) && !$('#checkFormatura').is( ":checked" ) && $('#checkAniversario').is( ":checked" ))
        cat = '3';
    //casamento e formatura
    else if( $('#checkCasamento').is( ":checked" ) && $('#checkFormatura').is( ":checked" ) && !$('#checkAniversario').is( ":checked" ))
        cat = '4';
    //casamento e aniversario
    else if( $('#checkCasamento').is( ":checked" ) && !$('#checkFormatura').is( ":checked" ) && $('#checkAniversario').is( ":checked" ))
        cat = '5';
    //formatura e aniversario
    else if( !$('#checkCasamento').is( ":checked" ) && $('#checkFormatura').is( ":checked" ) && $('#checkAniversario').is( ":checked" ))
        cat = '6';
    //todos
    else if( $('#checkCasamento').is( ":checked" ) && $('#checkFormatura').is( ":checked" ) && $('#checkAniversario').is( ":checked" ))
        cat = '7'; 

    if(cat != '0'){

        _servico = {
            id_cliente: $('#cliente').val(),
            tipo_ser: $('#tipo_ser').val(),
            categoria_ser: cat,
            nome_ser: $('#nome').val(),    
            descricao_ser: $('#descricao').val(),
            capacidade_ser: $('#capacidade').val(),
            itens_ser: $('#itens').val(),           
            status_ser: sta,
            email: $('#email').val(),
            site: $('#site').val(),
            facebook: $('#facebook').val(),
            instagram: $('#instagram').val()
        };

        if(logradouro != ''){
            _servico.logradouro = $('#logradouro').val();
            _servico.numeral = $('#numeral').val();
            _servico.bairro = $('#bairro').val();
            _servico.cidade = $('#cidade :selected').text();
            _servico.uf = $('#uf :selected').text();
        }
        if($('#numero').val() != ''){
            _servico.ddd_ser = $('#ddd').val();
            _servico.numero_ser = $('#numero').val();
            _servico.tipo = $('#tipo').val();
            _servico.iswhats = isw;
        }else{
            _servico.numero_ser = '';
        }
        if($('#numero2').val() != ''){
            _servico.ddd2_ser = $('#ddd2').val();
            _servico.numero2_ser = $('#numero2').val();
            _servico.tipo2 = $('#tipo2').val();
            _servico.iswhats2 = isw2;
        }else{
            _servico.numero2_ser = '';
        }
        
        if(_funcao == '2')
            _servico.id_servico = _idServico;

        return true;
        

    }else{
        toastr.warning('Informe a categoria');
        return false;
    }
        
}
/*
function tipoFormatter(tipo){
    if(tipo == '1') return 'Celular';
    else return 'Residêncial';
}
*/

function tableFormatter(opt){
    if(opt == '1') return 'sim';
    else return 'não';
}

function tipoFormatter($tipo){
    if($tipo == '1') return "Salao";
    else if($tipo == '2') return "Buffet";
    else if($tipo == '3') return "Decoração";
    else if($tipo == '4') return "Aluguel de Trage";
    else if($tipo == '5') return "Foto e Vídeo";
    else if($tipo == '6') return "Organizacao";
    else if($tipo == '7') return "Bolos e Ddoce";
    else if($tipo == '8') return "Convite";
}

function LimpaModalAddImg(){

    $('#rbGaleria').prop('checked', false);
    $('#rbBanner').prop('checked', false);
    $('#rbLogo').prop('checked', false);
    tipoImg = '';
    if (!$('#imgCadastro').is(':empty')) {
        $('#imgCadastro').html("");
    }
    //$('#fileinput_widget').html("Nomemdmdmmd");       
}

function LimpaTelaCadastro(){
    $('#titleAddServico').text('CADATRANDO');

    $('#checkCasamento').prop( "checked",false);
    $('#checkFormatura').prop( "checked",false);
    $('#checkAniversario').prop( "checked",false);    

    //$('#cliente option:selected').text('Administrador');
    $('#cliente').removeAttr('disabled');

    $('#tipo_ser').val('');
    $('#nome').val('');
    $('#descricao').val('');
    $('#capacidade').val('');
    $('#itens').val('');
    $('#ddd').val('');
    $('#ddd2').val('');
    $('#numero').val('');
    $('#numero2').val('');
    $('#tipo').val('');
    $('#tipo2').val('');
    $('#iswhats').prop("checked",false);
    $('#iswhats2').prop("checked",false);

    $('#email').val('');
    $('#site').val('');
    $('#facebook').val('');
    $('#instagram').val('');
    $('#logradouro').val('');
    $('#numero').val('');
    $('#bairro').val('');
    $('#cidade').val('');

    $('#status').prop("checked",true);
    $('#status').removeAttr('disabled');

    $('#btnCadastrarServico').text('CADASTRAR');
}

function excluirImagem(index){
    _servico = _galeria[index].id_imagem;
    _funcao = '4';
    SetServico();
    GetGaleria();
}

function GaleriaServico(id){
    //$.post( "../../../../views/admin/images.php", { id: "id" } );
    if(id != null && id >= 1){
        _idImagem = id;
        GetGaleria();
    }else
        toastr.warning('Cliente não tem serviço(s) cadastrado(s)')
    
}


function EditarServico(id){

    let usu = _servicos.findIndex(e => e.id_servico == id);
    _idServico = _servicos[usu].id_servico;

    if(_idServico != null && _idServico >= 1){

        _funcao = '2';
        $('#titleAddServico').text('EDITANDO');
        $('#modalAddServico').modal('show');

        

        let cat = _servicos[usu].categoria_ser;
        $('#checkCasamento').prop( "checked",false);
        $('#checkFormatura').prop( "checked",false);
        $('#checkAniversario').prop( "checked",false);
        //casamento
        if( cat == '1') 
            $('#checkCasamento').prop( "checked",true);
        //formatura
        else if( cat == '2')
            $('#checkFormatura').prop( "checked",true); 
        //aniversario
        else if( cat == '3')
            $('#checkAniversario').prop( "checked",true);
        //casamento e formatura
        else if( cat == '4'){
            $('#checkCasamento').prop( "checked",true);
            $('#checkFormatura').prop( "checked",true);
        }
        //casamento e aniversario
        else if( cat == '5'){
            $('#checkCasamento').prop( "checked",true);
            $('#checkAniversario').prop( "checked",true);
        }
        //formatura e aniversario
        else if( cat == '6'){
            $('#checkFormatura').prop( "checked",true);
            $('#checkAniversario').prop( "checked",true);
        }
        //todos
        else if( cat == '7'){
            $('#checkCasamento').prop( "checked",true);
            $('#checkFormatura').prop( "checked",true);
            $('#checkAniversario').prop( "checked",true); 
        }else{
            $('#checkCasamento').prop( "checked",false);
            $('#checkFormatura').prop( "checked",false);
            $('#checkAniversario').prop( "checked",false);
        }


        $('#cliente option:selected').text(_servicos[usu].nome);
        $('#cliente').attr('disabled', 'disabled');

        $('#tipo_ser').val(_servicos[usu].tipo_ser);

        $('#nome').val(_servicos[usu].nome_ser);
        $('#descricao').val(_servicos[usu].descricao_ser);
        $('#capacidade').val(_servicos[usu].capacidade_ser);
        $('#itens').val(_servicos[usu].itens_ser);

        $('#status').prop("checked",true);
        $('#status').attr('disabled', 'disabled');

        $('#btnCadastrarServico').text('ALTERAR');
    }else
        toastr.warning('Cliente não possui serviço');
    
    
}

function ExcluirServico(id){

    _index = _servicos.findIndex(e => e.id_servico == id); 
    let nome = _servicos[_index].nome_ser;
    if(nome != null){
        _funcao = '3';        
        $('#modalConfirm').modal('show');
        $('#servico').text('');
        $('#servico').append('Deseja excluir o serviço <strong>'+ nome + '</strong>' );
    }else    
        toastr.warning('Cliente não possui serviço')
}


function TableService(data){

    $('#tbodyservice').text('');
    $(data).each(function (i){
        
        $('#tbodyservice').append(

            '<tr>'+
                '<td>'+data[i].nome+'</td>'+
                '<td>'+tableFormatter(data[i].status)+'</td/>'+
                '<td>'+data[i].nome_ser+'</td>'+
                /* '<td>'+data[i].descricao_ser+'</td>'+ */  
                '<td>'+tipoFormatter(data[i].tipo_ser)+'</td/>'+              
                '<td>'+tableFormatter(data[i].status_ser)+'</td/>'+
                '<td>'+
                    '<a onclick=EditarServico('+ data[i].id_servico + ') class="btn btn-primary btn-xs" style="margin-right: 5px;"><i class="fa fa-edit"></i> Editar</a>'+
                    '<a onclick=ExcluirServico('+ data[i].id_servico + ') class="btn btn-danger btn-xs" style="margin-right: 5px;"><i class="fa fa-trash"></i> Excluir</a>'+
                    '<a onclick=GaleriaServico('+ data[i].id_servico + ') class="btn btn-success btn-xs"><i class="fa fa-picture-o"></i> Galeria</a>'+
                '</td>'+
            '</tr>'
        );
    });
}

function Galeria(data){

    $('#modalGaleria').modal('show');
    //$('#contentAddImg').fadeOut(1000);
    $('#imgModalAdd').text('');

    let banner;
    let logo;    

    $(data).each(function (i){

        if(data[i].tipo_img == 2) banner = data[i].caminho_img+data[i].codigo_img;
        if(data[i].tipo_img == 3) logo = data[i].caminho_img+data[i].codigo_img;       
        
    });

    $('#imgModalAdd').append(
        '<div class="row">'+
            '<div class="col-md-1"></div>'+
            '<div class="col-md-4">'+
                '<h4>Banner</h4>'+
                '<img src="'+banner+'" alt="..." class="img-thumbnail">'+
            '</div>'+
            '<div class="col-md-2"></div>'+
            '<div class="col-md-4">'+
                '<h4>Logotipo</h4>'+
                '<img src="'+logo+'" alt="..." class="img-thumbnail">'+
            '</div>'+
        '</div>'  
    );

    $('#imgModalAdd').append('<center><h4 style="">Galeria</h4></center>');
    $(data).each(function (i){        
        
        if(data[i].tipo_img == 1){
            $('#imgModalAdd').append(
                
                '<div class="col-md-3" >'+
                    '<div style="padding: 10px; margin-top: 20px; margin-bottom: 20px; border: 1px solid gray; border-radius: 5px;">'+
                        '<img src="'+data[i].caminho_img+data[i].codigo_img+'" alt="Galeria" class="img-thumbnail" id="" style="max-height: 200px;">'+

                        '<div class="row">'+              
                        '<div class="col-md-12">'+
                            '<button type="button" style="margin-top: 5px; background-color: lightgray;"'+
                            'class="btn btn-default form-control btnEscolha" onClick="excluirImagem(' + i + ')">Excluir</button>'+
                        '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );
        }
    });
}



/*

function foneFormatter(num){
    let numero;
    if(num == null) return num;
    if(num.length == 8){
        numero = num.substring(0,4) + '-'+ num.substring(4,8);
    }else if(num.length == 9){
        numero = num.substring(0,5) + '-'+ num.substring(5,9);
    }else{
        numero = num;
    }
    return numero;
}

function LimpaTelaCadastro(){
    _funcao = '1';
    $('#titleAddUser').text('CADASTRANDO');
    $('#nome').val('');
    $('#email').val('');
    $('#ativo').prop( "checked",true);
    $('#login').val('');
    $('#password').val('');
    $('#ddd').val('');
    $('#numero').val('');
    $('#iswhats').prop( "checked",true);
    $('#isadmin').prop( "checked",true);
    $('#btnCadastrar').text('CADASTRAR');
}


*/


//AJAX
function GetServico(){
    $.ajax({   
        async: false,
        url: "../../../../vendor/festoupp/php-classes/src/Controller/ServicoController.php",//'../controller/salaoController.php',   
        type : 'get', 
        data : {   
            'acao': 'allServices'
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(data){ 
            _servicos = data;            
            TableService(data);
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}

function GetGaleria(){
    $.ajax({  
        async: false, 
        url: "../../../../vendor/festoupp/php-classes/src/Controller/ServicoController.php",//'../controller/salaoController.php',   
        type : 'get', 
        data : {   
            'acao': 'galeria',
            'id': _idImagem
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(data){ 
            _galeria = data;            
            Galeria(data);
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}

function SetServico(){
    $.ajax({   
        async: false,
        url: "../../../../vendor/festoupp/php-classes/src/Controller/ServicoController.php",//'../controller/salaoController.php',   
        type : 'post', 
        data : {   
            'funcao': _funcao,
            'servico': _servico   
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(data){ 
           // _servicos = data;
           $('#modalAddServico').modal('hide');
            GetServico();
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}

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

function GetDados(){
    $.ajax({   
        async: false,
        url: "../../../../vendor/festoupp/php-classes/src/Controller/UsuarioController.php",//'../controller/salaoController.php',   
        type : 'post', 
        data : {
            'funcao': 'dados'  
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(dados){ 
          ObjToForm(dados);   
           
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}

function DeleteServico(){
    $.ajax({   
        async: false,
        url: "../../../../vendor/festoupp/php-classes/src/Controller/ServicoController.php",//'../controller/salaoController.php',   
        type : 'post', 
        data : {   
            'funcao': _funcao,
            'servico': _servicos[_index]   
        },
        dataType : 'json',    //html        
        beforeSend: function(){},   
        success: function(data){ 
            GetServico();
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}
