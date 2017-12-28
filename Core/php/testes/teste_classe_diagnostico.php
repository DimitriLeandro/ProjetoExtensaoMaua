<?php
require_once '../classes/diagnostico.Class.php';

$diagnostico = new Diagnostico();
echo "<pre>";
?>

<?php
	 /* CADASTRO
	$diagnostico->setDsAvaliacao('Virose');
	$diagnostico->setCdCid('CID 10.12');
	$diagnostico->setDsPrescricao('Remédio');
	$diagnostico->setDtRegistro(date("Y-m-d"));
	$diagnostico->setHrRegistro(date("H:i:s"));
	$diagnostico->setIcSituacao('Alta sem encaminhamento');
	$diagnostico->setCdTriagem('48');

	$ok = $diagnostico->cadastrar();
	echo $ok;
	// */


	//SELECIONAR
	$diagnostico->selecionar('33');

	echo "<br/>" . $diagnostico->getCdDiagnostico();
	echo "<br/>" . $diagnostico->getDsAvaliacao();
	echo "<br/>" . $diagnostico->getCdCid();
	echo "<br/>" . $diagnostico->getDsPrescricao();
	echo "<br/>" . $diagnostico->getDtRegistro();
	echo "<br/>" . $diagnostico->getHrRegistro();
	echo "<br/>" . $diagnostico->getIcSituacao();
	echo "<br/>" . $diagnostico->getCdUbs();
	echo "<br/>" . $diagnostico->getCdUsuarioRegistro();
	echo "<br/>" . $diagnostico->getCdTriagem();
?>

<?php

echo "</pre>";
?>