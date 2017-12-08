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
  	<title>Lista de Espera</title>
  	<meta charset="utf-8" />
  	<link href="css/formulario.css" rel="stylesheet">
</head>
<body>
<form class="form-style">
	<h1>LISTA DE ESPERA</h1><br/>
	<div id="div_lista_espera">
	</div>
</form>
<script>
	//FUNÇÃO QUE FICA RESPONSÁVEL POR RECARREGAR A LISTA A CADA 5 SEGUNDOS
	$(document).ready(function(){
		recarregar_lista();
		setInterval(function(){recarregar_lista()}, 5000);
    });

    function recarregar_lista()
    {
    	$("#div_lista_espera").load("php/div_lista_espera.php");
    }
</script>
</body>
</html>