//VARIAVEIS
var _servicos = null;
var _servico = null;
var _funcao = '1';
var _index = null;
var _dataIni = null;
var _dataFim = null;

$(document).ready(function(){

    //CriaDatepicker('#date');
    GetDestaques();

    $('#datePicker').each(function () {
        var $this = $(this),
            timePicker = ($this.attr('data-time') === undefined) ? false : true,
            format = ($this.attr('data-format') === undefined) ? 'dd/mm/yy' : $this.attr('data-format');

        $this.daterangepicker({
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "De",
                "toLabel": "Até",
                "customRangeLabel": "Customizado",
                "daysOfWeek": [
                    "Dom","Seg","Ter","Qua","Qui","Sex","Sab"
                ],
                "monthNames": [
                    "Janeiro","Fevereiro","Março", "Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"
                ],
                "firstDay": 1
            },
            //"singleDatePicker": true,
            ranges: {
                'Hoje': [moment(), moment()],
                '1 semana': [moment(), moment().add(6, 'days')],
                '10 dias': [moment(), moment().add(9, 'days')],
                '30 dias': [moment(), moment().add(1, 'month')],
                'Este mês': [moment(), moment().endOf('month')]            
            },            
            timePicker: timePicker,
            timePickerIncrement: 5,
            format: format,
            applyClass: 'btn-primary'
        }); 
    });

    $('#datePicker').val('__/__/____');
   
    $('#datePicker').on('apply.daterangepicker', function (ev, picker)
    {
        var dataIni = picker.startDate;
        var dataFim = picker.endDate;
        var dtIni = moment(dataIni, "DD-MM-YYYY");
        var dtFim = moment(dataFim, "DD-MM-YYYY");
        _dataIni = dtIni.format("YYYY-MM-DD");
        _dataFim = dtFim.format("YYYY-MM-DD");
        _dataFim = _dataFim + ' 23:59:59';
    });

    $('#datePicker').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    $('#cliente').change(function(){
        GetServicoCliente($(this).val());
    })



    $('#btnAddDestaque').click(function(){
        $('#modalAddDestaque').modal('show');
    });

    $('#modalAddDestaque').on('hidden.bs.modal', function (e) {
        LimpaTelaCadastroDestaque();
    }); 

    $('#btnCadastrarDestaque').click(function(){
        $('#modalAddDestaque').modal('hide');
        SetDestaque($('#servico').val());
    });

    $('#btnConfirm').click(function(){
        $('#modalConfirm').modal('hide');
        DeleteUser();
    });

});

//FUNÇÕES
/* function FormToObj(){

    _servico = {
        id: $('#servico').val(),    
        dataIni: _dataIni,
        dataFim: _dataFim    };
} */

function tipoFormatter(tipo){

    if(tipo == '1') return "Salão";
    else if(tipo == '2') return "Buffet";
    else if(tipo == '3') return "Decoracao";
    else if(tipo == '4') return "Trage";
    else if(tipo == '5') return "Midia";
    else if(tipo == '6') return "Organizacao";
    else if(tipo == '7') return "Bolos e Doces";
    else if(tipo == '8') return "Convite";
}
/* 
function tableFormatter(opt){
    if(opt == '1') return 'sim';
    else return 'não';
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
 */
function LimpaTelaCadastroDestaque(){

    $('#datePicker').val('__/__/____');

    $("#servico option").remove();
    $('#servico').append("<option value='-1'>Aguarde...</option>");
    
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
/* 
function editar(id){
    _funcao = '2';
    $('#titleAddUser').text('EDITANDO');
    $('#modalAddUser').modal('show');
    let usu = _servicos.findIndex(e => e.id_servico == id);
    $('#nome').val(_servicos[usu].nome);
    $('#email').val(_servicos[usu].email);
    if(_servicos[usu].status == 1)
        $('#ativo').prop( "checked",true);
    else
        $('#ativo').prop( "checked",false);
    $('#login').val(_servicos[usu].login);
    $('#ddd').val(_servicos[usu].ddd);
    $('#numero').val(_servicos[usu].numero);
    if(_servicos[usu].iswhats == 1)
        $('#iswhats').prop( "checked",true);
    else
        $('#iswhats').prop( "checked",false);
    if(_servicos[usu].isadmin == 1)
        $('#isadmin').prop( "checked",true);
    else
        $('#isadmin').prop( "checked",false);

    $('#btnCadastrar').text('ALTERAR');
}

function excluir(id){
    _funcao = '3';
    _index = _servicos.findIndex(e => e.id_servico == id);    
    $('#modalConfirm').modal('show');
    $('#cliente').text('');
    $('#cliente').append('Deseja excluir o cliente '+ _servicos[_index].nome );
}
 */

function ConverterMesDiaToDiaMes(date) {
    var newdate = date.split("-");
    var hour = newdate[2].split(" ");
    return hour[0] + '-' + newdate[1] + '-' + newdate[0] + ' ' + hour[1];
}
function SetTableDestaque(data){

    $('#tbody').text('');
    $(data).each(function (i){
        
        $('#tbody').append(

            '<tr>'+
                '<td>'+data[i].nome+'</td>'+
                '<td>'+data[i].nome_ser+'</td>'+
                '<td>'+tipoFormatter(data[i].tipo_ser) +'</td>'+
                '<td>'+ConverterMesDiaToDiaMes(data[i].dt_ini)+'</td>'+
                '<td>'+ConverterMesDiaToDiaMes(data[i].dt_fim)+'</td>'+
                '<td>'+
                    '<a onclick=editar('+ data[i].id_servico + ') class="btn btn-primary btn-xs" style="margin-right: 5px;"><i class="fa fa-edit"></i> Editar</a>'+
                    '<a onclick=excluir('+ data[i].id_servico + ') class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>'+
                '</td>'+
            '</tr>'
        );
    });
}

//AJAX
function GetDestaques(){
    $.ajax({   
        url: "../../../../vendor/festoupp/php-classes/src/Controller/MktController.php",//'../controller/salaoController.php',   
        type : 'get', 
        data : {   
            'acao': 'destaques'
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(data){ 
            _servicos = data;
            SetTableDestaque(data);
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}

function GetServicoCliente(id){
    $.ajax({   
        url: "../../../../vendor/festoupp/php-classes/src/Controller/ServicoController.php",//'../controller/salaoController.php',   
        type : 'get', 
        data : {   
            'acao': 'servicoCliente',
            'id': id   
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(data){ 
            //Limpar
            $("#servico option").remove();
            $("#servico").append("<option value=''>- Selecione um servico-</option>");
            $(data).each(function () {
                //Adiciona
                $("#servico").append("<option value='" + this.id_servico + "'>" + this.nome_ser + "</option>");
            });
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}

function SetDestaque(id){
    $.ajax({   
        url: "../../../../vendor/festoupp/php-classes/src/Controller/MktController.php",//'../controller/salaoController.php',   
        type : 'post', 
        data : {   
            'funcao': '1',
            'id': id,
            'dataIni': _dataIni,
            'dataFim': _dataFim   
        },
        dataType : 'json',    //html        
        beforeSend: function(){   
          // Exibe uma animação enquanto a requisição é processada                       
          //$(result).html('<center><img src="imagem/progresso.gif"/></center>');    
        },   
        success: function(data){ 
            _usuarios = data;
            GetDestaques();
        },   
        error: function(erro, er){   
          // Se houver um erro durante o processamento, exibe a mensagem na div correspondente                       
          $('#result').html('<p class="destaque">Erro ' + erro.status + ' - ' + erro.statusText + '</br> Tipo de erro: ' + er + '</br>'+erro.responseText+'</p>');   
        }   
    });  
}

