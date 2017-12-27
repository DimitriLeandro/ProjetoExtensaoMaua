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
        
    }

    public function selecionar($id) {
        
    }

    public function atualizar() {
        
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
