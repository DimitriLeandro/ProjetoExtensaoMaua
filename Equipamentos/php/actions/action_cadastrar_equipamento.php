<?php
if (isset($_POST['btn_cadastrar'])) {
	
	require_once('../classes/equipamento.Class.php');
	$equipamento = new Equipamento();
	
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
	$equipamento->setDtInstalacao(date("Y-m-d"));
    $equipamento->setDtGarantia(date("Y-m-d"));
    $equipamento->setIcManutencao($_POST['ic_manutencao']);
    $equipamento->setCdPrestador($_POST['cd_prestador']);
    $equipamento->setIcTensao($_POST['ic_tensao']);
	$equipamento->setVlPotencia($_POST['vl_potencia']);
    $equipamento->setIcOperacao($_POST['ic_operacao']);
    $equipamento->setIcTecnico($_POST['ic_tecnico']);
    $equipamento->setDsInsumo($_POST['ds_insumo']);
    $equipamento->setDsObs($_POST['ds_obs']);
	$equipamento->setIcDelete(0);
	
	
	
	/* CASO QUEIRA VER O QUE TA CHEGANDO LÁ
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
	echo "<br/>" . $equipamento->getDsObs();
	echo "<br/>" . $equipamento->getIcDelete(); */
	
	//Cadastrando
	$ok = $equipamento->cadastrar();
	
	//Verificando se deu certo
	if ($ok == 0) {
        ?> 		
        <script> 
			alert('Erro ao cadastrar equipamento');
			window.location.href = "../../menu.php";
        </script> 
        <?php
    } else {
        echo "<br/><br/><br/><br/><br/><br/><br/><center><h1>Cadastro realizado com sucesso.</h1><br/><br/>";
		echo "<a href='http://localhost/Pumas/Equipamentos/menu.php'>Voltar</a></center>";
    }
}
?>
<script>
    document.body.style.backgroundColor = "#1868BF";
</script>