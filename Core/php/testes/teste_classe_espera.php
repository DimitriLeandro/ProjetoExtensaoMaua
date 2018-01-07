<?php
    require_once '../classes/espera.Class.php';
    
    $obj_espera = new Espera();
    
    //só precisa mandar o código do paciente, o usuario que realiza o registro e a ubs já estão na classe Ciclo
    $obj_espera->setCdPaciente('64');
    echo $obj_espera->cadastrar();
?>