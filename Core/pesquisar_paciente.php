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

<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="users/js/jquery.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<title>Pesquisar Paciente</title>
	<meta charset="utf-8" />
	<link href="css/formulario.css" rel="stylesheet">
	<script>
		function imprimir(id_paciente)
		{
			$("#div_frames").show();

			var id_frame = "frame_etiqueta_"+id_paciente;
			var source = "php/gerar_etiqueta.php?cd_paciente="+id_paciente;

			$("#div_frames").append("<iframe id="+id_frame+" name="+id_frame+" src="+source+"></iframe>");
			
			window.frames[id_frame].focus();
			window.frames[id_frame].print();
			
			$("#div_frames").hide();
		}
	</script>
</head>
<body>
	<form method="post" class="form-style">
		<h1>PESQUISAR PACIENTE</h1>
		<fieldset>
			<label for="ncns" class="margem">Número CNS</label>
			<input type="number" name="cd_cns_paciente" id="cd_cns_paciente" /><br />
			
			<label for="nomep" class="margem">Nome</label>
			<input type="text" name="nm_paciente" id="nm_paciente" /><br />
		</fieldset><br />
		<p>
			<button type="button" class="botao" id="btn_pesquisar">Pesquisar</button>
			<button type="button" class="botao" id="btn_cadastrar">Cadastrar Novo Paciente</button>
		</p>
		<br />
		<div id="div_resultados">
		</div>
	</form>
  	<div id="div_frames">
  	</div>
	<script>
		//funçao para completar o nome do paciente automaticamente
		//exemplo usado desse link: https://www.devmedia.com.br/jquery-autocomplete-dica/28697
		//primeiro ´e necess´ario buscar todos os nomes no banco
		<?php
			require_once('php/model/conexao.Class.php');
			$conexao = new Conexao();
			$db_maua = $conexao -> conectar();

			$select = "SELECT nm_paciente FROM tb_paciente WHERE cd_paciente > ? ORDER BY nm_paciente;";
			if ($stmt = $db_maua->prepare($select))
			{
				$zero = 0; 
				$stmt -> bind_param('i', $zero);
				$stmt->execute();
				$stmt->bind_result($nome_paciente);
			}
		?>

		//agora sim a funç~ao propriamente dita
		$("#nm_paciente").autocomplete({
			source: [
				<?php
					while($stmt->fetch()) 
					{
						echo '"'.$nome_paciente.'",';
					}
				?>
			],
			select: function(event, ui) {
				if(ui.item)
				{
					$('#nm_paciente').val(ui.item.value);
				}
				$("#btn_pesquisar").click();
			}
		});
	</script>
	<script>
			//funçao de pesquisar
			$("#btn_pesquisar").on("click", function(){
				var txt_nome = $("#nm_paciente").val().replace(/\ /g, '_');
				var txt_cns = $("#cd_cns_paciente").val();
				var redirect = "php/div_pesquisar_paciente.php?nm_paciente="+txt_nome+"&cd_cns_paciente="+txt_cns;
				$("#div_resultados").load(redirect+"");

				//aquele replace ali em cima serve pra tirar os espaços que estiverem no nome, substituindo-os por underline
				//o mysql n~ao vai diferenciar espaço de underline na hora de fazer o SELECT com LIKE
			});

			$("#btn_cadastrar").on("click", function(){
				window.location = "cadastrar_paciente.php";
			});

			$("#nm_paciente").keypress(function(e){
				if(e.which == 13) 
				{
					$("#btn_pesquisar").click();
				}
				$("#cd_cns_paciente").val("");
			});

			$("#cd_cns_paciente").keypress(function(e){
				if(e.which == 13) 
				{
					$("#btn_pesquisar").click();
				}
				$("#nm_paciente").val("");
			});

	</script>
</body>
</html>