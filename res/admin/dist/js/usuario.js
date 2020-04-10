//VARIAVEIS
var _usuarios = null;
var _usuario = null;
var _funcao = '1';
var _index = null;

$(document).ready(function(){

    GetUsers();

    $('#btnAddUser').click(function(){
        $('#modalAddUser').modal('show');
    });

    $('#modalAddUser').on('hidden.bs.modal', function (e) {
        LimpaTelaCadastro();
    });

    $('#btnCadastrar').click(function(){
        $('#modalAddUser').modal('hide');
        FormToObj();
        SetUser();
    });

    $('#btnConfirm').click(function(){
        $('#modalConfirm').modal('hide');
        DeleteUser();
    });

});

//FUNÇÕES
function FormToObj(){

    let sta;
    let isw;
    let isa;
    if($('#status').is( ":checked" )) sta = '1';
    else sta = '0';
    if($('#iswhats').is( ":checked" )) isw = '1';
    else isw = '0';
    if($('#isadmin').is( ":checked" )) isa = '1';
    else isa = '0'; 

    _usuario = {
        nome: $('#nome').val(),    
        email: $('#email').val(),
        login: $('#login').val(),
        password: $('#password').val(),
        ddd: $('#ddd').val(),
        numero: $('#numero').val(),
        tipo: $('#tipo').val(),
        status: sta,
        iswhats: isw,
        isadmin: isa    
    };
}

function tableFormatter(opt){
    if(opt == '1') return 'sim';
    else return 'não';
}
function tipoFormatter(tipo){
    if(tipo == '1') return 'Celular';
    else return 'Residêncial';
}

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
    $('#iswhats').prop("checked",true);
    $('#isadmin').prop("checked",true);
    $('#btnCadastrar').text('CADASTRAR');
}

function editar(id){
    _funcao = '2';
    $('#titleAddUser').text('EDITANDO');
    $('#modalAddUser').modal('show');
    let usu = _usuarios.findIndex(e => e.id_usuario == id);
    $('#nome').val(_usuarios[usu].nome);
    $('#email').val(_usuarios[usu].email);
    if(_usuarios[usu].status == 1)
        $('#ativo').prop( "checked",true);
    else
        $('#ativo').prop( "checked",false);
    $('#login').val(_usuarios[usu].login);
    $('#ddd').val(_usuarios[usu].ddd);
    $('#numero').val(_usuarios[usu].numero);
    if(_usuarios[usu].iswhats == 1)
        $('#iswhats').prop( "checked",true);
    else
        $('#iswhats').prop( "checked",false);
    if(_usuarios[usu].isadmin == 1)
        $('#isadmin').prop( "checked",true);
    else
        $('#isadmin').prop( "checked",false);

    $('#btnCadastrar').text('ALTERAR');
}

function excluir(id){
    _funcao = '3';
    _index = _usuarios.findIndex(e => e.id_usuario == id);    
    $('#modalConfirm').modal('show');
    $('#cliente').text('');
    $('#cliente').append('Deseja excluir o cliente '+ _usuarios[_index].nome );
}

function SetTable(data){

    $('#tbody').text('');
    $(data).each(function (i){
        
        $('#tbody').append(

            '<tr>'+
                '<td>'+data[i].nome+'</td>'+
                '<td>'+data[i].email+'</td>'+
                '<td>('+data[i].ddd+') ' + foneFormatter(data[i].numero) + '</td>'+
                '<td>'+tipoFormatter(data[i].tipo) +'</td>'+
                '<td>'+tableFormatter(data[i].iswhats)+'</td>'+
                '<td>'+data[i].login+'</td>'+
                '<td>'+tableFormatter(data[i].isadmin)+'</td/>'+
                '<td>'+tableFormatter(data[i].status)+'</td/>'+
                '<td>'+
                    '<a onclick=editar('+ data[i].id_usuario + ') class="btn btn-primary btn-xs" style="margin-right: 5px;"><i class="fa fa-edit"></i> Editar</a>'+
                    '<a onclick=excluir('+ data[i].id_usuario + ') class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>'+
                '</td>'+
            '</tr>'
        );
    });
}

//AJAX
function GetUsers(){
    $.ajax({   
        url: "../../../../vendor/festoupp/php-classes/src/Controller/UsuarioController.php",//'../controller/salaoController.php',   
        type : 'get', 
        data : {   
            'acao': 'allUsers'
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(data){ 
            _usuarios = data;
            SetTable(data);
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}

function SetUser(){
    $.ajax({   
        url: "../../../../vendor/festoupp/php-classes/src/Controller/UsuarioController.php",//'../controller/salaoController.php',   
        type : 'post', 
        data : {   
            'funcao': _funcao,
            'usuario': _usuario   
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(data){ 
            _usuarios = data;
            GetUsers();
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}

function DeleteUser(){
    $.ajax({   
        url: "../../../../vendor/festoupp/php-classes/src/Controller/UsuarioController.php",//'../controller/salaoController.php',   
        type : 'post', 
        data : {   
            'funcao': _funcao,
            'usuario': _usuarios[_index]   
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(data){ 
            _usuarios = data;
            GetUsers();
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}