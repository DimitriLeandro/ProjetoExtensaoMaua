<?php
require_once '../classes/triagem.Class.php';

$triagem = new Triagem();
echo "<pre>";
?>

<?php
	///* CADASTRO
	$triagem->setIcFinalizada('0');
	$triagem->setDsQueixa('Dor');
	$triagem->setDtRegistro(date("Y-m-d"));
	$triagem->setHrRegistro(date("H:i:s"));
	$triagem->setVlPressaoMin('10');
	$triagem->setVlPressaoMax('11');
	$triagem->setVlPulso('90');
	$triagem->setVlTemperatura('37');
	$triagem->setVlRespiracao('30');
	$triagem->setVlSaturacao('90');
	$triagem->setVlGlicemia('100');
	$triagem->setVlNivelConsciencia('15');
	$triagem->setVlEscalaDor('1');
	$triagem->setIcAlergia('desconhece');
	$triagem->setDsAlergia('');
	$triagem->setDsObservacao('');
	$triagem->setVlClassificacaoRisco('1');
	$triagem->setDsLinhaCuidado('nenhuma');
	$triagem->setDsOutrasCondicoes('nenhuma');
	$triagem->setCdPaciente('64');

	$ok = $triagem->cadastrar();
	echo $ok;
	//*/


	//SELECIONAR
	$triagem->selecionar('48');

	echo "<br/>" . $triagem->getCdTriagem();
	echo "<br/>" . $triagem->getIcFinalizada();
	echo "<br/>" . $triagem->getDsQueixa();
	echo "<br/>" . $triagem->getDtRegistro();
	echo "<br/>" . $triagem->getHrRegistro();
	echo "<br/>" . $triagem->getVlPressaoMin();
	echo "<br/>" . $triagem->getVlPressaoMax();
	echo "<br/>" . $triagem->getVlPulso();
	echo "<br/>" . $triagem->getVlTemperatura();
	echo "<br/>" . $triagem->getVlRespiracao();
	echo "<br/>" . $triagem->getVlSaturacao();
	echo "<br/>" . $triagem->getVlGlicemia();
	echo "<br/>" . $triagem->getVlNivelConsciencia();
	echo "<br/>" . $triagem->getVlEscalaDor();
	echo "<br/>" . $triagem->getIcAlergia();
	echo "<br/>" . $triagem->getDsAlergia();
	echo "<br/>" . $triagem->getDsObservacao();
	echo "<br/>" . $triagem->getVlClassificacaoRisco();
	echo "<br/>" . $triagem->getDsLinhaCuidado();
	echo "<br/>" . $triagem->getDsOutrasCondicoes();
	echo "<br/>" . $triagem->getCdPaciente();
	echo "<br/>" . $triagem->getCdUbs();
	echo "<br/>" . $triagem->getCdUsuarioRegistro();
?>

<?php

echo "</pre>";
?>