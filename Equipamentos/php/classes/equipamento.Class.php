<?php

require_once 'ciclo.Class.php';

final class Equipamento extends Ciclo{

    private $cdEquipamento;
    private $dsEquipamento;
    private $cdPatrimonio;
    private $nmModelo;
    private $nmFabricante;
    private $nmMarca;
    private $nmSetor;
    private $nmSala;
    private $icPosse;
    private $cdFiscal;
    private $vlEquipamento;
    private $dtInstalacao;
    private $dtGarantia;
    private $icManutencao;
    private $cdPrestador;
    private $icTensao;
    private $vlPotencia;
    private $icOperacao;
    private $icTecnico;
    private $dsInsumo;
    private $dsObs;
	private $icDelete;
	

    //-----------------FUNÇÕES SOBREPOSTAS
    public function cadastrar() {
	//como o insert vai ser implicito, a chave primária deve ser nula
	$this->setCdEquipamento(null);
	//preparando o comando de insert
	$txt_insert = "INSERT INTO tb_equipamento VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	//preparando o statement para o insert
	$stmt = $this->db_pumas_equipamento->prepare($txt_insert);
	//passando os valores. Aqui, a melhor forma seria usar os métodos get, mas o comando bind_param só aceita variáveis
	$stmt->bind_param("isssssssssdsssssdssssi", $this->cdEquipamento, $this->dsEquipamento, $this->cdPatrimonio, $this->nmModelo, $this->nmFabricante, $this->nmMarca, $this->nmSetor, $this->nmSala, $this->icPosse, $this->cdFiscal, $this->vlEquipamento, $this->dtInstalacao, $this->dtGarantia, $this->icManutencao, $this->cdPrestador, $this->icTensao, $this->vlPotencia, $this->icOperacao, $this->icTecnico, $this->dsInsumo, $this->dsObs, $this->icDelete);

	//executando o statement
	if ($stmt->execute()) {
	    //verificando se o statement deu certo
	    $ok = 1;
	    if ($stmt->affected_rows == 0) {
			$ok = 0;
	    } else {
			//se deu certo, já falo quem é a chave primária
			$this->setCdEquipamento($stmt->insert_id);
	    }
	} else {
	    $ok = 0;
	}

	$stmt->close();
	return $ok;
    }

    public function selecionar($id) {
	$stmt = $this->db_pumas_equipamento->prepare("SELECT * FROM tb_equipamento WHERE cd_equipamento = ?");
	if ($stmt) {
	    $stmt->bind_param('i', $id);
	    $stmt->execute();
	    $stmt->bind_result($this->attr[1], $this->attr[2], $this->attr[3], $this->attr[4], $this->attr[5], $this->attr[6], $this->attr[7], $this->attr[8], $this->attr[9], $this->attr[10], $this->attr[11], $this->attr[12], $this->attr[13], $this->attr[14], $this->attr[15], $this->attr[16], $this->attr[17], $this->attr[18], $this->attr[19], $this->attr[20], $this->attr[21], $this->attr[22]);
	    //setando os atributos da classe
	    while ($stmt->fetch()) {
		$this->setCdEquipamento($this->attr[1]);
		$this->setDsEquipamento($this->attr[2]);
		$this->setCdPatrimonio($this->attr[3]);
		$this->setNmModelo($this->attr[4]);
		$this->setNmFabricante($this->attr[5]);
		$this->setNmMarca($this->attr[6]);
		$this->setNmSetor($this->attr[7]);
		$this->setNmSala($this->attr[8]);
		$this->setIcPosse($this->attr[9]);
		$this->setCdFiscal($this->attr[10]);
		$this->setVlEquipamento($this->attr[11]);
		$this->setDtInstalacao($this->attr[12]);
		$this->setDtGarantia($this->attr[13]);
		$this->setIcManutencao($this->attr[14]);
		$this->setCdPrestador($this->attr[15]);
		$this->setIcTensao($this->attr[16]);
		$this->setVlPotencia($this->attr[17]);
		$this->setIcOperacao($this->attr[18]);
		$this->setIcTecnico($this->attr[19]);
		$this->setDsInsumo($this->attr[20]);
		$this->setDsObs($this->attr[21]);
		$this->setIcDelete($this->attr[22]);
	    }

	    $stmt->close();
	}
    }

    public function atualizar($id) {
	//para fazer o update, primeiro é necessário selecionar_paciente(), depois, mudar os campos que você quer atualizar com os métodos de set "set_nm_paciente('Exemplo');" e só depois atualizar_paciente(), pois essa função faz update em TODOS os campos.
	$txt_update = "UPDATE tb_equipamento SET ds_equipamento = ?, cd_patrimonio = ?,	nm_modelo = ?, nm_fabricante = ?, nm_marca = ?, nm_setor = ?, nm_sala = ?, ic_posse = ?, cd_fiscal = ?, vl_equipamento = ?, dt_instalacao = ?, dt_garantia = ?, ic_manutencao = ?, cd_prestador = ?, ic_tensao = ?, vl_potencia = ?, ic_operacao = ?, ic_tecnico = ?, ds_insumo = ?, ds_obs = ? WHERE cd_equipamento = ?";
	
	$stmt = $this->db_pumas_equipamento->prepare($txt_update);
	$stmt->bind_param("sssssssssdsssssdssssi", 	
		$this->dsEquipamento,
		$this->cdPatrimonio,
		$this->nmModelo,
		$this->nmFabricante,
		$this->nmMarca,
		$this->nmSetor,
		$this->nmSala,
		$this->icPosse,
		$this->cdFiscal,
		$this->vlEquipamento,
		$this->dtInstalacao,
		$this->dtGarantia,
		$this->icManutencao,
		$this->cdPrestador,
		$this->icTensao,
		$this->vlPotencia,
		$this->icOperacao,
		$this->icTecnico,
		$this->dsInsumo,
		$this->dsObs,	
		$id
	);

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
	
	public function deletar($id) {
	//para fazer o update, primeiro é necessário selecionar_paciente(), depois, mudar os campos que você quer atualizar com os métodos de set "set_nm_paciente('Exemplo');" e só depois atualizar_paciente(), pois essa função faz update em TODOS os campos.
	$txt_update = "UPDATE tb_equipamento SET ic_delete = ? WHERE cd_equipamento = ?";
	
	$stmt = $this->db_pumas_equipamento->prepare($txt_update);
	$stmt->bind_param("di", 	
		$this->icDelete,
		$id
	);

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

	public function getAllPatrimonios() {
		//fução para pegar todos os patrimonios. Quem usa essa função é a página pesquisar_paciente.php para preencher o autocomplete
		$array_patrimonios = array();
		$select = "SELECT cd_patrimonio FROM tb_equipamento WHERE cd_equipamento > 0 ORDER BY cd_patrimonio;";
		$stmt = $this->db_pumas_equipamento->prepare($select);
		if ($stmt) {
			$stmt->execute();
			$stmt->bind_result($codPatrimonio);
			while ($stmt->fetch()) {
				$array_patrimonios[] = $codPatrimonio;
			}
			$stmt->close();
		}

		return $array_patrimonios;
    }

    //------------------GET E SET
    public function getCdEquipamento() {
	return $this->cdEquipamento;
    }

    public function getDsEquipamento() {
	return $this->dsEquipamento;
    }

    public function getCdPatrimonio() {
	return $this->cdPatrimonio;
    }

    public function getNmModelo() {
	return $this->nmModelo;
    }

    public function getNmFabricante() {
	return $this->nmFabricante;
    }

    public function getNmMarca() {
	return $this->nmMarca;
    }

    public function getNmSetor() {
	return $this->nmSetor;
    }

    public function getNmSala() {
	return $this->nmSala;
    }

    public function getIcPosse() {
	return $this->icPosse;
    }

    public function getCdFiscal() {
	return $this->cdFiscal;
    }

    public function getVlEquipamento() {
	return $this->vlEquipamento;
    }

    public function getDtInstalacao() {
	return $this->dtInstalacao;
    }

    public function getDtGarantia() {
	return $this->dtGarantia;
    }

    public function getIcManutencao() {
	return $this->icManutencao;
    }

    public function getCdPrestador() {
	return $this->cdPrestador;
    }

    public function getIcTensao() {
	return $this->icTensao;
    }
	
    public function getVlPotencia() {
	return $this->vlPotencia;
    }

    public function getIcOperacao() {
	return $this->icOperacao;
    }

    public function getIcTecnico() {
	return $this->icTecnico;
    }

    public function getDsInsumo() {
	return $this->dsInsumo;
    }

    public function getDsObs() {
	return $this->dsObs;
    }
	
	public function getIcDelete() {
	return $this->icDelete;
    }
	

    public function setCdEquipamento($cdEquipamento) {
	if ($cdEquipamento == '') {
	    $cdEquipamento = NULL;
	}
	$this->cdEquipamento = $cdEquipamento;
    }

    public function setDsEquipamento($dsEquipamento) {
	if ($dsEquipamento == '') {
	    $dsEquipamento = NULL;
	}
	$this->dsEquipamento = $dsEquipamento;
    }

    public function setCdPatrimonio($cdPatrimonio) {
	if ($cdPatrimonio == '') {
	    $cdPatrimonio = NULL;
	}
	$this->cdPatrimonio = $cdPatrimonio;
    }

    public function setNmModelo($nmModelo) {
	if ($nmModelo == '') {
	    $nmModelo = NULL;
	}
	$this->nmModelo = $nmModelo;
    }

    public function setNmFabricante($nmFabricante) {
	if ($nmFabricante == '') {
	    $nmFabricante = NULL;
	}
	$this->nmFabricante = $nmFabricante;
    }

    public function setNmMarca($nmMarca) {
	if ($nmMarca == '') {
	    $nmMarca = NULL;
	}
	$this->nmMarca = $nmMarca;
    }

    public function setNmSetor($nmSetor) {
	if ($nmSetor == '') {
	    $nmSetor = NULL;
	}
	$this->nmSetor = $nmSetor;
    }

    public function setNmSala($nmSala) {
	if ($nmSala == '') {
	    $nmSala = NULL;
	}
	$this->nmSala = $nmSala;
    }

    public function setIcPosse($icPosse) {
	if ($icPosse == '') {
	    $icPosse = NULL;
	}
	$this->icPosse = $icPosse;
    }

    public function setCdFiscal($cdFiscal) {
	if ($cdFiscal == '') {
	    $cdFiscal = NULL;
	}
	$this->cdFiscal = $cdFiscal;
    }

    public function setVlEquipamento($vlEquipamento) {
	if ($vlEquipamento == '') {
	    $vlEquipamento = NULL;
	}
	$this->vlEquipamento = $vlEquipamento;
    }

    public function setDtInstalacao($dtInstalacao) {
	if ($dtInstalacao == '') {
	    $dtInstalacao = NULL;
	}
	$this->dtInstalacao = $dtInstalacao;
    }

    public function setDtGarantia($dtGarantia) {
	if ($dtGarantia == '') {
	    $dtGarantia = NULL;
	}
	$this->dtGarantia = $dtGarantia;
    }

    public function setIcManutencao($icManutencao) {
	if ($icManutencao == '') {
	    $icManutencao = NULL;
	}
	$this->icManutencao = $icManutencao;
    }

    public function setCdPrestador($cdPrestador) {
	if ($cdPrestador == '') {
	    $cdPrestador = NULL;
	}
	$this->cdPrestador = $cdPrestador;
    }

    public function setIcTensao($icTensao) {
	if ($icTensao == '') {
	    $icTensao = NULL;
	}
	$this->icTensao = $icTensao;
    }
	
	public function setVlPotencia($vlPotencia) {
	if ($vlPotencia == '') {
	    $vlPotencia = NULL;
	}
	$this->vlPotencia = $vlPotencia;
    }

    public function setIcOperacao($icOperacao) {
	if ($icOperacao == '') {
	    $icOperacao = NULL;
	}
	$this->icOperacao = $icOperacao;
    }

    public function setIcTecnico($icTecnico) {
	if ($icTecnico == '') {
	    $icTecnico = NULL;
	}
	$this->icTecnico = $icTecnico;
    }

    public function setDsInsumo($dsInsumo) {
	if ($dsInsumo == '') {
	    $dsInsumo = NULL;
	}
	$this->dsInsumo = $dsInsumo;
    }

    public function setDsObs($dsObs) {
	if ($dsObs == '') {
	    $dsObs = NULL;
	}
	$this->dsObs = $dsObs;
    }
	
	public function setIcDelete($icDelete) {
	if ($icDelete == '') {
	    $icDelete = 0;
	}
	$this->icDelete = $icDelete;
    }
}

?>