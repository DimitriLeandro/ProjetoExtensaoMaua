<?php
require_once('../classes/equipamento.Class.php');
require_once('../classes/pedido.Class.php');

if (isset($_POST['cd_equipamento']) && $_POST['cd_equipamento'] != '') {
    //verificando se o valor existe no banco
    $equipamento = new Equipamento();
    $equipamento->selecionar($_POST['cd_equipamento']);
    if ($equipamento->getCdEquipamento() == '' || $equipamento->getCdEquipamento() == 0) {
        unset($equipamento);
        header("location: ../../menu.php");
    } else {        
        //SE CHEGOU AQUI ENTÃO O EQUIPAMENTO EXISTE MESMO. COMEÇANDO O UPDATE        
        if (isset($_POST['btn_solicitar'])) {
			$objPedido = new Pedido();

			date_default_timezone_set("America/Sao_Paulo");

			$objPedido->setCdEquipamento($_POST['cd_equipamento']);
			$objPedido->setNmSolicitante($_POST['nm_solicitante']);
			$objPedido->setDsProblema($_POST['ds_problema']);
			$objPedido->setIcProcesso(1);
			$objPedido->setDtRegistro(date("Y-m-d"));
			$objPedido->setHrRegistro(date("H:i:s"));

            $ok = $objPedido->cadastrar();

            if ($ok == 0) {
                ?> 
                <script>
                    alert('Erro ao atualizar cadastro');
                    window.location.href = "../../menu.php";
                </script> 
                <?php
            } else {
                ?> 
                <script>
                    alert('Top!');
                    window.location.href = "../../visualizar_lista_manutencao.php";
                </script> 
                <?php
            }
        }
    }
} else {
    unset($equipamento);
    header("location: ../../index.php");
}
?>
<script>
    document.body.style.backgroundColor = "#1868BF";
</script>