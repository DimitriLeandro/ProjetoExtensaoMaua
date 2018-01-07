<?php
//instanciando um objeto de Espera para pegar a lista completa
require_once('classes/espera.Class.php');
$obj_espera = new Espera();

$lista = $obj_espera->selecionarListaCompleta();

foreach ($lista as $row) {
    $redirect_nova_triagem = "cadastrar_triagem.php?cd_paciente=" . $row['cd_paciente'];
    ?>
    <fieldset style = "border: solid 1px; padding: 15px;">
        <p>
	    <label class="margem">Nome: <?php echo $row['nm_paciente']; ?></label>
	    <label class="margem">Data: <?php echo $row['dt_registro']; ?></label>
	    <label class="margem">Hora: <?php echo $row['hr_registro']; ?></label>
	    <button type="button" class="botao" onclick="window.location.href = '<?php echo $redirect_nova_triagem; ?>';">Nova Triagem</button>
        </p>
    </fieldset><br/>
    <?php
}
?>