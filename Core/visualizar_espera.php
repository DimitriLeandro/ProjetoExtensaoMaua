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
//REMOVER PACIENTE DA LISTA DE ESPERA
if (isset($_GET['remover']) && $_GET['remover'] > 0) {
    require_once 'php/classes/espera.Class.php';
    $obj_espera = new Espera();

    //será feita uma atualização do campo ic_finalizada, que será 1.
    //para isso, o método atualizar($id) da classe será usado. Esse método atualiza TODOS os campos da linha da tabela, portanto, é necessário primeiro fazer o select, depois mudar o que deve ser alterado, para só então mandar atualizar.
    $obj_espera->selecionar($_GET['remover']);
    $obj_espera->setIcFinalizada('1');
    $ok = $obj_espera->atualizar($_GET['remover']);

    unset($obj_espera);
}
?>

<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="users/js/jquery.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <title>Lista de Espera</title>
        <meta charset="utf-8" />
        <link href="css/formulario.css" rel="stylesheet">
    </head>
    <body>
        <form class="form-style">
            <h1>LISTA DE ESPERA</h1><br/>
            <div id="div_lista_espera"></div>
	    <?php
	    //Os botões "Nova triagem" e "Histŕico de Triagens" só deve aparecer se o usuário logado for um enfermeiro
	    require_once 'php/classes/usuario.Class.php';
	    $obj_usuario = new Usuario();
	    if ($obj_usuario->getPermission() == "Enfermeiro" || $obj_usuario->getPermission() == "Administrator") {
		?>
    	    <button type="button" class="botao" onclick="window.location.href = 'pesquisar_triagem.php';">Visualizar Triagens Anteriores</button>
		<?php
	    }
	    ?>
        </form>

        <script>
            //FUNÇÃO QUE FICA RESPONSÁVEL POR RECARREGAR A LISTA A CADA 5 SEGUNDOS
            $(document).ready(function () {
                recarregar_lista();
                setInterval(function () {
                    recarregar_lista()
                }, 5000);
            });

            function recarregar_lista()
            {
                $("#div_lista_espera").load("php/div_lista_espera.php");
            }
        </script>
    </body>
</html>