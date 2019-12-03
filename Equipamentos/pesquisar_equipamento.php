
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
		<form method="post" class="form-style">
			<h1>PESQUISAR EQUIPAMENTO</h1>
			<fieldset>
				<label for="tipo" class="margem">Descrição que representa o equipamento</label>
				<input type="text" name="ds_equipamento" id="ds_equipamento" /><br />
				
				<label for="nump"class="margem">Número do patrimônio</label>
                <input type="text" name="cd_patrimonio" id="cd_patrimonio" /><br />
					
			</fieldset><br />
			<p>
				<button type="button" class="botao" id="btn_pesquisar">Pesquisar</button>
				<button type="button" class="botao" id="btn_cadastrar">Cadastrar Novo Equipamento</button>

			<button type = "button" onclick = "javascript:history.back()">Voltar</button>		
		</p>
		<br />
		<div id = "div_resultados">
		</div>
	</form>
	<div id = "div_frames">
	</div>
	<script>
		//funçao para completar o nome do equipamento automaticamente
		//exemplo usado desse link: https://www.devmedia.com.br/jquery-autocomplete-dica/28697
		//primeiro ´e necess´ario buscar todos os nomes no banco
		<?php
			require_once('php/classes/equipamento.Class.php');
			$obj_equipamento = new Equipamento();
			$array_patrimonio = $obj_equipamento->getAllPatrimonios();
		?>
			
		var source = [
			<?php
				foreach ($array_patrimonio as $key => $value) {
					echo '"' . $value . '",';
				}
			?>
		];


		$("#cd_patrimonio").autocomplete({
			source: function (request, response) {
				var results = $.ui.autocomplete.filter(source, request.term);
				response(results.slice(0, 25));
			},
			select: function (event, ui) {
				if (ui.item)
				{
					$('#cd_patrimonio').val(ui.item.value);
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
				var txt_patrimonio = $("#cd_patrimonio").val().replace(/ /g, "_");
				var txt_descricao = $("#ds_equipamento").val();
				var redirect = "php/div_pesquisar_equipamento.php?cd_patrimonio=" + txt_patrimonio+ "&ds_equipamento=" + txt_descricao + "&btn=1";
				// alert("txt_patrimonio = " + txt_patrimonio + "\nredirect = " + redirect);
				$("#div_resultados").load(redirect + "", function () {
					//depois de carregar a lista de equipamento, é feita uma verificação para saber quantos nomes corresponderam à pesquisa
					//os fieldsets com as informações de cada equipamento tem o id "field_paciente". Com o length do jquery é possível saber quantos equipamentos apareceram.
					//Se não apareceu nenhum equipamento, então, o site redireciona para o cadastro do equipamento
					
					
					if ($("#field_equipamento").length == 0) {
						if ($("#cd_patrimonio").val().length > 0) {
							window.location.href = "cadastrar_equipamento.php?patrimonio=" + $("#cd_patrimonio").val().replace(/ /g, "_");
						}
					}
				});

				//aquele replace ali em cima serve pra tirar os espaços que estiverem no nome, substituindo-os por underline
				//o mysql n~ao vai diferenciar espaço de underline na hora de fazer o SELECT com LIKE
			});
	
			$("#btn_cadastrar").on("click", function () {
				window.location = "cadastrar_equipamento.php";
			});

			$("#cd_patrimonio").keypress(function (e) {
				if (e.which == 13)
				{
					$("#btn_pesquisar").click();
				}
				$("#ds_equipamento").val("");
			});

			$("#ds_equipamento").keypress(function (e) {
				if (e.which == 13)
				{
					$("#btn_pesquisar").click();
				}
				$("#cd_patrimonio").val("");
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