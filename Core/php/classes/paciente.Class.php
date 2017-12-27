<?php

require_once 'ciclo.Class.php';

final class Paciente extends Ciclo {

    private $cdPaciente;
    private $cdCnsPaciente;
    private $icUbsEspera;
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

    public function cadastrar() {
        //como o insert vai ser implicito, a chave primária deve ser nula
        $this->setCdPaciente(null);
        //preparando o comando de insert
        $txt_insert = "INSERT INTO tb_paciente VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        //preparando o statement para o insert
        $stmt = $this->db_maua->prepare($txt_insert);
        //passando os valores. Aqui, a melhor forma seria usar os métodos get, mas o comando bind_param só aceita variáveis
        $stmt->bind_param("iiissssssssssssssssssssiii", $this->cdPaciente, $this->cdCnsPaciente, $this->icUbsEspera, $this->nmJustificativa, $this->nmPaciente, $this->nmMae, $this->icSexo, $this->icRaca, $this->dtNascimento, $this->nmPaisNascimento, $this->nmMunicipioNascimento, $this->nmPaisResidencia, $this->nmMunicipioResidencia, $this->cdCep, $this->nmLogradouro, $this->nmNumeroResidencia, $this->nmComplemento, $this->nmBairro, $this->nmResponsavel, $this->cdDocumentoResponsavel, $this->nmOrgaoEmissor, $this->dtRegistro, $this->hrRegistro, $this->cdUbsReferencia, $this->cdUbs, $this->cdUsuarioRegistro);

        //executando o statement
        if ($stmt->execute()) {
            //verificando se o statement deu certo
            $ok = 1;
            if ($stmt->affected_rows == 0) {
                $ok = 0;
            } else {
                $this->cdPaciente = $stmt->insert_id;
            }
        } else {
            $ok = 0;
        }

        $stmt->close();
        return $ok;
    }

    public function selecionar($id) {
        $stmt = $this->db_maua->prepare("SELECT * FROM tb_paciente WHERE cd_paciente = ?");
        $attr = array();
        if ($stmt) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->bind_result($attr[1], $attr[2], $attr[3], $attr[4], $attr[5], $attr[6], $attr[7], $attr[8], $attr[9], $attr[10], $attr[11], $attr[12], $attr[13], $attr[14], $attr[15], $attr[16], $attr[17], $attr[18], $attr[19], $attr[20], $attr[21], $attr[22], $attr[23], $attr[24], $attr[25], $attr[26]);
            //setando os atributos da classe
            while ($stmt->fetch()) {
                $this->setCdPaciente($attr[1]);
                $this->setCdCnsPaciente($attr[2]);
                $this->setIcUbsEspera($attr[3]);
                $this->setNmJustificativa($attr[4]);
                $this->setNmPaciente($attr[5]);
                $this->setNmMae($attr[6]);
                $this->setIcSexo($attr[7]);
                $this->setIcRaca($attr[8]);
                $this->setDtNascimento($attr[9]);
                $this->setNmPaisNascimento($attr[10]);
                $this->setNmMunicipioNascimento($attr[11]);
                $this->setNmPaisResidencia($attr[12]);
                $this->setNmMunicipioResidencia($attr[13]);
                $this->setCdCep($attr[14]);
                $this->setNmLogradouro($attr[15]);
                $this->setNmNumeroResidencia($attr[16]);
                $this->setNmComplemento($attr[17]);
                $this->setNmBairro($attr[18]);
                $this->setNmResponsavel($attr[19]);
                $this->setCdDocumentoResponsavel($attr[20]);
                $this->setNmOrgaoEmissor($attr[21]);
                $this->setDtRegistro($attr[22]);
                $this->setHrRegistro($attr[23]);
                $this->setCdUbsReferencia($attr[24]);
                $this->setCdUbs($attr[25]);
                $this->setCdUsuarioRegistro($attr[26]);
            }
        }
    }

    public function atualizar($id) {
        //para fazer o update, primeiro é necessário selecionar_paciente(), depois, mudar os campos que você quer atualizar com os métodos de set "set_nm_paciente('Exemplo');" e só depois atualizar_paciente(), pois essa função faz update em TODOS os campos.
        $txt_update = "UPDATE tb_paciente SET cd_cns_paciente = ?, ic_ubs_espera = ?, nm_justificativa = ?, nm_paciente = ?, nm_mae = ?, ic_sexo = ?, ic_raca = ?, dt_nascimento = ?, nm_pais_nascimento = ?, nm_municipio_nascimento = ?, nm_pais_residencia = ?, nm_municipio_residencia = ?, cd_cep = ?, nm_logradouro = ?, nm_numero_residencia = ?, nm_complemento = ?, nm_bairro = ?, nm_responsavel = ?, cd_documento_responsavel = ?, nm_orgao_emissor = ?, dt_registro = ?, hr_registro = ?, cd_ubs_referencia = ?, cd_ubs = ?, cd_usuario_registro = ? WHERE cd_paciente = ?;";
        $stmt = $this->db_maua->prepare($txt_update);
        $stmt->bind_param("iissssssssssssssssssssiiii", $this->cdCnsPaciente, $this->icUbsEspera, $this->nmJustificativa, $this->nmPaciente, $this->nmMae, $this->icSexo, $this->icRaca, $this->dtNascimento, $this->nmPaisNascimento, $this->nmMunicipioNascimento, $this->nmPaisResidencia, $this->nmMunicipioResidencia, $this->cdCep, $this->nmLogradouro, $this->nmNumeroResidencia, $this->nmComplemento, $this->nmBairro, $this->nmResponsavel, $this->cdDocumentoResponsavel, $this->nmOrgaoEmissor, $this->dtRegistro, $this->hrRegistro, $this->cdUbsReferencia, $this->cdUbs, $this->cdUsuarioRegistro, $id);

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

    //--------------------------get e set
    function getCdPaciente() {
        return $this->cdPaciente;
    }

    function getCdCnsPaciente() {
        return $this->cdCnsPaciente;
    }

    function getIcUbsEspera() {
        return $this->icUbsEspera;
    }

    function getNmJustificativa() {
        return $this->nmJustificativa;
    }

    function getNmPaciente() {
        return $this->nmPaciente;
    }

    function getNmMae() {
        return $this->nmMae;
    }

    function getIcSexo() {
        return $this->icSexo;
    }

    function getIcRaca() {
        return $this->icRaca;
    }

    function getDtNascimento() {
        return $this->dtNascimento;
    }

    function getNmPaisNascimento() {
        return $this->nmPaisNascimento;
    }

    function getNmMunicipioNascimento() {
        return $this->nmMunicipioNascimento;
    }

    function getNmPaisResidencia() {
        return $this->nmPaisResidencia;
    }

    function getNmMunicipioResidencia() {
        return $this->nmMunicipioResidencia;
    }

    function getCdCep() {
        return $this->cdCep;
    }

    function getNmLogradouro() {
        return $this->nmLogradouro;
    }

    function getNmNumeroResidencia() {
        return $this->nmNumeroResidencia;
    }

    function getNmComplemento() {
        return $this->nmComplemento;
    }

    function getNmBairro() {
        return $this->nmBairro;
    }

    function getNmResponsavel() {
        return $this->nmResponsavel;
    }

    function getCdDocumentoResponsavel() {
        return $this->cdDocumentoResponsavel;
    }

    function getNmOrgaoEmissor() {
        return $this->nmOrgaoEmissor;
    }

    function getCdUbsReferencia() {
        return $this->cdUbsReferencia;
    }

    function setCdPaciente($cdPaciente) {
        $this->cdPaciente = $cdPaciente;
    }

    function setCdCnsPaciente($cdCnsPaciente) {
        $this->cdCnsPaciente = $cdCnsPaciente;
    }

    function setIcUbsEspera($icUbsEspera) {
        $this->icUbsEspera = $icUbsEspera;
    }

    function setNmJustificativa($nmJustificativa) {
        $this->nmJustificativa = $nmJustificativa;
    }

    function setNmPaciente($nmPaciente) {
        $this->nmPaciente = $nmPaciente;
    }

    function setNmMae($nmMae) {
        $this->nmMae = $nmMae;
    }

    function setIcSexo($icSexo) {
        $this->icSexo = $icSexo;
    }

    function setIcRaca($icRaca) {
        $this->icRaca = $icRaca;
    }

    function setDtNascimento($dtNascimento) {
        $this->dtNascimento = $dtNascimento;
    }

    function setNmPaisNascimento($nmPaisNascimento) {
        $this->nmPaisNascimento = $nmPaisNascimento;
    }

    function setNmMunicipioNascimento($nmMunicipioNascimento) {
        $this->nmMunicipioNascimento = $nmMunicipioNascimento;
    }

    function setNmPaisResidencia($nmPaisResidencia) {
        $this->nmPaisResidencia = $nmPaisResidencia;
    }

    function setNmMunicipioResidencia($nmMunicipioResidencia) {
        $this->nmMunicipioResidencia = $nmMunicipioResidencia;
    }

    function setCdCep($cdCep) {
        $this->cdCep = $cdCep;
    }

    function setNmLogradouro($nmLogradouro) {
        $this->nmLogradouro = $nmLogradouro;
    }

    function setNmNumeroResidencia($nmNumeroResidencia) {
        $this->nmNumeroResidencia = $nmNumeroResidencia;
    }

    function setNmComplemento($nmComplemento) {
        $this->nmComplemento = $nmComplemento;
    }

    function setNmBairro($nmBairro) {
        $this->nmBairro = $nmBairro;
    }

    function setNmResponsavel($nmResponsavel) {
        $this->nmResponsavel = $nmResponsavel;
    }

    function setCdDocumentoResponsavel($cdDocumentoResponsavel) {
        $this->cdDocumentoResponsavel = $cdDocumentoResponsavel;
    }

    function setNmOrgaoEmissor($nmOrgaoEmissor) {
        $this->nmOrgaoEmissor = $nmOrgaoEmissor;
    }

    function setCdUbsReferencia($cdUbsReferencia) {
        $this->cdUbsReferencia = $cdUbsReferencia;
    }

}
