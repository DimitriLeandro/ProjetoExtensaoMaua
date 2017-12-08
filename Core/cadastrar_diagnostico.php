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
	//essa pagina precisa do codigo da triagem no metodo GET para fazer o insert na chave estrangeira do banco, aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente existe como uma triagem. Caso contrario, o usuario volta pra pagina inicial
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
	}
	else
	{
		unset($triagem);
		header("location: index.php");
	}
?>

<?php
	if(isset($_POST['btn_cadastrar_diagnostico']))
	{
		//o codigo da triagem será adquirido pelo método get. É necessário verificar se algum valor foi setado
		if(isset($_GET['cd_triagem']) && $_GET['cd_triagem'] != '')
		{
			echo "<br/>Tamo ai<br/>";
		}
		else
		{
			?> <script> alert("Código da triagem não encontrado"); </script> <?php
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

	<title>Registro do Dignóstico</title>
	<meta charset="utf-8" />
	<link href="css/formulario2.css" rel="stylesheet">
</head>
<body>
	<form method="post" action="" class="form-style">
		<h1>NOVO DÍAGNÓSITICO</h1>
		<fieldset>
			
		</fieldset>
		<input type="submit" name="btn_cadastrar_diagnostico" value="Enviar" />
	</form>
</body>
</html>