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


<?php
    require_once 'php/classes/relatorio.Class.php';
    $objRelatorio = new Relatorio();
?>
<html>
    <head>	
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="users/js/jquery.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <title>Lista de Pacientes do Dia</title>
        <meta charset="utf-8" />
        <link href="css/formulario2.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body>
        <?php require_once 'php/div_header.php'; ?>
        <form method="post" class="form-style">
            <h1>LISTA DE PACIENTES DO DIA</h1>
            <br/>
            <fieldset>
                <?php
                    echo "<table>";
                    $lstPacientes = $objRelatorio->listaPacientesEQueixas(date("Y-m-d"), date("Y-m-d"));
                    foreach ($lstPacientes as $row) {
                        echo '<tr>' .
                        '<td style="width: 50%;">' . $row["nm_paciente"] . '</td>' .
                        '<td style="width: 30%;">' . $row["ds_queixa"] . '</td>' .
                        '<td style="width: 10%;">' . $row["dt_registro"] . '</td>' .
                        '<td style="width: 10%;">' . $row["hr_registro"] . '</td>' .
                        '</tr>';
                    }
                    echo "</table>";
                ?>
                <br/>
                <button type = "button" onclick = "javascript:history.back()">Voltar</button>
            </fieldset>
        </form>
    </body>
</html>