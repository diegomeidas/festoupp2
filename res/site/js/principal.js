//VARIAVEIS GLOBAIS
var _destaques;
var saloes;
var _servico;


var offset = $('#nav-menu').offset().top;
var $meuMenu = $('#nav-menu');
    
$(document).on('scroll', function () {
    var wind = $(window).scrollTop();
    
    if (offset <= wind) {
        $meuMenu.addClass('fixar');
    } else {
        $meuMenu.removeClass('fixar');
    }
});

$(document).ready(function(){

    $('#img-logotipo').show();

});
/* 
//FUNÇÕES
function CarregarDados(){

    GetDestaques();


}

function SetTable(data){
    $('#product').text('');
    $(data).each(function (i){
        
        $('#product').append(

            '<div class="product">'+
                '<div class="single-product">'+
                    '<div class="product-f-image">'+
                        '<img src="'+ data[i].caminho_img + data[i].codigo_img+'" alt="Produtos">'+
                        '<div class="product-hover">'+                                        
                            '<a href="' + data[i].caminho_ser + data[i].nome_ser + '" class="view-details-link"><i class="fa fa-arrow-circle-right"></i> Visitar</a>'+
                        '</div>'+
                    '</div>'+
                    '<h4>' + data[i].nome_ser +'</h4>'+
                    '<p>' + data[i].descricao_ser +'</p>'+                                    
                '</div>'+
            '</div>'
        );
    });
}

function ObjToForm(){
    $('#nome').text(saloes[1].nome);
    $('#descricao').text(saloes[1].descricao);
}

function SetCard(data){
    
  $(data).each(function (i){
      $('#linha').append(
          '<div class="col-md-3">'+
              '<div class="card" >'+
                  '<a href="sPinheiro.php"><img src="' + data[i].caminho  +'spinheiro.jpg" class="card-img-top" alt="..."></a>'+
                  '<div class="card-body">'+
                      '<p id="nome"><strong>'+data[i].nome+'</strong></p>'+
                      '<p id="descricao" class="card-text">'+data[i].descricao+'</p>'+
                  '</div>'+
              '</div>'+
          '</div>'
      );
  });
}


//AJAX
function GetDestaques(){
    $.ajax({   
        url: "../../../../vendor/festoupp/php-classes/src/Controller/PrincipalController.php",//'../controller/salaoController.php',   
        type : 'get', 
        data : {   
            'acao': 'allDestaques'
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(data){ 
            _destaques = data;
            SetTable(data);
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}



function GetSaloes(){
  $.ajax({   
    url: "../../../../vendor/festoupp/php-classes/src/Controller/PrincipalController.php",//'../controller/salaoController.php',   
    type : 'get',   
    data : {   
      'acao': 'all',   
      'tipo': _servico  
    },   
    dataType : 'json',    //html
    beforeSend: function(){   
      // Exibe uma animação enquanto a requisição é processada                       
      //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
    },   
    success: function(retorno){    
      saloes = retorno; 
      SetCard(retorno);  
    },   
    error: function(erro, er){   
      // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
      $(result).html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</p>');   
    }   
  });
} */