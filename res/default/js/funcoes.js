
function TrataErro(erro, msg) {

    if (erro == 601) {
        //Usuário não logado
        location.href = 'login';
    }
    else if (erro == 602) {
        toastr.warning('Usuário sem permissão');
    }
    else if (erro == 603) {        
        toastr.warning(msg); //NegExcepiton
    }
    else if (erro == 604) {
        ExibeDialogSessaoExpirada('Usuário acessou o sistema em outro local.');
    }
    else if (erro == 605) {
        ExibeDialogSessaoExpirada('Expiração por tempo de inatividade.');
    }
    else if (erro == 606) {
        ExibeDialogSessaoExpirada('Desconectada pelo Supervisor.');
    }
    else {
        toastr.error(msg);
    }
}

function TrataErroAjax(erro) {

    var msg = erro.responseText
    console.log(msg);

    if(!erro){
        TrataErro(999, 'Erro não identificado: <br>' + msg);
    }
    else if (!msg) {
        TrataErro(999, 'Erro não identificado: <br>' + msg);
    }
    else if (erro.status == 601) {
        TrataErro(erro.status, 'Usuário não logado.');
    }
    else if (erro.status == 602) {
        TrataErro(erro.status, 'Usuário sem permissão');
    }
    else if (erro.status == 603) {
        var msg2 = msg.replace('. ', '.<br>');
        TrataErro(erro.status, msg2);
    }
    else if (erro.status == 604 || erro.status == 605) {
        TrataErro(erro.status, '');
    }
    else if (msg.indexOf('DELETE statement conflicted with the REFERENCE constraint "FK') >= 0) {
        msg = "Não é possível excluir. <br> Outros registros utilizam este cadastro.";
        TrataErro(999, msg);
    }
    else {
        TrataErro(999, 'Erro não identificado: <br>' + msg);
    }
}

function ExibeDialogSessaoExpirada(msg) {

    var dialog = '<div class="modal modal-center fade" id="modalsessao" tabindex="-1" role="dialog" aria-labelledby="customModal3Label" aria-hidden="true">' +
                 '      <div class="modal-dialog modal-sm">' +
                 '        <div class="modal-content no-border">' +
                 '            <div class="modal-body">' +
                 '                <h4>Sessão Expirada!</h4>' +
                 '                <p>' + msg + '</p>' +
                 '            </div>' +
                 '            <div class="modal-footer bg-belpet">' +
                 '                <button type="button" class="btn btn-nofill btn-silc" data-dismiss="modal">Entrar novamente</button>' +
                 '            </div>' +
                 '        </div>' +
                 '       </div>' +
                '</div>';
    $('body').append(dialog);
    var modal = $('#modalsessao');

    modal.on('hide.bs.modal', function () {
        location.href = 'login';
    });

    modal.modal('show');
}


function CidadeFormatter(obj) {
    return obj.Nome + ' - ' + obj.IdUF;
}

function LocalizaIndex(lista, value) {
    var _index = -1;

    for (var i = 0; i < lista.length; i++) {
        if (lista[i].Id == value) {
            _index = i;
            break;
        }
    }

    return _index;
}

function intToDiaFormatter(obj) {
    dia = '';
    _dia = parseInt(obj);
    switch (_dia) {
        case 1: dia = 'Segunda-Feira'
            break
        case 2: dia = 'Terça-Feira'
            break
        case 3: dia = 'Quarta-Feira'
            break
        case 4: dia = 'Quinta-Feira'
            break
        case 5: dia = 'Sexta-Feira'
            break
        case 6: dia = 'Sabado'
            break
        case 7: dia = 'Domingo'
            break
    }
    return dia;
}

function LogradouroFormatter(obj, row) {
    return obj + ', ' + row.Numero;
}
function situacaoAcoFormatterWiser(value) {

    switch (value) {
        case enumAcordoWiser.NovoChamdado:
            return 'Novo Chamado';
        case enumAcordoWiser.AcordoAguardandoAprovacao:
            return 'Acordo aguardando aprovação';
        case enumAcordoWiser.AguardandoEnvioProposta:
            return 'Agurando envio de proposta';
        case enumAcordoWiser.AcordoReprovado:
            return 'Acordo reprovado';
        case enumAcordoWiser.AguardandoProposta:
            return 'Aguardando retorno proposta';
        case enumAcordoWiser.PendenteIntregacaoSap:
            return 'Pendente integração SAP';
        case enumAcordoWiser.AguardandoPagamento:
            return 'Aguardando pagamento';
        case enumAcordoWiser.PendenteCancelamentoCartao:
            return 'Pendente cancelamento do cartão';
        case enumAcordoWiser.AguardandoEnvioMaterial:
            return 'Aguardando envio do material';
        case enumAcordoWiser.AguardandoAprovacaoLogistica:
            return 'Aguardando aprovação da logística';
        case enumAcordoWiser.Aprovadologistica:
            return 'Aprovado pela logística';
        case enumAcordoWiser.Reprovadologistica:
            return 'Reprovado pela logística';
        case enumAcordoWiser.ChamadoVinculado:
            return 'Chamado vinculado';
        case enumAcordoWiser.AcordoQuebrado:
            return 'Acordo quebrado';
        case enumAcordoWiser.AcordoEfetivado:
            return 'Acordo efetivado';
        case enumAcordoWiser.AcordoAprovado:
            return 'Acordo aprovado';
        case enumAcordoWiser.AlunoRecusouTermoDevolucao:
            return 'Aluno recusou termo de devolução';
        case enumAcordoWiser.AcordoAguardandoAprovacaoCheque:
            return 'Acordo aguardando aprovação (Cheques)';
        case enumAcordoWiser.PendenteEnvioChequesOriginais:
            return 'Pendente envio de cheques originais';
        case enumAcordoWiser.AceiteAluno:
            return 'Aluno aceitou';
        case enumAcordoWiser.AguardandoAceiteAluno:
            return 'Aguardando aceite do aluno';
        case enumAcordoWiser.AguardandoEstornoCartao:
            return 'Aguardando estorno do cartão';
        case enumAcordoWiser.EstornoConfirmado:
            return 'Estorno confirmado';
        case enumAcordoWiser.EncaminhadoReembolso:
            return 'Encaminhado Reembolso';
        case enumAcordoWiser.AguardandoEnvioCheckout:
            return 'Aguardando envio de checkout de cartão';
        case enumAcordoWiser.AguardandoEnvioBoletos:
            return 'Aguardando envio de boletos';
        case enumAcordoWiser.AguardandoResgateCheques:
            return 'Aguardando resgate de cheques';
        case enumAcordoWiser.CodigoRastreioRecebido:
            return 'Código de rastreio recebido';
        case enumAcordoWiser.ChequesDevolvidos:
            return 'Cheques devolvidos';
        case enumAcordoWiser.SolicitadoEstonoCC:
            return 'Solicitado Estono CC';
        case enumAcordoWiser.SolicitaCartaCancelamentoCC:
            return 'Solicita Carta Cancelamento CC';
        case enumAcordoWiser.CartaCancelamentoCCAnexo:
            return 'Carta Cancelamento CC Anexada';
        case enumAcordoWiser.CodigoRastreioAnexado:
            return "Código de rastreio anexado";
        case enumAcordoWiser.AguardandoFinalizacao:
            return "Aguardando finalização";
        case enumAcordoWiser.SolicitarComprovanteReembolso:
            return "Solicitar comprovante de reembolso";
        case enumAcordoWiser.ComprovanteReembolsoAnexado:
            return "Comprovante reembolso anexado";
        case enumAcordoWiser.DadosBancariosInvalidos:
            return "Dados bancários inválidos";
        case enumAcordoWiser.DadosBancariosAtualizados:
            return "Dados bancários atualizados";
        case enumAcordoWiser.DadosEnderecoInvalido:
            return "Dados de endereço inválidos";
         case enumAcordoWiser.EnderecoAtualizado:
            return "Endereço atualizado";
        case enumAcordoWiser.AguardandoFinalizacao:
            return 'Aguardando finalização';
        case enumAcordoWiser.Finalizado:
            return 'Finalizado';
        case enumAcordoWiser.PendenteIntegracao:
            return 'Pendente Integração';
        case enumAcordoWiser.ReprocessadaIntegracao:
            return 'Integração Reprocessada';
        default:
            return '';
    }
}
function FormadePagamentoFormatterWiser(value) {

    switch (value) {
        case enumFormadePagamentoWiser.Boleto:
            return 'Boleto';
            break;
        case enumFormadePagamentoWiser.DepositoIdentificado:
            return 'Deposito Identificado';
            break;
        case enumFormadePagamentoWiser.Dinheiro:
            return 'Dinheiro';
            break;
        case enumFormadePagamentoWiser.PagamentoDireto:
            return 'Pagamento Direto';
            break;
        case enumFormadePagamentoWiser.Cheque:
            return 'Cheque';
            break;
        case enumFormadePagamentoWiser.CartaoCredito:
            return 'Cartão Credito';
            break;
        case enumFormadePagamentoWiser.EstornoCC:
            return 'Estorno CC';
            break;
        case enumFormadePagamentoWiser.Reembolso:
            return 'Reembolso';
            break;
    }
}
function MotivoDevolucaoFormatterWiser(value) {

    switch (value) {
        case enumMotivoDevolucaoWiser.AdaptaçãoaoMetodo:
            return 'Adaptação ao Metodo';
            break;
        case enumMotivoDevolucaoWiser.ProblemasFinanceiros:
            return 'Problemas Financeiros';
            break;
        case enumMotivoDevolucaoWiser.DesacordoComercial:
            return 'Desacordo Comercial';
            break;
        case enumMotivoDevolucaoWiser.ProblemascomaFranqueia:
            return 'Problemas com a Franquia';
            break;
        case enumMotivoDevolucaoWiser.MudançadeCidadePaís:
            return 'Mudança de Cidade País';
            break;
        case enumMotivoDevolucaoWiser.ProblemascomProfessor:
            return 'Problemas com Professor';
            break;
        case enumMotivoDevolucaoWiser.ProblemascomaEscola:
            return 'Problemas com a Escola';
            break;
    }
}


function TipoTelefoneFormatter(obj, row) {
    tipo = '';
    _tipo = parseInt(obj);
    switch (_tipo) {
        case enumTelefoneTipo.Residencial:
            tipo = 'Residencial';
            break
        case enumTelefoneTipo.Comercial:
            tipo = 'Comercial';
            break
        case enumTelefoneTipo.Movel:
            tipo = 'Móvel';
            break
        case enumTelefoneTipo.Fax:
            tipo = 'Fax';
            break
        case enumTelefoneTipo.Referencia:
            tipo = row.View.TipoReferenciaNome != "" ? "Ref. " + row.View.TipoReferenciaNome : "Referência";
            break
    }
    return tipo;
}

function TipoEnderecoFormatter(obj, row) {
    tipo = '';
    _tipo = parseInt(obj)
    switch (_tipo) {
        case enumEnderecoTipo.Residencial:
            tipo = 'Residencial';
            break
        case enumEnderecoTipo.Comercial:
            tipo = 'Comercial';
            break
        case enumEnderecoTipo.Referencia:
            tipo = row.View.TipoReferenciaNome != "" ? "Ref. " + row.View.TipoReferenciaNome : "Referência";
            break
    }
    return tipo;
}

//Formata a Data de uma Grid onde o campo em C# é DateTime
function dateFormatter(jsonDate) {

    if (jsonDate != null) {

        if (jsonDate.indexOf("Date(") > 0) {
            var dateString = jsonDate.substr(6);
            var currentTime = new Date(parseInt(dateString));
            currentTime.setHours(currentTime.getHours() + 4); //Fuso Horario
            var month = currentTime.getMonth() + 1;
            if (month < 10) month = '0' + month;
            var day = currentTime.getDate();
            if (day < 10) day = '0' + day;
            var year = currentTime.getFullYear();
            var date = day + "/" + month + "/" + year;
            if (year <= 1) date = '';
            return date;

        } else if (jsonDate.indexOf("-") > 0) {
            return (jsonDate.split("-").reverse().join("/"));
        }

        else {
            return (jsonDate)
        }
    } else {
        return (jsonDate)
    }
}

function dayMonthFormatter(jsonDate) {

    if (jsonDate != null) {

        if (jsonDate.indexOf("Date(") > 0) {
            var dateString = jsonDate.substr(6);
            var currentTime = new Date(parseInt(dateString));
            var month = currentTime.getMonth() + 1;
            if (month < 10) month = '0' + month;
            var day = currentTime.getDate();
            if (day < 10) day = '0' + day;
            var date = day + "/" + month;
            var year = currentTime.getFullYear();
            if (year <= 1) date = '';
            return date;

        } else if (jsonDate.indexOf("-") > 0) {
            var data = jsonDate.split("-");
            jsonDate = data[2] + "/" + data[1];
            return jsonDate;
        }

        else {
            return (jsonDate)
        }
    } else {
        return (jsonDate)
    }
}

function isDate(jsonDate) {
    var ret = false;
    if (jsonDate != null) {
        if (jsonDate.indexOf("Date(") > 0) {
            var dateString = jsonDate.substr(6);
            var currentTime = new Date(parseInt(dateString));
            var year = currentTime.getFullYear();
            if (year > 1) {
                ret = true;
            }
        }
    }
    return ret;
}

function datetimeFormatter(jsonDate) {

    if (jsonDate != null) {

        if (jsonDate.indexOf("Date(") > 0) {
            var dateString = jsonDate.substr(6);
            var currentTime = new Date(parseInt(dateString));

            var month = currentTime.getMonth() + 1;
            if (month < 10) month = '0' + month;
            var day = currentTime.getDate();

            if (day < 10) day = '0' + day;
            var year = currentTime.getFullYear();

            var hour = currentTime.getHours();
            if (hour < 10) hour = '0' + hour;

            var minute = currentTime.getMinutes();
            if (minute < 10) minute = '0' + minute;

            var date = day + "/" + month + "/" + year + " " + hour + ":" + minute;

            if (year <= 1) date = '';
            return date;

        } else if (jsonDate.indexOf("-") > 0) {
            return (jsonDate.split("-").reverse().join("/"));
        }

        else {
            return (jsonDate)
        }
    } else {
        return (jsonDate)
    }
}

function datetimeSecondsFormatter(jsonDate) {

    if (jsonDate != null) {

        if (jsonDate.indexOf("Date(") > 0) {
            var dateString = jsonDate.substr(6);
            var currentTime = new Date(parseInt(dateString));

            var month = currentTime.getMonth() + 1;
            if (month < 10) month = '0' + month;
            var day = currentTime.getDate();

            if (day < 10) day = '0' + day;
            var year = currentTime.getFullYear();

            var hour = currentTime.getHours();
            if (hour < 10) hour = '0' + hour;

            var minute = currentTime.getMinutes();
            if (minute < 10) minute = '0' + minute;

            var seconds = currentTime.getSeconds();
            if (seconds < 10) seconds = '0' + seconds;

            var date = day + "/" + month + "/" + year + " " + hour + ":" + minute+":"+seconds;

            if (year <= 1) date = '';
            return date;

        } else if (jsonDate.indexOf("-") > 0) {
            return (jsonDate.split("-").reverse().join("/"));
        }

        else {
            return (jsonDate)
        }
    } else {
        return (jsonDate)
    }
}

function datetimeFormatter(jsonDate) {

    if (jsonDate != null) {

        if (jsonDate.indexOf("Date(") > 0) {
            var dateString = jsonDate.substr(6);
            var currentTime = new Date(parseInt(dateString));

            var month = currentTime.getMonth() + 1;
            if (month < 10) month = '0' + month;
            var day = currentTime.getDate();

            if (day < 10) day = '0' + day;
            var year = currentTime.getFullYear();

            var hour = currentTime.getHours();
            if (hour < 10) hour = '0' + hour;

            var minute = currentTime.getMinutes();
            if (minute < 10) minute = '0' + minute;

            var date = day + "/" + month + "/" + year + " " + hour + ":" + minute;

            if (year <= 1) date = '';
            return date;

        } else if (jsonDate.indexOf("-") > 0) {
            return (jsonDate.split("-").reverse().join("/"));
        }

        else {
            return (jsonDate)
        }
    } else {
        return (jsonDate)
    }
}

function timeFormatter(jsonDate) {
    if (jsonDate != null) {

        if (jsonDate.indexOf("Date(") > 0) {
            var dateString = jsonDate.substr(6);
            var currentTime = new Date(parseInt(dateString));

            var hour = currentTime.getHours();
            if (hour < 10) hour = '0' + hour;

            var minute = currentTime.getMinutes();
            if (minute < 10) minute = '0' + minute;

            var seconds = currentTime.getSeconds();
            if (seconds < 10) seconds = '0' + seconds;

            var date = hour + ":" + minute + ":" + seconds;

            return date;

        } else if (jsonDate.indexOf("-") > 0) {
            return (jsonDate.split("-").reverse().join("/"));
        }

        else {
            return (jsonDate)
        }
    } else {
        return (jsonDate)
    }
}

function retornaObjetoData(jsonDate) {
    var obj = {};
    if (jsonDate != null) {

        if (jsonDate.indexOf("Date(") > 0) {
            var dateString = jsonDate.substr(6);
            var currentTime = new Date(parseInt(dateString));

            var month = currentTime.getMonth() + 1;
            if (month < 10) month = '0' + month;
            var day = currentTime.getDate();

            if (day < 10) day = '0' + day;
            var year = currentTime.getFullYear();

            var hour = currentTime.getHours();
            if (hour < 10) hour = '0' + hour;

            var minute = currentTime.getMinutes();
            if (minute < 10) minute = '0' + minute;

            if (year > 1) {
                obj = {
                    dia: day,
                    mes: month,
                    ano: year,
                    hora: hour,
                    minuto: minute
                };
            }
        }
    }
    return obj;
}

function retornaObjetoDataUTC(jsonDate) {
    var obj = {};
    if (jsonDate != null) {

        if (jsonDate.indexOf("Date(") > 0) {
            var dateString = jsonDate.substr(6);
            var currentTime = new Date(parseInt(dateString));

            var month = currentTime.getUTCMonth() + 1;
            if (month < 10) month = '0' + month;
            var day = currentTime.getUTCDate();

            if (day < 10) day = '0' + day;
            var year = currentTime.getUTCFullYear();

            var hour = currentTime.getUTCHours();
            if (hour < 10) hour = '0' + hour;

            var minute = currentTime.getUTCMinutes();
            if (minute < 10) minute = '0' + minute;

            if (year > 1) {
                obj = {
                    dia: day,
                    mes: month,
                    ano: year,
                    hora: hour,
                    minuto: minute
                };
            }
        }
    }
    return obj;
}

function addDays(jsDate, days) {
    var result = new Date(jsDate);
    result.setDate(result.getDate() + days);

    var dia = result.getDate();
    var mes = result.getMonth() + 1;
    var ano = result.getFullYear();

    if (dia < 10) dia = '0' + dia;
    if (mes < 10) mes = '0' + mes;

    result = dia + "/" + mes + "/" + ano;

    return result;
}

function addMes(data) {
    var dia = data.getDate();
    var mes = data.getMonth() + 1;
    var ano = data.getFullYear();

    if (mes == 12) {
        mes = 1;
        ano = ano + 1
    } else {
        mes = mes + 1;
    }

    if (dia < 10) dia = '0' + dia;
    if (mes < 10) mes = '0' + mes;

    var date = dia + "/" + mes + "/" + ano;
    return date;
}

function addMonth(data) {

    var dia = ConverterToInt(data.substr(0, 2));
    var mes = ConverterToInt(data.substr(3,2));
    var ano = ConverterToInt(data.substr(6,4));       

    if (mes == 12) {
        mes = 1;
        ano = ano + 1
    } else {
        mes = mes + 1;
    }

    if (mes == 2 && dia > 28) {
        dia = 28;
    }

    if( (mes== 4 || mes==6 || mes==9 || mes ==11) && dia>30){
        dia = 30;
    }

    if (dia < 10) dia = '0' + dia;
    if (mes < 10) mes = '0' + mes;

    var date = dia + "/" + mes + "/" + ano;
    return date;

}


function decimal4digFormatter(num) {

    num = num.toString().replace(',', '.');

    var n = 0
    if (num != "") {
        n = parseFloat(num)
    };

    num = n.toFixed(4).toString();
    num = num.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    num = num.replace(/,/g, '-');
    num = num.replace('.', ',');
    num = num.replace(/-/g, '');

    return num;
}

function moedaFormatter(num) {

    num = num.toString().replace(',', '.');

    var n = 0
    if (num != "") {
        n = parseFloat(num)
    };

    num = n.toFixed(2).toString();
    num = num.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    num = num.replace(/,/g, '-');
    num = num.replace('.', ',');
    num = num.replace(/-/g, '');

    return num;
}

function moedaFormatter2(num) {
    var n = 0
    if (num != "") {
        n = parseFloat(num)
    };
    num = n.toFixed(2).toString();
    num = num.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");    
    num = num.replace(/,/g, '');
    num = num.replace('.', ',');
    
    return num;
}

function milharFormatter(num) {
    var n = 0
    if (num != "") {
        n = parseFloat(num)
    };
    num = n.toFixed(0).toString();
    num = num.replace(/[.]/g, ",").replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&.");
    return num;
}

//Formata um CPF/CNPJ 
function cpfFormatter(jsonDate) {
    var cpfcnpj = RemoverMascara(jsonDate);
    if (cpfcnpj != '') {
        if (cpfcnpj.length < 14)
            cpfcnpj = Formatar(cpfcnpj, '###.###.###-##');
        else
            cpfcnpj = Formatar(cpfcnpj, '##.###.###/####-##');
    }
    return cpfcnpj;
}

function CEPFormatter(jsonDate) {
    var cep = RemoverMascara(jsonDate);
    cep = Formatar(cep, '##.###-###');
    return cep;
}

function foneFormatter(jsonDate) {
    var tel = RemoverMascara(jsonDate);
    if (tel.length < 11) {
        if (tel.length == 10)
            tel = Formatar(tel, '(##) ####-####');
        else if (tel.length == 9)
            tel = Formatar(tel, '#####-####');
        else
            tel = Formatar(tel, '####-####');
    }
    else
    {
        
        if (tel.length > 4 && tel.substring(0,4).indexOf("0800") >= 0)
            tel = Formatar(tel, '####-###-####');
        else
            tel = Formatar(tel, '(##) #####-####');
    }
        
    return tel;
}


//Valida CPF/CNPJ
function isCpfCnpj(valor) {
    var retorno = false;
    var numero = valor;

    numero = RetornaNumeros(numero);
    if (numero.length > 11) {
        if (numero.length < 14) {
            while (numero.length < 14) {
                numero = "0" + numero;
            }
        }
        if (isCnpj(numero)) {
            retorno = true;
        }
    } else {
        if (isCpf(numero)) {
            retorno = true;
        }
    }
    return retorno;
}

function RetornaNumeros(pNum) {
    return String(pNum).replace(/\D/g, "").replace(/^0+/, "");
}

function RemoveNumeros(pText) {
    return String(pText).replace(/[0-9]+/g, '').replace(' ','');
}

function isCpf(cpf) {
    var soma;
    var resto;
    var i;

    if ((cpf.length != 11) ||
    (cpf == "00000000000") || (cpf == "11111111111") ||
    (cpf == "22222222222") || (cpf == "33333333333") ||
    (cpf == "44444444444") || (cpf == "55555555555") ||
    (cpf == "66666666666") || (cpf == "77777777777") ||
    (cpf == "88888888888") || (cpf == "99999999999")) {
        return false;
    }

    soma = 0;

    for (i = 1; i <= 9; i++) {
        soma += Math.floor(cpf.charAt(i - 1)) * (11 - i);
    }

    resto = 11 - (soma - (Math.floor(soma / 11) * 11));

    if ((resto == 10) || (resto == 11)) {
        resto = 0;
    }

    if (resto != Math.floor(cpf.charAt(9))) {
        return false;
    }

    soma = 0;

    for (i = 1; i <= 10; i++) {
        soma += cpf.charAt(i - 1) * (12 - i);
    }

    resto = 11 - (soma - (Math.floor(soma / 11) * 11));

    if ((resto == 10) || (resto == 11)) {
        resto = 0;
    }

    if (resto != Math.floor(cpf.charAt(10))) {
        return false;
    }

    return true;
}

function isCnpj(s) {
    var i;
    var c = s.substr(0, 12);
    var dv = s.substr(12, 2);
    var d1 = 0;

    for (i = 0; i < 12; i++) {
        d1 += c.charAt(11 - i) * (2 + (i % 8));
    }

    if (d1 == 0) return false;

    d1 = 11 - (d1 % 11);

    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1) {
        return false;
    }

    d1 *= 2;

    for (i = 0; i < 12; i++) {
        d1 += c.charAt(11 - i) * (2 + ((i + 1) % 8));
    }

    d1 = 11 - (d1 % 11);

    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1) {
        return false;
    }

    return true;
}


function BooleanFormatter(value) {
    if (value)
        return 'Sim'
    else
        return 'Não';
}


//Função que inclui os links de visualização no bootstrapTable
function operateFormatter(value, row, index) {
    return [
            '<button title="Visualizar" type="button" class="btn btn-view btn-xs">',
                '<i class="glyphicon glyphicon-eye-open"></i>',
            '</button>',
            '<button title="Alterar" type="button" class="btn btn-edit btn-xs">',
                '<i class="glyphicon glyphicon-edit"></i>',
            '</button>',
            '<button title="Excluir" type="button" class="btn btn-remove btn-xs">',
                '<i class="glyphicon glyphicon-trash"></i>',
            '</button>'
    ].join('');
}
function operateFormatterCustomizado(value, row, index) {
    return [
            '<button title="Visualizar" type="button" class="btn btn-view btn-xs">',
                '<i class="glyphicon glyphicon-eye-open"></i>',
            '</button>',
            '<button title="Alterar" type="button" class="btn btn-edit btn-xs">',
                '<i class="glyphicon glyphicon-edit"></i>',
            '</button>'
    ].join('');
}

function visualizarFormatter(value, row, index) {
    return [
            '<button title="Visualizar" type="button" class="btn btn-view btn-xs">',
                '<i class="glyphicon glyphicon-eye-open"></i>',
            '</button>'
    ].join('');
}

function mensagemFormatter(value, row, index) {
    return [
            '<button title="Visualizar" type="button" class="btn btn-view btn-xs">',
                '<i class="glyphicon glyphicon-envelope"></i>',
            '</button>'
    ].join('');
}


function excluirFormatter(value, row, index) {
    return [
            '<button type="button" title="Excluir" class="btn btn-remove btn-xs">',
                '<i class="glyphicon glyphicon-trash"></i>',
            '</button>'
    ].join('');
}

function abrirFormatter(value, row, index) {
    return [
            '<button type="button" title="Abrir" class="btn btn-abrir btn-xs">',
                '<i class="glyphicon glyphicon-share"></i>',
            '</button>'
    ].join('');
}

function alterarExcluirFormatter(value, row, index) {
    return [
            '<button type="button" title="Editar" class="btn btn-edit btn-xs">',
                '<i class="glyphicon glyphicon-edit"></i>',
            '</button>',
            '<button type="button" title="Excluir" class="btn btn-remove btn-xs">',
                '<i class="glyphicon glyphicon-trash"></i>',
            '</button>'
    ].join('');
}
function alterarFormatter(value, row, index) {
    return [
            '<button type="button" title="Editar" class="btn btn-edit btn-xs">',
                '<i class="glyphicon glyphicon-edit"></i>',
            '</button>'
    ].join('');
}

function atualizarFormatter(value, row, index) {
    return [
            '<button type="button" title="Marcar como lido" class="btn btn-xs btn-edit-notif">',
                '<i class="glyphicon glyphicon glyphicon-ok"></i>',
            '</button>'
    ].join('');
}

function ConverterToDate(date) {
    var newdate = date.split("/").reverse().join("-");
    return newdate;
}

function ConverterMesDiaToDiaMes(date) {
    var newdate = date.split("/");
    return newdate[1] + '/' + newdate[0] + '/' + newdate[2];
}

function ConverterToFloat(valor) {
    var valor = valor.replace(",", ".");
    return parseFloat(isNaN(parseFloat(valor)) ? 0.00 : valor);
}

function ConverterToInt(valor) {

    return parseInt(isNaN(parseInt(valor)) ? 0 : valor);
}

function ConverterToDateTime(jsondate) {
    jsondate = jsondate.replace("/Date(", "").replace(")/", "");
    if (jsondate.indexOf("+") > 0) {
        jsondate = jsondate.substring(0, jsondate.indexOf("+"));
    }
    else if (jsondate.indexOf("-") > 0) {
        jsondate = jsondate.substring(0, jsondate.indexOf("-"));
    }

    var date = new Date(parseInt(jsondate, 10));
    var month = date.getMonth() + 1 < 10 ? "0" + (date.getMonth() + 1) : date.getMonth() + 1;
    var currentDate = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
    var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
    var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
    var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
    return date.getFullYear() + "-" + month + "-" + currentDate + " " + hours + ":" + minutes + ":" + seconds;
}

function RemoverMascara(valor) {
    if (valor != "") {
        return valor.replace(/([.*+?^=!:${}()|\[\]\/\\\-\s])/g, '');
    } else return "";   
}

function LimparCampos(container) {
    $(container).find(":input, select").each(function () {
        switch (this.type) {
            case "file":
            case "password":
            case "text":
            case "textarea":
                $(this).val("");
                break;
            case "checkbox":
            case "radio":
                this.checked = false;
        }
        $(this).children("option:selected").removeAttr("selected").end()
               .children("option:first").attr("selected", "selected");
    });
}

function HabilitaCampos(fieldset, habilita) {
    $(fieldset).find(":input, select").each(function () {
        if (habilita)
            $(this).removeAttr('disabled');
        else
            $(this).attr('disabled', 'disabled');
    });
}

function ExibirAlerta(div, msg, tipo, ocultar) {
    $(div).removeClass('hidden');
    $(div).removeClass('alert-success');
    $(div).removeClass('alert-info');
    $(div).removeClass('alert-warning');
    $(div).removeClass('alert-dange');
    $(div).addClass(tipo);
    $(div + '>span').html(msg);
    if (ocultar) {
        setTimeout('OcultaAlerta("' + div + '")', 4000);
    }
}

function ExibeModalConfirmacao(mensagem) {

    $('#btnConfirma').removeClass('btn-primary').removeClass('btn-danger');
    $('#btnConfirma>i').removeClass('glyphicon-trash').removeClass('glyphicon-ok');
    if (_confirmacao.indexOf("Exclui") > -1) {
        $('#btnConfirma').addClass('btn-danger');
        $('#btnConfirma>i').addClass('glyphicon-trash');
    }
    else {
        $('#btnConfirma').addClass('btn-primary');
        $('#btnConfirma>i').addClass('glyphicon-ok');
    }
    var modal = $('#modalconfirmacao');
    modal.find('.modal-mensagem').html(mensagem);
    modal.modal('show');
}

function ExibeModalAtencao(mensagem) {
    var modal = $('#modalatencao');
    modal.find('.modal-mensagem').html(mensagem);
    modal.modal('show');
}

function ExibeModalConfirmacaoNotif(mensagem) {

    $('#btnConfirma').removeClass('btn-primary').removeClass('btn-danger');
    $('#btnConfirma>i').removeClass('glyphicon-trash').removeClass('glyphicon-ok');
    if (_confirmacaoNotif.indexOf("Exclui") > -1) {
        $('#btnConfirma').addClass('btn-danger');
        $('#btnConfirma>i').addClass('glyphicon-trash');
    }
    else {
        $('#btnConfirma').addClass('btn-primary');
        $('#btnConfirma>i').addClass('glyphicon-ok');
    }
    var modal = $('#modalconfirmacao');
    modal.find('.modal-mensagem').html(mensagem);
    modal.modal('show');
}

function OcultaAlerta(div) {
    $(div).addClass('hidden');
}

function DesabilitaEnter(form) {
    $(form).on("keyup keypress", function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            e.preventDefault();
            return false;
        }
    });
}

function DesabilitaJsTree(tree) {
    $(tree).find('.jstree-checkbox').click(function () {
        return false;
    });
    $(tree).find('.jstree-anchor').click(function () {
        return false;
    });
}

function CriaSwAtivo(div, label, check, disabled) {

    $("#swAtivo").remove();
    $(".switchery").remove();
    $(div).append('<input id="swAtivo" data-switchery="true" type="checkbox" class="js-switch"/>');
    $('#swAtivo').prop('checked', check);
    var swAtivo = document.querySelector('.js-switch');
    if (disabled) {
        $('#swAtivo').prop('disabled', true);
    }
    var init = new Switchery(swAtivo);
    $(".switchery").addClass('switchery-alt');

    swAtivo.onchange = function () {
        if (swAtivo.checked) {
            $(label).text('Ativo');
            $(label).css({ 'color': '#1e4582' });
        }
        else {
            $(label).text('Desativo');
            $(label).css({ 'color': '#d14233' });
        }
    };

    swAtivo.onchange();
}

function CriaSwAtivoV2(nome, div, label, check, disabled) {

    $('#sw' + nome).remove();
    $(div).find('.switchery').remove();
    $(div).append('<input id="sw'+nome+'" data-switchery="true" type="checkbox" class="js-switch"/>');
    $('#sw' + nome).prop('checked', check);
    var swAtivo = $(div).find('.js-switch')[0];
    if (disabled) {
        $('#sw' + nome).prop('disabled', true);
    }
    var init = new Switchery(swAtivo);
    $(div).find('.switchery').addClass('switchery-alt');

    swAtivo.onchange = function () {
        if (swAtivo.checked) {
            $(label).text('Ativo');
            $(label).css({ 'color': '#1e4582' });
        }
        else {
            $(label).text('Desativo');
            $(label).css({ 'color': '#d14233' });
        }
    };

    swAtivo.onchange();
}

function CriaDatepicker(input) {
    $(input).mask('00/00/0000');
    $(input).datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior',
        onClose: function (response, obj) {
            if (obj) {
                $('#' + obj.id).keyup();
            }
        }
    });
}

function ValidaCampoObrigatorio(campos) {
    var ret = true;
    for (i = 0; i < campos.length; i++) {
        var $formgroup = $(campos[i]).parent();
        if (!$(campos[i]).val()) {
            if (!$formgroup.hasClass('has-error')) {
                $formgroup.addClass('has-error');
                $formgroup.append('<label class="text-danger2">Campo obrigatório.</label>');
            }
            ret = false;
        }
        else {
            if ($formgroup.hasClass('has-error')) {
                $formgroup.removeClass('has-error');
                $formgroup.find('.text-danger2').remove();
            }
        }
    }
    return ret;
}
function ValidaCampo(campo, msg, operador, valor) {
    var ret = true;
    var condicao;
    var $formgroup = $(campo).parent();
    if (operador == ">") {
        if ($(campo).val() > valor) {
            ret = false;
        }
    }
    else if (operador == "<") {
        if ($(campo).val() < valor) {
            ret = false;
        }
    }
    if (ret && $formgroup.hasClass('has-error'))
    {
        $formgroup.removeClass('has-error');
        $formgroup.find('.text-danger2').remove();

    } else if(!ret && !$formgroup.hasClass('has-error'))
    {
        $formgroup.addClass('has-error');
        $formgroup.append('<label class="text-danger2">' + msg + '</label>');
    }

    return ret;
}
function ChangeTabsLabelColorOnError() {
    for (var i = 0; i < 2; i++) {
        var lista1;
        if (i % 2 == 0) {
            lista1 = $('ul[class="nav nav-tabs nav-tabs-alt"] li > a');
        }
        else {
            lista1 = $('ul[class="nav nav-tabs"] li > a');
        }
        if (lista1.length > 0) {
            lista1.each(function () {
                var iddiv = $(this).attr('href');
                if ($(iddiv).find('label[class="text-danger2"]').length > 0) {
                    if ($(iddiv).find('label[class="text-danger2"]').css('display') != "none") {
                        $(this).css('color', '#d14233');
                    }
                    else {
                        $(this).css('color', '#1e4582');
                    }
                }
                else {
                    $(this).css('color', '#1e4582');
                }
            });
        }
    }
    var wiztab = $('#rootwizard > div[class=tab-content] > div[class*=tab-pane]');
    if (wiztab.length > 0) {
        wiztab.each(function () {
            if ($(this).find('label[class="text-danger2"]').length > 0) {
                var contablock = 0;
                $(this).find('label[class="text-danger2"]').each(function () {
                    if ($(this).css('display') == 'inline-block') {
                        contablock++;
                    }
                });
                if (contablock > 0) {
                    $('#rootwizard').find('a[href=#' + $(this).attr('id') + '] > span[class=desc]').css('color', '#d14233');
                }
                else {
                    $('#rootwizard').find('a[href=#' + $(this).attr('id') + '] > span[class=desc]').css('color', '#1e4582');
                }
            }
            else {
                $('#rootwizard').find('a[href=#' + $(this).attr('id') + '] > span[class=desc]').css('color', '#1e4582');
            }
        });
    }
}

function ResetValidacoes() {
    ResetValidacoesModal("#modalcadastro");
}

function ResetValidacoesModal(modal) {
    var validator = $(modal).validate();
    validator.resetForm();
    ChangeTabsLabelColorOnError();
    $(modal).find('.has-error').removeClass('has-error').removeClass('has-success');
    $(".panel").find('.panel-danger').removeClass('panel-danger');
}

function dropDownFixPosition(button, dropdown) {
    
    var dropDownTop = button.offset().top + button.outerHeight();
    dropdown.css('top', dropDownTop + "px");
    dropdown.css('left', button.offset().left + "px");
}

function showProgress() {
    $.blockUI({
        css: {
            border: 'none',
            padding: '20px',
            width: 'auto',
            left: '45%',
            top: '30%',
            backgroundColor: '#fff',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            color: '#fff'
        },
        message: '<div><img src="css/imgs/preloader-cobmais.svg" style="widht: 100px;background-position: center;width: 80px;padding-bottom: 10px; display: block;"><span style="color: black;">Aguarde...</span>',
        fadeIn: 50,
        fadeOut: 50
    });
}

function hideProgress() {
    $.unblockUI();
}

function setCookie(cname, cvalue, minutos) {
    var d = new Date();
    d.setTime(d.getTime() + (minutos * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function validaData(valor) {
    var date = valor;
    var ardt = new Array;
    var ExpReg = new RegExp("(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}");
    ardt = date.split("/");
    erro = false;
    if (date.search(ExpReg) == -1) {
        erro = true;
    }
    else if (((ardt[1] == 4) || (ardt[1] == 6) || (ardt[1] == 9) || (ardt[1] == 11)) && (ardt[0] > 30))
        erro = true;
    else if (ardt[1] == 2) {
        if ((ardt[0] > 28) && ((ardt[2] % 4) != 0))
            erro = true;
        if ((ardt[0] > 29) && ((ardt[2] % 4) == 0))
            erro = true;
    }
    if (erro) {
        return false;
    }
    else {
        return true;
    }
}

function validaDataMaiorQueAtual(valor) {
    var invalida = false;
    var strData = valor;
    var partesData = strData.split("/");
    var data = new Date(partesData[2], partesData[1] - 1, partesData[0]);
    if (data < new Date())
        invalida = true;

    return invalida;
}

function validaValorMoeda(valor)
{
    var isValid = true;
    var valorFormatado = parseFloat(valor);

    if (isNaN(valorFormatado) || valorFormatado == 'Undefined')
        isValid = false;

    return isValid;
}

function trataTexto(objResp) {
    if ($(objResp).attr("autocomplete") == null || $(objResp).attr("autocomplete") == "") {        
        var varString = new String(objResp.value);
        varString = varString.split('<').join();
        varString = varString.split('>').join();
        varString = varString.split('\'').join();
        objResp.value = varString;
    }
}

function pegaIdAssessoria() {
    var ret = 0;
    $.ajax({
        type: 'POST',
        async: false,
        datatype: 'text',
        url: 'controller/carregador.ashx?metodo=getassessoria',
        success: (function (data) {
            ret = data;
        }),
        error: (function (erro) {
            TrataErroAjax(erro);
        })
    });
    return ret;
}

function isCelular(numtel) {
    numtel = RetornaNumeros(numtel);
    var arrCel = ['7', '8', '9'];
    var retorno = false;
    if (numtel.length <= 9 && arrCel.indexOf(Left(numtel, 1)) != -1) {
        retorno = true;
    }
    else if (numtel.length >= 10 && arrCel.indexOf(numtel.substring(3, 2)) != -1) {
        retorno = true;
    }

    return retorno;
}

function Left(str, n){
    if (n <= 0)
        return "";
    else if (n > String(str).length)
        return str
    else
        return String(str).substring(0,n);
}

function trataDecimaisSemMascara(campo) {
    $(campo).on("keyup keypress", function (e) {
        var code = e.keyCode || e.which;
        if (code > 31 && (code < 48 || code > 57) && code != 44) {
            return false;
        }
        else if (code == 44) {
            for (var i = 0; i < this.value.length; i++) {
                if (this.value[i] == ',') {
                    return false;
                }
            }
        }
        else {
            return true;
        }
    });

    $(campo).on("blur", function (e) {
        for (var i = 0; i < this.value.length; i++) {
            if (this.value[i] == ',') {
                if (i == 0) {
                    this.value = '0' + this.value;
                }
                if (!this.value[i + 1]) {
                    this.value = this.value + '00';
                }
                break;
            }
        }
    });
}

function verificaValorMenorQueOMinimo(v) {
    var valorMinimo = _objCalculo.ListCalculoParcelado[0].ValorParcelaMin.toFixed(2);
    v = v.replace('.', '');
    v = v.replace(",", ".");
    var retorno = true;

    if (parseFloat(v) < parseFloat(valorMinimo))
        retorno = false;

    return retorno;
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}