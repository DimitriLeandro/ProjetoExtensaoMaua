<?php
require_once 'classes/etiqueta.Class.php';
require_once 'classes/paciente.Class.php';

//VERIFICANDO SE O PARAMETRO GET FOI SETADO
if (isset($_GET['cd_paciente']) && $_GET['cd_paciente'] != '') {
    //verificando se o valor existe no banco
    $paciente = new Paciente();
    $paciente->selecionar($_GET['cd_paciente']);
    if ($paciente->getCdPaciente() == '' || $paciente->getCdPaciente() == 0) {
        unset($paciente);
        header("location: ../");
    } else {
        //SE CHEGOU AQUI ENTÃO TÁ TUDO CERTO
        //JÁ TEMOS UM OBJETO DA CLASSE PACIENTE QUE LÁ EM BAIXO VAI SERVIR PARA PEGAR O NOME, DATA DE NASCIMENTO ETC...
        //AGORA SERÁ INSTANCIADO UM OBJETO DO TIPO ETIQUETA
        $etiqueta = new Etiqueta($_GET['cd_paciente']);
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
<?php
    //destruindo os objetos
    unset($paciente);
    unset($etiqueta);
?>