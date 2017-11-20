<?php
	//vendo se alguma data espec´ifica foi setada no GET, caso n~ao, mostrar as triagens do dia atual
	$data_triagem = date("Y-m-d");
	if(isset($_GET['dt_triagem']))
	{
		//verificando se a data ´e v´alida, caso n~ao seja, mostra o dia de hoje
		//yyyy-mm-dd

		$data_setada = explode('-',$_GET['dt_triagem']);

		/*$dia_triagem = $data_setada[2];
		$mes_triagem = $data_setada[1];
		$ano_triagem = $data_setada[0];*/
		
		if(count($data_setada) == 3 && $data_setada[0] != "" && $data_setada[1] != "" && $data_setada[2] != "")
		{
			//checkdate( int $month , int $day , int $year )
			if(checkdate($data_setada[1], $data_setada[2], $data_setada[0]) === true) 
			{
				$data_triagem = $_GET['dt_triagem'];
			}
		}
	}
?>

<div class="form-style">
	<h1>Triagens do Dia <?php echo date_format(new DateTime($data_triagem), "d/m/Y"); ?></h1>
	<fieldset>
		<p>
			<label for="nascp" style="width: 20%"class="margem">Escolher outra data:</label>
			<input type="text" style="width: 30%" maxlength="10" name="dt_triagem" id="dt_triagem" />
			<button type="button" id="btn_buscar">Buscar</button>
		</p>
	</fieldset>
	<br/>

	<?php
		require_once('model/conexao.Class.php');
		$conexao = new Conexao();
		$db_maua = $conexao -> conectar();

		if ($stmt = $db_maua->prepare('SELECT cd_triagem FROM tb_triagem WHERE dt_triagem = ?;'))
		{
			$stmt -> bind_param('s', $data_triagem);
			$stmt->execute();
			$stmt->bind_result($codigo_triagem);

			require_once('model/triagem.Class.php');
			$triagem = new Triagem();

			while ($stmt->fetch()) 
			{
				$triagem -> selecionar_triagem($codigo_triagem);
				$redirect_ver_mais = 'visualizar_triagem.php?cd_triagem='.$triagem -> get_cd_triagem();
				
				//Pegando os dados do usuario da triagem para mostrar o nome etc
				require_once('model/paciente.Class.php');
				$paciente = new Paciente();
				$paciente -> selecionar_paciente($triagem -> get_cd_paciente());
			?>
				<fieldset style="border: solid 1px; padding: 15px;">
					<p><label>Paciente: <?php echo $paciente -> get_nm_paciente() ?> </label><p/>
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
</div>
<script>
	function mascarar_data()
	{
		if($("#dt_triagem").val().length == 2 || $("#dt_triagem").val().length == 5)
		{
			$("#dt_triagem").val("" + $("#dt_triagem").val() + '/'); 
		}
	}

	$("#dt_triagem").keypress(function(e){
		if(e.which == 13) 
		{
			$("#btn_buscar").click();
		}
		mascarar_data();
	});

	$("#btn_buscar").on("click", function(){
		var dd = $("#dt_triagem").val().substring(0,2);
		var mm = $("#dt_triagem").val().substring(3,5);
		var aaaa = $("#dt_triagem").val().substring(6,10);

		//alert(dd+"\n"+mm+"\n"+aaaa);
		window.location = "pesquisar_triagem.php?dt_triagem="+aaaa+"-"+mm+"-"+dd+"";
	});
</script>