<?php
//-------------------CÓDIGO DO USERSPICE
if (file_exists("install/index.php")) {
    //perform redirect if installer files exist
    //thiis if{} block may be deleted once installed
    header("Location: install/index.php");
}
require_once 'users/init.php';
require_once $abs_us_root . $us_url_root . 'users/includes/header.php';
//require_once $abs_us_root . $us_url_root . 'users/includes/navigation.php';
require_once 'users/init.php';
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
        <script src="users/js/buscaCEP.js"></script>
        <script src="users/js/ubs_referencia.js"></script>
    </head>
    <body>
        <?php require_once 'php/div_header.php'; ?>
        <div id="div_corpo">
            <?php
                //definindo o action do formulário. Se o bot estiver sendo executado, o action deve ter o rodarBot=true também                
                if(isset($_GET['rodarBot']) && $_GET['rodarBot'] == TRUE){
                    $formAction = "php/actions/action_cadastrar_paciente.php?rodarBot=true";
                } else {
                    $formAction = "php/actions/action_cadastrar_paciente.php";
                }
            ?>
            <form method="post" action="<?php echo $formAction; ?>" class="form-style" id="cadastro_paciente">
                <h1>SISTEMA DE CADASTRAMENTO SUS</h1>
                <fieldset id="fieldset_1" class="field_set">
                    <div id="div_possui_cns">
                        <label for="ncns" class="margem">Número CNS</label>
                        <input type="number" name="cd_cns_paciente" id="cd_cns_paciente" onblur="validar_cd_cns_paciente()" /><br />
                    </div>
                    <div id="div_nao_possui_cns" hidden>
                        <label for="justificativa" class="margem">Justificativa da ausência do CNS</label>
                        <select name="nm_justificativa" id="nm_justificativa" onblur="validar_nm_justificativa()">
                            <option value="" selected></option>
                            <option value="Pacientes acidentados graves">Pacientes acidentados graves</option>
                            <option value="Pacientes psiquiátricos encontrados em vias públicas">Pacientes psiquiátricos encontrados em vias públicas</option>
                            <option value="Pacientes com problemas neurológicos graves ou comatosos">Pacientes com problemas neurológicos graves ou comatosos</option>
                            <option value="Pacientes incapacitados por motivos sociais e/ou culturais">Pacientes incapacitados por motivos sociais e/ou culturais</option>
                            <option value="Doador de Órgãos Falecido">Doador de Órgãos Falecido</option>
                        </select>
                    </div>
                    <p id="p_troca_cns_justificativa" style="cursor: pointer; color: lightblue;" onclick="trocar_cns_justificativa();">O paciente não possui CNS</p>

                    <label for="nomep" class="margem">Nome completo</label>
                    <input type="text" name="nm_paciente" id="nm_paciente" onblur="validar_nm_paciente()" <?php
                    if (isset($_GET['nome'])) {
                        echo 'value="' . ucwords(str_replace("_", " ", $_GET['nome'])) . '"';
                    }
                    ?>/><br />

                    <label for="nomem"class="margem">Nome completo da mãe</label>
                    <input type="text" name="nm_mae" id="nm_mae" onblur="validar_nm_mae()"/><br />

                    <label for="sexop"class="margem">Sexo</label>
                    <select name="ic_sexo" id="ic_sexo" onblur="validar_ic_sexo()">
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Não informado">Não informado</option>
                    </select> <br />

                    <label for="corp" class="margem">Raça/Cor</label>
                    <select name="ic_raca" id="ic_raca" onblur="validar_ic_raca()">
                        <option value="Branca">Branca</option>
                        <option value="Preta">Preta</option>
                        <option value="Parda">Parda</option>
                        <option value="Amarela">Amarela</option>
                        <option value="Indígena">Indígena</option>
                        <option value="Sem informação">Sem informação</option>
                    </select><br />

                    <label for="nascp" class="margem">Data de Nascimento</label>
                    <input type="text" name="dt_nascimento" id="dt_nascimento" maxlength="10" onkeypress="mascarar_data()" onblur="validar_dt_nascimento()"/><br />

                    <button type="button" onclick="javascript:history.back()">Voltar</button>
                    <button type="button" onclick="avancar('fieldset_2');">Avançar</button>                    
                </fieldset><br />

                <fieldset id="fieldset_2" class="field_set" style="display: none;">
                    <label for="paisnasc" class="margem1" >País de nascimento</label>
                    <input type="text" name="nm_pais_nascimento" id="nm_pais_nascimento" onblur="validar_nm_pais_nascimento()" /><br />

                    <label for=munnasc class="margem1">Município de nascimento</label>
                    <input type="text" name="nm_municipio_nascimento" id="nm_municipio_nascimento" onblur="validar_nm_municipio_nascimento();" /><br />

                    <label for="paisresd" class="margem1">País de residência</label>
                    <input type="text" name="nm_pais_residencia" id="nm_pais_residencia" onblur="validar_nm_pais_residencia();" /><br />

                    <label for="cep" class="margem1">CEP</label>
                    <input type="text" name="cd_cep" id="cd_cep" size="9" maxlength="9" onblur="validar_cd_cep();" onclick="validar_cd_cep();"/>
                    <p id="p_carregando" hidden>Carregando...</p>
                    <div id="div_ubs_referencia"><input type="number" name="cd_ubs_referencia" id="cd_ubs_referencia" value="4" hidden/></div>
                    <label for="munresd" class="margem1">Município de residência</label>
                    <input type="text" name="nm_municipio_residencia" id="nm_municipio_residencia" onblur="validar_nm_municipio_residencia();" /><br />

                    <label for="bairro" class="margem1">Bairro de residência</label>
                    <input type="text" name="nm_bairro" id="nm_bairro" onblur="validar_nm_bairro();" /><br />

                    <label for="endereco" class="margem1">Logradouro de residência</label>
                    <input type="text" name="nm_logradouro" id="nm_logradouro" onblur="validar_nm_logradouro();" />

                    <label for="numresd" class="margemnumero">Número </label>
                    <input type="text" name="nm_numero_residencia" id="nm_numero_residencia" size="05" placeholder="ex: 320" onblur="validar_nm_numero_residencia();" /><br />

                    <label for="complemresd" class="margem1">Complemento do endereço</label>
                    <input type="text" name="nm_complemento" id="nm_complemento" onblur="validar_nm_complemento();" /><br />

                    <button type="button" onclick="voltar('fieldset_1');">Voltar</button>
                    <button type="button" onclick="avancar('fieldset_3');">Avançar</button>
                </fieldset><br />

                <fieldset id="fieldset_3" class="field_set" style="display: none;">
                    <label for="nomeresp" class="margem2">Nome completo do responsável</label>
                    <input type="text" name="nm_responsavel" id="nm_responsavel" onblur="validar_nm_responsavel()" <?php
                    if (isset($_GET['nome'])) {
                        echo 'value="' . ucwords(str_replace("_", " ", $_GET['nome'])) . '"';
                    }
                    ?>/><br />

                    <label for="docresp" class="margem2">Documento do responsavel</label>
                    <input type="text" maxlength="12" name="cd_documento_responsavel" id="cd_documento_responsavel" onkeypress="mascarar_rg()" onblur="validar_cd_documento_responsavel()" /><br />

                    <label for="orgaoresp" class="margem2">Órgão emissor</label>
                    <input type="text" name="nm_orgao_emissor" id="nm_orgao_emissor"  onblur="validar_nm_orgao_emissor()" /><br />		    

                    <button type="button" onclick="voltar('fieldset_2');">Voltar</button>
                    <button  type="button" onclick="submeter_formulario();" >Cadastrar e Imprimir Etiqueta</button>

                    <input  type="submit" name='btn_cadastrar' id="btn_cadastrar" disabled hidden />
                </fieldset><br />   
            </form>
        </div>
        <script>
            $('input:visible:enabled:first').focus();

            $('input').keypress(function (e) {
                if (e.which == 13)
                {
                    $('button:visible:enabled:last').click();
                }
            });

            function submeter_formulario()
            {
                $("#btn_cadastrar").attr("disabled", false);
                $("#btn_cadastrar").click();
            }

            function avancar(id)
            {
                $(".field_set").hide();
                $("#" + id).show();
                window.scrollTo(0, 0);
                $('input:visible:enabled:first').focus();
            }
            function voltar(id)
            {
                $(".field_set").hide();
                $("#" + id).show();
                window.scrollTo(0, 0);
                $('input:visible:enabled:first').focus();
            }

            $("document").ready(function () {
                //transformando o input em type date de uma forma que funciona em todos os navegadores
                $("#dt_nascimento").datepicker({
                    dateFormat: 'dd/mm/yy',
                    onSelect: function () {
                        validar_dt_nascimento();
                    }
                });
            });
        </script>
        <script src="users/js/validacao_cadastrar_paciente.js"></script>
    </body>
</html>
</html>