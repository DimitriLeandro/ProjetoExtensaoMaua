<?php

require_once 'ciclo.Class.php';

class Espera extends Ciclo {

    private $cdEspera;
    private $icFinalizada;
    protected $cdPaciente;

    public function cadastrar() {
	/*
	  O INSERT NA TABELA ESPERA É FEITO COM PROCEDURE POIS UM PACIENTE NÃO PODE ESPERAR MAIS DE UMA VEZ AO MESMO TEMPO
	  A PROCEDURE VERIFICA SE UM PACIENTE JÁ ESTÁ ESPERANDO PARA SER ATENDIDO
	  SE JÁ ESTÁ NA FILA DE ESPERA, NÃO FAZ NADA
	  SENÃO, COLOCA O PACIENTE NA LISTA DE ESPERA
	  O SCRIPT DA PROCEDURE ESTÁ COMENTADO NO FINAL DESTE ARQUIVO
	 */

	//a procedure já coloca ic_finalizada = 0, data e hora
	$txt_insert = "CALL sp_insert_espera(?, ?, ?);";
	$stmt = $this->db_maua->prepare($txt_insert);
	$stmt->bind_param("iii", $this->cdPaciente, $this->cdUbs, $this->cdUsuarioRegistro);

	//executando o statement
	if ($stmt->execute()) {
	    //verificando se o statement deu certo
	    $ok = 1;
	    if ($stmt->affected_rows == 0) {
		$ok = 0;
	    } else {
		$this->setCdEspera($stmt->insert_id);
	    }
	} else {
	    $ok = 0;
	}

	$stmt->close();
	return $ok;
    }

    public function selecionar($id) {
	//essa função vai servir para pesquisar uma única linha da lista de espera, uma espécie de log do sistema
	//para retornar uma lista de espera completa que será usada na página visualizar_espera.php, é usado o método selecionarListaCompleta
	//infelizmente o php não tem sobrecarga na orientação a objetos, por isso são necessários dois métodos diferentes
	$stmt = $this->db_maua->prepare("SELECT * FROM tb_espera WHERE cd_espera = ?");
	if ($stmt) {
	    $stmt->bind_param('i', $id);
	    $stmt->execute();
	    $stmt->bind_result($this->attr[1], $this->attr[2], $this->attr[3], $this->attr[4], $this->attr[5], $this->attr[6], $this->attr[7]);
	    //setando os atributos da classe
	    while ($stmt->fetch()) {
		$this->setCdEspera($this->attr[1]);
		$this->setIcFinalizada($this->attr[2]);
		$this->setDtRegistro($this->attr[3]);
		$this->setHrRegistro($this->attr[4]);
		$this->setCdPaciente($this->attr[5]);
		$this->setCdUbs($this->attr[6]);
		$this->setCdUsuarioRegistro($this->attr[7]);
	    }

	    $stmt->close();
	}
    }

    public function atualizar($id) {
	$txt_update = "UPDATE tb_espera SET ic_finalizada = ?, dt_registro = ?, hr_registro = ?, cd_paciente = ?, cd_ubs = ?, cd_usuario_registro = ? WHERE cd_espera = ?;";
	$stmt = $this->db_maua->prepare($txt_update);
	$stmt->bind_param("issiiii", $this->icFinalizada, $this->dtRegistro, $this->hrRegistro, $this->cdPaciente, $this->cdUbs, $this->cdUsuarioRegistro, $id);

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

    public function selecionarListaCompleta() {
	//matriz que será o parâmetro de retorno
	$array_lista_espera = array();

	//preparando o select e executando o statement
	$select = 'SELECT tb_paciente.cd_paciente, tb_paciente.nm_paciente, tb_paciente.ic_sexo, tb_paciente.ic_raca, tb_paciente.dt_nascimento, tb_espera.dt_registro, tb_espera.hr_registro, tb_espera.cd_espera FROM tb_paciente, tb_espera WHERE tb_espera.cd_paciente = tb_paciente.cd_paciente AND tb_espera.ic_finalizada = 0 AND tb_espera.cd_ubs = ?;';
	$stmt = $this->db_maua->prepare($select);
	$stmt->bind_param("i", $this->cdUbs);
	if ($stmt->execute()) {
	    $stmt->bind_result($this->attr[0], $this->attr[1], $this->attr[2], $this->attr[3], $this->attr[4], $this->attr[5], $this->attr[6], $this->attr[7]);
	    while ($stmt->fetch()) {
		//vou mandar direto a idade do paciente, para isso, o método diff do php será usado para calcular as distancias entre a data atual e a data de nascimento do paciente
		$nascimento = new DateTime($this->attr[4]);
		$hoje = new DateTime(date("Y-m-d"));
		$diferenca = $hoje->diff($nascimento);

		//adicionando linhas à matriz
		$array_lista_espera[] = array(
		    'cd_paciente' => $this->attr[0],
		    'nm_paciente' => $this->attr[1],
		    'ic_sexo' => $this->attr[2],
		    'ic_raca' => $this->attr[3],
		    'vl_idade' => $diferenca->y,
		    'dt_registro' => $this->attr[5],
		    'hr_registro' => $this->attr[6],
		    'cd_espera' => $this->attr[7]
		);
	    }
	}

	$stmt->close();
	return $array_lista_espera;
    }

    //---------------------GET E SET-------------------------------
    public function getCdEspera() {
	return $this->cdEspera;
    }

    public function getIcFinalizada() {
	return $this->icFinalizada;
    }

    public function getCdPaciente() {
	return $this->cdPaciente;
    }

    public function setCdEspera($cdEspera) {
	$this->cdEspera = $cdEspera;
    }

    public function setIcFinalizada($icFinalizada) {
	$this->icFinalizada = $icFinalizada;
    }

    public function setCdPaciente($cdPaciente) {
	$this->cdPaciente = $cdPaciente;
    }

}

/*
  DELIMITER **
  CREATE PROCEDURE sp_insert_espera(IN paciente INT, IN ubs INT, IN usuario INT)
  BEGIN
  DECLARE qtd_esperas_ativas INT;
  DECLARE id INT; -- cd_espera

  SET qtd_esperas_ativas = (SELECT COUNT(cd_espera) FROM tb_espera WHERE cd_paciente = paciente AND ic_finalizada = 0);
  IF qtd_esperas_ativas = 0 THEN
  INSERT IGNORE INTO tb_espera values (null, 0, now(), now(), paciente, ubs, usuario);
  SET id = LAST_INSERT_ID();
  ELSE
  SET id = 0;
  END IF;
  -- select como retorno da stored procedure
  SELECT id;
  END; **
  DELIMITER ;
 */
?>