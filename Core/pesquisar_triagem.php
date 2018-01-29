<?php
if (file_exists("install/index.php")) {
    //perform redirect if installer files exist
    //this if{} block may be deleted once installed
    header("Location: install/index.php");
}
require_once 'users/init.php';
require_once $abs_us_root . $us_url_root . 'users/includes/header.php';
//require_once $abs_us_root . $us_url_root . 'users/includes/navigation.php';
$db = DB::getInstance();
if (!securePage($_SERVER['PHP_SELF'])) {
    die();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <title>Cadastramento paciente</title>
        <meta charset="utf-8" />
        <link href="css/formulario.css" rel="stylesheet">
        <script src="users/js/jquery.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body>
        <?php
        require_once('php/classes/paciente.Class.php');
        $paciente = new Paciente();

        //Se algum cd_paciente for setado no m´etodo GET, essa p´agina exibe as triagens desse paciente
        //Caso contr´ario, se n~ao tiver nada no GET, ent~ao essa p´agina mostra as triagens do dia
        //A vari´avel $tipo_pagina ´e que vai definir o que vai ser exibido
        //tipo 1 -> triagens de um paciente especifico setado no GET
        //tipo 2 -> nada no get, portanto, mostrar as triagens do dia

        if (isset($_GET['cd_paciente']) && $_GET['cd_paciente'] != '') {
            //essa pagina precisa do codigo do paciente no metodo GET para pesquisar as triagens desse paciente. Aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente existe como um usuario. Caso contrario, a p´agina exibe as triagens do dia
            //verificando se o valor existe no banco

            $paciente->selecionar($_GET['cd_paciente']);

            if ($paciente->getCdPaciente() == '' || $paciente->getCdPaciente() == 0) {
                $tipo_pagina = 2;
            } else {
                $tipo_pagina = 1;
            }
        } else {
            $tipo_pagina = 2;
        }
        ?>
        <?php
        //aqui vai ser carregado a p´agina
        if (isset($tipo_pagina)) {
            if ($tipo_pagina == 1) { //1 -> Paciente especifico		2 -> Triagens do dia
                require_once("php/div_pesquisar_triagem_1.php");
            } else {
                require_once("php/div_pesquisar_triagem_2.php");
            }
        } else {
            header("location: index.php");
        }

        ?>
         
    </body>
</html>