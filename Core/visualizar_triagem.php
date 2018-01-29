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
//essa pagina precisa do codigo da triagem no metodo GET para conseguir os dados dessa triagem no banco. Aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente ´e uma triagem existente no banco. Caso contrario, o usuario volta para o index

if (isset($_GET['cd_triagem']) && $_GET['cd_triagem'] != '') {
    //verificando se o valor existe no banco
    require_once('php/classes/triagem.Class.php');
    $triagem = new Triagem();

    $triagem->selecionar($_GET['cd_triagem']);

    if ($triagem->getCdTriagem() == '' || $triagem->getCdTriagem() == 0) {
	unset($triagem);
	header("location: index.php");
    } else {
	//pegando os dados do paciente só pra exibir o nome pelo menos
	require_once('php/classes/paciente.Class.php');
	$paciente = new Paciente();

	$paciente->selecionar($triagem->getCdPaciente());
    }
} else {
    unset($triagem);
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <title>Dados da Triagem</title>
        <meta charset="utf-8" />
        <link href="css/formulario.css" rel="stylesheet">
        <script src="users/js/jquery.js"></script>
    </head>
    <body>
	<?php require_once 'php/div_header.php'; ?>
        <div>
            <form method="post" class="form-style">
                <h1><?php echo $paciente->getNmPaciente(); ?></h1>
                <h4>Dados da Triagem</h4>
                <fieldset style="border: solid 1px; padding: 15px;">
                    <p>
			<?php
			if ($triagem->getIcFinalizada() == 1) {
			    echo "Um diagnóstico para essa triagem já foi realizado.";
			} else {
			    echo "Essa triagem ainda não foi finalizada. É necesário que um médico realize diagnóstico específico.";
			}
			?> 
                    </p>
                    <p>UBS: <?php echo $triagem->getCdUbs(); ?> </p>
                    <p>Queixa: <?php echo $triagem->getDsQueixa(); ?> </p>
                    <p>Data: <?php echo $triagem->getDtRegistro(); ?> </p>
                    <p>Hora: <?php echo $triagem->getHrRegistro(); ?> </p>
                    <p>Pressão Mínima: <?php echo $triagem->getVlPressaoMin(); ?> </p>
                    <p>Pressão Máxima: <?php echo $triagem->getVlPressaoMax(); ?> </p>
                    <p>Pulso: <?php echo $triagem->getVlPulso(); ?> </p>
                    <p>Temperatura: <?php echo $triagem->getVlTemperatura(); ?> </p>
                    <p>Respiração: <?php echo $triagem->getVlRespiracao(); ?> </p>
                    <p>Saturação: <?php echo $triagem->getVlSaturacao(); ?> </p>
                    <p>Glicemia: <?php echo $triagem->getVlGlicemia(); ?> </p>
                    <p>Nível de Consciência: <?php echo $triagem->getVlNivelConsciencia(); ?> </p>
                    <p>Escala de Dor: <?php echo $triagem->getVlEscalaDor(); ?> </p>
                    <p>Alergia a Medicamentos: <?php echo $triagem->getIcAlergia(); ?> </p>
                    <p>Descrição das Alergias: <?php echo $triagem->getDsAlergia(); ?> </p>
                    <p>Observações: <?php echo $triagem->getDsObservacao(); ?> </p>
                    <p>Classificação de Risco: <?php echo $triagem->getVlClassificacaoRisco(); ?> </p>
                    <p>Linha de Cuidado: <?php echo $triagem->getDsLinhaCuidado(); ?> </p>
                    <p>Outras condições: <?php echo $triagem->getDsOutrasCondicoes(); ?> </p>
                    <p>Profissional que Realizou a Triagem: <?php echo $triagem->getCdUsuarioRegistro(); ?> </p>
                </fieldset>
                <br/>
		<?php
//VERIFICANDO SE H´A ALGUM DIAGNOSTICO PRA ESSA TRIAGEM
//SE N~AO TIVER, MOSTRA O BOT~AO PRA FAZER O DIAGNOSTICO
//SE TIVER, MOSTRA OS DADOS DO DIAGNOSTICO
		if ($triagem->getIcFinalizada() == 0) {
		    ?>
    		<button type="button" onclick="window.location = 'cadastrar_diagnostico.php?cd_triagem=<?php echo $triagem->getCdTriagem(); ?>';">Diagnóstico</button><br/>
		    <?php
		} else {
		    //instanciando um objeto da classe Dignostico para pegar as informaç~oes sobre o diagnostico dessa triagem
		    require_once("php/classes/diagnostico.Class.php");
		    $obj_diagnostico = new Diagnostico();

		    //inciando uma conex~ao com o banco
		    require_once("php/classes/conexao.Class.php");
		    $conexao = new Conexao();
		    $db_maua = $conexao->get_db_maua();

		    //pegando o id do diagnostico dessa triagem
		    if ($stmt = $db_maua->prepare("SELECT cd_diagnostico FROM tb_diagnostico WHERE cd_triagem = ?")) {
			$stmt->bind_param("i", $_GET['cd_triagem']);
			$stmt->execute();
			$stmt->bind_result($codigo_diagnostico);
			while ($stmt->fetch()) {
			    $obj_diagnostico->selecionar($codigo_diagnostico);
			}
			$stmt->close();
		    }
		    ?>
    		<h4>Dados do Diagnóstico</h4>
    		<fieldset style="border: solid 1px; padding: 15px;">
    		    <p>UBS: <?php echo $obj_diagnostico->getCdUbs(); ?></p>
    		    <p>Avaliaçao: <?php echo $obj_diagnostico->getDsAvaliacao(); ?></p>
    		    <p>CID: <?php echo $obj_diagnostico->getCdCid(); ?></p>
    		    <p>Prescriçao: <?php echo $obj_diagnostico->getDsPrescricao(); ?></p>
    		    <p>Data: <?php echo $obj_diagnostico->getDtRegistro(); ?></p>
    		    <p>Hora: <?php echo $obj_diagnostico->getHrRegistro(); ?></p>
    		    <p>Situaçao: <?php echo $obj_diagnostico->getIcSituacao(); ?></p>
    		    <p>Profissional que Realizou o diagnóstico: <?php echo $obj_diagnostico->getCdUsuarioRegistro(); ?></p>

    		</fieldset>
		    <?php
		}
		?>
		<br/>
		<button type="button" onclick="javascript:history.back()">Voltar</button>
            </form>
        </div>

    </body>
</html>