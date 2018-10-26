<?php

require_once 'classes/ubs.Class.php';
//essa página é uma div que vai ser carregada na página de cadastro e atualização de paciente
//quando o recepcionista digitar o cep do paciente, essa página é acionada e mostra qual é a ubs de referência do paciente
//para fazer isso, a classe Ubs tem um método que pesquisa os dados da tabela tb_ubs a partir do cep
if (isset($_GET['cd_cep'])) {
    $obj_ubs = new Ubs();

    $obj_ubs->pesquisarPorCep($_GET['cd_cep']);
    if($obj_ubs->getCdUbs() == "" || $obj_ubs->getCdUbs() == 0 || $obj_ubs->getNmUbs() == "")
    {
    	echo "<h4><p style='color: red;'><b>NÃO FOI POSSÍVEL DETERMINAR A UBS DE REFERÊNCIA<b/><p/><h4/>";
    	?><input type="number" name="cd_ubs_referencia" id="cd_ubs_referencia" value="4" hidden/><?php
    }
    else
    {
    	echo "<br/>UBS de Referência: " . $obj_ubs->getNmUbs() . "<br/><br/>";
    	?><input type="number" name="cd_ubs_referencia" id="cd_ubs_referencia" value="<?php echo $obj_ubs->getCdUbs(); ?>" hidden/><?php
    }
} else {
    header('location: ../');
}
?>

