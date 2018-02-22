<?php

final class Conexao {

    private $conn_link;

    function __construct() {
        $this->conn_link = new mysqli('localhost', 'root', 'root', 'db_maua');

        if ($this->conn_link->connect_error) {
            die("Falha na conexão: " . $this->conn_link->connect_error);
        }
        
        mysqli_set_charset($this->conn_link, "utf8");
    }

    function get_db_maua() {
        return $this->conn_link;
    }
    
}

?>