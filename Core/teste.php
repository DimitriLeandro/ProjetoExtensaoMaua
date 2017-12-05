<?php
	require_once 'users/init.php';
	$db = DB::getInstance();
	if (!securePage($_SERVER['PHP_SELF'])){die();} 
?>

<?php
	//TESTE DE SELECT NA CLASSE DIAGNOSTICO
	require_once("php/model/diagnostico.Class.php");
	$obj_diagnostico = new Diagnostico();

	$obj_diagnostico -> selecionar_diagnostico('18');

	echo "<br/>".$obj_diagnostico -> get_cd_diagnostico();
	echo "<br/>".$obj_diagnostico -> get_cd_cnes();
	echo "<br/>".$obj_diagnostico -> get_ds_avaliacao();
	echo "<br/>".$obj_diagnostico -> get_cd_cid();
	echo "<br/>".$obj_diagnostico -> get_ds_prescricao();
	echo "<br/>".$obj_diagnostico -> get_dt_diagnostico();
	echo "<br/>".$obj_diagnostico -> get_hr_diagnostico();
	echo "<br/>".$obj_diagnostico -> get_ic_situacao();
	echo "<br/>".$obj_diagnostico -> get_cd_cns_profissional_diagnostico();
	echo "<br/>".$obj_diagnostico -> get_cd_triagem();


	/*TESTE DE CADASTRAR DIAGNOSTICO COM A CLASSE DE DIAGNOSTICO
	require_once("php/model/diagnostico.Class.php");
	$obj_diagnostico = new Diagnostico();

	$obj_diagnostico -> set_cd_cnes('6950043');
	$obj_diagnostico -> set_ds_avaliacao('Dores de cabeça devido a sinusite. Requiro Raio X da face para melhor avaliação.');
	$obj_diagnostico -> set_cd_cid('CID 10 - J01.1');
	$obj_diagnostico -> set_ds_prescricao('1 comprimido de Amoxicilina a cada 12h por 7 dias.');
	//DATA E HORA NÃO SÃO NECESSÁRIAS PQ A PROCEDURE FAZ O INSERT COM O COMANDO NOW() DO MYSQL
	//$obj_diagnostico -> set_dt_diagnostico();
	//$obj_diagnostico -> set_hr_diagnostico();
	$obj_diagnostico -> set_ic_situacao('Alta sem encaminhamento a UBS');
	$obj_diagnostico -> set_cd_cns_profissional_diagnostico('1');
	$obj_diagnostico -> set_cd_triagem('26');

	$ok = $obj_diagnostico -> cadastrar_diagnostico();
	echo $ok;

	unset($obj_diagnostico);
/*	
?>

<?php
	//teste de update de pacientes
	require_once('php/model/paciente.Class.php');
	$paciente = new Paciente();

	$paciente -> selecionar_paciente('14');

	$paciente -> set_cd_cns_paciente('158830076810004');
	$paciente -> set_ic_ubs_espera('0');
	$paciente -> set_nm_paciente('Alexandre Ottoni');
	$paciente -> set_nm_mae('Alessandra Ottoni');
	$paciente -> set_dt_nascimento('1978-10-01');
	$paciente -> set_ic_sexo('Masculino');
	$paciente -> set_nm_municipio_nascimento('Curitiba');

	$ok = $paciente -> atualizar_paciente();
	echo $ok."";

	unset($paciente);
?>

<?php /*
	//TESTE PARA CHAMAR A STORED PROCEDURE sp_insert_diagnostico
					require_once('php/model/conexao.Class.php');
					$conexao = new Conexao();
					$db_maua = $conexao -> conectar();

					$cd_cnes = "6950043";
					$ds_avaliacao = "Dor de dente muito forte devido a carie";
					$cd_cid = "CID 14 - J15.9";
					$ds_prescricao = "Encaminhamento ao dentista para obturação";
					$ic_situacao = "Alta sem encaminhamento a UBS";
					$cd_cns_profissional_diagnostico = "1";
					$cd_triagem = "13";

					if ($stmt = $db_maua->prepare("CALL sp_insert_diagnostico (?, ?, ?, ?, ?, ?, ?);"))
					{
						$stmt -> bind_param('issssii', $cd_cnes, $ds_avaliacao, $cd_cid, $ds_prescricao, $ic_situacao, $cd_cns_profissional_diagnostico, $cd_triagem);
						$stmt->execute();
						$stmt->bind_result($codigo_diagnostico);

						while ($stmt->fetch()) 
						{
							echo $codigo_diagnostico."";
						}
					}
?>

<?php
/*		$codigo_paciente = 32;
		if(isset($codigo_paciente) && $codigo_paciente > 0)
		{
?>
			<div id="div_etiqueta">
				<iframe id="pdf_etiqueta" name="pdf_etiqueta" src="php/gerar_etiqueta.php?cd_paciente=<?php echo $codigo_paciente; ?>"></iframe>
				<script>
					imprimir();
					window.location = "index.php";
				</script>
			</div>
<?php
		}
?>

<?php
	/*require_once('php/model/triagem.Class.php');
	require_once('php/model/paciente.Class.php');
	$triagem = new Triagem();
	$paciente = new Paciente();

	/*insert em triagem
	$triagem -> set_cd_paciente('8'); 
	$triagem -> set_cd_cnes('1234567'); 
	$triagem -> set_ds_queixa('Conjutivite'); 
	$triagem -> set_dt_triagem(date("Y-m-d")); 
	$triagem -> set_hr_triagem(date("H:i:s")); 
	$triagem -> set_vl_pressao_min('9.5'); 
	$triagem -> set_vl_pressao_max('12.12'); 
	$triagem -> set_vl_pulso('70'); 
	$triagem -> set_vl_temperatura('36.5'); 
	$triagem -> set_vl_respiracao('34'); 
	$triagem -> set_vl_saturacao('36'); 
	$triagem -> set_vl_glicemia('103'); 
	$triagem -> set_vl_nivel_consciencia('10'); 
	$triagem -> set_vl_escala_dor('5'); 
	$triagem -> set_ic_alergia('Não'); 
	$triagem -> set_ds_alergia('Sem alergia'); 
	$triagem -> set_ds_observacao('Sem observações'); 
	$triagem -> set_vl_classificacao_risco('1'); 
	$triagem -> set_ds_linha_cuidado('Diabético'); 
	$triagem -> set_ds_outras_condicoes('Sem outras condições'); 
	$triagem -> set_cd_cns_profissional_triagem('34234');
	//insertando
	$ok = $triagem -> cadastrar_triagem();
	echo $ok;*/

	/*selecionando a informação
	$triagem -> selecionar_triagem(2);
	$paciente -> selecionar_paciente($triagem -> get_cd_paciente());

	echo $paciente -> get_nm_paciente()."<br/>";
	echo $triagem -> get_ds_queixa()."<br/>";
	echo $triagem -> get_dt_triagem()."<br/>";
	echo $triagem -> get_hr_triagem()."<br/>";


	/*instanciando o objetoooo
	require_once('php/model/paciente.Class.php');
	$paciente = new Paciente();
	
	/*PROCEDIMENTO PARA CADASTRO DE PACIENTES
	//setando parametros
	$paciente -> set_cd_cns_paciente('234235');
	$paciente -> set_nm_justificativa('Febre');
	$paciente -> set_nm_paciente('Joao');
	$paciente -> set_nm_mae('Maria');
	$paciente -> set_ic_sexo('Masculino');
	$paciente -> set_ic_raca('Branco');
	$paciente -> set_dt_nascimento('1982-01-29');
	$paciente -> set_nm_pais_nascimento('Brasil');
	$paciente -> set_nm_municipio_nascimento('Sao Paulo');
	$paciente -> set_nm_pais_residencia('Brasil');
	$paciente -> set_nm_municipio_residencia('Santos');
	$paciente -> set_cd_cep('11320140');
	$paciente -> set_nm_logradouro('Rua A');
	$paciente -> set_nm_numero_residencia('55');
	$paciente -> set_nm_complemento('2A');
	$paciente -> set_nm_bairro('Gonzaga');
	$paciente -> set_cd_ubs_referencia('2574');
	$paciente -> set_nm_responsavel('Joao');
	$paciente -> set_cd_documento_responsavel('3814578293');
	$paciente -> set_nm_orgao_emissor('ssp');
	$paciente -> set_cd_cnes('1234567');
	$paciente -> set_dt_adesao(date("Y-m-d"));
	$paciente -> set_hr_adesao(date("H:i:s"));
	$paciente -> set_cd_profissional_registro('236745');
	//cadastrando 
	$ok = $paciente -> cadastrar_paciente();
	echo $ok;

	//SELECIONANDO A INFORMAÇÃO
	$paciente -> selecionar_paciente(8);
	echo $paciente -> get_nm_paciente().'<br/>';
	echo $paciente -> get_ic_sexo().'<br/>';
	echo $paciente -> get_nm_pais_residencia(); */

	//unset($triagem);
	//unset($paciente); 
?>
