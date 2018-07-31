<?php
//instanciando um objeto de Espera para pegar a lista completa
require_once('classes/espera.Class.php');
$obj_espera = new Espera();

//criando uma matriz com os 30 primeiros pacientes da lista de espera -> isso é necessário pois o carregamento fica lento com mais pacientes
$lista = $obj_espera->selecionarListaCompleta(30); 


foreach ($lista as $row) {
    $redirect_nova_triagem = "cadastrar_triagem.php?cd_paciente=" . $row['cd_paciente'];
    $redirect_historico = "pesquisar_triagem.php?cd_paciente=" . $row['cd_paciente'];
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
	    <?php
	    //Os botões "Nova triagem" e "Histŕico de Triagens" só deve aparecer se o usuário logado for um enfermeiro
	    require_once 'classes/usuario.Class.php';
	    $obj_usuario = new Usuario();
	    if ($obj_usuario->getPermission() == "Enfermeiro" || $obj_usuario->getPermission() == "Administrator") {
		?>
		<button type="button" id="<?php echo $redirect_nova_triagem; ?>" class="botao" onclick="window.location.href = '<?php echo $redirect_nova_triagem; ?>';">Nova Triagem</button>
		<button type="button" class="botao" onclick="window.location.href = '<?php echo $redirect_historico; ?>';">Histórico de Triagens</button>
		<?php
	    }
	    ?>
    	<button type="button" class="botao" onclick="window.location.href = 'visualizar_espera.php?remover=<?php echo $row['cd_espera']; ?>';">Retirar Paciente da Lista</button>
        </p>
    </fieldset><br/>
    <?php
}
?>