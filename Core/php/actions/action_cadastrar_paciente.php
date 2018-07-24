<?php
if (isset($_POST['btn_cadastrar'])) {
    require_once('../classes/paciente.Class.php');
    $paciente = new Paciente();

    $paciente->setCdCnsPaciente($_POST['cd_cns_paciente']);
    $paciente->setNmJustificativa($_POST['nm_justificativa']);
    $paciente->setNmPaciente($_POST['nm_paciente']);
    $paciente->setNmMae($_POST['nm_mae']);
    $paciente->setIcSexo($_POST['ic_sexo']);
    $paciente->setIcRaca($_POST['ic_raca']);
    $paciente->setDtNascimento(date('Y-m-d', strtotime(str_replace('/', '-', $_POST['dt_nascimento']))));
    $paciente->setNmPaisNascimento($_POST['nm_pais_nascimento']);
    $paciente->setNmMunicipioNascimento($_POST['nm_municipio_nascimento']);
    $paciente->setNmPaisResidencia($_POST['nm_pais_residencia']);
    $paciente->setNmMunicipioResidencia($_POST['nm_municipio_residencia']);
    $paciente->setCdCep($_POST['cd_cep']);
    $paciente->setNmLogradouro($_POST['nm_logradouro']);
    $paciente->setNmNumeroResidencia($_POST['nm_numero_residencia']);
    $paciente->setNmComplemento($_POST['nm_complemento']);
    $paciente->setNmBairro($_POST['nm_bairro']);
    $paciente->setNmResponsavel($_POST['nm_responsavel']);
    $paciente->setCdDocumentoResponsavel($_POST['cd_documento_responsavel']);
    $paciente->setNmOrgaoEmissor($_POST['nm_orgao_emissor']);
    $paciente->setDtRegistro(date("Y-m-d"));
    $paciente->setHrRegistro(date("H:i:s"));
    $paciente->setCdUbsReferencia($_POST['cd_ubs_referencia']);

    $ok = $paciente->cadastrar();
    if ($ok == 0) {
        ?> 		
        <script> 
			alert('Erro ao cadastrar paciente');
			window.location.href = "../../index.php";
        </script> 
        <?php
    } else {
        //CADASTRO OK
        $txt_msg = '<p>O cadastro foi realizado com sucesso e o paciente foi incluído na lista de espera.</p><p>Deseja imprimir a etiqueta?</p>';
        $source_frame = "../gerar_etiqueta.php?cd_paciente=" . $paciente->getCdPaciente();
        require_once '../div_alert.php';
    }
}
?>
<script>
    document.body.style.backgroundColor = "#1868BF";
</script>