<?php

require_once 'ciclo.Class.php';

class Pedido extends Ciclo {

    private $cd_pedido;
	private $cd_equipamento;
	private $nm_solicitante;
	private $ds_problema;
    private $ic_processo;
    

    public function cadastrar() {
		//chave primária deve ser nula
		$this->setCdPedido(null);
		$txt_insert = "INSERT INTO tb_pedido VALUES (?,?,?,?,?,?,?);";
		$stmt = $this->db_pumas_equipamento->prepare($txt_insert);
		$stmt->bind_param("issssii", $this->cdPedido, $this->dtRegistro, $this->hrRegistro, $this->nmSolicitante, $this->dsProblema, $this->icProcesso, $this->cdEquipamento);

		//executando o statement
		if ($stmt->execute()) {
		    //verificando se o statement deu certo
		    $ok = 1;
		    if ($stmt->affected_rows == 0) {
			$ok = 0;
		    } else {
			$this->setCdPedido($stmt->insert_id);
		    }
		} else {
		    $ok = 0;
		}

		$stmt->close();
		return 1;
    }

    public function selecionar($id) {
		//essa função vai servir para pesquisar uma única linha da lista de espera, uma espécie de log do sistema
		//para retornar uma lista de espera completa que será usada na página visualizar_espera.php, é usado o método selecionarListaCompleta
		//infelizmente o php não tem sobrecarga na orientação a objetos, por isso são necessários dois métodos diferentes
		$stmt = $this->db_pumas_equipamento->prepare("SELECT * FROM tb_pedido WHERE cd_pedido = ?");
		if ($stmt) {
		    $stmt->bind_param('i', $id);
		    $stmt->execute();
		    $stmt->bind_result($this->attr[1], $this->attr[2], $this->attr[3], $this->attr[4], $this->attr[5], $this->attr[6], $this->attr[7]);
		    //setando os atributos da classe
		    while ($stmt->fetch()) {
			$this->setCdPedido($this->attr[1]);
			$this->setDtRegistro($this->attr[2]);
			$this->setHrRegistro($this->attr[3]);
			$this->setNmSolicitante($this->attr[4]);
			$this->setDsProblema($this->attr[5]);
			$this->setIcProcesso($this->attr[6]);
			$this->setCdEquipamento($this->attr[7]);
		    }

		    $stmt->close();
		}
    }

    public function atualizar($id) {
		$txt_update = "UPDATE tb_pedido SET cd_equipamento = ?, dt_pedido = ?, hr_pedido = ?, nm_solicitante = ?, ds_problema = ?, ic_processo = ? WHERE cd_pedido = ?;";
		$stmt = $this->db_pumas_equipamento->prepare($txt_update);
		$stmt->bind_param("issssii", $this->cdEquipamento, $this->dtPedido, $this->hrPedido, $this->nmSolicitante, $this->dsProblema, $this->icProcesso, $id);

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

    public function selecionarListaManutencao($limite) {
		//matriz que será o parâmetro de retorno
		$array_lista_manutencao = array();

		//preparando o select e executando o statement
		$select = 'SELECT e.cd_equipamento, e.ds_equipamento, e.cd_patrimonio, e.nm_modelo, e.nm_fabricante, p.dt_pedido, p.hr_pedido, p.cd_pedido FROM tb_equipamento e, tb_pedido p WHERE e.cd_equipamento = p.cd_equipamento AND p.ic_processo = 1 ';
		$stmt = $this->db_pumas_equipamento->prepare($select);
		
		//$stmt->bind_param('i', $limite);
		if ($stmt->execute()) {
		    $stmt->bind_result($this->attr[0], $this->attr[1], $this->attr[2], $this->attr[3], $this->attr[4], $this->attr[5], $this->attr[6], $this->attr[7]);
		    while ($stmt->fetch()) {
				
			//vou mandar direto a idade do paciente, para isso, o método diff do php será usado para calcular as distancias entre a data atual e a data de nascimento do paciente
			//$dtPedido = new DateTime($this->attr[5]);
			//$hoje = new DateTime(date("Y-m-d"));
			//$diferenca = $hoje->diff($dtPedido);
			
			//adicionando linhas à matriz
			$array_lista_manutencao[] = array(
			    'cd_equipamento' => $this->attr[0],
			    'ds_equipamento' => $this->attr[1],
			    'cd_patrimonio' => $this->attr[2],
			    'nm_modelo' => $this->attr[3],
			    'nm_fabricante' => $this->attr[4],
			    'dt_pedido' => $this->attr[5],
				'hr_pedido' => $this->attr[6],
			    'cd_pedido' => $this->attr[7]
			);
			
		    }
			
		}

		$stmt->close();
		
		return $array_lista_manutencao;
    }

    public function removerDaListaDeManutencao($cdPedido){
    	// echo "REMOVENDO O PEDIDO DA LISTA DE MANUTENÇÃO";
    	// echo $cdPedido;

    	$txt_update = "UPDATE tb_pedido SET ic_processo = 0 WHERE cd_pedido = ?;";
		$stmt = $this->db_pumas_equipamento->prepare($txt_update);
		$stmt->bind_param("i", $cdPedido);

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

    //---------------------GET E SET-------------------------------
    public function getCdPedido() {
	return $this->cdPedido;
    }
	public function getCdEquipamento() {
	return $this->cdEquipamento;
    }
	public function getNmSolicitante() {
	return $this->nmSolicitante;
    }
    public function getDsProblema() {
	return $this->dsProblema;
    }
    public function getIcProcesso() {
	return $this->icProcesso;
    }

    public function setCdPedido($cdPedido) {
	$this->cdPedido = $cdPedido;
    }
    public function setCdEquipamento($cdEquipamento) {
	$this->cdEquipamento = $cdEquipamento;
    }
    public function setNmSolicitante($nmSolicitante) {
	$this->nmSolicitante = $nmSolicitante;
    }
    public function setDsProblema($dsProblema) {
	$this->dsProblema = $dsProblema;
    }
    public function setIcProcesso($icProcesso) {
	$this->icProcesso = $icProcesso;
    }

}

?>