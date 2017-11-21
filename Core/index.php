<?php

require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
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
	<div class="agile-login">
		
		<div class="wrapper">
			<h2>Bem-Vindo ao Gerenciador SUS</h2>
			<div class="w3ls-form">
				<form action="/" method="post">
					
					<p class="text-muted"> <?php //print_r($_SESSION);?></p>
					<p>
						<?php if($user->isLoggedIn()){$uid = $user->data()->id;?>
						<a href="pesquisar_paciente.php"><button type="button">Pesquisar paciente</button><a/>
						<a href="cadastrar_paciente.php"><button type="button">Cadastro</button><a/>

						<?php }else{?>
					<a href="users/login.php"><button type="button">Log In</button><a/>
					<a href="users/join.php"><button type="button">Sing Up</button><a/>
						<?php } ?>
				

					
					
				</form>
			</div>
			
			
		</div>
		<br>
		<div class="copyright">
		<p> Design by <a href="www.w3layouts.com">W3layouts</a></p> 
	</div>
	</div>
	
</body>
</html>
<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
