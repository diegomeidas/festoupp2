//VARIAVEIS


$(document).ready(function(){

  GetDadosUser();

  $('#btnLogout').click(function(){
    Logout();
  });

});

function ObjToForm(dados){

  $('#nomeUser').text(dados.nome);
  $('#nomeUser1').text(dados.nome);
  $('#nomeUser2').text(dados.nome);

  if(dados.isadmin != 1){
    $('#abaUsuarios').addClass('hidden');
  }

  if(dados.codigo_img == null || dados.codigo_img == undefined){
    $("#imgUser1").attr("src", "/res/site/img/servicos/user.png");
    $("#imgUser2").attr("src", "/res/site/img/servicos/user.png");
    $("#imgUser3").attr("src", "/res/site/img/servicos/user.png");
  }else{
    $("#imgUser1").attr("src", dados.caminho_img+dados.codigo_img);
    $("#imgUser2").attr("src", dados.caminho_img+dados.codigo_img);
    $("#imgUser3").attr("src", dados.caminho_img+dados.codigo_img);
  }

  

}



//AJAX
function GetDadosUser(){
    $.ajax({   
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

function Logout(){
  $.ajax({   
      url: "../../../../vendor/festoupp/php-classes/src/Controller/UsuarioController.php",//'../controller/salaoController.php',   
      type : 'post', 
      data : {
          'funcao': 'logout'  
      },
      dataType : 'json',    //html        
      beforeSend: function(){   
        // Exibe uma animação enquanto a requisição é processada                       
        //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
      },   
      success: function(dados){ 
        window.location.href = '/views/site/index.php';
      },   
      error: function(erro, er){   
        // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
        $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
      }   
    });  
}