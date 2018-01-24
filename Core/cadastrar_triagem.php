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
			<?php
			//aqui serão colocadas os <options> desse <input type="select">
			//A classe Triagem tem o método sintomasCiap que retorna um array com todas as patologias do CIAP 2
			$array_patologias = array();
			$array_patologias = $triagem->sintomasCiap();
			foreach ($array_patologias as $value) {
			    ?>
    			<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
			    <?php
			}
			?>
		    </select><br />
                    <label for="pressaomax">Pressão Arterial máxima</label>
                    <input type="number" min=1 step="0.01" name="vl_pressao_max" id="pressaomax" placeholder="mmHg" /><br />
		    <label for="pressaomin">Pressão Arterial mínima</label>
                    <input type="number" min=1 step="0.01" name="vl_pressao_min" id="pressaomin" placeholder="mmHg" /><br />
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