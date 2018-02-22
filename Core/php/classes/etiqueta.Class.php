<?php

require_once 'espera.Class.php';

final class Etiqueta extends Espera {

    //herança pobre que só vai servir pra colocar o paciente na lista de espera mesmo.
    //o método construtor recebe o código do paciente que vai entrar na lista de espera e é isso.
    
    public function __construct($codigo_paciente) {
        parent::__construct();
        $this->setCdPaciente($codigo_paciente);
        $this->cadastrar();
    }

}
