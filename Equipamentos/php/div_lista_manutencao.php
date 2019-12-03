<?php
//instanciando um objeto de pedido para pegar a lista completa
require_once('classes/pedido.Class.php');
$obj_pedido = new Pedido();

//criando uma matriz com os 30 primeiros pacientes da lista de espera -> isso é necessário pois o carregamento fica lento com mais pacientes
$lista = $obj_pedido->selecionarListaManutencao(25); 


foreach ($lista as $row) {
    $redirect_iniciar_manutencao = "iniciar_manutencao.php?cd_pedido=" . $row['cd_pedido'];
    ?>
    <fieldset style = "border: solid 1px; padding: 10px;">
        <table>
    	<tr>
    	    <th>
    		<label class="margem">Nome: <?php echo $row['ds_equipamento']; ?></label>
    	    </th>
    	    <th>
    		<label class="margem">Patrimônio: <?php echo $row['cd_patrimonio']; ?></label>
    	    </th>
    	    <th>
    		<label class="margem">Modelo: <?php echo $row['nm_modelo']; ?></label>
    	    </th>
    	    <th>
    		<label class="margem">fabricante: <?php echo $row['nm_fabricante']; ?></label>
    	    </th>
    	</tr>
    	<tr>
    	    <th>
    		<label class="margem">Data: <?php echo $row['dt_pedido']; ?></label>
    	    </th>
    	    <th>
    		<label class="margem">Hora: <?php echo $row['hr_pedido']; ?></label>
    	    </th>
    	</tr>
        </table>
        <p>
		<button type="button" id="<?php echo $redirect_iniciar_manutencao; ?>" class="botao" onclick="window.location.href = '<?php echo $redirect_iniciar_manutencao; ?>';">Iniciar Manutenção</button>
        </p>
    </fieldset><br/>
    <?php
}
?>