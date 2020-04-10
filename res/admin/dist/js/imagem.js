

$(document).ready(function () {


    $('#btnModalGaleria').click(function(){
        $('#modalGaleria').modal('show');
        GetGaleria();
    });

    $('#btnAdicionarImg').click(function(){
        $('#modalAdicioar').modal('show');
    });




});

//funções inicio
function SetModalGaleria(data) { 

    $(data).each(function (i) {

        $('#imgModalAdd').append(

            '<div class="col-md-3">'+
            '<img src='+data[i].caminho + data[i].codigo + ' alt="Galeria" class="img-thumbnail" id="">'+
            '<div class="row">'+                 
              '<div class="col-md-12">'+
                  '<button type="button" style="margin-top: 5px; background-color: lightgray;"'+ 
                  'class="btn btn-default form-control btnEscolha" onClick="ProdutoEscolhido(' + i + ')">Editar</button>'+
              '</div>'+
            '</div>'+
          '</div>'

          /*
            '<div class="col-md-3" style="margin-top: 10px"> ' +

                '<img src="images/img/games/' + data[i].Codigo + '.png" class="img-game-modal2"/>' +
                '<div class="row">' +
                    
                    '<div class="col-md-12">' +
                        '<button type="button" style="margin-top: 5px; background-color: lightgray;" class="btn btn-default form-control btnEscolha" onClick="ProdutoEscolhido(' + i + ')">Adicionar</button>' +
                    '</div>' +
            '</div>' +

            '<h5 style="margin-top: -5px">' + data[i].Nome + '</h5>' +
            '<h5 style="margin-top: -5px"> R$ ' + data[i].Preco + '</h5>' +
            '</div >'
            */
        );

    });
}

function ProdutoEscolhido(i) {      

    $('#modalAdd').modal('show');    

    _codigo = _produto[i].Codigo;
    _nome = _produto[i].Nome;
    _preco = _produto[i].Preco;
    

    
}

function GetGaleria(){
    $.ajax({   
        url: "../../../../vendor/festoupp/php-classes/src/Controller/controllerImagem.php",//'../controller/salaoController.php',   
        type : 'get', 
        dataType : 'json',    //html
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(retorno){   
          // Atribui o retorno HTML para a div correspondente                       
          //$(result).html(retorno);  
          if(retorno !=''){
            SetModalGaleria(retorno); 
          } 
         
           
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
      });  
    
}