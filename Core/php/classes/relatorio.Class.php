<?php

require_once 'conexao.Class.php';

final class Relatorio {

    private $db_maua;

    public function __construct() {
        //fazendo a conexão com o banco
        $obj_conn = new Conexao();
        $this->db_maua = $obj_conn->get_db_maua();
    }

    public function totalAtendimentos($data1, $data2) {
        $total = null;
        $select = "select count(cd_triagem) as 'totalTriagens' 
                    from tb_triagem 
                        where dt_registro between ? and ?";

        $stmt = $this->db_maua->prepare($select);
        if ($stmt) {
            $stmt->bind_param("ss", $data1, $data2);
            $stmt->execute();
            $stmt->bind_result($qtd);
            while ($stmt->fetch()) {
                $total = $qtd;
            }
            $stmt->close();
        }

        return $total;
    }

    public function totalAtendimentosPorSexo($data1, $data2) {
        $array_sexo = array();
        $select = "select
                    (select count(tb_paciente.cd_paciente) 
                            from tb_paciente, tb_triagem 
                                    where tb_paciente.cd_paciente = tb_triagem.cd_paciente
                                            and ic_sexo = 'Masculino'
                                and tb_triagem.dt_registro between ? and ?) as 'Masculino',
                    (select count(tb_paciente.cd_paciente) 
                            from tb_paciente, tb_triagem 
                                    where tb_paciente.cd_paciente = tb_triagem.cd_paciente
                                            and ic_sexo = 'Feminino'
                                and tb_triagem.dt_registro between ? and ?) as 'Feminino'";
        $stmt = $this->db_maua->prepare($select);
        if ($stmt) {
            $stmt->bind_param("ssss", $data1, $data2, $data1, $data2);
            $stmt->execute();
            $stmt->bind_result($masc, $fem);
            while ($stmt->fetch()) {
                $array_sexo["Masculino"] = $masc;
                $array_sexo["Feminino"] = $fem;
            }
        }

        return $array_sexo;
    }

    public function totalAtendimentosPorIdade($data1, $data2) {
        $array_idades = array();
        $select = "select
                    (select count(tb_paciente.cd_paciente) 
                    from tb_paciente, tb_triagem 
                            where tb_paciente.cd_paciente = tb_triagem.cd_paciente
                        and tb_triagem.dt_registro between ? and ?
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 0
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 3) AS '0 - 2 anos',
                    (select count(tb_paciente.cd_paciente) 
                    from tb_paciente, tb_triagem 
                            where tb_paciente.cd_paciente = tb_triagem.cd_paciente
                        and tb_triagem.dt_registro between ? and ?
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 3
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 6) AS '3 - 5 anos',
                    (select count(tb_paciente.cd_paciente) 
                    from tb_paciente, tb_triagem 
                            where tb_paciente.cd_paciente = tb_triagem.cd_paciente
                        and tb_triagem.dt_registro between ? and ?
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 6
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 14) AS '6 - 13 anos',
                    (select count(tb_paciente.cd_paciente) 
                    from tb_paciente, tb_triagem 
                            where tb_paciente.cd_paciente = tb_triagem.cd_paciente
                        and tb_triagem.dt_registro between ? and ?
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 14
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 19) AS '14 - 18 anos',
                    (select count(tb_paciente.cd_paciente) 
                    from tb_paciente, tb_triagem 
                            where tb_paciente.cd_paciente = tb_triagem.cd_paciente
                        and tb_triagem.dt_registro between ? and ?
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 19
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 41) AS '19 - 40 anos',
                    (select count(tb_paciente.cd_paciente) 
                    from tb_paciente, tb_triagem 
                            where tb_paciente.cd_paciente = tb_triagem.cd_paciente
                        and tb_triagem.dt_registro between ? and ?
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 41
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 60) AS '41 - 60 anos',
                    (select count(tb_paciente.cd_paciente)
                    from tb_paciente, tb_triagem 
                            where tb_paciente.cd_paciente = tb_triagem.cd_paciente
                        and tb_triagem.dt_registro between ? and ?
                        and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 60) AS '60+'";
        $stmt = $this->db_maua->prepare($select);
        if ($stmt) {
            $stmt->bind_param("ssssssssssssss", $data1, $data2, $data1, $data2, $data1, $data2, $data1, $data2, $data1, $data2, $data1, $data2, $data1, $data2);
            $stmt->execute();
            $stmt->bind_result($zerodois, $trescinco, $seistreze, $quatorzedezoito, $dezenovequarenta, $quarentaeumsessenta, $sessentamais);
            while ($stmt->fetch()) {
                $array_idades["zerodois"] = $zerodois;
                $array_idades["trescinco"] = $trescinco;
                $array_idades["seistreze"] = $seistreze;
                $array_idades["quatorzedezoito"] = $quatorzedezoito;
                $array_idades["dezenovequarenta"] = $dezenovequarenta;
                $array_idades["quarentaeumsessenta"] = $quarentaeumsessenta;
                $array_idades["sessentamais"] = $sessentamais;
            }
        }

        return $array_idades;
    }

    public function queixasRecorrentes($data1, $data2) {
        $matriz_queixas = null;
        $select = "select ds_queixa, count(cd_triagem) 
                    from tb_triagem 
                        where dt_registro between ? and ? 
                            group by ds_queixa 
				order by count(cd_triagem) desc, ds_queixa";

        $stmt = $this->db_maua->prepare($select);
        if ($stmt) {
            $stmt->bind_param("ss", $data1, $data2);
            $stmt->execute();
            $stmt->bind_result($queixa, $qtd);
            $cont = 0;
            while ($stmt->fetch()) {
                $matriz_queixas[$cont]["Queixa"] = $queixa;
                $matriz_queixas[$cont]["Qtd"] = $qtd;
                $cont ++;
            }
            $stmt->close();
        }

        return $matriz_queixas; //retorna o array e depois é só dar um foreach 
    }

    public function pacientesForaUBSReferencia($data1, $data2) {
        
    }

}

?>