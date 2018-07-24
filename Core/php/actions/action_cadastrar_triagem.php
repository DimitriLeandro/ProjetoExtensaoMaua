<?php
//instanciando o objeto da classe Triagem
require_once('../classes/triagem.Class.php');
$triagem = new Triagem();

if (isset($_POST['btn_cadastrar_triagem'])) {
    //o codigo do paciente será adquirido pelo método get. É necessário verificar se algum valor foi setado
    if (isset($_POST['cd_paciente']) && $_POST['cd_paciente'] != '') {
        //é necessário verificar se o código do paciente realmente existe
        //setando as informações 
        $triagem->setIcFinalizada('0');
        $triagem->setDsQueixa($_POST['ds_queixa']);
        $triagem->setDtRegistro(date("Y-m-d"));
        $triagem->setHrRegistro(date("H:i:s"));
        $triagem->setVlPressaoMin($_POST['vl_pressao_min']);
        $triagem->setVlPressaoMax($_POST['vl_pressao_max']);
        $triagem->setVlPulso($_POST['vl_pulso']);
        $triagem->setVlTemperatura($_POST['vl_temperatura']);
        $triagem->setVlRespiracao($_POST['vl_respiracao']);
        $triagem->setVlSaturacao($_POST['vl_saturacao']);
        $triagem->setVlGlicemia($_POST['vl_glicemia']);
        $triagem->setVlNivelConsciencia($_POST['vl_nivel_consciencia']);
        $triagem->setVlEscalaDor($_POST['vl_escala_dor']);
        $triagem->setIcAlergia($_POST['ic_alergia']);
        $triagem->setDsAlergia($_POST['ds_alergia']);
        $triagem->setDsObservacao($_POST['ds_observacao']);
        $triagem->setVlClassificacaoRisco($_POST['vl_classificacao_risco']);
        $triagem->setDsLinhaCuidado($_POST['ds_linha_cuidado']);
        $triagem->setDsOutrasCondicoes($_POST['ds_outras_condicoes']);
        $triagem->setCdPaciente($_POST['cd_paciente']);
        //cadastrando 
        $ok = $triagem->cadastrar();
        if ($ok == 0) {
            ?> 
            <script> 
                alert('Erro ao registrar triagem. Verifique os dados inseridos.');
                window.location.href = "../../index.php";
            </script> 
            <?php
        } else {
            //DEPOIS DE CADASTRAR...
            //-------PARTE PARA IMPRIMIR A TRIAGEM
            $txt_msg = '<p>A triagem foi registrada com sucesso.</p><p>Deseja imprimir?</p>';
            $source_frame = "../prontuario/prontuario.php?cd_triagem=" . $triagem->getCdTriagem();
            require_once '../div_alert.php';
        }
    } else {
        ?> 
        <script> 
            alert("Código do paciente não encontrado");
            window.location.href = "../../index.php";
        </script> 
        <?php
    }
}
?>
<script>
    document.body.style.backgroundColor = "#1868BF";
</script>