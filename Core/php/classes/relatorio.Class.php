<?php

require_once 'conexao.Class.php';

final class Relatorio{
    
    private $db_maua;
    
    public function __construct() {
        //fazendo a conexão com o banco
	$obj_conn = new Conexao();
	$this->db_maua = $obj_conn->get_db_maua();
    }
    
    
}
?>