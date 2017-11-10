<?php
	require_once('model/paciente.Class.php');
    $paciente = new Paciente();
    //obtendo os dados do paciente
    $paciente -> selecionar_paciente($_GET['cd_paciente']);
?>
<html>
<body>
	<div id="div_pdf" style="font-size: 250%;">
		<p><?php echo $paciente ->  get_nm_paciente(); ?></p>
		<p><?php echo $paciente ->  get_dt_nascimento(); ?></p>
		<p><?php echo date("Y-m-d").' '.date("H:i:s"); ?></p>
	</div>
</body>
</html>