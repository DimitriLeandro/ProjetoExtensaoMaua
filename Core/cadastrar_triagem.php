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
//essa pagina precisa do codigo do paciente no metodo GET para fazer o insert na chave estrangeira do banco, aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente existe como um usuario. Caso contrario, o usuario volta pra pagina de pesquisar_paciente.php
if (isset($_GET['cd_paciente']) && $_GET['cd_paciente'] != '') {
    //verificando se o valor existe no banco
    require_once('php/classes/paciente.Class.php');
    $paciente = new Paciente();
    $paciente->selecionar($_GET['cd_paciente']);
    if ($paciente->getCdPaciente() == '' || $paciente->getCdPaciente() == 0) {
        unset($paciente);
        header("location: index.php");
    }
} else {
    unset($paciente);
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
        <title>Registro da Triagem - <?php echo $paciente->getNmPaciente(); ?></title>
        <meta charset="utf-8" />
        <link href="css/formulario2.css" rel="stylesheet">
        <style>
            /* ESSE CSS é referênte as cores da classificação de risco*/
            .red {
                background-color: #F00;
            }

            .blue {
                background-color: #00F;
            }

            .orange{
                background-color: #F58025;
            }

            .green{
                background-color: #008000;
            }

            .yellow{
                background-color: #ffff00;
            }
            
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
        <div id="div_corpo">
            <?php
                //definindo o action do formulário. Se o bot estiver sendo executado, o action deve ter o rodarBot=true também                
                if(isset($_GET['rodarBot']) && $_GET['rodarBot'] == TRUE){
                    $formAction = "php/actions/action_cadastrar_triagem.php?rodarBot=true";
                } else {
                    $formAction = "php/actions/action_cadastrar_triagem.php";
                }
            ?>
            <form method="post" action="<?php echo $formAction; ?>" class="form-style">
                <h1>NOVA TRIAGEM - <?php echo $paciente->getNmPaciente(); ?></h1>
                <fieldset>
                    <label for="dsqueixa">Queixa principal</label>
                    <input type="text" name="ds_queixa" id="ds_queixa"/>

                    <label for="pressaomax">Pressão Arterial máxima</label>
                    <input type="number" min=1 step="0.01" name="vl_pressao_max" id="vl_pressao_max" placeholder="mmHg" /><br />
                    
                    <label for="pressaomin">Pressão Arterial mínima</label>
                    <input type="number" min=1 step="0.01" name="vl_pressao_min" id="vl_pressao_min" placeholder="mmHg" /><br />
                    
                    <label for="pulso">Pulso</label>
                    <input type="number" min=1 step="0.01" name="vl_pulso" id="vl_pulso" placeholder="bpm" /><br />

                    <label for="temp" >Temperatura</label>
                    <input type="number" min=1 step="0.01" name="vl_temperatura" id="vl_temperatura" placeholder="ºC" /><br />

                    <label for="resp">Respiração</label>
                    <input type="number" min=1 step="0.01" name="vl_respiracao" id="vl_respiracao" placeholder="rpm" /><br />

                    <label for="satu">Saturação</label>
                    <input type="number" min=1 step="0.01" name="vl_saturacao" id="vl_saturacao" placeholder="%" /><br />

                    <label for="glic">Glicemia</label>
                    <input type="number" min=1 step="0.01" name="vl_glicemia" id="vl_glicemia" placeholder="mg/dl" /><br />

                    <label for="glasc">Nível de consciência</label>
                    <input type="number" min=1 max=15 name="vl_nivel_consciencia" id="vl_nivel_consciencia" placeholder="Escala de Glasgow" /><br />
                    
                    <label for="escdor">Escala da dor </label>
                    <select name="vl_escala_dor" id="vl_escala_dor">
                        <optgroup label="Leve">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </optgroup>
                        <optgroup label="Moderado">
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </optgroup>
                        <optgroup label="Intensa">
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </optgroup>
                    </select><br />
                    
                    <label for="alergia">Alergia a medicamentos</label>
                    <input type="radio" name="ic_alergia" id="ic_alergia" value="sim" />Sim
                    <input type="radio" name="ic_alergia" id="ic_alergia" value="nao" />Não
                    <input type="radio" name="ic_alergia" id="ic_alergia" value="desconhece" checked="checked" />Desconhece <br />
                    
                    <label for="descalergia">Descrição alergia</label>
                    <input type="text" name="ds_alergia" id="ds_alergia" /><br />
                    
                    <label for="observ">Observações</label>
                    <textarea name="ds_observacao" id="ds_observacao" placeholder="Para registro do histórico de doenças, doenças prévias, entre outros"></textarea><br />
                    
                    <label for="classrisco">Classificação de risco</label>
                    <select name="vl_classificacao_risco" id="vl_classificacao_risco" style="background-color: blue"> 
                        <option value="1" class="blue" selected>Não Urgência</option>
                        <option value="2" class="green">Pouca Urgência</option>
                        <option value="3" class="yellow">Urgência</option>
                        <option value="4" class="orange">Muita Urgência</option>
                        <option value="5" class="red">Emergência</option> 
                    </select>
                    
                    <label for="linhacuidado">Linha de cuidado</label>
                    <select name="ds_linha_cuidado" id="ds_linha_cuidado">
                        <option value="nenhuma" selected>Nenhuma</option>
                        <option value="gest">Gest</option>
                        <option value="has">HAS</option>
                        <option value="om">OM</option>
                        <option value="ano">Ano</option>
                        <option value="sm">SM</option>
                        <option value="ad">Ad</option>
                        <option value="vio">Vio</option>
                    </select><br />
                    
                    <label for="outrascond">Outras condições</label>
                    <select name="ds_outras_condicoes" id="ds_outras_condicoes">
                        <option value="nenhuma" selected>Nenhuma</option>
                        <option value="asma">Asma</option>
                        <option value="dpoc">DPOC</option>
                        <option value="ice">ICE</option>
                        <option value="onco">ONCO</option>
                        <option value="outros">Outros</option>
                    </select><br />

                    <input type="text" id="cd_paciente" name="cd_paciente" value="<?php echo $_GET['cd_paciente']; ?>" hidden />
                </fieldset>
                <input type="submit" name="btn_cadastrar_triagem" id="btn_cadastrar_triagem" value="Registrar Triagem" />
                <button type="button" onclick="javascript:history.back()">Voltar</button>
            </form>
        </div>
        <script>
            //script para pegar todos os códigos da CIAP2
            //mas primeiro é preciso chamar o php pra pegar esses códigos na classe Triagem
<?php
require_once('php/classes/triagem.Class.php');
$obj_triagem = new Triagem();
$array_ciap = $obj_triagem->sintomasCiap();
?>
            var source = [
<?php
foreach ($array_ciap as $value) {
    echo '"' . $value . '",';
}
?>
            ];
            $("#ds_queixa").autocomplete({
                source: function (request, response) {
                    var results = $.ui.autocomplete.filter(source, request.term);
                    response(results.slice(0, 25));
                },
                select: function (event, ui) {
                    if (ui.item)
                    {
                        $('#ds_queixa').val(ui.item.value);
                    }
                }
            });
        </script>
        <script>
            $("#vl_classificacao_risco").change(function () {
                /*<option value="1" class="blue">Não Urgência</option>
                 <option value="2" class="green">Pouca Urgência</option>
                 <option value="3" class="yellow">Urgência</option>
                 <option value="4" class="orange">Muita Urgência</option>
                 <option value="5" class="red">Emergência</option> 
                 */
                switch ($(this).val()) {
                    case '1':
                        $(this).css("background-color", "blue");
                        break;
                    case '2':
                        $(this).css("background-color", "green");
                        break;
                    case '3':
                        $(this).css("background-color", "yellow");
                        break;
                    case '4':
                        $(this).css("background-color", "orange");
                        break;
                    case '5':
                        $(this).css("background-color", "red");
                        break;
                    default:
                        $(this).css("background-color", "blue");
                        break;
                }
            });
        </script>
    </body>
</html>