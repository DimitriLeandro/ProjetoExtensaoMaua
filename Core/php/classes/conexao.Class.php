<?php

final class Conexao {

    private $conn_link;
    private $cdUbs; //get publico e set privado

    function __construct() {
        //PRIMEIRO, FAZENDO A CONEXÃO COM O BANCO
        $this->conn_link = new mysqli('localhost', 'root', 'root', 'db_maua');

        if ($this->conn_link->connect_error) {
            die("Falha na conexão: " . $this->conn_link->connect_error);
        }

        mysqli_set_charset($this->conn_link, "utf8");
        //AGORA, É AQUI QUE FICARÁ DEFINIDO ONDE O SISTEMA ESTÁ RODANDO, NO ATRIBUTO cdUbs
        $this->setCdUbs('6');
        
    }

    public function get_db_maua() {
        return $this->conn_link;
    }
    
    public function getCdUbs() {
        return $this->cdUbs;
    }

    private function setCdUbs($cdUbs) {
        $this->cdUbs = $cdUbs;
    }
}

?>