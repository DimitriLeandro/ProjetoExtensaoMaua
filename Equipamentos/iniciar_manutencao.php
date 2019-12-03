<?php
//essa pagina precisa do codigo do paciente no metodo GET para fazer o insert na chave estrangeira do banco, aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente existe como um usuario. Caso contrario, o usuario volta pra pagina de pesquisar_paciente.php
if (isset($_GET['cd_pedido']) && $_GET['cd_pedido'] != '') {
    //verificando se o valor existe no banco
    require_once('php/classes/pedido.Class.php');
    $pedido = new Pedido();
    $pedido->selecionar($_GET['cd_pedido']);
    if ($pedido->getCdPedido() == '' || $pedido->getCdPedido() == 0) {
        unset($pedido);
        header("location: menu.php");
    }
} else {
    unset($pedido);
    header("location: menu.php");
}
?>

<html>
    <head>
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <title>Manutenção</title>
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
            <form method="post" action="php/actions/action_finalizar_manutencao.php" class="form-style" id="cadastro_finalizar_manutencao">
                <h1>Manutenção - <?php echo $pedido->getCdPedido(); ?></h1>
				<label for="modelo" class="margem">Código do pedido: </label>
				<label for="codigo" class="margem"><?php echo $pedido->getCdPedido(); ?></label>
				<br/>
				<label for="modelo" class="margem">Data do pedido:</label>
                <label for="data"class="margem"><?php echo $pedido->getDtRegistro(); ?></label>
				<br/>
				<label for="modelo" class="margem">Hora do pedido:</label>
                <label for="hora" class="margem"><?php echo $pedido->getHrRegistro(); ?></label>
				<br/>                
				<label for="modelo" class="margem">Nome do solicitante:</label>
		        <label for="nome"class="margem"><?php echo $pedido->getNmSolicitante(); ?></label>
				<br/>             				
				<label for="modelo" class="margem">Descreção do problema: </label>
			    <label for="desc"class="margem"><?php echo $pedido->getDsProblema(); ?></label><br/>
				<br/>               
                
				
				<label>Data de início</label>
				<input type="date" name="dt_manutencao" id="dt_manutencao" />
				<br/>
				<label>Data de término</label>
				<input type="date" name="dt_final" id="dt_final" />
                <br/>
				<label>Nome do funcionario</label>
				<input type="text" name="nm_funcionario" id="nm_funcionario" />
                <br/>
				<label>Solução</label>
				<input type="text" name="ds_solucao" id="ds_solucao" />
                <br/>
				
				<input type="text" name="cd_pedido" id="cd_pedido" value="<?php echo $pedido->getCdPedido(); ?>" hidden />
				<input value="Finalizar Manutenção" type="submit" name='btn_finalizar' id="btn_finalizar" />

                <button type="button" onclick="javascript:history.back()">Voltar</button> 

            </form>
		</div>        
    </body>
</html>
</html>
