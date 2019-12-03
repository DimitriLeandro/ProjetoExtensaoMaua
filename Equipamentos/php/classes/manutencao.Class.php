<?php

require_once 'ciclo.Class.php';
require_once 'pedido.Class.php';

class Manutencao extends Ciclo {

	private $cdManutencao;
	private $dtManutencao;
	private $dtFinal;
	private $dsSolucao;
	private $nmFuncionario;
	private $cdPedido;
	

	public function cadastrar() {
		//chave primária deve ser nula
		$this->setCdManutencao(null);
		$txt_insert = "INSERT INTO tb_manutencao VALUES (?,?,?,?,?,?);";
		$stmt = $this->db_pumas_equipamento->prepare($txt_insert);
		$stmt->bind_param("issssi", $this->cdManutencao, $this->dtManutencao, $this->dtFinal, $this->dsSolucao, $this->nmFuncionario, $this->cdPedido);

		// echo("<br/>".$this->cdManutencao);
		// echo("<br/>".$this->dtManutencao);
		// echo("<br/>".$this->dtFinal);
		// echo("<br/>".$this->dsSolucao);
		// echo("<br/>".$this->nmFuncionario);
		// echo("<br/>".$this->cdPedido);
		// echo("<br/><br/><br/><br/>");

		//executando o statement
		if ($stmt->execute()) {
			//verificando se o statement deu certo
			$ok = 1;
			if ($stmt->affected_rows == 0) {
				$ok = 0;
			} else {
				// SE CHEGOU AQUI, ENTAO O CADASTRO DEU CERTO. AGORA TENHO QUE TIRAR O BICHO DA LISTA DE MANUTANCAO
				$objPedido = new Pedido();
				$ok = $objPedido->removerDaListaDeManutencao($this->cdPedido);

				// PEGANDO O CODIGO DA MANUTENCAO QUE FOI GERADO PELO AUTO INCREMENT
				$this->setCdManutencao($stmt->insert_id);
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
		$stmt = $this->db_pumas_equipamento->prepare("SELECT * FROM tb_manutencao WHERE cd_manutencao = ?");
		if ($stmt) {
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($this->attr[1], $this->attr[2], $this->attr[3], $this->attr[4], $this->attr[5], $this->attr[6], $this->attr[7]);
			//setando os atributos da classe
			while ($stmt->fetch()) {
			$this->setCdManutencao($this->attr[1]);
			$this->setDtManutencao($this->attr[2]);
			$this->setDtFinal($this->attr[3]);
			$this->setNmFuncionario($this->attr[4]);
			$this->setDsSolucao($this->attr[5]);
			$this->setCdPedido($this->attr[6]);
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

	//---------------------GET E SET-------------------------------
	public function getCdManutencao() {
	return $this->cdManutencao;
	}
	public function getDtManutencao() {
	return $this->dtManutencao;
	}
	public function getDtFinal() {
	return $this->dtFinal;
	}
	public function getNmFuncionario() {
	return $this->nmFuncionario;
	}
	public function getDsSolucao() {
	return $this->dsSolucao;
	}
	public function getCdPedido() {
	return $this->cdPedido;
	}
	

	public function setCdManutencao($cdManutencao) {
	$this->cdManutencao = $cdManutencao;
	}
	public function setDtManutencao($dtManutencao) {
	$this->dtManutencao = $dtManutencao;
	}
	public function setDtFinal($dtFinal) {
	$this->dtFinal = $dtFinal;
	}
	public function setDsSolucao($dsSolucao) {
	$this->dsSolucao = $dsSolucao;
	}
	public function setNmFuncionario($nmFuncionario) {
	$this->nmFuncionario = $nmFuncionario;
	}
	public function setCdPedido($cdPedido) {
	$this->cdPedido = $cdPedido;
	}

}

?>