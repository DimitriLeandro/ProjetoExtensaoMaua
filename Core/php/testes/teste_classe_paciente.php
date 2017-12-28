<?php
require_once '../classes/paciente.Class.php';

$paciente = new Paciente();
echo "<pre>";
?>



<?php
/*
//CADASTRANDO
$paciente->setCdCnsPaciente('');
$paciente->setIcUbsEspera('0');
$paciente->setNmJustificativa('incapacitados');
$paciente->setNmPaciente('Steve Vai');
$paciente->setNmMae('Jucelina Volta');
$paciente->setIcSexo('masculino');
$paciente->setIcRaca('branca');
$paciente->setDtNascimento('1982-01-29');
$paciente->setNmPaisNascimento('Brasil');
$paciente->setNmMunicipioNascimento('Maua');
$paciente->setNmPaisResidencia('Brasil');
$paciente->setNmMunicipioResidencia('Maua');
$paciente->setCdCep('11324567');
$paciente->setNmLogradouro('Rua XYZ');
$paciente->setNmNumeroResidencia('234');
$paciente->setNmComplemento('Bloco A');
$paciente->setNmBairro('Vila Gilda');
$paciente->setNmResponsavel('Steve Vai');
$paciente->setCdDocumentoResponsavel('334349085');
$paciente->setNmOrgaoEmissor('ssp');
$paciente->setDtRegistro(date("Y-m-d"));
$paciente->setHrRegistro(date("H:i:s"));

print_r($paciente);

echo "<br/><br/>";
//cadastrando
$ok = $paciente->cadastrar();
echo $ok . "<br/><br/>";
*/

// /*TESTE DE SELECT 

$paciente->selecionar('64');

echo "<br/>" . $paciente->getCdPaciente();
echo "<br/>" . $paciente->getCdCnsPaciente();
echo "<br/>" . $paciente->getIcUbsEspera();
echo "<br/>" . $paciente->getNmJustificativa();
echo "<br/>" . $paciente->getNmPaciente();
echo "<br/>" . $paciente->getNmMae();
echo "<br/>" . $paciente->getIcSexo();
echo "<br/>" . $paciente->getIcRaca();
echo "<br/>" . $paciente->getDtNascimento();
echo "<br/>" . $paciente->getNmPaisNascimento();
echo "<br/>" . $paciente->getNmMunicipioNascimento();
echo "<br/>" . $paciente->getNmPaisResidencia();
echo "<br/>" . $paciente->getNmMunicipioResidencia();
echo "<br/>" . $paciente->getCdCep();
echo "<br/>" . $paciente->getNmLogradouro();
echo "<br/>" . $paciente->getNmNumeroResidencia();
echo "<br/>" . $paciente->getNmComplemento();
echo "<br/>" . $paciente->getNmBairro();
echo "<br/>" . $paciente->getNmResponsavel();
echo "<br/>" . $paciente->getCdDocumentoResponsavel();
echo "<br/>" . $paciente->getNmOrgaoEmissor();
echo "<br/>" . $paciente->getDtRegistro();
echo "<br/>" . $paciente->getHrRegistro();
echo "<br/>" . $paciente->getCdUbsReferencia();
echo "<br/>" . $paciente->getCdUbs();
echo "<br/>" . $paciente->getCdUsuarioRegistro();
// */

 /*TESTE DE UPDATE
//antes de fazer o update é necessário fazer o select
$paciente->selecionar('64');

$paciente->setIcUbsEspera('4');
$paciente->setNmMae('Maria Joaquina');
$paciente->setIcRaca('Parda');
$paciente->setDtNascimento('1955-01-30');
$paciente->setNmPaisResidencia('Brasil');
$paciente->setCdDocumentoResponsavel('346543456');
$paciente->setNmOrgaoEmissor('ssp');

$ok = $paciente->atualizar('64');
echo $ok;
// */
?>




<?php

echo "</pre>";
?>