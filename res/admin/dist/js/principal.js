//VARIAVEIS GLOBAIS
var _destaques;

$(document).ready(function(){

    CarregarDados();

});

//FUNÇÕES
function CarregarDados(){

    GetDestaques();


}

function SetTable(data){
    $('#product').text('');
    $(data).each(function (i){
        
        $('#product').append(

            '<div class=" col-md-3">'+
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