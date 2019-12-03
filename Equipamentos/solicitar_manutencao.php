<?php
//essa pagina precisa do codigo do paciente no metodo GET para fazer o insert na chave estrangeira do banco, aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente existe como um usuario. Caso contrario, o usuario volta pra pagina de pesquisar_paciente.php
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
        <title>Solicitar Manutenção</title>
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
            <form method="post" action="php/actions/action_solicitar_manutencao.php" class="form-style" id="cadastro_solicitacao_manutencao">
                <h1>Verificar Cadastro - <?php echo $equipamento->getCdPatrimonio(); ?></h1>
				<label for="modelo" class="margem">Equipamento:</label>
				<label for="tipo" class="margem"><?php echo $equipamento->getDsEquipamento(); ?></label>
				<br/>
				<label for="nump" class="margem">Número do patrimônio: </label>
                <label for="nump"class="margem"><?php echo $equipamento->getCdPatrimonio(); ?></label>
				<br/>
				<label for="modelo" class="margem">Modelo do equipamento: </label>
                <label for="modelo" class="margem"><?php echo $equipamento->getNmModelo(); ?></label>
				<br/>                
				<label for="fabric" class="margem">Fabricante: </label>
		        <label for="fabric"class="margem"><?php echo $equipamento->getNmFabricante(); ?></label>
				<br/>             				
				<label for="marca" class="margem">Marca: </label>
			    <label for="marca"class="margem"><?php echo $equipamento->getNmMarca(); ?></label>
				<br/>               
				<label for="setor" class="margem">Setor: </label>
                <label for="setor" class="margem2"><?php echo $equipamento->getNmSetor(); ?></label>
                <br/>  
				<label for="sala" class="margem">Sala: </label>
                <label for="sala" class="margem1"><?php echo $equipamento->getNmSala(); ?></label><br/>  
                <br/>  
				
				<label>Nome do solicitante</label>
				<input type="text" name="nm_solicitante" id="nm_solicitante" />
				<br/>
				
				<label>Descrição do problema</label>
				<input type="text" name="ds_problema" id="ds_problema" />
                <br/>
				
				<input type="text" name="cd_equipamento" id="cd_equipamento" value="<?php echo $equipamento->getCdEquipamento(); ?>" hidden />
				<input value="Solicitar Manutenção" type="submit" name='btn_solicitar' id="btn_solicitar" />

                <button type="button" onclick="javascript:history.back()">Voltar</button> 

            </form>
		</div>        
    </body>
</html>
</html>
