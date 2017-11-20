<?php 
	if(isset($_GET['cd_paciente']) && $_GET['cd_paciente'] != '')
	{
		//Validando novamente o c´odigo do paciente caso o usuario tente entrar nessa p´agina sem ser pela pesquisar_triagem.php
		
		require_once('model/paciente.Class.php');
		$paciente = new Paciente();

		$paciente -> selecionar_paciente($_GET['cd_paciente']);

		if($paciente -> get_cd_paciente() == '' || $paciente -> get_cd_paciente() == 0)
		{
			header("Location: ../");
		}
		else
		{
		?>
			<form class="form-style">
				<h1>Triagens de <?php echo $paciente -> get_nm_paciente(); ?></h1>
				<?php
					require_once('model/conexao.Class.php');
					$conexao = new Conexao();
					$db_maua = $conexao -> conectar();

					if ($stmt = $db_maua->prepare('SELECT cd_triagem FROM tb_triagem WHERE cd_paciente = ?;'))
					{
						$stmt -> bind_param('i', $_GET['cd_paciente']);
						$stmt->execute();
						$stmt->bind_result($codigo_triagem);

						require_once('model/triagem.Class.php');
						$triagem = new Triagem();

						while ($stmt->fetch()) 
						{
							$triagem -> selecionar_triagem($codigo_triagem);
							$redirect_ver_mais = 'visualizar_triagem.php?cd_triagem='.$triagem -> get_cd_triagem();
						?>
							<fieldset style="border: solid 1px; padding: 15px;">
								<p><label>Queixa: <?php echo $triagem -> get_ds_queixa() ?> </label><p/>
								<p><label>Data: <?php echo $triagem -> get_dt_triagem() ?> </label><p/>
								<p><label>Hora: <?php echo $triagem -> get_hr_triagem() ?></label><p/>
								<p><button type="button" class="botao" onclick="window.location.href = '<?php echo $redirect_ver_mais; ?>';">Ver Mais</button></p>
							</fieldset>
							<br/>
						<?php
						}
					}
				?> 
			</form>
		<?php
		}
	}
	else
	{
		header("Location: ../");
	}
?>
<!-- <fieldset>
<label for="idestab" class="margem3" >Identificação do SUS</label>
<input type="text" name="cd_cnes" id="idstab"  /><br />
<label for="profregist" class="margem3">Identificação do cadastrante </label>
<input type="number" name="cd_profissional_registro" id="profregist"  /><br />
</fieldset><br />  -->