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
        $txt_insert = "INSERT INTO tb_paciente VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

        //preparando o statement para o insert
        $stmt = $this->db_maua->prepare($txt_insert);
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
        
    }

    public function atualizar() {
        
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
