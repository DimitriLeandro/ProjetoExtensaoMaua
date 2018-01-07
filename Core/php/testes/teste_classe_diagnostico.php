<?php

require_once '../classes/diagnostico.Class.php';

$diagnostico = new Diagnostico();
echo "<pre>";
?>

<?php

// /* CADASTRO
/*    o insert na tabela diagnóstico é feito através de procedure
 * 
 * 
 * 
  --	ESSA PROCEDURE FAZ O INSERT NA TABELA DE DIAGNOSTICO
  --	UMA TRIAGEM SÓ PODE TER UM DIAGNOSTICO, ESSA PROCEDURE VERIFICA SE JÁ HÁ ALGUM DIAGNOSTICO PARA UMA TRIAGEM ESPECIFICA ANTES DE FAZER O INSERT
  --	CASO JÁ EXISTA, A PROCEDURE NÃO FARÁ O INSERT
  --  ESSE PROCEDIMENTO NÃO ODE SER FEITO COM TRIGGER POIS UM TRIGGER NÃO PODE FAZER INSERT/UPDATE/DELETE NA MESMA TABELA QUE DISPARA O TRIGGER
  --  OS PARAMETROS DE DATA E HORA NÃO PRECISAM SER ENVIADOS PARA ESSA PROCEDURE POIS O MYSQL PODE PEGAR ESSES VALORES SOZINHO COM O COMANDO "NOW()"

  --  tb_triagem:1::1:tb_diagnostico, apesar de usar uma chave estrangeira, é uma relação 1 para 1

  --  ESSA PROCEDURE RETORNA O PARAMETRO "id" QUE É O ID DO DIAGNOSTICO INSERIDO, OU 0 CASO O INSERT NÃO SEJA EXECUTADO
*/
$diagnostico->setDsAvaliacao('Virose');
$diagnostico->setCdCid('CID 10-14');
$diagnostico->setDsPrescricao('Amoxicilina');
$diagnostico->setIcSituacao('Alta');
$diagnostico->setCdTriagem('50');

$ok = $diagnostico->cadastrar();
echo $ok . "<br/><br/>";
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