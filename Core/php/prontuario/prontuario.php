<?php
//essa pagina precisa do codigo da triagem no metodo GET para conseguir os dados dessa triagem no banco. Aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente ´e uma triagem existente no banco. Caso contrario, o usuario volta para o index

if (isset($_GET['cd_triagem']) && $_GET['cd_triagem'] != '') {
    //verificando se o valor existe no banco
    require_once('../classes/triagem.Class.php');
    $triagem = new Triagem();

    $triagem->selecionar($_GET['cd_triagem']);

    if ($triagem->getCdTriagem() == '' || $triagem->getCdTriagem() == 0) {
        unset($triagem);
        header("location: ../../index.php");
    } else {
        //pegando os dados do paciente só pra exibir o nome pelo menos
        require_once('../classes/paciente.Class.php');
        $paciente = new Paciente();

        $paciente->selecionar($triagem->getCdPaciente());
    }
} else {
    unset($triagem);
    header("location: ../../index.php");
}
?>
<html>
    <head>
        <title>Prontuário</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="prontuario.css">
    </head>
    <body>
        <table>
            <tr>
                <td><img src="brasao.png" title="brasao" align="left" width="130px" height="115px" vspace="10px" hspace="15px"/></td>
                <td class="td-title">SECRETARIA DE SAÚDE DE MAUÁ - FICHA DE ATENDIMENTO</td>
                <td><img src="upa.png" title="upa" align="right" width="130px" height="82px" vspace="25px" hspace="15px"/></td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-title">ACOLHIMENTO</td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-75">
                    <label>Nome:</label>
                    <label class="label-data"><?php echo $paciente->getNmPaciente(); ?></label>
                </td>
                <td class="td-25">
                    <label>FAA:</label>
                    <label></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-75">
                    <label>Queixa:</label>
                    <label class="label-data"><?php echo $triagem->getDsQueixa(); ?></label>
                </td>
                <td class="td-25">
                    <label>Prioridade:</label>
                    <label></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-25">
                    <label>Data:</label>
                    <label class="label-data"><?php echo $paciente->getDtRegistro(); ?></label>
                </td>
                <td class="td-25">
                    <label>Hora:</label>
                    <label class="label-data"><?php echo $paciente->getHrRegistro(); ?></label>
                </td>
                <td class="td-25">
                    <label>Idade:</label>
                    <label class="label-data"><?php echo $paciente->getIdade(); ?></label>
                </td>
                <td class="td-25">
                    <label>Sexo:</label>
                    <label class="label-data"><?php echo $paciente->getIcSexo(); ?></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-title">RECEPÇÃO</td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-40">
                    <label>Cartão SUS:</label>
                    <label class="label-data"><?php echo $paciente->getCdCnsPaciente(); ?></label>
                </td>
                <td class="td-30">
                    <label>RG:</label>
                    <label class="label-data"><?php echo $paciente->getCdDocumentoResponsavel(); ?></label>
                </td>
                <td class="td-30">
                    <label>Data de Nascimento:</label>
                    <label class="label-data"><?php echo $paciente->getDtNascimento(); ?></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-40">
                    <label>Logradouro:</label>
                    <label class="label-data"><?php echo $paciente->getNmLogradouro(); ?></label>
                </td>
                <td class="td-30">
                    <label>Número:</label>
                    <label class="label-data"><?php echo $paciente->getNmNumeroResidencia(); ?></label>
                </td>
                <td class="td-30">
                    <label>Bairro:</label>
                    <label class="label-data"><?php echo $paciente->getNmBairro(); ?></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-70">
                    <label>Município:</label>
                    <label class="label-data"><?php echo $paciente->getNmMunicipioResidencia(); ?></label>
                </td>
                <td class="td-30">
                    <label>UBS referência:</label>
                    <label class="label-data"><?php echo $paciente->getCdUbsReferencia(); ?></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-70">
                    <label>Responsável:</label>
                    <label class="label-data"><?php echo $paciente->getNmResponsavel(); ?></label>
                </td>
                <td class="td-30">
                    <label>Telefone:</label>
                    <label class="label-data"></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <label>Assinatura do Responsável:</label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-title">CLASSIFICAÇÃO DE RISCO</td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <label>Queixa Principal:</label>
                    <label class="label-data"><?php echo $triagem->getDsQueixa(); ?></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-40">
                    <label>Hora da Avaliação:</label>
                    <label class="label-data"><?php echo $triagem->getHrRegistro(); ?></label>
                </td>
                <td class="td-30">
                    <label>Nível de Consciência:</label>
                    <label class="label-data"><?php echo $triagem->getVlNivelConsciencia(); ?></label>
                </td>
                <td class="td-30">
                    <label>Peso:</label>
                    <label class="label-data"></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-40">
                    <label>Pressão Arterial:</label>
                    <label class="label-data"><?php echo $triagem->getVlPressaoMax() . " x " . $triagem->getVlPressaoMin() . " mmHg"; ?></label>
                </td>
                <td class="td-30">
                    <label>Pulso:</label>
                    <label class="label-data"><?php echo $triagem->getVlPulso() . " bpm"; ?></label>
                </td>
                <td class="td-30">
                    <label>Temperatura:</label>
                    <label class="label-data"><?php echo $triagem->getVlTemperatura() . " ºC"; ?></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td-40">
                    <label>Respiração:</label>
                    <label class="label-data"><?php echo $triagem->getVlPressaoMax() . " x " . $triagem->getVlPressaoMin() . " mmHg"; ?></label>
                </td>
                <td class="td-30">
                    <label>Saturação:</label>
                    <label class="label-data"><?php echo $triagem->getVlPulso() . " bpm"; ?></label>
                </td>
                <td class="td-30">
                    <label>Glicemia:</label>
                    <label class="label-data"><?php echo $triagem->getVlTemperatura() . " ºC"; ?></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <label>Escala de Dor:</label>
                    <label class="label-data"><?php echo $triagem->getVlPressaoMax() . " x " . $triagem->getVlPressaoMin() . " mmHg"; ?></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <label>Alergia a Medicamentos:</label>                  
                    <input type="radio" <?php
                    if ($triagem->getIcAlergia() == "sim") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>SIM</label>&nbsp;&nbsp;&nbsp;&nbsp;

                    <input type="radio" <?php
                    if ($triagem->getIcAlergia() == "nao") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>NÃO:</label>&nbsp;&nbsp;&nbsp;&nbsp;

                    <input type="radio" <?php
                    if ($triagem->getIcAlergia() == "desconhece") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>DESCONHECE</label>&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <label>Quais?</label>
                    <label class="label-data"><?php echo $triagem->getDsAlergia(); ?></label>
                </td>
            </tr>
        </table>
        <table>
            <tr class="tr-obs">
                <td>
                    <label>Observações:</label>
                    <label class="label-data"><?php echo $triagem->getDsObservacao(); ?></label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <label>Classificação de Risco:</label>                  
                    <input type="radio" name="verm" <?php
                    if ($triagem->getVlClassificacaoRisco() == 5) {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Vermelho</label>

                    <input type="radio" name="laran" <?php
                    if ($triagem->getVlClassificacaoRisco() == 4) {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Laranja</label>


                    <input type="radio" name="amare" <?php
                    if ($triagem->getVlClassificacaoRisco() == 3) {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Amarelo</label>



                    <input type="radio" name="verd" <?php
                    if ($triagem->getVlClassificacaoRisco() == 2) {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Verde</label>

                    <input type="radio" name="azul" <?php
                    if ($triagem->getVlClassificacaoRisco() == 1) {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Azul</label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <label>Linha de Cuidado:</label>                  
                    <input type="radio" name="gest" <?php
                    if ($triagem->getDsLinhaCuidado() == "gest") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>GEST</label>

                    <input type="radio" name="has" <?php
                    if ($triagem->getDsLinhaCuidado() == "has") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>HAS</label>

                    <input type="radio" name="om" <?php
                    if ($triagem->getDsLinhaCuidado() == "om") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>OM</label>

                    <input type="radio" name="ano" <?php
                    if ($triagem->getDsLinhaCuidado() == "ano") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Ano</label>

                    <input type="radio" name="sm" <?php
                    if ($triagem->getDsLinhaCuidado() == "sm") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>SM</label>

                    <input type="radio" name="ad" <?php
                    if ($triagem->getDsLinhaCuidado() == "ad") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Ad</label>

                    <input type="radio" name="vio" <?php
                    if ($triagem->getDsLinhaCuidado() == "vio") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Vio</label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <label>Outras Condições:</label>
                    <input type="radio" name="asma" <?php
                    if ($triagem->getDsOutrasCondicoes() == "asma") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>ASMA</label>

                    <input type="radio" name="dpoc" <?php
                    if ($triagem->getDsOutrasCondicoes() == "dpoc") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>DPOC</label>

                    <input type="radio" name="ice" <?php
                    if ($triagem->getDsOutrasCondicoes() == "ice") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>ICE</label>

                    <input type="radio" name="onco" <?php
                    if ($triagem->getDsOutrasCondicoes() == "onco") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>ONCO</label>

                    <input type="radio" name="outros" <?php
                    if ($triagem->getDsOutrasCondicoes() == "outros") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Outros</label>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <label>Carimbo/Assinatura do Enfermeiro</label>
                </td>
            </tr>
        </table>
    </body>
</html>
