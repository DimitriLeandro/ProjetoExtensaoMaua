<?php

require_once 'ciclo.Class.php';

final class Paciente extends Ciclo {

    private $cdPaciente;
    private $cdCnsPaciente;
    private $nmJustificativa;
    private $nmPaciente;
    private $nmMae;
    private $icSexo;
    private $icRaca;
    private $dtNascimento;
    private $nmPaisNascimento;
    private $nmMunicipioNascimento;
    private $nmPaisResidencia;
    private $nmMunicipioResidencia;
    private $cdCep;
    private $nmLogradouro;
    private $nmNumeroResidencia;
    private $nmComplemento;
    private $nmBairro;
    private $nmResponsavel;
    private $cdDocumentoResponsavel;
    private $nmOrgaoEmissor;
    private $cdUbsReferencia;

    //-----------------FUNÇÕES SOBREPOSTAS
    public function cadastrar() {
	//como o insert vai ser implicito, a chave primária deve ser nula
	$this->setCdPaciente(null);
	//preparando o comando de insert
	$txt_insert = "INSERT INTO tb_paciente VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
	//preparando o statement para o insert
	$stmt = $this->db_maua->prepare($txt_insert);
	//passando os valores. Aqui, a melhor forma seria usar os métodos get, mas o comando bind_param só aceita variáveis
	$stmt->bind_param("iissssssssssssssssssssiii", $this->cdPaciente, $this->cdCnsPaciente, $this->nmJustificativa, $this->nmPaciente, $this->nmMae, $this->icSexo, $this->icRaca, $this->dtNascimento, $this->nmPaisNascimento, $this->nmMunicipioNascimento, $this->nmPaisResidencia, $this->nmMunicipioResidencia, $this->cdCep, $this->nmLogradouro, $this->nmNumeroResidencia, $this->nmComplemento, $this->nmBairro, $this->nmResponsavel, $this->cdDocumentoResponsavel, $this->nmOrgaoEmissor, $this->dtRegistro, $this->hrRegistro, $this->cdUbsReferencia, $this->cdUbs, $this->cdUsuarioRegistro);

	//executando o statement
	if ($stmt->execute()) {
	    //verificando se o statement deu certo
	    $ok = 1;
	    if ($stmt->affected_rows == 0) {
		$ok = 0;
	    } else {
		$this->setCdPaciente($stmt->insert_id);
	    }
	} else {
	    $ok = 0;
	}

	$stmt->close();
	return $ok;
    }

    public function selecionar($id) {
	$stmt = $this->db_maua->prepare("SELECT * FROM tb_paciente WHERE cd_paciente = ?");
	if ($stmt) {
	    $stmt->bind_param('i', $id);
	    $stmt->execute();
	    $stmt->bind_result($this->attr[1], $this->attr[2], $this->attr[3], $this->attr[4], $this->attr[5], $this->attr[6], $this->attr[7], $this->attr[8], $this->attr[9], $this->attr[10], $this->attr[11], $this->attr[12], $this->attr[13], $this->attr[14], $this->attr[15], $this->attr[16], $this->attr[17], $this->attr[18], $this->attr[19], $this->attr[20], $this->attr[21], $this->attr[22], $this->attr[23], $this->attr[24], $this->attr[25]);
	    //setando os atributos da classe
	    while ($stmt->fetch()) {
		$this->setCdPaciente($this->attr[1]);
		$this->setCdCnsPaciente($this->attr[2]);
		$this->setNmJustificativa($this->attr[3]);
		$this->setNmPaciente($this->attr[4]);
		$this->setNmMae($this->attr[5]);
		$this->setIcSexo($this->attr[6]);
		$this->setIcRaca($this->attr[7]);
		$this->setDtNascimento($this->attr[8]);
		$this->setNmPaisNascimento($this->attr[9]);
		$this->setNmMunicipioNascimento($this->attr[10]);
		$this->setNmPaisResidencia($this->attr[11]);
		$this->setNmMunicipioResidencia($this->attr[12]);
		$this->setCdCep($this->attr[13]);
		$this->setNmLogradouro($this->attr[14]);
		$this->setNmNumeroResidencia($this->attr[15]);
		$this->setNmComplemento($this->attr[16]);
		$this->setNmBairro($this->attr[17]);
		$this->setNmResponsavel($this->attr[18]);
		$this->setCdDocumentoResponsavel($this->attr[19]);
		$this->setNmOrgaoEmissor($this->attr[20]);
		$this->setDtRegistro($this->attr[21]);
		$this->setHrRegistro($this->attr[22]);
		$this->setCdUbsReferencia($this->attr[23]);
		$this->setCdUbs($this->attr[24]);
		$this->setCdUsuarioRegistro($this->attr[25]);
	    }

	    $stmt->close();
	}
    }

    public function atualizar($id) {
	//para fazer o update, primeiro é necessário selecionar_paciente(), depois, mudar os campos que você quer atualizar com os métodos de set "set_nm_paciente('Exemplo');" e só depois atualizar_paciente(), pois essa função faz update em TODOS os campos.
	$txt_update = "UPDATE tb_paciente SET cd_cns_paciente = ?, nm_justificativa = ?, nm_paciente = ?, nm_mae = ?, ic_sexo = ?, ic_raca = ?, dt_nascimento = ?, nm_pais_nascimento = ?, nm_municipio_nascimento = ?, nm_pais_residencia = ?, nm_municipio_residencia = ?, cd_cep = ?, nm_logradouro = ?, nm_numero_residencia = ?, nm_complemento = ?, nm_bairro = ?, nm_responsavel = ?, cd_documento_responsavel = ?, nm_orgao_emissor = ?, dt_registro = ?, hr_registro = ?, cd_ubs_referencia = ?, cd_ubs = ?, cd_usuario_registro = ? WHERE cd_paciente = ?;";
	$stmt = $this->db_maua->prepare($txt_update);
	$stmt->bind_param("issssssssssssssssssssiiii", $this->cdCnsPaciente, $this->nmJustificativa, $this->nmPaciente, $this->nmMae, $this->icSexo, $this->icRaca, $this->dtNascimento, $this->nmPaisNascimento, $this->nmMunicipioNascimento, $this->nmPaisResidencia, $this->nmMunicipioResidencia, $this->cdCep, $this->nmLogradouro, $this->nmNumeroResidencia, $this->nmComplemento, $this->nmBairro, $this->nmResponsavel, $this->cdDocumentoResponsavel, $this->nmOrgaoEmissor, $this->dtRegistro, $this->hrRegistro, $this->cdUbsReferencia, $this->cdUbs, $this->cdUsuarioRegistro, $id);

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

    //---------------FUNÇÕES PRÓPRIAS DA CLASSE MESMO, ESSAS QUE NEM SÃO GET SET NEM SOBREPOSTAS
    public function getAllNames() {
	//fução para pegar todos os nomes. Quem usa essa função é a página pesquisar_paciente.php para preencher o autocomplete
	$nomes = array();
	$select = "SELECT nm_paciente FROM tb_paciente WHERE cd_paciente > 0 ORDER BY nm_paciente;";
	$stmt = $this->db_maua->prepare($select);
	if ($stmt) {
	    $stmt->execute();
	    $stmt->bind_result($nome_paciente);
	    while ($stmt->fetch()) {
		$nomes[] = $nome_paciente;
	    }
	    $stmt->close();
	}

	return $nomes;
    }

    public function getIdade() {
		//essa função retorna a idade do paciente. É importante lembrar que no banco só é armazenada a data de nascimento do paciente
		//o método diff do php será usado para calcular as distancias entre a data atual e a data de nascimento do paciente
		$nascimento = new DateTime($this->getDtNascimento());
		$hoje = new DateTime(date("Y-m-d"));
		$diferenca = $hoje->diff($nascimento);

		return $diferenca->y;
    }

    //------------------GET E SET
    public function getCdPaciente() {
	return $this->cdPaciente;
    }

    public function getCdCnsPaciente() {
	return $this->cdCnsPaciente;
    }

    public function getNmJustificativa() {
	return $this->nmJustificativa;
    }

    public function getNmPaciente() {
	return $this->nmPaciente;
    }

    public function getNmMae() {
	return $this->nmMae;
    }

    public function getIcSexo() {
	return $this->icSexo;
    }

    public function getIcRaca() {
	return $this->icRaca;
    }

    public function getDtNascimento() {
	return $this->dtNascimento;
    }

    public function getNmPaisNascimento() {
	return $this->nmPaisNascimento;
    }

    public function getNmMunicipioNascimento() {
	return $this->nmMunicipioNascimento;
    }

    public function getNmPaisResidencia() {
	return $this->nmPaisResidencia;
    }

    public function getNmMunicipioResidencia() {
	return $this->nmMunicipioResidencia;
    }

    public function getCdCep() {
	return $this->cdCep;
    }

    public function getNmLogradouro() {
	return $this->nmLogradouro;
    }

    public function getNmNumeroResidencia() {
	return $this->nmNumeroResidencia;
    }

    public function getNmComplemento() {
	return $this->nmComplemento;
    }

    public function getNmBairro() {
	return $this->nmBairro;
    }

    public function getNmResponsavel() {
	return $this->nmResponsavel;
    }

    public function getCdDocumentoResponsavel() {
	return $this->cdDocumentoResponsavel;
    }

    public function getNmOrgaoEmissor() {
	return $this->nmOrgaoEmissor;
    }

    public function getCdUbsReferencia() {
	return $this->cdUbsReferencia;
    }

    public function setCdPaciente($cdPaciente) {
	if ($cdPaciente == '') {
	    $cdPaciente = NULL;
	}
	$this->cdPaciente = $cdPaciente;
    }

    public function setCdCnsPaciente($cdCnsPaciente) {
	if ($cdCnsPaciente == '') {
	    $cdCnsPaciente = '0';
	}
	$this->cdCnsPaciente = $cdCnsPaciente;
    }

    public function setNmJustificativa($nmJustificativa) {
	if ($nmJustificativa == '') {
	    $nmJustificativa = NULL;
	}
	$this->nmJustificativa = $nmJustificativa;
    }

    public function setNmPaciente($nmPaciente) {
	if ($nmPaciente == '') {
	    $nmPaciente = NULL;
	}
	$this->nmPaciente = $nmPaciente;
    }

    public function setNmMae($nmMae) {
	if ($nmMae == '') {
	    $nmMae = NULL;
	}
	$this->nmMae = $nmMae;
    }

    public function setIcSexo($icSexo) {
	if ($icSexo == '') {
	    $icSexo = NULL;
	}
	$this->icSexo = $icSexo;
    }

    public function setIcRaca($icRaca) {
	if ($icRaca == '') {
	    $icRaca = NULL;
	}
	$this->icRaca = $icRaca;
    }

    public function setDtNascimento($dtNascimento) {
	if ($dtNascimento == '') {
	    $dtNascimento = NULL;
	}
	$this->dtNascimento = $dtNascimento;
    }

    public function setNmPaisNascimento($nmPaisNascimento) {
	if ($nmPaisNascimento == '') {
	    $nmPaisNascimento = NULL;
	}
	$this->nmPaisNascimento = $nmPaisNascimento;
    }

    public function setNmMunicipioNascimento($nmMunicipioNascimento) {
	if ($nmMunicipioNascimento == '') {
	    $nmMunicipioNascimento = NULL;
	}
	$this->nmMunicipioNascimento = $nmMunicipioNascimento;
    }

    public function setNmPaisResidencia($nmPaisResidencia) {
	if ($nmPaisResidencia == '') {
	    $nmPaisResidencia = NULL;
	}
	$this->nmPaisResidencia = $nmPaisResidencia;
    }

    public function setNmMunicipioResidencia($nmMunicipioResidencia) {
	if ($nmMunicipioResidencia == '') {
	    $nmMunicipioResidencia = NULL;
	}
	$this->nmMunicipioResidencia = $nmMunicipioResidencia;
    }

    public function setCdCep($cdCep) {
	if ($cdCep == '') {
	    $cdCep = NULL;
	}
	$this->cdCep = $cdCep;
    }

    public function setNmLogradouro($nmLogradouro) {
	if ($nmLogradouro == '') {
	    $nmLogradouro = NULL;
	}
	$this->nmLogradouro = $nmLogradouro;
    }

    public function setNmNumeroResidencia($nmNumeroResidencia) {
	if ($nmNumeroResidencia == '') {
	    $nmNumeroResidencia = NULL;
	}
	$this->nmNumeroResidencia = $nmNumeroResidencia;
    }

    public function setNmComplemento($nmComplemento) {
	if ($nmComplemento == '') {
	    $nmComplemento = NULL;
	}
	$this->nmComplemento = $nmComplemento;
    }

    public function setNmBairro($nmBairro) {
	if ($nmBairro == '') {
	    $nmBairro = NULL;
	}
	$this->nmBairro = $nmBairro;
    }

    public function setNmResponsavel($nmResponsavel) {
	if ($nmResponsavel == '') {
	    $nmResponsavel = NULL;
	}
	$this->nmResponsavel = $nmResponsavel;
    }

    public function setCdDocumentoResponsavel($cdDocumentoResponsavel) {
	if ($cdDocumentoResponsavel == '') {
	    $cdDocumentoResponsavel = NULL;
	}
	$this->cdDocumentoResponsavel = $cdDocumentoResponsavel;
    }

    public function setNmOrgaoEmissor($nmOrgaoEmissor) {
	if ($nmOrgaoEmissor == '') {
	    $nmOrgaoEmissor = NULL;
	}
	$this->nmOrgaoEmissor = $nmOrgaoEmissor;
    }

    public function setCdUbsReferencia($cdUbsReferencia) {
	if ($cdUbsReferencia == '') {
	    $cdUbsReferencia = NULL;
	}
	$this->cdUbsReferencia = $cdUbsReferencia;
    }
}

?>