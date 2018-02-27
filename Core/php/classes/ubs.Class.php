<?php

require_once 'conexao.Class.php';

final class Ubs {

    private $cdUbs;
    private $cdCep;
    private $nmLogradouro;
    private $nmBairro;
    private $nmUbs;
    private $db_maua;

    public function __construct() {
	//fazendo a conexão com o banco
	$obj_conn = new Conexao();
	$this->db_maua = $obj_conn->get_db_maua();
    }

    public function pesquisarPorCep($cep) {
	$attr = array();
	$stmt = $this->db_maua->prepare("SELECT * FROM tb_ubs WHERE cd_cep = ?");
	if ($stmt) {
	    $stmt->bind_param('s', $cep);
	    $stmt->execute();
	    $stmt->bind_result($attr[1], $attr[2], $attr[3], $attr[4], $attr[5]);
	    //setando os atributos da classe
	    while ($stmt->fetch()) {
		$this->setCdUbs($attr[1]);
		$this->setCdCep($attr[2]);
		$this->setNmLogradouro($attr[3]);
		$this->setNmBairro($attr[4]);
		$this->setNmUbs($attr[5]);
	    }
	    $stmt->close();
	}
    }

    //---------------------------------------- GET & SET
    function getCdUbs() {
	return $this->cdUbs;
    }

    function getCdCep() {
	return $this->cdCep;
    }

    function getNmLogradouro() {
	return $this->nmLogradouro;
    }

    function getNmBairro() {
	return $this->nmBairro;
    }

    function getNmUbs() {
	return $this->nmUbs;
    }

    function setCdUbs($cdUbs) {
	$this->cdUbs = $cdUbs;
    }

    function setCdCep($cdCep) {
	$this->cdCep = $cdCep;
    }

    function setNmLogradouro($nmLogradouro) {
	$this->nmLogradouro = $nmLogradouro;
    }

    function setNmBairro($nmBairro) {
	$this->nmBairro = $nmBairro;
    }

    function setNmUbs($nmUbs) {
	$this->nmUbs = $nmUbs;
    }

}

?>