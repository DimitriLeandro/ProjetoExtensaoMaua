<?php
		//fazendo a conexao com o banco e com a classe Paciente
		require_once('model/conexao.Class.php');
		require_once('model/paciente.Class.php');
		$paciente = new Paciente();
		$conexao = new Conexao();
		$db_maua = $conexao -> conectar();

		$codigo_ubs = "6950043";
		$txt_select = "SELECT cd_paciente FROM vw_espera WHERE ic_ubs_espera = ?;";

		if ($stmt = $db_maua->prepare($txt_select)) 
		{
			$stmt -> bind_param('i', $codigo_ubs);
		    $stmt -> execute();
		    $stmt -> bind_result($codigo_paciente);
		    while ($stmt->fetch()) 
		    {
		    	$paciente -> selecionar_paciente($codigo_paciente);
				$redirect_nova_triagem = "cadastrar_triagem.php?cd_paciente=".$codigo_paciente;
?>
		    		<fieldset style="border: solid 1px; padding: 15px;">
						<p>
							<label class="margem">Nome: <?php echo $paciente -> get_nm_paciente(); ?></label>
							<label class="margem">CNS: <?php echo $paciente -> get_cd_cns_paciente(); ?></label>
							<label class="margem">Data de Nascimento: <?php echo $paciente -> get_dt_nascimento(); ?></label>
						</p>
						<p align="right">
							<button type="button" class="botao" onclick="window.location.href = '<?php echo $redirect_nova_triagem; ?>';">Nova Triagem</button>
						</p>
					</fieldset><br />
<?php
		    }

		    $stmt->close();
		}

		$db_maua->close();
		unset($conexão);
		unset($paciente);
?>