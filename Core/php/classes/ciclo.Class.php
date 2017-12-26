<?php

require_once 'conexao.Class.php';

abstract class Ciclo {

    protected $usuarioRegistro;
    protected $ubs;
    protected $data;
    protected $hora;
    protected $db_maua;

    //CONSTRUTOR
    public function __construct() {
        $obj_conn = new Conexao();
        $this -> db_maua = $obj_conn->get_db_maua();
    }

    abstract function cadastrar();

    abstract function selecionar($id);

    abstract function atualizar();

    //----------------------------FUNÇÕES GET E SET
    function getUsuarioRegistro() {
        return $this->usuarioRegistro;
    }

    function getUbs() {
        return $this->ubs;
    }

    function getData() {
        return $this->data;
    }

    function getHora() {
        return $this->hora;
    }

    function setUsuarioRegistro($usuarioRegistro) {
        $this->usuarioRegistro = $usuarioRegistro;
    }

    function setUbs($ubs) {
        $this->ubs = $ubs;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

}
