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

<!DOCTYPE html>
<html lang="en">
    <head>
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/styleindex.css">
	<!-- google fonts  -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
    </head>
    <body>
	<?php require_once 'php/div_header.php'; ?>
	<div class="agile-login">
	    <div class="wrapper">
		<h2>Bem-Vindo ao Gerenciador SUS</h2>
		<div class="w3ls-form">
		    <form action="/" method="post">
			<a href="pesquisar_paciente.php"><button type="button">Pesquisar Paciente</button></a>
			<a href="cadastrar_paciente.php"><button type="button">Cadastrar Paciente</button></a>
			<a href="pesquisar_triagem.php"><button type="button">Visualizar Triagens</button></a>
			<a href="visualizar_espera.php"><button type="button">Lista de Espera</button></a>
		    </form>
		</div>
	    </div>
	    <div class="copyright">
		<p> Design by <a href="www.w3layouts.com">W3layouts</a></p> 
	    </div>
	</div>

    </body>
</html>


