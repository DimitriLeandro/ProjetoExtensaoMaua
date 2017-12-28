<?php
//VERIFICANDO SE O PARAMETRO GET FOI SETADO
if (isset($_GET['cd_paciente']) && $_GET['cd_paciente'] != '') {
    require_once('classes/paciente.Class.php');
    $paciente = new Paciente();
    //verificando se o valor existe no banco
    $paciente->selecionar($_GET['cd_paciente']);

    if ($paciente->getCdPaciente() == '' || $paciente->getCdPaciente() == 0) {
        unset($paciente);
        header("location: ../");
    } else {
        //Se uma etiqueta está sendo impressa, então algum paciente está esperando pela triagem,
        //Então é necessário fazer update no campo ic_ubs_espera colocando o id da UBS em que o paciente está
        $paciente->setIcUbsEspera("4");
        $paciente->atualizar($_GET['cd_paciente']);
    }
} else {
    unset($paciente);
    header("location: ../");
}
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
                <p><?php echo 'Nome: ' . $paciente->getNmPaciente(); ?></p>
                <p><?php echo 'Data de Nascimento: ' . date_format(date_create($paciente->getDtNascimento()), "d/m/Y"); ?></p>
                <p><?php echo 'Check-in: ' . date("d/m/Y H:i:s"); ?></p>
            </fieldset>
        </div>
    </body>
</html>