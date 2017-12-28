<?php
if (file_exists("install/index.php")) {
    //perform redirect if installer files exist
    //this if{} block may be deleted once installed
    header("Location: install/index.php");
}
require_once 'users/init.php';
require_once $abs_us_root . $us_url_root . 'users/includes/header.php';
require_once $abs_us_root . $us_url_root . 'users/includes/navigation.php';
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
if (isset($_POST['btn_cadastrar_triagem'])) {
    //o codigo do paciente será adquirido pelo método get. É necessário verificar se algum valor foi setado
    if (isset($_GET['cd_paciente']) && $_GET['cd_paciente'] != '') {
        //é necessário verificar se o código do paciente realmente existe
        //instanciando o objeto da classe Triagem
        require_once('php/classes/triagem.Class.php');
        $triagem = new Triagem();
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

        $id_inserido = $triagem->getCdTriagem();

        unset($triagem);
        //$mensagem = 'Triagem cadastrada com sucesso';
        if ($ok == 0) {
            ?> <script> alert('Erro ao registrar triagem. Verifique os dados inseridos.');</script> <?php
        } else {
            //AGORA DEVE SER IMPRESSA A TRIAGEM
            //É IMPORTANTE LEMBRAR QUE NÃO VALE A PENA TENTAR IMPRIMIR ESSE TRAMBOLHO ANTES DO SUBMIT DO FORMULÁRIO. É   I M P O S S Í V E L.
            //PORTANTO É NECESSÁRIO PEGAR O ULTIMO ID INSERIDO PARA CRIAR UM FRAME DA PÁGINA visualizar_triagem.php?cd_triagem=$id_inserido E MANDAR IMPRIMIR ESSE FRAME
            //SÉRIO, É MELHOR DEIXAR ASSIM DO QUE TENTAR IMPRIMIR A TRIAGEM DIRETAMENTE DESTA PÁGINA cadastrar_triagem.php
            ?>
            <iframe id='frame_triagem' name='frame_triagem' src='visualizar_triagem.php?cd_triagem=<?php echo $id_inserido; ?>' style="width: 1px; height: 1px;"></iframe>
            <?php
            //header('location: index.php');
            //echo "<br/><br/>".$id_inserido."<br/><br/>";
        }
    } else {
        ?> <script> alert("Código do paciente não encontrado");</script> <?php
        }
    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

        <title>Registro da Triagem - <?php echo $paciente->getNmPaciente(); ?></title>
        <meta charset="utf-8" />
        <link href="css/formulario2.css" rel="stylesheet">
        <script>
            //FUNÇÃO QUE IMPRIME A TRIAGEM
            //DEPOIS QUE TODA A PÁGINA FOI CARREGADA, ELA VERIFICA SE TEM UM IFRAME NA PÁGINA, SE TIVER IMPRIME
            $(document).ready(function () {
                //verificando se existe iframe
                if ($('#frame_triagem').length)
                {
                    imprimir_triagem();
                    //é preciso fazer alguma coisa pra esperar imprimir, por isso o fadeOut
                    $("#frame_triagem").fadeOut(function () {
                        window.location = "index.php";
                    });
                }
            });

            function imprimir_triagem()
            {
                window.frames["frame_triagem"].focus();
                window.frames["frame_triagem"].print();
            }
        </script>
    </head>
    <body>
        <div>
            <form method="post" action="" class="form-style">
                <h1>NOVA TRIAGEM - <?php echo $paciente->getNmPaciente(); ?></h1>
                <fieldset>
                    <!-- <label for="cdsus">Identificação do estabelecimento</label>
                    <input type="number" min=1 name="cd_cnes" id="cdsus" required /><br /> -->
                    <label for="dsqueixa">Queixa principal</label>
                    <select name="ds_queixa" id="dsqueixa" required>
                        <optgroup label="GERAL E INESPECÍFICO">
                            <option value="A01">A01 Dor generalizada /múltipla</option>
                            <option value="A02">A02 Arrepios/ calafrios</option>
                            <option value="A03">A03 Febre</option>
                            <option value="A04">A04 Debilidade/cansaço geral/fadiga</option>
                            <option value="A05">A05 Sentir-se doente</option>
                            <option value="A06">A06 Desmaio/síncope</option>
                            <option value="A07">A07 Coma</option>
                            <option value="A08">A08 Inchaço</option>
                            <option value="A09">A09 Problemas de sudorese</option>
                            <option value="A10">A10 Sangramento/Hemorragia NE</option>
                            <option value="A11">A11 Dores torácicas NE</option>
                            <option value="A13">A13 Receio/Medo do tratamento</option>
                            <option value="A16">A16 Criança irritável</option>
                            <option value="A18">A18 Preocupação com aparência</option>
                            <option value="A20">A20 Pedido/discussão eutanásia</option>
                            <option value="A21">A21 Fator de risco de malignidade</option>
                            <option value="A23">A23 Fator de risco NE</option>
                            <option value="A25">A25 Medo de morrer/medo da morte</option>
                            <option value="A26">A26 Medo de câncer NE</option>
                            <option value="A27">A27 Medo de outra doença NE</option>
                            <option value="A28">A28 Limitação funcional/incapacidade NE</option>
                            <option value="A29">A29 Outros sinais/sintomas gerais</option>
                            <option value="A70">A70 Tuberculose</option>
                            <option value="A71">A71 Sarampo</option>
                            <option value="A72">A72 Varicela</option>
                            <option value="A73">A73 Malária</option>
                            <option value="A74">A74 Rubéola</option>
                            <option value="A75">A75 Mononucleose infecciosa</option>
                            <option value="A76">A76 Outro exantema viral</option>
                            <option value="A77">A77 Dengue e outras doenças virais NE</option>
                            <option value="A78">A78 Hanseníase e outras doenças infecciosas NE</option>
                            <option value="A79">A79 Carcinomatose (localização primária desconhecida)</option>
                            <option value="A80">A80 Lesão traumática/acidente NE</option>
                            <option value="A81">A81 Politraumatismos/ferimentos múltiplos</option>
                            <option value="A82">A82 Efeito secundário de lesão traumática</option>
                            <option value="A84">A84 Intoxicação por medicamento</option>
                            <option value="A85">A85 Efeito adverso de fármaco dose correta</option>
                            <option value="A86">A86 Efeito tóxico de substância não medicinal</option>
                            <option value="A87">A87 Complicações de tratamento médico</option>
                            <option value="A88">A88 Efeito adverso de fator físico</option>
                            <option value="A89">A89 Efeito da prótese</option>
                            <option value="A90">A90 Malformação congênita NE/múltiplas</option>
                            <option value="A91">A91 Investigação com resultado anormal NE</option>
                            <option value="A92">A92 Alergia/reação alérgica NE</option>
                            <option value="A93">A93 Recém-nascido prematuro</option>
                            <option value="A94">A94 Morbidade perinatal, outra</option>
                            <option value="A95">A95 Mortalidade perinatal</option>
                            <option value="A96">A96 Morte</option>
                            <option value="A97">A97 Sem doença</option>
                            <option value="A98">A98 Medicina preventiva/manutenção da saúde</option>
                            <option value="A99">A99 Outras doenças gerais NE</option>
                        </optgroup>
                        <optgroup label="OLHO">
                            <option value="F01">F01 Dor no olho</option>
                            <option value="F02">F02 Olho vermelho</option>
                            <option value="F03">F03 Secreção ocular</option>
                            <option value="F04">F04 Moscas volantes/pontos luminosos/escotomas/
                                manchas</option>
                            <option value="F05">F05 Outras perturbações visuais</option>
                            <option value="F13">F13 Sensações oculares anormais</option>
                            <option value="F14">F14 Movimentos oculares anormais</option>
                            <option value="F15">F15 Aparência anormal nos olhos</option>
                            <option value="F16">F16 Sinais/sintomas das pálpebras</option>
                            <option value="F17">F17 Sinais/sintomas relacionados a óculos</option>
                            <option value="F18">F18 Sinais/sintomasrelacionados a lentesde contato</option>
                            <option value="F27">F27 Medo de doença ocular</option>
                            <option value="F28">F28 Limitação funcional/incapacidade</option>
                            <option value="F29">F29 Outros sinais/sintomas oculares</option>
                            <option value="F70">F70 Conjuntivite infecciosa</option>
                            <option value="F71">F71 Conjuntivite alérgica</option>
                            <option value="F72">F72 Blefarite/hordéolo/calázio</option>
                            <option value="F73">F73 Outras infecções/inflamações oculares</option>
                            <option value="F74">F74 Neoplasia do olho/anexos</option>
                            <option value="F75">F75 Contusão/hemorragia ocular</option>
                            <option value="F76">F76 Corpo estranho ocular</option>
                            <option value="F79">F79 Outras lesões traumáticas oculares</option>
                            <option value="F80">F80 Obstrução canal lacrimal da criança</option>
                            <option value="F81">F81 Outras malformações congênitas do olho</option>
                            <option value="F82">F82 Descolamento da retina</option>
                            <option value="F83">F83 Retinopatia</option>
                            <option value="F84">F84 Degeneração macular</option>
                            <option value="F85">F85 Ulcera da córnea</option>
                            <option value="F86">F86 Tracoma</option>
                            <option value="F91">F91 Erro de refração</option>
                            <option value="F92">F92 Catarata</option>
                            <option value="F93">F93 Glaucoma</option>
                            <option value="F94">F94 Cegueira</option>
                            <option value="F95">F95 Estrabismo</option>
                            <option value="F01">F01 Dor no olho</option>
                            <option value="F01">F99 Outra doenças oculares/anexos</option>
                        </optgroup>
                    </select><br />
                    <label for="pressaomin">Pressão Arterial mínima</label>
                    <input type="number" min=1 step="0.01" name="vl_pressao_min" id="pressaomin" placeholder="mmHg" /><br />
                    <label for="pressaomax">Pressão Arterial máxima</label>
                    <input type="number" min=1 step="0.01" name="vl_pressao_max" id="pressaomax" placeholder="mmHg" /><br />
                    <label for="pulso">Pulso</label>
                    <input type="number" min=1 step="0.01" name="vl_pulso" id="pulso" placeholder="bpm" /><br />
                    <label for="temp" >Temperatura</label>
                    <input type="number" min=1 step="0.01" name="vl_temperatura" id="temp" placeholder="ºC" /><br />
                    <label for="resp">Respiração</label>
                    <input type="number" min=1 step="0.01" name="vl_respiracao" id="resp" placeholder="rpm" /><br />
                    <label for="satu">Saturação</label>
                    <input type="number" min=1 max=100 step="0.01" name="vl_saturacao" id="satu" placeholder="%" /><br />
                    <label for="glic">Glicemia</label>
                    <input type="number" min=1 step="0.01" name="vl_glicemia" id="glic" placeholder="mg/dl" /><br />
                    <label for="glasc">Nível de consciência</label>
                    <input type="number" min=1 max=15 name="vl_nivel_consciencia" id="glasc" placeholder="Escala de Glasgow" /><br />
                    <label for="escdor">Escala da dor </label>
                    <select name="vl_escala_dor" id="escdor">
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
                    <input type="radio" name="ic_alergia" id="alergia" value="sim" />Sim
                    <input type="radio" name="ic_alergia" id="alergia" value="nao" />Não
                    <input type="radio" name="ic_alergia" id="alergia" value="desconhece" checked="checked" />Desconhece <br />
                    <label for="descalergia">Descrição alergia</label>
                    <input type="text" name="ds_alergia" id="descalergia" /><br />
                    <label for="observ">Observações</label>
                    <textarea name="ds_observacao" id="observ" placeholder="Para registro do histórico de doenças, doenças prévias, entre outros"></textarea><br />
                    <label for="classrisco">Classificação de risco</label>
                    <input type="number" min=1 max=5 name="vl_classificacao_risco" id="classrisco"  /><br />
                    <label for="linhacuidado">Linha de cuidado</label>
                    <select name="ds_linha_cuidado" id="linhacuidado">
                        <option value="Nenhuma">Nenhuma</option>
                        <option value="gestacao">Gestação</option>
                        <option value="has">HAS</option>
                        <option value="dm">DM</option>
                        <option value="vio">Violência</option>
                    </select><br />
                    <label for="outrascond">Outras condições</label>
                    <select name="ds_outras_condicoes" id="outrascond">
                        <option value="Nenhuma">Nenhuma</option>
                        <option value="asma">Asma</option>
                        <option value="dpoc">DPOC</option>
                        <option value="onco">Onco</option>
                    </select><br />
                    <!-- <label for="cnsproftriagem">Responsável pela triagem</label>
                    <input type="number" min=1 name="cd_cns_profissional_triagem" id="cnsproftriagem" required /><br /> -->
                </fieldset>
                <input type="submit" name="btn_cadastrar_triagem" value="Registrar Triagem" />
            </form>
        </div>
    </body>
</html>