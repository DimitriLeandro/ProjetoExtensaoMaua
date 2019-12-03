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
        <div id="div_corpo">
            <?php
                //definindo o action do formulário. Se o bot estiver sendo executado, o action deve ter o rodarBot=true também                
                if(isset($_GET['rodarBot']) && $_GET['rodarBot'] == TRUE){
                    $formAction = "php/actions/action_cadastrar_equipamento.php?rodarBot=true";
                } else {
                    $formAction = "php/actions/action_cadastrar_equipamento.php";
                }
            ?>
            <form method="post" action="<?php echo $formAction; ?>" class="form-style" id="cadastro_equipamento">
                <h1>SISTEMA DE CADASTRAMENTO DE EQUIPAMENTOS</h1>
                <fieldset id="fieldset_1" class="field_set">
                    

                    <label for="tipo" class="margem">Escolha a descrição que representa o equipamento</label>
                    <input type="text" name="ds_equipamento" id="ds_equipamento" /><br />

                    <label for="nump"class="margem">Digite o número do patrimônio</label>
                    <input type="text" name="cd_patrimonio" id="cd_patrimonio" <?php if(isset($_GET['patrimonio'])){ echo "value='".$_GET['patrimonio']."'"; } ?>/><br />

                    <label for="modelo" class="margem">Qual o modelo do equipamento</label>
                    <input type="text" name="nm_modelo" id="nm_modelo" /><br />
					
					<label for="fabric"class="margem">Qual o fabricante</label>
                    <input type="text" name="nm_fabricante" id="nm_fabricante" /><br />
					
					<label for="marca"class="margem">Marca do equipamento</label>
                    <input type="text" name="nm_marca" id="nm_marca" /><br />

                    <button type="button" onclick="javascript:history.back()">Voltar</button>
                    <button type="button" onclick="avancar('fieldset_2');">Avançar</button>
				</fieldset><br />
                
				<fieldset id="fieldset_2" class="field_set" style="display: none;">
				
                    <legend>Dados da localização do equipamento</legend>
					
                    <label for="setor" class="margem2">Unidade ou setor em que se localiza o equipamento dentro do EAS</label>
                    <input type="text" name="nm_setor" id="nm_setor" /><br />

                    <label for="sala" class="margem1">Sub-unidade ou sala onde fica o equipamento</label>
                    <input type="text" name="nm_sala" id="nm_sala" /><br />

                    <button type="button" onclick="voltar('fieldset_1');">Voltar</button>
                    <button type="button" onclick="avancar('fieldset_3');">Avançar</button>
                </fieldset><br />


                <fieldset id="fieldset_3" class="field_set" style="display: none;">				
					<label for="posse" class="margem">O equipamento é:</label>
                    <select name="ic_posse" id="ic_posse" >
                        <option value="Próprio">Próprio</option>
                        <option value="Comodato">Comodato</option>
                        <option value="Doação">Doação</option>
                        <option value="Terceiro">terceiro</option>
					</select><br />
					
                    <label for="notafiscal" class="margem2">Nota fiscal ou documento de entrada no EAS</label>
                    <input type="text" name="cd_fiscal" id="cd_fiscal" /><br />

                    <label for="valore" class="margem2">Valor do equipamento</label>
                    <input type="text" name="vl_equipamento" id="vl_equipamento" /><br />

                    <label for="instal" class="margem">Data de instalação</label>
                    <input type="text" name="dt_instalacao" id="dt_instalacao" maxlength="10" /><br />

					<label for="garantia" class="margem">Data de garantia</label>
                    <input type="text" name="dt_garantia" id="dt_garantia" maxlength="10" /><br />

					
                    <button type="button" onclick="voltar('fieldset_2');">Voltar</button>
                    <button type="button" onclick="avancar('fieldset_4');">Avançar</button>

                   
                </fieldset><br />  
				<fieldset id="fieldset_4" class="field_set" style="display: none;">
				
					<label for="contrmanu"class="margem">Equipamento possui contrato de manutenção?</label>
                    <select name="ic_manutencao" id="ic_manutencao" >
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
					</select> <br />
					
					<label for="telefone" class="margem">Telefone de contato do prestador</label>
                    <input type="text" name="cd_prestador" id="cd_prestador" /><br />	
					
					<label for="tensao" class="margem">Tensão de utilização em Volts</label>
					<select name="ic_tensao" id="ic_tensao" onchange="esconderExibirPotencia()">
                        <option value="127 V">127 V</option>
                        <option value="220 V">220 V</option>
						<option value="390 V">390 V</option>
						<option value="Outros">Outros</option>
						<option value="Não se Aplica">Não se Aplica</option>
					</select> <br />
					
					<label for="potencia" class="margem" id="label_potencia">Potência em Watts</label>
                    <input type="number" name="vl_potencia" id="vl_potencia"/><br />	
					
					<label for="manualop"class="margem">Equipamento possui manual de operação?</label>
                    <select name="ic_operacao" id="ic_operacao" >
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
					</select> <br />
					
					<label for="manualtec"class="margem"> Equipamento possui manual técnico? </label>
                    <select name="ic_tecnico" id="ic_tecnico" >
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
					</select> <br />
										
					<label for="insumo" class="margem1">Necessita de algum insumo específico? Qual?</label>
                    <input type="text" name="ds_insumo" id="ds_insumo" /><br />
						
					<label for="obs" class="margem1">Observações pertinentes no ato do cadastro</label>
                    <input type="text" name="ds_obs" id="ds_obs" /><br />
						
					<button type="button" onclick="voltar('fieldset_2');">Voltar</button>
                    <button  type="button" onclick="submeter_formulario();" >Cadastrar</button>
					
					<input  type="submit" name='btn_cadastrar' id="btn_cadastrar" disabled hidden />
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
			
			// FUNCAO QUE FAZ O INPUT DA POTENCIA DESAPARECER CASO O USUARIO ESCOLHA "NAO SE APLICA" NO INPUT DA TENSAO
			function esconderExibirPotencia(){
				var tensaoEscolhida = $("#ic_tensao").val();
				
				if(tensaoEscolhida == "Não se Aplica"){
					$("#label_potencia").hide();
					$("#vl_potencia").hide();
					
					//altero o valor pra null
					$("#vl_potencia").val("");
				} else {
					$("#label_potencia").show();
					$("#vl_potencia").show();
				}
			}

            $("document").ready(function () {
                //transformando o input em type date de uma forma que funciona em todos os navegadores
                $("#dt_instalacao").datepicker({
                    dateFormat: 'dd/mm/yy'
                });
				$("#dt_garantia").datepicker({
                    dateFormat: 'dd/mm/yy'
                });
            });
        </script>
        <script src="users/js/validacao_cadastrar_paciente.js"></script>
    </body>
</html>
</html>