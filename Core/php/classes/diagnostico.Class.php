<?php

require_once 'ciclo.Class.php';

final class Diagnostico extends Ciclo {

    private $cdDiagnostico;
    private $dsAvaliacao;
    private $cdCid;
    private $dsPrescricao;
    private $icSituacao;
    private $cdTriagem;

    public function cadastrar() {
        $this->setCdDiagnostico(null);
        $txt_insert = "INSERT INTO tb_diagnostico VALUES (?,?,?,?,?,?,?,?,?,?);";
        $stmt = $this->db_maua->prepare($txt_insert);
        $stmt->bind_param("issssssiii", $this->cdDiagnostico, $this->dsAvaliacao, $this->cdCid, $this->dsPrescricao, $this->dtRegistro, $this->hrRegistro, $this->icSituacao, $this->cdUbs, $this->cdUsuarioRegistro, $this->cdTriagem);

        //executando o statement
        if ($stmt->execute()) {
            //verificando se o statement deu certo
            $ok = 1;
            if ($stmt->affected_rows == 0) {
                $ok = 0;
            } else {
                $this->setCdDiagnostico($stmt->insert_id);
            }
        } else {
            $ok = 0;
        }

        $stmt->close();
        return $ok;
    }

    public function selecionar($id) {
        $stmt = $this->db_maua->prepare("SELECT * FROM tb_diagnostico WHERE cd_diagnostico = ?");
        if ($stmt) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->bind_result($this->attr[1], $this->attr[2], $this->attr[3], $this->attr[4], $this->attr[5], $this->attr[6], $this->attr[7], $this->attr[8], $this->attr[9], $this->attr[10]);
            //setando os atributos da classe
            while ($stmt->fetch()) {
                $this->setCdDiagnostico($this->attr[1]);
                $this->setDsAvaliacao($this->attr[2]);
                $this->setCdCid($this->attr[3]);
                $this->setDsPrescricao($this->attr[4]);
                $this->setDtRegistro($this->attr[5]);
                $this->setHrRegistro($this->attr[6]);
                $this->setIcSituacao($this->attr[7]);
                $this->setCdUbs($this->attr[8]);
                $this->setCdUsuarioRegistro($this->attr[9]);
                $this->setCdTriagem($this->attr[10]);
            }
            
            $stmt->close();
        }
    }

    public function atualizar($id) {
        //n tem
    }

    //-----------------------------------get e set
    function getCdDiagnostico() {
        return $this->cdDiagnostico;
    }

    function getDsAvaliacao() {
        return $this->dsAvaliacao;
    }

    function getCdCid() {
        return $this->cdCid;
    }

    function getDsPrescricao() {
        return $this->dsPrescricao;
    }

    function getIcSituacao() {
        return $this->icSituacao;
    }

    function getCdTriagem() {
        return $this->cdTriagem;
    }

    function setCdDiagnostico($cdDiagnostico) {
        $this->cdDiagnostico = $cdDiagnostico;
    }

    function setDsAvaliacao($dsAvaliacao) {
        $this->dsAvaliacao = $dsAvaliacao;
    }

    function setCdCid($cdCid) {
        $this->cdCid = $cdCid;
    }

    function setDsPrescricao($dsPrescricao) {
        $this->dsPrescricao = $dsPrescricao;
    }

    function setIcSituacao($icSituacao) {
        $this->icSituacao = $icSituacao;
    }

    function setCdTriagem($cdTriagem) {
        $this->cdTriagem = $cdTriagem;
    }

}
