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
        //O INSERT NA TABELA DIAGNOSTICO É FEITO ATRAVÉS DE PROCEDURE
        //O CÓDIGO DA PROCEDURE ESTÁ COMENTADO LA EM BAIXO NO FINAL DESSE ARQUIVO

        $this->setCdDiagnostico(null);
        $stmt = $this->db_maua->prepare("CALL sp_insert_diagnostico (?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("issssii", $this->cdUbs, $this->dsAvaliacao, $this->cdCid, $this->dsPrescricao, $this->icSituacao, $this->cdUsuarioRegistro, $this->cdTriagem);

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

/* ------------------------SCRIPT DA PROCEDURE DE INSERT---------------
  DELIMITER //
  --	ESSA PROCEDURE FAZ O INSERT NA TABELA DE DIAGNOSTICO
  --	UMA TRIAGEM SÓ PODE TER UM DIAGNOSTICO, ESSA PROCEDURE VERIFICA SE JÁ HÁ ALGUM DIAGNOSTICO PARA UMA TRIAGEM ESPECIFICA ANTES DE FAZER O INSERT
  --	CASO JÁ EXISTA, A PROCEDURE NÃO FARÁ O INSERT
  --  ESSE PROCEDIMENTO NÃO ODE SER FEITO COM TRIGGER POIS UM TRIGGER NÃO PODE FAZER INSERT/UPDATE/DELETE NA MESMA TABELA QUE DISPARA O TRIGGER
  --  OS PARAMETROS DE DATA E HORA NÃO PRECISAM SER ENVIADOS PARA ESSA PROCEDURE POIS O MYSQL PODE PEGAR ESSES VALORES SOZINHO COM O COMANDO "NOW()"

  --  tb_triagem:1::1:tb_diagnostico, apesar de usar uma chave estrangeira, é uma relação 1 para 1

  --  ESSA PROCEDURE RETORNA O PARAMETRO "id" QUE É O ID DO DIAGNOSTICO INSERIDO, OU 0 CASO O INSERT NÃO SEJA EXECUTADO

  CREATE PROCEDURE sp_insert_diagnostico(IN ubs INT, IN avaliacao TEXT, IN cid VARCHAR(30), IN prescricao TEXT, IN situacao VARCHAR(40), IN usuario_registro INT(11), IN triagem INT(11))
  BEGIN
  -- USANDO UMA VARIAVEL PARA SABER A QUANTIDADE DE DIAGNOSTICOS QUE A TRIAGEM EM QUESTÃO TEM
  DECLARE id INT;
  DECLARE qtd INT;
  SET qtd = (SELECT COUNT(cd_diagnostico) FROM tb_diagnostico WHERE cd_triagem = triagem);
  -- SE FOR 0, OK, PODE FAZER O INSERT, SENÃO, ALGO ESTÁ ERRADO, POIS UMA TRIAGEM NÃO PODE TER MAIS DE UM DIAGNOSTICO
  IF qtd = 0 THEN
  INSERT IGNORE INTO tb_diagnostico (cd_ubs, ds_avaliacao, cd_cid, ds_prescricao, dt_registro, hr_registro, ic_situacao, cd_usuario_registro, cd_triagem) VALUES
  (ubs, avaliacao, cid, prescricao, now(), now(), situacao, usuario_registro, triagem);
  SET id = LAST_INSERT_ID();
  ELSE
  SET id = 0;
  END IF;
  -- AGORA É NECESSÁRIO VERIFICAR SE HOUVE INSERT, CASO SIM, ENTÃO A TRIAGEM DEVE SER FINALIZADA.
  IF id != 0 THEN
  UPDATE tb_triagem SET ic_finalizada = 1 WHERE cd_triagem = triagem;
  END IF;
  -- FAZENDO O SELECT PARA SER O RETORNO DO PROCEDIMENTO
  SELECT id;
  END //
  DELIMITER ;
 */
?>