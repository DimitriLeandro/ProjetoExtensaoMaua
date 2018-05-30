<?php
require_once("../classes/diagnostico.Class.php");

if (isset($_POST['btn_cadastrar_diagnostico'])) {
    //o codigo da triagem será adquirido pelo método get. É necessário verificar se algum valor foi setado
    if (isset($_POST['cd_triagem']) && $_POST['cd_triagem'] != '') {
		$diagnostico = new Diagnostico();
		$diagnostico->setDsAvaliacao($_POST['ds_avaliacao']);
		$diagnostico->setCdCid($_POST['cd_cid']);
		$diagnostico->setDsPrescricao($_POST['ds_prescricao']);
		$diagnostico->setIcSituacao($_POST['ic_situacao']);
		$diagnostico->setCdTriagem($_POST['cd_triagem']);

		$ok = $diagnostico->cadastrar();

		if ($ok == 0) {
			?> 
		    <script> 
		    	alert('Erro ao cadastrar diagnóstico');
		    	window.location.href = "../../index.php";
		    </script> 
			<?php
		} else {
			//depois de cadastrar...
			if(isset($_GET['rodarBot']) && $_GET['rodarBot'] == TRUE){
		        header("location: ../../pesquisar_triagem.php?rodarBot=true");
		    } else {
		    	header('location: ../../pesquisar_triagem.php');
			}
		}

		unset($obj_diagnostico);
    } else {
		?> 
		<script> 
			alert("Código da triagem não encontrado");
			window.location.href = "../../index.php";
		</script> 
		<?php
    }
}
?>