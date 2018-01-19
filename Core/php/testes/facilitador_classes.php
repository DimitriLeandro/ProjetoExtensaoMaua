<?php

require_once '../classes/ciclo.Class.php';
require_once '../classes/conexao.Class.php';
require_once '../classes/diagnostico.Class.php';
require_once '../classes/espera.Class.php';
require_once '../classes/etiqueta.Class.php';
require_once '../classes/paciente.Class.php';
require_once '../classes/triagem.Class.php';
require_once '../classes/usuario.Class.php';

echo "<br/><br/><br/><bold><h3>" . "  Paciente   " . "</h3></bold>";
$class_methods = get_class_methods(new Paciente());
foreach ($class_methods as $method_name) {
    if (strpos($method_name, 'get') === false && strpos($method_name, 'set') === false) {
	echo "<p>".$method_name."</p>";
    }
}

echo "<br/><br/><br/><bold><h3>" . "  Triagem   " . "</h3></bold>";
$class_methods = get_class_methods(new Triagem());
foreach ($class_methods as $method_name) {
    if (strpos($method_name, 'get') === false && strpos($method_name, 'set') === false) {
	echo "<p>".$method_name."</p>";
    }
}

echo "<br/><br/><br/><bold><h3>" . "  Diagnostico   " . "</h3></bold>";
$class_methods = get_class_methods(new Diagnostico());
foreach ($class_methods as $method_name) {
    if (strpos($method_name, 'get') === false && strpos($method_name, 'set') === false) {
	echo "<p>".$method_name."</p>";
    }
}

echo "<br/><br/><br/><bold><h3>" . "  Espera   " . "</h3></bold>";
$class_methods = get_class_methods(new Espera());
foreach ($class_methods as $method_name) {
    if (strpos($method_name, 'get') === false && strpos($method_name, 'set') === false) {
	echo "<p>".$method_name."</p>";
    }
}
?>