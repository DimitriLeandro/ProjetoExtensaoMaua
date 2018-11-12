<script>
	//pra ver o tempo que demora pra carregar a página
	var date1 = new Date();
	var miliseconds1 = date1.getTime();
	console.log(miliseconds1);  
</script>
<?php
if (file_exists("install/index.php")) {
	//perform redirect if installer files exist
	//this if{} block may be deleted once installed
	header("Location: install/index.php");
}

require_once 'users/init.php';
require_once $abs_us_root . $us_url_root . 'users/includes/header.php';

$db = DB::getInstance();
if (!securePage($_SERVER['PHP_SELF'])) {
	die();
}
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
		<style>            
            /* Esse style aqui serve pra fazer o scroll do auto-complete
               Código aqui: https://stackoverflow.com/questions/9590313/how-to-use-the-scroll-and-max-options-in-autocomplete
             */
            .ui-autocomplete {
                max-height: 200px;
                overflow-y: auto;
                overflow-x: hidden;
                padding-right: 20px;
            } 
        </style>
	</head>
	<body>
	<?php require_once 'php/div_header.php'; ?>
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
				<button type="button" class="botao" id="btn_lista_espera">Lista de Espera</button>
		<?php
		require_once 'php/classes/usuario.Class.php';
		$obj_usuario = new Usuario();
		if ($obj_usuario->getPermission() != "Recepcionista") { ?>
			<button type = "button" onclick = "javascript:history.back()">Voltar</button>
		<?php } ?>		
		</p>
		<br />
		<div id = "div_resultados">
		</div>
	</form>
	<div id = "div_frames">
	</div>
	<script>
		//funçao para completar o nome do paciente automaticamente
		//exemplo usado desse link: https://www.devmedia.com.br/jquery-autocomplete-dica/28697
		//primeiro ´e necess´ario buscar todos os nomes no banco
		<?php
			require_once('php/classes/paciente.Class.php');
			$obj_paciente = new Paciente();
			$array_nomes = $obj_paciente->getAllNames();
		?>
			
		var source = [
			<?php
				foreach ($array_nomes as $key => $value) {
					echo '"' . $value . '",';
				}
			?>
		];


		$("#nm_paciente").autocomplete({
			source: function (request, response) {
				var results = $.ui.autocomplete.filter(source, request.term);
				response(results.slice(0, 25));
			},
			select: function (event, ui) {
				if (ui.item)
				{
					$('#nm_paciente').val(ui.item.value);
				}
				$("#btn_pesquisar").click();
			}
		});

		// Tem que deixar isso aqui pra ele pegar "A%" e não "%A%"
		$.ui.autocomplete.filter = function (array, term) {
			var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
			return $.grep(array, function (value) {
				return matcher.test(value.label || value.value || value);
			});
		};
	</script>
	<script>
			//funçao de pesquisar
			$("#btn_pesquisar").on("click", function () {
				var txt_nome = $("#nm_paciente").val().replace(/\ /g, '_');
				var txt_cns = $("#cd_cns_paciente").val();
				var redirect = "php/div_pesquisar_paciente.php?nm_paciente=" + txt_nome + "&cd_cns_paciente=" + txt_cns;
				$("#div_resultados").load(redirect + "", function () {
					//depois de carregar a lista de pacientes, é feita uma verificação para saber quantos nomes corresponderam à pesquisa
					//os fieldsets com as informações de cada paciente tem o id "field_paciente". Com o length do jquery é possível saber quantos pacientes apareceram.
					//Se não apareceu nenhum paciente, então, o site redireciona para o cadastro do paciente com o nome já preenchido no método get do php
					if ($("#field_paciente").length == 0) {
						if ($("#nm_paciente").val().length > 0) {
							window.location.href = "cadastrar_paciente.php?nome=" + $("#nm_paciente").val().replace(/ /g, "_");
						}
					}
				});

				//aquele replace ali em cima serve pra tirar os espaços que estiverem no nome, substituindo-os por underline
				//o mysql n~ao vai diferenciar espaço de underline na hora de fazer o SELECT com LIKE
			});

			$("#btn_cadastrar").on("click", function () {
				window.location = "cadastrar_paciente.php";
			});

			$("#btn_lista_espera").on("click", function () {
				window.location = "visualizar_espera.php";
			});

			$("#nm_paciente").keypress(function (e) {
				if (e.which == 13)
				{
					$("#btn_pesquisar").click();
				}
				$("#cd_cns_paciente").val("");
			});

			$("#cd_cns_paciente").keypress(function (e) {
				if (e.which == 13)
				{
					$("#btn_pesquisar").click();
				}
				$("#nm_paciente").val("");
			});

	</script>
	<script>
		$(document).ready(function () {
			//pra ver o tempo que demora pra carregar a página
			var date2 = new Date();
			var miliseconds2 = date2.getTime();
			console.log(miliseconds2); 
		});
	</script>        
	</body>
</html>