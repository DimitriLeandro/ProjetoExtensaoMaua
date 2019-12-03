<?php
//essa pagina precisa do codigo do equipamento no metodo GET para fazer o insert na chave estrangeira do banco, aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente existe como um usuario. Caso contrario, o usuario volta pra pagina de pesquisar_equipamento.php
if (isset($_GET['cd_equipamento']) && $_GET['cd_equipamento'] != '') {
    //verificando se o valor existe no banco
    require_once('php/classes/equipamento.Class.php');
    $equipamento = new Equipamento();
    $equipamento->selecionar($_GET['cd_equipamento']);
    if ($equipamento->getCdEquipamento() == '' || $equipamento->getCdEquipamento() == 0) {
        unset($equipamento);
        header("location: menu.php");
    }
} else {
    unset($equipamento);
    header("location: menu.php");
}
?>

<html>
    <head>
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <title>Cadastramento equipamento</title>
        <meta charset="utf-8" />
        <link href="css/formulario2.css" rel="stylesheet">
        <script src="users/js/jquery.js"></script>
        <script src="users/js/buscaCEP.js"></script>
        <script src="users/js/ubs_referencia.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="users/js/validacao_cadastrar_paciente.js"></script>
    </head>
    <body>
        <div id="div_corpo">
            <form method="post" action="php/actions/action_atualizar_equipamento.php" class="form-style" id="cadastro_equipamento">
                <h1>Verificar Cadastro - <?php echo $equipamento->getCdPatrimonio(); ?></h1>

				<label for="tipo" class="margem">Escolha a descrição que representa o equipamento.</label>
                <input value="<?php echo $equipamento->getDsEquipamento(); ?>" type="text" name="ds_equipamento" id="ds_equipamento" /><br />

                <label for="nump"class="margem">Digite o número do patrimônio</label>
                <input value="<?php echo $equipamento->getCdPatrimonio(); ?>" type="text" name="cd_patrimonio" id="cd_patrimonio" /><br />

                <label for="modelo" class="margem">Qual o modelo do equipamento</label>
                <input value="<?php echo $equipamento->getNmModelo(); ?>" type="text" name="nm_modelo" id="nm_modelo" /><br />
					
		        <label for="fabric"class="margem">Qual o fabricante</label>
                <input value="<?php echo $equipamento->getNmFabricante(); ?>" type="text" name="nm_fabricante" id="nm_fabricante" /><br />
					
			    <label for="marca"class="margem">Marca do equipamento</label>
                <input value="<?php echo $equipamento->getNmMarca(); ?>" type="text" name="nm_marca" id="nm_marca" /><br />
	
                <label for="setor" class="margem2">Unidade ou setor em que se localiza o equipamento dentro do EAS</label>
                <input value="<?php echo $equipamento->getNmSetor(); ?>" type="text" name="nm_setor" id="nm_setor" /><br />

                <label for="sala" class="margem1">Sub-unidade ou sala onde fica o equipamento</label>
                <input value="<?php echo $equipamento->getNmSala(); ?>" type="text" name="nm_sala" id="nm_sala" /><br />
			
			    <label for="posse" class="margem">O equipamento é:</label>
                <input value="<?php echo $equipamento->getIcPosse(); ?>" type="text"  name="ic_posse" id="ic_posse" >
					
                <label for="notafiscal" class="margem2">Nota fiscal ou documento de entrada no EAS</label>
                <input value="<?php echo $equipamento->getCdFiscal(); ?>" type="text" name="cd_fiscal" id="cd_fiscal" /><br />

                <label for="valore" class="margem2">Valor do equipamento</label>
                <input value="<?php echo $equipamento->getVlEquipamento(); ?>" type="text" name="vl_equipamento" id="vl_equipamento" /><br />

                <label for="instal" class="margem">Data de instalação</label>
                <input value="<?php echo date_format(new DateTime($equipamento->getDtInstalacao()), 'd/m/Y'); ?>" type="text" name="dt_instalacao" id="dt_instalacao" maxlength="10" /><br />

			    <label for="garantia" class="margem">Data de garantia</label>
                <input value="<?php echo date_format(new DateTime($equipamento->getDtGarantia()), 'd/m/Y'); ?>" type="text" name="dt_garantia" id="dt_garantia" maxlength="10" /><br />
				
			    <label for="contrmanu"class="margem">Equipamento possui contrato de manutenção?</label>
                <input value="<?php echo $equipamento->getIcManutencao(); ?>" type="text"  name="ic_manutencao" id="ic_manutencao" >
					
			    <label for="telefone" class="margem">Telefone de contato do prestador</label>
                <input value="<?php echo $equipamento->getCdPrestador(); ?>" type="text" name="cd_prestador" id="cd_prestador" /><br />	
					
			    <label for="tensao" class="margem">Tensão de utilização em Volts</label>
			    <input value="<?php echo $equipamento->getIcTensao(); ?>" type="text"  name="ic_tensao" id="ic_tensao" onchange="esconderExibirPotencia()">
					
				<label for="potencia" class="margem" id="label_potencia">Potência em Watts</label>
                <input value="<?php echo $equipamento->getVlPotencia(); ?>" type="number" name="vl_potencia" id="vl_potencia"/><br />	
					
				<label for="manualop"class="margem">Equipamento possui manual de operação?</label>
                <input value="<?php echo $equipamento->getIcOperacao(); ?>" type="text"  name="ic_operacao" id="ic_operacao" >
					
				<label for="manualtec"class="margem"> Equipamento possui manual técnico? </label>
                <input value="<?php echo $equipamento->getIcTecnico(); ?>" type="text"  name="ic_tecnico" id="ic_tecnico" >
										
				<label for="insumo" class="margem1">Necessita de algum insumo específico? Qual?</label>
                <input value="<?php echo $equipamento->getDsInsumo(); ?>" type="text" name="ds_insumo" id="ds_insumo" /><br />
						
			    <label for="obs" class="margem1">Observações pertinentes no ato do cadastro</label>
                <input value="<?php echo $equipamento->getDsObs(); ?>" type="text" name="ds_obs" id="ds_obs" /><br />
				

                <input type="number" id="cd_equipamento" name="cd_equipamento" value="<?php echo $equipamento->getCdEquipamento(); ?>" hidden/>

                <input value="Atualizar Cadastro" type="submit" name='btn_atualizar' id="btn_cadastrar" />
                
				<input value="DELETAR Equipamento" type="submit" name='btn_deletar' id="btn_cadastrar" />

                <button type="button" onclick="javascript:history.back()">Voltar</button> 

            </form>
		</div>        
    </body>
</html>
</html>
