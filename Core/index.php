<?php

require_once 'php/classes/usuario.Class.php';
$obj_usuario = new Usuario();

//echo "<br/><br/><br/>".$obj_usuario->getId();
//echo "<br/>".$obj_usuario->getPermission();

switch ($obj_usuario->getPermission()) {
    case 'Administrator':
	header("location: menu.php");
	break;
    case 'Recepcionista':
	header("location: pesquisar_paciente.php");
	break;
    case 'Enfermeiro':
	header("location: visualizar_espera.php");
	break;
    case 'Outorgante':
	header("location: pesquisar_triagem.php");
	break;
    default :
	header("location: users/login.php?dest=menu.php");
	break;
}
?>
