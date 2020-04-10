//VARIAVEIS
var login;
var password;

$(document).ready(function(){

    $('#btnLogin').click(function(){
        FormToObj();
        GetUser();
    });


});

//FUNÇÕES
function FormToObj(){
    login = $('#login').val();
    password = $('#password').val();
}

//AJAX
function GetUser(){
    $.ajax({   
        url: "../../../../vendor/festoupp/php-classes/src/Controller/UsuarioController.php",//'../controller/salaoController.php',   
        type : 'post', 
        data : {   
            'log': login,   
            'pas': password,
            'funcao': 'login'  
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(retorno){ 
            //var json = $.parseJSON(retorno)[0];  
          // Atribui o retorno HTML para a div correspondente                       
          //$(result).html(retorno);  
          if(retorno.status == 1){
            window.location.href = "/admin/index.php" 
          } 
          else 
            toastr.error('Usuário inativo, contate o administrador.');
         
           
        },   
        error: function(erro, er){   
          toastr.error(erro.responseText);
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
      });  
}