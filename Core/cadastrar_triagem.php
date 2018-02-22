<?php
if (file_exists("install/index.php")) {
    //perform redirect if installer files exist
    //this if{} block may be deleted once installed
    header("Location: install/index.php");
}
require_once 'users/init.php';
require_once $abs_us_root . $us_url_root . 'users/includes/header.php';
//require_once $abs_us_root . $us_url_root . 'users/includes/navigation.php';
$db = DB::getInstance();
if (!securePage($_SERVER['PHP_SELF'])) {
    die();
}
?>

<?php
//essa pagina precisa do codigo do paciente no metodo GET para fazer o insert na chave estrangeira do banco, aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente existe como um usuario. Caso contrario, o usuario volta pra pagina de pesquisar_paciente.php
if (isset($_GET['cd_paciente']) && $_GET['cd_paciente'] != '') {
    //verificando se o valor existe no banco
    require_once('php/classes/paciente.Class.php');
    $paciente = new Paciente();
    $paciente->selecionar($_GET['cd_paciente']);
    if ($paciente->getCdPaciente() == '' || $paciente->getCdPaciente() == 0) {
        unset($paciente);
        header("location: index.php");
    }
} else {
    unset($paciente);
    header("location: index.php");
}
?>

<?php
//instanciando o objeto da classe Triagem
require_once('php/classes/triagem.Class.php');
$triagem = new Triagem();

if (isset($_POST['btn_cadastrar_triagem'])) {
    //o codigo do paciente será adquirido pelo método get. É necessário verificar se algum valor foi setado
    if (isset($_GET['cd_paciente']) && $_GET['cd_paciente'] != '') {
        //é necessário verificar se o código do paciente realmente existe
        //setando as informações 
        $triagem->setIcFinalizada('0');
        $triagem->setDsQueixa($_POST['ds_queixa']);
        $triagem->setDtRegistro(date("Y-m-d"));
        $triagem->setHrRegistro(date("H:i:s"));
        $triagem->setVlPressaoMin($_POST['vl_pressao_min']);
        $triagem->setVlPressaoMax($_POST['vl_pressao_max']);
        $triagem->setVlPulso($_POST['vl_pulso']);
        $triagem->setVlTemperatura($_POST['vl_temperatura']);
        $triagem->setVlRespiracao($_POST['vl_respiracao']);
        $triagem->setVlSaturacao($_POST['vl_saturacao']);
        $triagem->setVlGlicemia($_POST['vl_glicemia']);
        $triagem->setVlNivelConsciencia($_POST['vl_nivel_consciencia']);
        $triagem->setVlEscalaDor($_POST['vl_escala_dor']);
        $triagem->setIcAlergia($_POST['ic_alergia']);
        $triagem->setDsAlergia($_POST['ds_alergia']);
        $triagem->setDsObservacao($_POST['ds_observacao']);
        $triagem->setVlClassificacaoRisco($_POST['vl_classificacao_risco']);
        $triagem->setDsLinhaCuidado($_POST['ds_linha_cuidado']);
        $triagem->setDsOutrasCondicoes($_POST['ds_outras_condicoes']);
        $triagem->setCdPaciente($_GET['cd_paciente']);
        //cadastrando 
        $ok = $triagem->cadastrar();
        if ($ok == 0) {
            ?> <script> alert('Erro ao registrar triagem. Verifique os dados inseridos.');</script> <?php
        } //A PARTE QUE IMPRIME A TRIAGEM É MAIS PRA BAIXO NO CÓDIGO
    } else {
        ?> <script> alert("Código do paciente não encontrado");</script> <?php
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="users/js/jquery.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <title>Registro da Triagem - <?php echo $paciente->getNmPaciente(); ?></title>
        <meta charset="utf-8" />
        <link href="css/formulario2.css" rel="stylesheet">
        <script>
            //ESSAS FUNÇÕES SÓ SERVEM PRA PREENCHER O FORMULÁRIO SOZINHO PRA QUEM TIVER TESTANDO NÃO TER QUE FICAR ESCREVENDO TODA HORA------------------------------------------------------------
            $(document).ready(function () {
                //mandando completar o formulário sozinho
                completar_formulario();
            });

            function completar_formulario() {
                $("#ds_queixa").val("A03 Febre");
                $("#vl_pressao_max").val("" + aleatorio(10, 13));
                $("#vl_pressao_min").val("" + aleatorio(6, 9));
                $("#vl_pulso").val("" + aleatorio(70, 115));
                $("#vl_temperatura").val("" + aleatorio(36, 40));
                $("#vl_respiracao").val("" + aleatorio(25, 45));
                $("#vl_saturacao").val("" + aleatorio(90, 110));
                $("#vl_glicemia").val("" + aleatorio(90, 110));
                $("#vl_nivel_consciencia").val("" + aleatorio(12, 15));
                $("#vl_escala_dor").val("" + aleatorio(0, 6));
                //$("#vl_classificacao_risco").val(aleatorio(1, 5));
                $("#ds_linha_cuidado").val("Nenhuma");
                $("#ds_outras_condicoes").val("Nenhuma");
            }

            function aleatorio(inicio, fim) {
                var intervalo = fim - inicio;
                return (inicio + Math.floor((Math.random() * intervalo) + 1));
            }
//----------------------------------------------------------------------------------------
        </script>
        <style>
            /* ESSE CSS é referênte as cores da classificação de risco*/
            .red {
                background-color: #F00;
            }

            .blue {
                background-color: #00F;
            }

            .orange{
                background-color: #F58025;
            }

            .green{
                background-color: #008000;
            }

            .yellow{
                background-color: #ffff00;
            }
        </style>    
    </head>
    <body>
        <?php require_once 'php/div_header.php'; ?>
        <div id="div_corpo">
            <form method="post" action="" class="form-style">
                <h1>NOVA TRIAGEM - <?php echo $paciente->getNmPaciente(); ?></h1>
                <fieldset>
                    <label for="dsqueixa">Queixa principal</label>
                    <input type="text" name="ds_queixa" id="ds_queixa"/>

                    <label for="pressaomax">Pressão Arterial máxima</label>
                    <input type="number" min=1 step="0.01" name="vl_pressao_max" id="vl_pressao_max" placeholder="mmHg" /><br />
                    <label for="pressaomin">Pressão Arterial mínima</label>
                    <input type="number" min=1 step="0.01" name="vl_pressao_min" id="vl_pressao_min" placeholder="mmHg" /><br />
                    <label for="pulso">Pulso</label>
                    <input type="number" min=1 step="0.01" name="vl_pulso" id="vl_pulso" placeholder="bpm" /><br />

                    <label for="temp" >Temperatura</label>
                    <input type="number" min=1 step="0.01" name="vl_temperatura" id="vl_temperatura" placeholder="ºC" /><br />

                    <label for="resp">Respiração</label>
                    <input type="number" min=1 step="0.01" name="vl_respiracao" id="vl_respiracao" placeholder="rpm" /><br />

                    <label for="satu">Saturação</label>
                    <input type="number" min=1 step="0.01" name="vl_saturacao" id="vl_saturacao" placeholder="%" /><br />

                    <label for="glic">Glicemia</label>
                    <input type="number" min=1 step="0.01" name="vl_glicemia" id="vl_glicemia" placeholder="mg/dl" /><br />

                    <label for="glasc">Nível de consciência</label>
                    <input type="number" min=1 max=15 name="vl_nivel_consciencia" id="vl_nivel_consciencia" placeholder="Escala de Glasgow" /><br />
                    <label for="escdor">Escala da dor </label>
                    <select name="vl_escala_dor" id="vl_escala_dor">
                        <optgroup label="Leve">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </optgroup>
                        <optgroup label="Moderado">
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </optgroup>
                        <optgroup label="Intensa">
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </optgroup>
                    </select><br />
                    <label for="alergia">Alergia a medicamentos</label>
                    <input type="radio" name="ic_alergia" id="ic_alergia" value="sim" />Sim
                    <input type="radio" name="ic_alergia" id="ic_alergia" value="nao" />Não
                    <input type="radio" name="ic_alergia" id="ic_alergia" value="desconhece" checked="checked" />Desconhece <br />
                    <label for="descalergia">Descrição alergia</label>
                    <input type="text" name="ds_alergia" id="ds_alergia" /><br />
                    <label for="observ">Observações</label>
                    <textarea name="ds_observacao" id="ds_observacao" placeholder="Para registro do histórico de doenças, doenças prévias, entre outros"></textarea><br />
                    <label for="classrisco">Classificação de risco</label>
                    <select name="vl_classificacao_risco" id="vl_classificacao_risco" style="background-color: blue"> 
                        <option value="1" class="blue">Não Urgência</option>
                        <option value="2" class="green">Pouca Urgência</option>
                        <option value="3" class="yellow">Urgência</option>
                        <option value="4" class="orange">Muita Urgência</option>
                        <option value="5" class="red">Emergência</option> 
                    </select>
                    <label for="linhacuidado">Linha de cuidado</label>
                    <select name="ds_linha_cuidado" id="ds_linha_cuidado">
                        <option value="Nenhuma">Nenhuma</option>
                        <option value="gestacao">Gestação</option>
                        <option value="has">HAS</option>
                        <option value="dm">DM</option>
                        <option value="vio">Violência</option>
                    </select><br />
                    <label for="outrascond">Outras condições</label>
                    <select name="ds_outras_condicoes" id="ds_outras_condicoes">
                        <option value="Nenhuma">Nenhuma</option>
                        <option value="asma">Asma</option>
                        <option value="dpoc">DPOC</option>
                        <option value="onco">Onco</option>
                    </select><br />
                    <!-- <label for="cnsproftriagem">Responsável pela triagem</label>
                    <input type="number" min=1 name="cd_cns_profissional_triagem" id="cnsproftriagem" required /><br /> -->
                </fieldset>
                <input type="submit" name="btn_cadastrar_triagem" value="Registrar Triagem" />
                <button type="button" onclick="javascript:history.back()">Voltar</button>
            </form>
        </div>
        <?php
//-------PARTE PARA IMPRIMIR A TRIAGEM---------------------------
        if (isset($ok) && $ok === 1) {
            $txt_msg = '<p>A triagem foi registrada com sucesso.</p><p>Deseja imprimir?</p>';
            $source_frame = "visualizar_triagem.php?cd_triagem=" . $triagem->getCdTriagem() . "&printLayout";
            require_once 'php/div_alert.php';
        }
        ?>
        <script>
            //script para pegar todos os códigos da CIAP2
            //mas primeiro é preciso chamar o php pra pegar esses códigos na classe Triagem
<?php
require_once('php/classes/triagem.Class.php');
$obj_triagem = new Triagem();
$array_ciap = $obj_triagem->sintomasCiap();
?>
            var source = [
<?php
foreach ($array_ciap as $value) {
    echo '"' . $value . '",';
}
?>
            ];
            $("#ds_queixa").autocomplete({
                source: function (request, response) {
                    var results = $.ui.autocomplete.filter(source, request.term);
                    response(results.slice(0, 7));
                },
                select: function (event, ui) {
                    if (ui.item)
                    {
                        $('#ds_queixa').val(ui.item.value);
                    }
                }
            });
        </script>
        <script>
            $("#vl_classificacao_risco").change(function () {
                /*<option value="1" class="blue">Não Urgência</option>
                 <option value="2" class="green">Pouca Urgência</option>
                 <option value="3" class="yellow">Urgência</option>
                 <option value="4" class="orange">Muita Urgência</option>
                 <option value="5" class="red">Emergência</option> 
                 */
                switch ($(this).val()) {
                    case '1':
                        $(this).css("background-color", "blue");
                        break;
                    case '2':
                        $(this).css("background-color", "green");
                        break;
                    case '3':
                        $(this).css("background-color", "yellow");
                        break;
                    case '4':
                        $(this).css("background-color", "orange");
                        break;
                    case '5':
                        $(this).css("background-color", "red");
                        break;
                    default:
                        $(this).css("background-color", "blue");
                        break;
                }
            });
        </script>
    </body>
</html>