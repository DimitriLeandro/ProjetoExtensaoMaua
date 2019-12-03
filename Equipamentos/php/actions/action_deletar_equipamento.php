<?php
require_once('../classes/equipamento.Class.php');

if (isset($_POST['cd_equipamento']) && $_POST['cd_equipamento'] != '') {
    //verificando se o valor existe no banco
    $equipamento = new Equipamento();
    $equipamento->selecionar($_POST['cd_equipamento']);
    if ($equipamento->getCdEquipamento() == '' || $equipamento->getCdEquipamento() == 0) {
        unset($equipamento);
        header("location: ../../menu.php");
    } else {        
        //SE CHEGOU AQUI ENTÃO O EQUIPAMENTO EXISTE MESMO. COMEÇANDO A DELETAR.        
        if (isset($_POST['btn_deletar'])) {
            $equipamento->setIcDelete(1);
			
			/*CASO QUEIRA VER O QUE TA CHEGANDO LÁ
			echo "<br/>" . $equipamento->getCdEquipamento();
			echo "<br/>" . $equipamento->getDsEquipamento();
			echo "<br/>" . $equipamento->getCdPatrimonio();
			echo "<br/>" . $equipamento->getNmModelo();
			echo "<br/>" . $equipamento->getNmFabricante();
			echo "<br/>" . $equipamento->getNmMarca();
			echo "<br/>" . $equipamento->getNmSetor();
			echo "<br/>" . $equipamento->getNmSala();
			echo "<br/>" . $equipamento->getIcPosse();
			echo "<br/>" . $equipamento->getCdFiscal();
			echo "<br/>" . $equipamento->getVlEquipamento();
			echo "<br/>" . $equipamento->getDtInstalacao();
			echo "<br/>" . $equipamento->getDtGarantia();
			echo "<br/>" . $equipamento->getIcManutencao();
			echo "<br/>" . $equipamento->getCdPrestador();
			echo "<br/>" . $equipamento->getIcTensao();
			echo "<br/>" . $equipamento->getVlPotencia();
			echo "<br/>" . $equipamento->getIcOperacao();
			echo "<br/>" . $equipamento->getIcTecnico();
			echo "<br/>" . $equipamento->getDsInsumo();
			echo "<br/>" . $equipamento->getDsObs(); */

            $ok = $equipamento->deletar($equipamento->getCdEquipamento());

            if ($ok == 0) {
                ?> 
                <script>
                    alert('Erro ao deletar o equipamento');
                    window.location.href = "../../menu.php";
                </script> 
                <?php
            } else {
                ?> 
                <script>
                    alert('Equipamento deletado com sucesso.');
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