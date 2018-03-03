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
<html>
    <head>	
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="users/js/jquery.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <title>Layout Relatório</title>
        <meta charset="utf-8" />
        <link href="css/formulario.css" rel="stylesheet">
        <script src="users/js/jquery.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script>
            function gerar_relatorio() {                
                var dtInicio = $("#dt_inicial").val();
                var dtFinal = $("#dt_final").val();
                var dtInicio = dtInicio.split("/");
                var dtFinal = dtFinal.split("/");
                var endereco = "php/div_relatorio.php?dtInicio="+dtInicio[2]+"-"+dtInicio[1]+"-"+dtInicio[0]+"&dtFinal="+dtFinal[2]+"-"+dtFinal[1]+"-"+dtFinal[0];
                $("#div_resultado").load(endereco);
            }
        </script>
    </head>
    <body>
        <?php require_once 'php/div_header.php'; ?>
        <form method="post" class="form-style">
            <h1>RELATÓRIO</h1>
            <fieldset>
                <label for="ncns" class="margem">Data</label><br><p>
                    <label for="ncns" class="margem">Inicial</label><br/>
                    <input type="text" style="width: 30%" maxlength="10" name="dt_inicial" id="dt_inicial" /></br>
                    <label for="nomep" class="margem">Final</label><br/>
                    <input type="text" style="width: 30%" maxlength="10" name="dt_final" id="dt_final" />
            </fieldset>
            <p><button type="button" class="botao" onclick="gerar_relatorio()">Gerar Relatório</button></p>
            <br/>
            <div id = "div_resultado">
            </div>
        </form>
        <script>
            $("document").ready(function () {
                //transformando o input em type date de uma forma que funciona em todos os navegadores
                $("#dt_inicial").datepicker({
                    dateFormat: 'dd/mm/yy'
                });
                $("#dt_inicial").datepicker('setDate', new Date());

                $("#dt_final").datepicker({
                    dateFormat: 'dd/mm/yy'
                });
                $("#dt_final").datepicker('setDate', new Date());
            });
        </script>
    </body>
</html>

