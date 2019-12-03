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
        //SE CHEGOU AQUI ENTÃO O EQUIPAMENTO EXISTE MESMO. COMEÇANDO O UPDATE        
        if (isset($_POST['btn_atualizar'])) {
            $equipamento->setDsEquipamento($_POST['ds_equipamento']);
            $equipamento->setCdPatrimonio($_POST['cd_patrimonio']);
            $equipamento->setNmModelo($_POST['nm_modelo']);
            $equipamento->setNmFabricante($_POST['nm_fabricante']);
            $equipamento->setNmMarca($_POST['nm_marca']);
            $equipamento->setNmSetor($_POST['nm_setor']);
            $equipamento->setNmSala($_POST['nm_sala']);
            $equipamento->setIcPosse($_POST['ic_posse']);
            $equipamento->setCdFiscal($_POST['cd_fiscal']);
            $equipamento->setVlEquipamento($_POST['vl_equipamento']);
            $equipamento->setDtInstalacao(date('Y-m-d', strtotime(str_replace('/', '-', $_POST['dt_instalacao']))));
            $equipamento->setDtGarantia(date('Y-m-d', strtotime(str_replace('/', '-', $_POST['dt_garantia']))));
            $equipamento->setIcManutencao($_POST['ic_manutencao']);
            $equipamento->setCdPrestador($_POST['cd_prestador']);
            $equipamento->setIcTensao($_POST['ic_tensao']);
			$equipamento->setVlPotencia($_POST['vl_potencia']);
            $equipamento->setIcOperacao($_POST['ic_operacao']);
            $equipamento->setIcTecnico($_POST['ic_tecnico']);
            $equipamento->setDsInsumo($_POST['ds_insumo']);
            $equipamento->setDsObs($_POST['ds_obs']);
			
			
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

            $ok = $equipamento->atualizar($equipamento->getCdEquipamento());

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
                    alert('Sucesso!');
                    window.location.href = "../../menu.php";
                </script> 
                <?php
            }
        }else if(isset($_POST['btn_deletar'])) {
            $equipamento->setIcDelete(1);
			
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