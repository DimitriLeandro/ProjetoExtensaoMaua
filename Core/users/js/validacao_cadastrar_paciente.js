//--------------------PRIMEIRA PARTE DO FURMULARIO
function validar_cd_cns_paciente()
{
    var vlrCNS = document.forms.cadastro_paciente.cd_cns_paciente.value;

    // Formulário que contem o campo CNS
    var soma = new Number;
    var resto = new Number;
    var dv = new Number;
    var pis = new String;
    var resultado = new String;
    var tamCNS = vlrCNS.length;
    if ((tamCNS) != 15) {
        //alert("Numero de CNS invalido");
        document.getElementById("cd_cns_paciente").style.outline = "solid 1px #FF0000";
    }
    pis = vlrCNS.substring(0, 11);
    soma = (((Number(pis.substring(0, 1))) * 15) +
            ((Number(pis.substring(1, 2))) * 14) +
            ((Number(pis.substring(2, 3))) * 13) +
            ((Number(pis.substring(3, 4))) * 12) +
            ((Number(pis.substring(4, 5))) * 11) +
            ((Number(pis.substring(5, 6))) * 10) +
            ((Number(pis.substring(6, 7))) * 9) +
            ((Number(pis.substring(7, 8))) * 8) +
            ((Number(pis.substring(8, 9))) * 7) +
            ((Number(pis.substring(9, 10))) * 6) +
            ((Number(pis.substring(10, 11))) * 5));
    resto = soma % 11;
    dv = 11 - resto;
    if (dv == 11) {
        dv = 0;
    }
    if (dv == 10) {
        soma = (((Number(pis.substring(0, 1))) * 15) +
                ((Number(pis.substring(1, 2))) * 14) +
                ((Number(pis.substring(2, 3))) * 13) +
                ((Number(pis.substring(3, 4))) * 12) +
                ((Number(pis.substring(4, 5))) * 11) +
                ((Number(pis.substring(5, 6))) * 10) +
                ((Number(pis.substring(6, 7))) * 9) +
                ((Number(pis.substring(7, 8))) * 8) +
                ((Number(pis.substring(8, 9))) * 7) +
                ((Number(pis.substring(9, 10))) * 6) +
                ((Number(pis.substring(10, 11))) * 5) + 2);
        resto = soma % 11;
        dv = 11 - resto;
        resultado = pis + "001" + String(dv);
    } else {
        resultado = pis + "000" + String(dv);
    }
    if (vlrCNS != resultado) {
        //alert("Numero de CNS invalido");
        document.getElementById("cd_cns_paciente").style.outline = "solid 1px #FF0000";
    } else {
        //alert("Numero de CNS válido");
        //Se ele tem CNS, entao ele nao pode ter uma justificativa para nao ter um CNS, afinal, ELE TEM!
        $("#nm_justificativa").val("");
        document.getElementById("cd_cns_paciente").style.outline = "solid 1px #00FF00";
    }
}

function validar_nm_justificativa()
{
    var justificativa = document.forms.cadastro_paciente.nm_justificativa.value;

    if (justificativa.length > 99)
    {
        document.getElementById("nm_justificativa").style.outline = "solid 1px #FF0000";
    } else
    {
        //se o paciente tiver uma justisficativa para nao ter um CNS, entao ele nao pode ter um CNS
        if (justificativa != "")
        {
            $("#cd_cns_paciente").val("");
            document.getElementById("nm_justificativa").style.outline = "solid 1px #00FF00";
        } else
        {
            //se n~ao tiver justificativa, entao ele tem que ter um CNS
            if ($("#cd_cns_paciente").val() != "")
            {
                document.getElementById("nm_justificativa").style.outline = "solid 1px #00FF00";
            } else
            {
                document.getElementById("nm_justificativa").style.outline = "solid 1px #FF0000";
            }
        }
    }
}

function validar_nm_paciente()
{
    var nome = document.forms.cadastro_paciente.nm_paciente.value;

    //nome = nome.replace(/ /g,'');
    if (nome.length < 5 || nome.length > 60)
    {
        document.getElementById("nm_paciente").style.outline = "solid 1px #FF0000";
    } else
    {
        document.getElementById("nm_paciente").style.outline = "solid 1px #00FF00";
        $("#nm_responsavel").val($("#nm_paciente").val());
    }
}

function validar_nm_mae()
{
    var nome = document.forms.cadastro_paciente.nm_mae.value;

    //nome = nome.replace(/ /g,'');
    if (nome.length < 5 || nome.length > 60) {
        document.getElementById("nm_mae").style.outline = "solid 1px #FF0000";
    } else
    {
        document.getElementById("nm_mae").style.outline = "solid 1px #00FF00";
    }
}

function validar_ic_sexo()
{
    var sexo = document.forms.cadastro_paciente.ic_sexo.value;

    if (sexo == "Masculino" || sexo == "Feminino" || sexo == "Não informado")
    {
        document.getElementById("ic_sexo").style.outline = "solid 1px #00FF00";
    } else
    {
        document.getElementById("ic_sexo").style.outline = "solid 1px #FF0000";
    }
}

function validar_ic_raca()
{
    var raca = document.forms.cadastro_paciente.ic_raca.value;

    if (raca == "Branca" || raca == "Preta" || raca == "Parda" || raca == "Amarela" || raca == "Indígena" || raca == "Sem informação")
    {
        document.getElementById("ic_raca").style.outline = "solid 1px #00FF00";
    } else
    {
        document.getElementById("ic_raca").style.outline = "solid 1px #FF0000";
    }
}

function validar_dt_nascimento()
{
    var data = document.forms.cadastro_paciente.dt_nascimento.value;

    //removendo tudo que n~ao for n´umero
    data = data.replace(/[^0-9]/g, '');

    //Seperando dia, m^es e ano
    var dia = data.substring(0, 2);
    var mes = data.substring(2, 4);
    var ano = data.substring(4, 8);

    //validando
    if (mes < 01 || mes > 12)
        document.getElementById("dt_nascimento").style.outline = "solid 1px #FF0000";
    else if (dia < 01 || dia > 31)
        document.getElementById("dt_nascimento").style.outline = "solid 1px #FF0000";
    else if ((mes == 04 || mes == 06 || mes == 09 || mes == 11) && dia > 30)
        document.getElementById("dt_nascimento").style.outline = "solid 1px #FF0000";
    else if (mes == 02)
    {
        var bissexto = (ano % 4 == 0 && (ano % 100 != 0 || ano % 400 == 0));
        if (dia > 29 || (dia == 29 && !bissexto))
            document.getElementById("dt_nascimento").style.outline = "solid 1px #FF0000";
        else
            document.getElementById("dt_nascimento").style.outline = "solid 1px #00FF00";
    } else
    {
        //se chegou at´e aqui ´e pq a data ´e valida, agora falta ver se n~ao ´e data futura ou muito antiga

        //pegando a data atual
        var hoje = new Date();
        var data_inserida = new Date(ano, mes, dia, 0, 0, 0, 0); //(year, month, day, hours, minutes, seconds, milliseconds)

        //verificando se a data n~ao ´e futura
        if (data_inserida > hoje)
        {
            document.getElementById("dt_nascimento").style.outline = "solid 1px #FF0000";
        } else
        {
            //verificando se a data nao ´e muito antiga
            if (parseInt(ano) + 120 < hoje.getFullYear())
            {
                document.getElementById("dt_nascimento").style.outline = "solid 1px #FF0000";
            } else
            {
                document.getElementById("dt_nascimento").style.outline = "solid 1px #00FF00";
            }
        }
    }
}
//-----------------	SEGUNDA PARTE DO FORMULARIO
function validar_nm_pais_nascimento()
{
    if ($("#nm_pais_nascimento").val().length < 3 || $("#nm_pais_nascimento").val().length > 40)
    {
        $("#nm_pais_nascimento").css({"outline": "solid 1px #FF0000"});
    } else
    {
        $("#nm_pais_nascimento").css({"outline": "solid 1px #00FF00"});
    }
}

function validar_nm_municipio_nascimento()
{
    if ($("#nm_municipio_nascimento").val().length < 3 || $("#nm_municipio_nascimento").val().length > 60)
    {
        $("#nm_municipio_nascimento").css({"outline": "solid 1px #FF0000"});
    } else
    {
        $("#nm_municipio_nascimento").css({"outline": "solid 1px #00FF00"});
    }
}

function validar_nm_pais_residencia()
{
    if ($("#nm_pais_residencia").val().length < 3 || $("#nm_pais_residencia").val().length > 40)
    {
        $("#nm_pais_residencia").css({"outline": "solid 1px #FF0000"});
    } else
    {
        $("#nm_pais_residencia").css({"outline": "solid 1px #00FF00"});
    }
}

function validar_cd_cep()
{
    //removendo tudo que n~ao for n´umero
    var cep = $("#cd_cep").val().replace(/[^0-9]/g, '');
    if (cep.length == 8)
    {
        //completando o endereço do paciente
        pesquisar_cep();
        //agora é necessário dar um load em uma div para mostrar qual é a ubs de referência do paciente
        load_ubs_referencia();

    } else
    {
        $("#cd_cep").css({"outline": "solid 1px #FF0000"});
        $("#div_ubs_referencia").hide();
    }
}

function validar_nm_municipio_residencia()
{
    if ($("#nm_municipio_residencia").val().length < 3 || $("#nm_municipio_residencia").val().length > 60)
    {
        $("#nm_municipio_residencia").css({"outline": "solid 1px #FF0000"});
    } else
    {
        $("#nm_municipio_residencia").css({"outline": "solid 1px #00FF00"});
    }
}

function validar_nm_bairro()
{
    if ($("#nm_bairro").val().length < 3 || $("#nm_bairro").val().length > 40)
    {
        $("#nm_bairro").css({"outline": "solid 1px #FF0000"});
    } else
    {
        $("#nm_bairro").css({"outline": "solid 1px #00FF00"});
    }
}

function validar_nm_logradouro()
{
    if ($("#nm_logradouro").val().length < 3 || $("#nm_logradouro").val().length > 60)
    {
        $("#nm_logradouro").css({"outline": "solid 1px #FF0000"});
    } else
    {
        $("#nm_logradouro").css({"outline": "solid 1px #00FF00"});
    }
}

function validar_nm_numero_residencia()
{
    if ($("#nm_numero_residencia").val().length < 1 || $("#nm_numero_residencia").val().length > 9)
    {
        $("#nm_numero_residencia").css({"outline": "solid 1px #FF0000"});
    } else
    {
        $("#nm_numero_residencia").css({"outline": "solid 1px #00FF00"});
    }
}

function validar_nm_complemento()
{
    if ($("#nm_complemento").val().length > 9)
    {
        $("#nm_complemento").css({"outline": "solid 1px #FF0000"});
    } else
    {
        $("#nm_complemento").css({"outline": "solid 1px #00FF00"});
    }
}

//------------------TERCEIRA PARTE DO FORMUL´ARIO
function validar_nm_responsavel()
{
    if ($("#nm_responsavel").val().length < 3 || $("#nm_responsavel").val().length > 60)
    {
        $("#nm_responsavel").css({"outline": "solid 1px #FF0000"});
    } else
    {
        $("#nm_responsavel").css({"outline": "solid 1px #00FF00"});
    }
}

function validar_cd_documento_responsavel()
{
    //removendo tudo que n~ao for n´umero
    var documento_rg = $("#cd_documento_responsavel").val().replace(/[^0-9]/g, '');
    if (documento_rg.length == 9)
    {
        $("#cd_documento_responsavel").css({"outline": "solid 1px #00FF00"});
    } else
    {
        $("#cd_documento_responsavel").css({"outline": "solid 1px #FF0000"});
    }
}

function validar_nm_orgao_emissor()
{
    if ($("#nm_orgao_emissor").val().length < 1 || $("#nm_orgao_emissor").val().length > 9)
    {
        $("#nm_orgao_emissor").css({"outline": "solid 1px #FF0000"});
    } else
    {
        $("#nm_orgao_emissor").css({"outline": "solid 1px #00FF00"});
    }
}

//----------------- MASCARAS E OUTRAS COISAS
var aux = 0;

function trocar_cns_justificativa()
{
    //essa funcao serve para alternar o campo para preencher o CNS ou Justificar a auxencia do CNS
    //a variavel auxiliar serve para dizer qual deve ser exibido. 
    //0 esconde o numero do cns e mostra a justificativa
    //1 esconde a justificativa e mostra o CNS
    $("#nm_justificativa").val("");
    $("#cd_cns_paciente").val("");
    document.getElementById("cd_cns_paciente").style.outline = "none";
    document.getElementById("nm_justificativa").style.outline = "none";

    if (aux == 0)
    {
        $("#div_possui_cns").hide();
        $("#div_nao_possui_cns").show();
        $("#p_troca_cns_justificativa").text("O paciente possui CNS");
        $("#nm_justificativa").focus();
        aux = 1;
    } else
    {
        $("#div_nao_possui_cns").hide();
        $("#div_possui_cns").show();
        $("#p_troca_cns_justificativa").text("O paciente não possui CNS");
        $("#cd_cns_paciente").focus();
        aux = 0;
    }
}

function mascarar_data()
{
    var data = document.forms.cadastro_paciente.dt_nascimento;
    if (data.value.length == 2 || data.value.length == 5)
        data.value = data.value + '/';
}

function mascarar_rg()
{
    var rg = document.forms.cadastro_paciente.cd_documento_responsavel;
    if (rg.value.length == 2 || rg.value.length == 6)
    {
        rg.value = rg.value + ".";
    }
    if (rg.value.length == 10)
    {
        rg.value = rg.value + "-";
    }
}

function load_ubs_referencia() {
    //essa função serve pra pesquisar a ubs de referência do paciente. Ela é acionada depois que o cep é validado. A pesquisa da ubs<->cep é feita com um load() na div div_ubs_referencia
    //lembrando que no banco, os ceps estão armazenados com 00000-000, então é necessário garantir que a pesquisa será feita nesse formato também.
    //Nova variável "cep" somente com numeros.
    var cep = $("#cd_cep").val().replace(/\D/g, '');
    if (cep.length == 8) {
        //se entrou aqui então ta suave, é só botar o "-" no meio do número
        cep = cep.substring(0, 5) + "-" + cep.substring(5, 9);
        var endereco = "php/div_ubs_referencia.php?cd_cep=" + cep;
        $("#div_ubs_referencia").load(endereco);
        $("#div_ubs_referencia").show();
    } else {
        $("#div_ubs_referencia").hide();
    }
}