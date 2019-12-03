<?php
require_once('../classes/equipamento.Class.php');
require_once('../classes/pedido.Class.php');

if (isset($_POST['cd_pedido']) && $_POST['cd_pedido'] != '') {
    //verificando se o valor existe no banco
    $pedido = new Pedido();
    $pedido->selecionar($_POST['cd_pedido']);
    if ($pedido->getCdEquipamento() == '' || $pedido->getCdEquipamento() == 0) {
        unset($pedido);
        header("location: ../../menu.php");
    } else {        
        //SE CHEGOU AQUI ENTÃO O EQUIPAMENTO EXISTE MESMO. COMEÇANDO O UPDATE        
        if (isset($_POST['btn_finalizar'])) {
			require_once('../classes/manutencao.Class.php');
			$objManutencao = new Manutencao();

			date_default_timezone_set("America/Sao_Paulo");

			$objManutencao->setDtManutencao($_POST['dt_manutencao']);
			$objManutencao->setDtFinal($_POST['dt_final']);
			$objManutencao->setDsSolucao($_POST['ds_solucao']);
			$objManutencao->setNmFuncionario($_POST['nm_funcionario']);
			$objManutencao->setCdPedido($_POST['cd_pedido']);

            $ok = $objManutencao->cadastrar();

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
                    alert('Manutenção Finalizada!');
                    window.location.href = "../../menu.php";
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