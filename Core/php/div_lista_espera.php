<?php
//instanciando um objeto de Espera para pegar a lista completa
require_once('classes/espera.Class.php');
$obj_espera = new Espera();

$lista = $obj_espera->selecionarListaCompleta();

foreach ($lista as $row) {
    $redirect_nova_triagem = "cadastrar_triagem.php?cd_paciente=" . $row['cd_paciente'];
    ?>
    <fieldset style = "border: solid 1px; padding: 10px;">
        <table>
    	<tr>
    	    <th>
    		<label class="margem">Nome: <?php echo $row['nm_paciente']; ?></label>
    	    </th>
    	    <th>
    		<label class="margem">Sexo: <?php echo $row['ic_sexo']; ?></label>
    	    </th>
    	    <th>
    		<label class="margem">Raça: <?php echo $row['ic_raca']; ?></label>
    	    </th>
    	    <th>
    		<label class="margem">Idade: <?php echo $row['vl_idade']; ?></label>
    	    </th>
    	</tr>
    	<tr>
    	    <th>
    		<label class="margem">Data: <?php echo $row['dt_registro']; ?></label>
    	    </th>
    	    <th>
    		<label class="margem">Hora: <?php echo $row['hr_registro']; ?></label>
    	    </th>
    	</tr>
        </table>
	<p>
        <button type="button" class="botao" onclick="window.location.href = '<?php echo $redirect_nova_triagem; ?>';">Nova Triagem</button>
	<button type="button" class="botao" onclick="window.location.href = 'visualizar_espera.php?remover=<?php echo $row['cd_espera']; ?>';">Retirar Paciente da Lista</button>
	</p>
    </fieldset><br/>
    <?php
}
?>