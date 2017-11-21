<?php

require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/font-awesomelogin.css">
    <link rel="stylesheet" href="css/stylelogin.css">
</head>	
<body>
<div id="page-wrapper">
<div class="container">
<div class="row">
	<div >
		<div class="jumbotron">
			<h1>Bem vindo ao <?php echo $settings->site_name;?></h1>
			<p class="text-muted"> <?php //print_r($_SESSION);?></p>
			<p>
			<?php if($user->isLoggedIn()){$uid = $user->data()->id;?>
				<a class="btn btn-default" href="users/account.php" role="button">User Account &raquo;</a>
			<?php }else{?>
				<a class="btn btn-warning" href="users/login.php" role="button">Log In &raquo;</a>
				<a class="btn btn-info" href="users/join.php" role="button">Sign Up &raquo;</a>
			<?php } ?>
			</p>
		</div>
	</div>
</div>



		</div>
	</div><!-- /panel -->
</div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading"><strong><a href="cadastrar_paciente.php">Cadastro</a> </strong></div>
		<div class="panel-body">Para realizar o cadastro de novos pacientes
		</div>
	</div><!-- /panel -->
</div><!-- /.col -->

<div class="row">
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading"><strong><a href="pesquisar_paciente.php">Fazer Consulta</a></strong></div>
		<div class="panel-body">Para realizar consultas de pacientes.
		</div>
	</div><!-- /panel -->
</div><!-- /.col -->



</div> <!-- /container -->

</div> <!-- /#page-wrapper -->
</body>
<!-- footers -->

 <?php 
 /*<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?> */
?>
