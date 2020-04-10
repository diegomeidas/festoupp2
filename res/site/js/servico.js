var _saloes;
var _imagens;
var _servico;
var _funcao, _tipo, _cat;

$(document).ready(function () {   
    
  /* var logo = document.getElementById('logo');
  logo.style.display = 'block'; */

  $('#img-logotipo').hide();
  $('#nav-menu').addClass('navbar navbar-fixed-top');

  _funcao = $('#funcao').text();
  _tipo = $('#tipo').text();
  _cat = $('#categoria').text();
  _idServico = $('#id').text();

  setNavbar(_tipo);

  if(_funcao == 'pagina'){
    GetPagina(_tipo, _cat);
  }
  else if(_funcao == 'servico'){
    if(_idServico != null && _idServico > 0){
      GetServico(_idServico);
      GetImagens(_idServico);
      setPagina();
    }else{
      toastr.warning('Serviço não localizado!');
    }
    
  }


    

});

function setNavbar(tipo){
  if(tipo == 1){
    $('.nav1').css('background-color', '#be68d8');
    $('.nav2').css('background-color', 'none');
    $('.nav3').css('background-color', 'none');
    $('.nav4').css('background-color', 'none');
    $('.nav5').css('background-color', 'none');
    $('.nav6').css('background-color', 'none');
    $('.nav7').css('background-color', 'none');
  }
  else if(tipo == 2){
    $('.nav1').css('background-color', 'none');
    $('.nav2').css('background-color', '#be68d8');
    $('.nav3').css('background-color', 'none');
    $('.nav4').css('background-color', 'none');
    $('.nav5').css('background-color', 'none');
    $('.nav6').css('background-color', 'none');
    $('.nav7').css('background-color', 'none');
  }
  else if(tipo == 3){
    $('.nav1').css('background-color', 'none');
    $('.nav2').css('background-color', 'none');
    $('.nav3').css('background-color', '#be68d8');
    $('.nav4').css('background-color', 'none');
    $('.nav5').css('background-color', 'none');
    $('.nav6').css('background-color', 'none');
    $('.nav7').css('background-color', 'none');
  }
  else if(tipo == 4){
    $('.nav1').css('background-color', 'none');
    $('.nav2').css('background-color', 'none');
    $('.nav3').css('background-color', 'none');
    $('.nav4').css('background-color', '#be68d8');
    $('.nav5').css('background-color', 'none');
    $('.nav6').css('background-color', 'none');
    $('.nav7').css('background-color', 'none');
  }
  else if(tipo == 5){
    $('.nav1').css('background-color', 'none');
    $('.nav2').css('background-color', 'none');
    $('.nav3').css('background-color', 'none');
    $('.nav4').css('background-color', 'none');
    $('.nav5').css('background-color', '#be68d8');
    $('.nav6').css('background-color', 'none');
    $('.nav7').css('background-color', 'none');
  }
  else if(tipo == 6){
    $('.nav1').css('background-color', 'none');
    $('.nav2').css('background-color', 'none');
    $('.nav3').css('background-color', 'none');
    $('.nav4').css('background-color', 'none');
    $('.nav5').css('background-color', 'none');
    $('.nav6').css('background-color', '#be68d8');
    $('.nav7').css('background-color', 'none');
  }
  else if(tipo == 7){
    $('.nav1').css('background-color', 'none');
    $('.nav2').css('background-color', 'none');
    $('.nav3').css('background-color', 'none');
    $('.nav4').css('background-color', 'none');
    $('.nav5').css('background-color', 'none');
    $('.nav6').css('background-color', 'none');
    $('.nav7').css('background-color', '#be68d8');
  }
}

function setPagina(){

  let banner, logo;
  for(let img of _imagens){
    if(img.tipo_img == 2) 
      banner = img.caminho_img + img.codigo_img;
    else if(img.tipo_img == 3) 
      logo = img.caminho_img + img.codigo_img;
  }
  if(banner == undefined)  banner = '/res/site/img/servicos/img_default.png';
  if(logo == undefined)  logo = '/res/site/img/servicos/img_logo.png';

  $('#bannerServico').append(

    '<img  class="imgCapa rounded" src="'+banner+'"/>'+        
    '<h1 class="local" id="nomeServico"> '+_saloes[0].nome_ser +' </h1>'+        
    '<div class="logo" id="logoServico">'+        
        '<img class="imgLogo" src="'+logo+'"/>'+            
    '</div>'

  );

  $('#card-info').append(

    '<h3 class="mb-0"> '+_saloes[0].nome_ser +' </h3>'    
  );

  if(_saloes[0].logradouro != '' && _saloes[0].logradouro != undefined){
    $('#card-info').append(
      '<div class="mb-1 text-muted"> '+ _saloes[0].logradouro
    );
    if(_saloes[0].num != '' && _saloes[0].num != undefined){
      $('#card-info').append(
        ', '+_saloes[0].num  
      );
    }
    if(_saloes[0].bairro != '' && _saloes[0].bairro != undefined){
      $('#card-info').append(
        '- '+_saloes[0].bairro  
      )
    };
    if(_saloes[0].cidade != '' && _saloes[0].cidade != undefined){
      $('#card-info').append(
        ', '+_saloes[0].cidade  
      );
    }
    if(_saloes[0].uf != '' && _saloes[0].uf != undefined){
      $('#card-info').append(
        '/'+_saloes[0].uf  
      );
    }
  }

  if(_saloes[0].numero != ''){
    $('#card-info').append(
      '<div class="mb-1 text-muted"><span class="fas fa-phone"> ('+_saloes[0].ddd +')  '+_saloes[0].numero //&nbsp &nbsp &nbsp &nbsp</span><span class="fab fa-whatsapp">      
    );
    if(_saloes[0].tipo == 1){
      $('#card-info').append(
        '</span><span class="fab fa-whatsapp"></span></div>'   
      );
    }else{
      $('#card-info').append(
        ' </span></div>'   
      );
    }
  }

  if(_saloes.length > 1 && _saloes[1].numero != ''){
    $('#card-info').append(
      '<div class="mb-1 text-muted"><span class="fas fa-phone"> ('+_saloes[1].ddd +')  '+_saloes[1].numero //&nbsp &nbsp &nbsp &nbsp</span><span class="fab fa-whatsapp">      
    );
    if(_saloes[1].tipo == 1){
      $('#card-info').append(
        '</span><span class="fab fa-whatsapp"></span></div>'   
      );
    }else{
      ' </span></div>'
    }
  }

  if(_saloes[0].site != '' && _saloes[0].site != undefined){
    $('#card-info').append(
      '<div class="mb-1 text-muted"><a href="#"><span class="fab fa-internet-explorer">'+ _saloes[0].site +'</span></a></div>'
    );
  }

  if(_saloes[0].capacidade_ser != '' && _saloes[0].capacidade_ser != undefined){
    $('#card-info').append(
      '<div class="mb-1 text-muted"><strong>Capacidade: </strong> '+_saloes[0].capacidade_ser +' pessoas</div>'
    );
  }

  if(_saloes[0].itens_ser != '' && _saloes[0].itens_ser != undefined){
    $('#card-info').append(
      '<div class="mb-1 text-muted"><p><strong>Itens: </strong> '+_saloes[0].itens_ser +' </p></div>'
    );
  }

  
  

  for(let img of _imagens){
    if(img.tipo_img == 1){

      $('#galery').append(
        '<div class="col-xs-3 col-sm-2 col-md-2 col-lg-1 imgGaleria">'+
          '<a class="lightbox" href="'+ img.caminho_img + img.codigo_img +'">'+
              '<img src="'+ img.caminho_img + img.codigo_img +'" alt="Park">'+
          '</a>'+
        '</div>'
      );

    }
  }  

  baguetteBox.run('.tz-gallery');

}

function ObjToForm(){
    $('#nome').text(saloes[1].nome);
    $('#descricao').text(saloes[1].descricao);
}

function SetCard(data){
    
  $(data).each(function (i){

    let status = data[i].status_ser;

    if(status == 1){

      let img;
      if(data[i].codigo_img == '' || data[i].codigo_img == 'undefined' || data[i].codigo_img == null){
        img = '/res/site/img/servicos/img_default.png';
      }else{
        img = data[i].caminho_img  + data[i].codigo_img;
      }
      
      $('#linha').append(
          '<div class="col-md-2">'+
              '<div class="card" style="min-height: 34rem;">'+
                  '<a href="page-servico.php?id=' + data[i].id_servico + '"><img src="' + img + '" class="card-img-top" alt="..."></a>'+
                  '<div class="card-body">'+
                      '<p id="nome"><strong>'+data[i].nome_ser+'</strong></p>'+
                      '<p id="descricao" class="card-text">'+data[i].descricao_ser+'</p>'+
                  '</div>'+
              '</div>'+
          '</div>'
      );
    }    
  });
}

function GetPagina(tipo, categoria){
  $.ajax({ 
    async: false,  
    url: "../../../../vendor/festoupp/php-classes/src/Controller/PrincipalController.php",//'../controller/salaoController.php',   
    type : 'get',   
    data : {   
      'acao': 'pagina',   
      'tipo': tipo,
      'cat': categoria 
    },   
    dataType : 'json',    //html
    beforeSend: function(){   
      // Exibe uma animação enquanto a requisição é processada                       
      //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
    },   
    success: function(retorno){    
      _saloes = retorno; 
      SetCard(retorno);  
    },   
    error: function(erro, er){   
      // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
      $(result).html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</p>');   
    }   
  });
}

function GetServico(id){
  $.ajax({   
    async: false,
    url: "../../../../vendor/festoupp/php-classes/src/Controller/PrincipalController.php",//'../controller/salaoController.php',   
    type : 'get',   
    data : {   
      'acao': 'servico',   
      'id': id
    },   
    dataType : 'json',    //html
    beforeSend: function(){   
      // Exibe uma animação enquanto a requisição é processada                       
      //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
    },   
    success: function(retorno){    
      _saloes = null;
      _saloes = retorno; 
    },   
    error: function(erro, er){   
      // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
      $(result).html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</p>');   
    }   
  });
}

function GetImagens(id){
  $.ajax({  
    async: false, 
    url: "../../../../vendor/festoupp/php-classes/src/Controller/PrincipalController.php",//'../controller/salaoController.php',   
    type : 'get',   
    data : {   
      'acao': 'imagens',   
      'id': id
    },   
    dataType : 'json',    //html
    beforeSend: function(){   
      // Exibe uma animação enquanto a requisição é processada                       
      //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
    },   
    success: function(retorno){    
      _imagens = retorno; 
    },   
    error: function(erro, er){   
      // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
      $(result).html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</p>');   
    }   
  });
}