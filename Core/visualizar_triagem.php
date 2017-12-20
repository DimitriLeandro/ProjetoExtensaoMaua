<?php

if(file_exists("install/index.php")){
	//perform redirect if installer files exist
	//this if{} block may be deleted once installed
	header("Location: install/index.php");
}

require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>


<?php
	require_once 'users/init.php';
	$db = DB::getInstance();
	if (!securePage($_SERVER['PHP_SELF'])){die();} 
?>
<?php
		//essa pagina precisa do codigo da triagem no metodo GET para conseguir os dados dessa triagem no banco. Aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente ´e uma triagem existente no banco. Caso contrario, o usuario volta para o index

		if(isset($_GET['cd_triagem']) && $_GET['cd_triagem'] != '')
		{
				//verificando se o valor existe no banco
				require_once('php/model/triagem.Class.php');
				$triagem = new Triagem();

				$triagem -> selecionar_triagem($_GET['cd_triagem']);

				if($triagem -> get_cd_triagem() == '' || $triagem -> get_cd_triagem() == 0)
				{
					unset($triagem);
					header("location: index.php");
				}
				else
				{
					//pegando os dados do paciente só pra exibir o nome pelo menos
					require_once('php/model/paciente.Class.php');
					$paciente = new Paciente();

					$paciente -> selecionar_paciente($triagem -> get_cd_paciente());
				}
		}
		else
		{
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

	<div>

		<form method="post" class="form-style">
				<h1><?php echo $paciente -> get_nm_paciente(); ?></h1>
				<h4>Dados da Triagem</h4>
				<fieldset style="border: solid 1px; padding: 15px;">
					 <p>
						<?php if($triagem -> get_ic_finalizada() == 1)
									{
										echo "Um diagnóstico para essa triagem já foi realizado.";
									}
									else
									{
										echo "Essa triagem ainda não foi finalizada. É necesário que um médico realize diagnóstico específico.";
									}
						?> 
					</p>
					<p>UBS: <?php echo $triagem -> get_cd_cnes(); ?> </p>
					<p>Queixa: <?php echo $triagem -> get_ds_queixa(); ?> </p>
					<p>Data: <?php echo $triagem -> get_dt_triagem(); ?> </p>
					<p>Hora: <?php echo $triagem -> get_hr_triagem(); ?> </p>
					<p>Pressão Mínima: <?php echo $triagem -> get_vl_pressao_min(); ?> </p>
					<p>Pressão Máxima: <?php echo $triagem -> get_vl_pressao_max(); ?> </p>
					<p>Pulso: <?php echo $triagem -> get_vl_pulso(); ?> </p>
					<p>Temperatura: <?php echo $triagem -> get_vl_temperatura(); ?> </p>
					<p>Respiração: <?php echo $triagem -> get_vl_respiracao(); ?> </p>
					<p>Saturação: <?php echo $triagem -> get_vl_saturacao(); ?> </p>
					<p>Glicemia: <?php echo $triagem -> get_vl_glicemia(); ?> </p>
					<p>Nível de Consciência: <?php echo $triagem -> get_vl_nivel_consciencia(); ?> </p>
					<p>Escala de Dor: <?php echo $triagem -> get_vl_escala_dor(); ?> </p>
					<p>Alergia a Medicamentos: <?php echo $triagem -> get_ic_alergia(); ?> </p>
					<p>Descrição das Alergias: <?php echo $triagem -> get_ds_alergia(); ?> </p>
					<p>Observações: <?php echo $triagem -> get_ds_observacao(); ?> </p>
					<p>Classificação de Risco: <?php echo $triagem -> get_vl_classificacao_risco(); ?> </p>
					<p>Linha de Cuidado: <?php echo $triagem -> get_ds_linha_cuidado(); ?> </p>
					<p>Outras condições: <?php echo $triagem -> get_ds_outras_condicoes(); ?> </p>
					<p>CNS do Profissional que Realizou a Triagem: <?php echo $triagem -> get_cd_cns_profissional_triagem(); ?> </p>
				</fieldset>
				<br/>
<?php
				//VERIFICANDO SE H´A ALGUM DIAGNOSTICO PRA ESSA TRIAGEM
				//SE N~AO TIVER, MOSTRA O BOT~AO PRA FAZER O DIAGNOSTICO
				//SE TIVER, MOSTRA OS DADOS DO DIAGNOSTICO
				if($triagem -> get_ic_finalizada() == 0)
				{
?>
					<button type="button" onclick="window.location = 'cadastrar_diagnostico.php?cd_triagem=<?php echo $triagem -> get_cd_triagem(); ?>';">Diagnóstico</button>
<?php
				}
				else
				{
					//instanciando um objeto da classe Dignostico para pegar as informaç~oes sobre o diagnostico dessa triagem
					require_once("php/model/diagnostico.Class.php");
					$obj_diagnostico = new Diagnostico();

					//inciando uma conex~ao com o banco
					require_once("php/model/conexao.Class.php");
					$conexao = new Conexao();
					$db_maua = $conexao -> conectar();

					//pegando o id do diagnostico dessa triagem
					if($stmt = $db_maua -> prepare("SELECT cd_diagnostico FROM tb_diagnostico WHERE cd_triagem = ?"))
					{
						$stmt -> bind_param("i", $_GET['cd_triagem']);
						$stmt -> execute();
						$stmt -> bind_result($codigo_diagnostico);
						while($stmt -> fetch())
						{
							$obj_diagnostico -> selecionar_diagnostico($codigo_diagnostico);
						}
						$stmt -> close();
					}

?>
					<h4>Dados do Diagnóstico</h4>
					<fieldset style="border: solid 1px; padding: 15px;">
						<p>UBS: <?php echo $obj_diagnostico -> get_cd_cnes(); ?></p>
						<p>Avaliaçao: <?php echo $obj_diagnostico -> get_ds_avaliacao(); ?></p>
						<p>CID: <?php echo $obj_diagnostico -> get_cd_cid(); ?></p>
						<p>Prescriçao: <?php echo $obj_diagnostico -> get_ds_prescricao(); ?></p>
						<p>Data: <?php echo $obj_diagnostico -> get_dt_diagnostico(); ?></p>
						<p>Hora: <?php echo $obj_diagnostico -> get_hr_diagnostico(); ?></p>
						<p>Situaçao: <?php echo $obj_diagnostico -> get_ic_situacao(); ?></p>
						<p>CNS do Profissional que Realizou o diagnostico: <?php echo $obj_diagnostico -> get_cd_cns_profissional_diagnostico(); ?></p>
					</fieldset>
<?php
				}
?>
		</form>
	</div>
</body>
</html>