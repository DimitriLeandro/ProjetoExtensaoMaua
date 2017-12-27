<?php

require_once 'ciclo.Class.php';

final class Triagem extends Ciclo {

    private $cdTriagem;
    private $icFinalizada;
    private $dsQueixa;
    private $vlPressaoMin;
    private $vlPressaoMax;
    private $vlPulso;
    private $vlTemperatura;
    private $vlRespiracao;
    private $vlSaturacao;
    private $vlGlicemia;
    private $vlNivelConsciencia;
    private $vlEscalaDor;
    private $icAlergia;
    private $dsAlergia;
    private $dsObservacao;
    private $vlClassificacaoRisco;
    private $dsLinhaCuidado;
    private $dsOutrasCondicoes;
    private $cdPaciente;

    public function cadastrar() {
        
    }

    public function selecionar($id) {
        
    }

    public function atualizar() {
        
    }

    //----------------------------------------  get e set
    function getCdTriagem() {
        return $this->cdTriagem;
    }

    function getIcFinalizada() {
        return $this->icFinalizada;
    }

    function getDsQueixa() {
        return $this->dsQueixa;
    }

    function getVlPressaoMin() {
        return $this->vlPressaoMin;
    }

    function getVlPressaoMax() {
        return $this->vlPressaoMax;
    }

    function getVlPulso() {
        return $this->vlPulso;
    }

    function getVlTemperatura() {
        return $this->vlTemperatura;
    }

    function getVlRespiracao() {
        return $this->vlRespiracao;
    }

    function getVlSaturacao() {
        return $this->vlSaturacao;
    }

    function getVlGlicemia() {
        return $this->vlGlicemia;
    }

    function getVlNivelConsciencia() {
        return $this->vlNivelConsciencia;
    }

    function getVlEscalaDor() {
        return $this->vlEscalaDor;
    }

    function getIcAlergia() {
        return $this->icAlergia;
    }

    function getDsAlergia() {
        return $this->dsAlergia;
    }

    function getDsObservacao() {
        return $this->dsObservacao;
    }

    function getVlClassificacaoRisco() {
        return $this->vlClassificacaoRisco;
    }

    function getDsLinhaCuidado() {
        return $this->dsLinhaCuidado;
    }

    function getDsOutrasCondicoes() {
        return $this->dsOutrasCondicoes;
    }

    function getCdPaciente() {
        return $this->cdPaciente;
    }

    function setCdTriagem($cdTriagem) {
        $this->cdTriagem = $cdTriagem;
    }

    function setIcFinalizada($icFinalizada) {
        $this->icFinalizada = $icFinalizada;
    }

    function setDsQueixa($dsQueixa) {
        $this->dsQueixa = $dsQueixa;
    }

    function setVlPressaoMin($vlPressaoMin) {
        $this->vlPressaoMin = $vlPressaoMin;
    }

    function setVlPressaoMax($vlPressaoMax) {
        $this->vlPressaoMax = $vlPressaoMax;
    }

    function setVlPulso($vlPulso) {
        $this->vlPulso = $vlPulso;
    }

    function setVlTemperatura($vlTemperatura) {
        $this->vlTemperatura = $vlTemperatura;
    }

    function setVlRespiracao($vlRespiracao) {
        $this->vlRespiracao = $vlRespiracao;
    }

    function setVlSaturacao($vlSaturacao) {
        $this->vlSaturacao = $vlSaturacao;
    }

    function setVlGlicemia($vlGlicemia) {
        $this->vlGlicemia = $vlGlicemia;
    }

    function setVlNivelConsciencia($vlNivelConsciencia) {
        $this->vlNivelConsciencia = $vlNivelConsciencia;
    }

    function setVlEscalaDor($vlEscalaDor) {
        $this->vlEscalaDor = $vlEscalaDor;
    }

    function setIcAlergia($icAlergia) {
        $this->icAlergia = $icAlergia;
    }

    function setDsAlergia($dsAlergia) {
        $this->dsAlergia = $dsAlergia;
    }

    function setDsObservacao($dsObservacao) {
        $this->dsObservacao = $dsObservacao;
    }

    function setVlClassificacaoRisco($vlClassificacaoRisco) {
        $this->vlClassificacaoRisco = $vlClassificacaoRisco;
    }

    function setDsLinhaCuidado($dsLinhaCuidado) {
        $this->dsLinhaCuidado = $dsLinhaCuidado;
    }

    function setDsOutrasCondicoes($dsOutrasCondicoes) {
        $this->dsOutrasCondicoes = $dsOutrasCondicoes;
    }

    function setCdPaciente($cdPaciente) {
        $this->cdPaciente = $cdPaciente;
    }

}
