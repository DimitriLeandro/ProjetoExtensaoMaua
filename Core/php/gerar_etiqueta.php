<?php
	require_once('model/paciente.Class.php');
    $paciente = new Paciente();

	//VERIFICANDO SE O PARAMETRO GET FOI SETADO
	if(isset($_GET['cd_paciente']) && $_GET['cd_paciente'] != '')
    {
        //verificando se o valor existe no banco
        

        $paciente -> selecionar_paciente($_GET['cd_paciente']);

        if($paciente -> get_cd_paciente() == '' || $paciente -> get_cd_paciente() == 0)
        {
            unset($paciente);
            header("location: ../");
        }
    }
    else
    {
        unset($paciente);
        header("location: ../");
    }

    //obtendo os dados do paciente
    $paciente -> selecionar_paciente($_GET['cd_paciente']);
?>
<html>
<head>
	<style>
		fieldset.field_a {
			margin: solid 1px;
			display: inline-block;
		}
	</style>
</head>
<body>
	<div id="div_pdf" style="font-size: 130%;">
		<fieldset class="field_a">
			<p><?php echo 'Nome: '.$paciente ->  get_nm_paciente(); ?></p>
			<p><?php echo 'Data de Nascimento: '.date_format(date_create($paciente ->  get_dt_nascimento()),"d/m/Y"); ?></p>
			<p><?php echo 'Check-in: '.date("d/m/Y H:i:s"); ?></p>
		</fieldset>
	</div>
</body>
</html>