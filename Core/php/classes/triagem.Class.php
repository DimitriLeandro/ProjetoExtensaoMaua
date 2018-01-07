<?php

require_once 'ciclo.Class.php';

final class Triagem extends Ciclo {

    //atributos
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

    //métodos sobrepostos da classe Ciclo
    public function cadastrar() {
        /*
         * O insertna tabela de triagem dispara um gatilho no banco
         * Serve apenas para tirar o paciente da lista de espera
         * Código comentado no final deste arquivo
         */
        
        $this->setCdTriagem(null);
        $txt_insert = "INSERT INTO tb_triagem VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = $this->db_maua->prepare($txt_insert);
        $stmt->bind_param("iisssdddddddiisssissiii", $this->cdTriagem, $this->icFinalizada, $this->dsQueixa, $this->dtRegistro, $this->hrRegistro, $this->vlPressaoMin, $this->vlPressaoMax, $this->vlPulso, $this->vlTemperatura, $this->vlRespiracao, $this->vlSaturacao, $this->vlGlicemia, $this->vlNivelConsciencia, $this->vlEscalaDor, $this->icAlergia, $this->dsAlergia, $this->dsObservacao, $this->vlClassificacaoRisco, $this->dsLinhaCuidado, $this->dsOutrasCondicoes, $this->cdPaciente, $this->cdUbs, $this->cdUsuarioRegistro);

        //executando o statement
        if ($stmt->execute()) {
            //verificando se o statement deu certo
            $ok = 1;
            if ($stmt->affected_rows == 0) {
                $ok = 0;
            } else {
                $this->setCdTriagem($stmt->insert_id);
            }
        } else {
            $ok = 0;
        }

        $stmt->close();
        return $ok;
    }

    public function selecionar($id) {
        $stmt = $this->db_maua->prepare("SELECT * FROM tb_triagem WHERE cd_triagem = ?");
        if ($stmt) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->bind_result($this->attr[1], $this->attr[2], $this->attr[3], $this->attr[4], $this->attr[5], $this->attr[6], $this->attr[7], $this->attr[8], $this->attr[9], $this->attr[10], $this->attr[11], $this->attr[12], $this->attr[13], $this->attr[14], $this->attr[15], $this->attr[16], $this->attr[17], $this->attr[18], $this->attr[19], $this->attr[20], $this->attr[21], $this->attr[22], $this->attr[23]);
            //setando os atributos da classe
            while ($stmt->fetch()) {
                $this->setCdTriagem($this->attr[1]);
                $this->setIcFinalizada($this->attr[2]);
                $this->setDsQueixa($this->attr[3]);
                $this->setDtRegistro($this->attr[4]);
                $this->setHrRegistro($this->attr[5]);
                $this->setVlPressaoMin($this->attr[6]);
                $this->setVlPressaoMax($this->attr[7]);
                $this->setVlPulso($this->attr[8]);
                $this->setVlTemperatura($this->attr[9]);
                $this->setVlRespiracao($this->attr[10]);
                $this->setVlSaturacao($this->attr[11]);
                $this->setVlGlicemia($this->attr[12]);
                $this->setVlNivelConsciencia($this->attr[13]);
                $this->setVlEscalaDor($this->attr[14]);
                $this->setIcAlergia($this->attr[15]);
                $this->setDsAlergia($this->attr[16]);
                $this->setDsObservacao($this->attr[17]);
                $this->setVlClassificacaoRisco($this->attr[18]);
                $this->setDsLinhaCuidado($this->attr[19]);
                $this->setDsOutrasCondicoes($this->attr[20]);
                $this->setCdPaciente($this->attr[21]);
                $this->setCdUbs($this->attr[22]);
                $this->setCdUsuarioRegistro($this->attr[23]);
            }
            
            $stmt->close();
        }
    }

    public function atualizar($id) {
        //por enquanto não tem
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

/*
DELIMITER $$
CREATE TRIGGER tr_finalizar_espera AFTER INSERT ON tb_triagem
FOR EACH ROW
BEGIN
	UPDATE tb_espera SET ic_finalizada = 1 WHERE cd_paciente = new.cd_paciente;
END; $$
DELIMITER ;
*/
?>