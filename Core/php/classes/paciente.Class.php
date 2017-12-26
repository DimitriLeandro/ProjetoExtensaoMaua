<?php

require_once 'ciclo.Class.php';

final class Paciente extends Ciclo {

    public function atualizar() {
        
    }

    public function cadastrar() {
        $concatenacao = "Data: " . $this->getData() . " Hora: " . $this->getHora();

        $stmt = $this->db_maua->prepare("INSERT INTO tb_teste (nm_teste) VALUES (?);");
        $stmt->bind_param("s", $concatenacao);

        //executando o statement
        if ($stmt->execute()) {
            //verificando se o statement deu certo
            $ok = 1;
            if ($stmt->affected_rows == 0) {
                $ok = 0;
            }
        } else {
            $ok = 0;
        }
        //encerrando a conexão com o banco e o statement
        $stmt->close();
        return $ok;
    }

    public function selecionar($id) {
        
    }

}
