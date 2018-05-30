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
require_once('php/classes/triagem.Class.php');

//essa pagina precisa do codigo da triagem no metodo GET para fazer o insert na chave estrangeira do banco, aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente existe como uma triagem. Caso contrario, o usuario volta pra pagina inicial
//outra verificação: SE A TRIAGEM DO $_GET['cd_triagem'] JÁ TEM UM DIAGNÓSTICO, ENTÃO NÃO É PRA VC ESTAR AQUI NÃO MEU FILHO, VAI CADASTRAR O QUE? OSH
if (isset($_GET['cd_triagem']) && $_GET['cd_triagem'] != '') {
    //verificando se o valor existe no banco e se a triagem já foi finalizada. Se a triagem não existir ou se ela já tiver sido finalizada, então tchau
    $triagem = new Triagem();
    $triagem->selecionar($_GET['cd_triagem']);
    if ($triagem->getCdTriagem() == '' || $triagem->getCdTriagem() == 0 || $triagem->getIcFinalizada() == 1) {
	unset($triagem);
	header("location: index.php");
    }
} else {
    unset($triagem);
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	    <script src="users/js/jquery.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <title>Registro do Dignóstico</title>
        <meta charset="utf-8" />
        <link href="css/formulario2.css" rel="stylesheet">
        <style>
            /* Esse style aqui serve pra fazer o scroll do auto-complete
               Código aqui: https://stackoverflow.com/questions/9590313/how-to-use-the-scroll-and-max-options-in-autocomplete
             */
            .ui-autocomplete {
                max-height: 200px;
                overflow-y: auto;
                overflow-x: hidden;
                padding-right: 20px;
            } 
        </style>
    </head>
    <body>
	<?php require_once 'php/div_header.php'; ?>
            <?php
                //definindo o action do formulário. Se o bot estiver sendo executado, o action deve ter o rodarBot=true também                
                if(isset($_GET['rodarBot']) && $_GET['rodarBot'] == TRUE){
                    $formAction = "php/actions/action_cadastrar_diagnostico.php?rodarBot=true";
                } else {
                    $formAction = "php/actions/action_cadastrar_diagnostico.php";
                }
            ?>
        <form method="post" action="<?php echo $formAction; ?>" class="form-style">
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

                <input type="text" id="cd_triagem" name="cd_triagem" value="<?php echo $_GET['cd_triagem']; ?>" hidden />
            </fieldset>
	        <button type="button" onclick="javascript:history.back()">Voltar</button> 
            <input type="submit" id="btn_cadastrar_diagnostico" name="btn_cadastrar_diagnostico" value="Enviar" />
        </form>
	<script>
            //funçao para completar o nome do paciente automaticamente
            //exemplo usado desse link: https://www.devmedia.com.br/jquery-autocomplete-dica/28697
            //primeiro ´e necess´ario buscar todos os nomes no banco
<?php
require_once('php/classes/diagnostico.Class.php');
$obj_diagnostico = new Diagnostico();
$array_cid = $obj_diagnostico->tabelaCid();
?>
            //variavel do JS com todos os cid's
            var source = [
<?php
foreach ($array_cid as $key => $value) {
    echo '"' . $value . '",';
}
?>
            ];
            $("#cd_cid").autocomplete({
                source: function (request, response) {
                    var results = $.ui.autocomplete.filter(source, request.term);
                    response(results.slice(0, 25));
                },
                select: function (event, ui) {
                    if (ui.item)
                    {
                        $('#cd_cid').val(ui.item.value);
                    }
                }
            });

            //isso aqui é só pra acertar o width do autocomplete
            jQuery.ui.autocomplete.prototype._resizeMenu = function () {
                var ul = this.menu.element;
                ul.outerWidth(this.element.outerWidth());
            }
        </script>
    </body>
</html>