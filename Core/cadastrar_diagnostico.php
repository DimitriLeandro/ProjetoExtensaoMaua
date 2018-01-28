<?php
if (file_exists("install/index.php")) {
    //perform redirect if installer files exist
    //this if{} block may be deleted once installed
    header("Location: install/index.php");
}
require_once 'users/init.php';
require_once $abs_us_root . $us_url_root . 'users/includes/header.php';
require_once $abs_us_root . $us_url_root . 'users/includes/navigation.php';
$db = DB::getInstance();
if (!securePage($_SERVER['PHP_SELF'])) {
    die();
}
?>

<?php
//essa pagina precisa do codigo da triagem no metodo GET para fazer o insert na chave estrangeira do banco, aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente existe como uma triagem. Caso contrario, o usuario volta pra pagina inicial
if (isset($_GET['cd_triagem']) && $_GET['cd_triagem'] != '') {
    //verificando se o valor existe no banco
    require_once('php/classes/triagem.Class.php');
    $triagem = new Triagem();
    $triagem->selecionar($_GET['cd_triagem']);
    if ($triagem->getCdTriagem() == '' || $triagem->getCdTriagem() == 0) {
        unset($triagem);
        header("location: index.php");
    }
} else {
    unset($triagem);
    header("location: index.php");
}
?>

<?php
if (isset($_POST['btn_cadastrar_diagnostico'])) {
    //o codigo da triagem será adquirido pelo método get. É necessário verificar se algum valor foi setado
    if (isset($_GET['cd_triagem']) && $_GET['cd_triagem'] != '') {
        require_once("php/classes/diagnostico.Class.php");
        $diagnostico = new Diagnostico();

        $diagnostico->setDsAvaliacao($_POST['ds_avaliacao']);
        $diagnostico->setCdCid($_POST['cd_cid']);
        $diagnostico->setDsPrescricao($_POST['ds_prescricao']);
        $diagnostico->setIcSituacao($_POST['ic_situacao']);
        $diagnostico->setCdTriagem($_GET['cd_triagem']);

        $ok = $diagnostico->cadastrar();
        //echo "<br/>".$ok."<br/>";

        if ($ok == 0) {
            ?> <script> alert('Erro ao cadastrar diagnóstico');</script> <?php
        } else {
            header('location: pesquisar_triagem.php');
        }

        unset($obj_diagnostico);
    } else {
        ?> <script> alert("Código da triagem não encontrado");</script> <?php
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
            <h1>NOVO DIAGNÓSITICO</h1>
            <fieldset>
                <label>Avaliação</label>
                <textarea id="ds_avaliacao" name="ds_avaliacao"></textarea>

                <label>CID</label>
                <input type="text" id="cd_cid" name="cd_cid" />

                <label>Prescricão</label>
                <textarea id="ds_prescricao" name="ds_prescricao"></textarea>

                <label>Situação</label>
                <select id="ic_situacao" name="ic_situacao">
                    <option value="Alta sem encaminhamento a UBS" selected>Alta sem encaminhamento a UBS</option>
                    <option value="Alta com encaminhamento a UBS">Alta com encaminhamento a UBS</option>
                    <option value="Transferência Hospitalar">Transferência Hospitalar</option>
                    <option value="Óbito">Óbito</option>
                </select>
            </fieldset>
            <input type="submit" name="btn_cadastrar_diagnostico" value="Enviar" />
        </form>
        <script>
            $("document").ready(function(){
             $("#ds_avaliacao").val("Dores de cabeça devido a sinusite. Requiro Raio X da face para melhor avaliação.");
             $("#cd_cid").val("10 - J01.1");
             $("#ds_prescricao").val("1 comprimido de Amoxicilina a cada 12h por 7 dias.");
             });
        </script>
    </body>
</html>