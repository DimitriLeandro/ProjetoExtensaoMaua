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
        <title>Prontuario</title>
        <meta charset="utf-8" />
        <style type="text/css">
            div#secretaria {
                font:12px Arial, Sans-serif;
                line-height:150px;
                position: relative;
                top: 55px;
                left: 190px;						
            }

            div#acolhimento{
                font:16px Arial, Sans-serif;
                position: relative;
                top: 0px;
                left: 500px;				

            }

            div#classrisco{
                font:16px Arial, Sans-serif;
                position: relative;
                top: 0px;
                left: 420px;				

            }

            fieldset {
                width: 1035px;


            }

            fieldset#a{
                height: 130px;
            }

            fieldset#b {
                height: 160px;
            }

            fieldset#b-a {
                height: 30px;
                width: 715px;
                position: relative;
                left: -15px;
            }
            fieldset#b-b {
                height: 30px;
                width: 289px;
                position: relative;
                top: -50px;
                left: 730px;
            }

            fieldset#b-c {
                height: 30px;
                width: 715px;
                position: relative;
                top: -45px;
                left: -15px;

            }

            fieldset#b-d {
                height: 30px;
                width: 289px;
                position: relative;
                top: -95px;
                left: 730px;
            }

            fieldset#b-e {
                height: 25px;
                width: 289px;
                position: relative;
                top: -90px;
                left: -15px;
            }

            fieldset#b-f {
                height: 25px;
                width: 183px;
                position: relative;
                top: -135px;
                left: 305px;
            }

            fieldset#b-g {
                height: 25px;
                width: 180px;
                position: relative;
                top: -180px;
                left: 520px;
            }

            fieldset#b-i {
                height: 25px;
                width: 289px;
                position: relative;
                top: -225px;
                left: 730px;
            }

            fieldset#c {
                height: 263px;
            }

            fieldset#c-a {
                height: 20px;
                width: 421px;
                position: relative;
                left: -15px;
            }

            fieldset#c-b {
                height: 20px;
                width: 262px;
                position: relative;
                top: -39px;
                left: 438px;
            }

            fieldset#c-c {
                height: 20px;
                width: 289px;
                position: relative;
                top: -79px;
                left: 730px;
            }



            fieldset#c-d {
                height: 30px;
                width: 610px;
                position: relative;
                top: -76px;	
                left: -15px;
            }

            fieldset#c-e {
                height: 30px;
                width: 73px;
                position: relative;
                top: -124px;	
                left: 628px;
            }

            fieldset#c-f {
                height: 30px;
                width: 287px;
                position: relative;
                top: -174px;	
                left: 732px;
            }

            fieldset#c-g {
                height: 30px;
                width: 460px;
                position: relative;
                top: -170px;	
                left: -15px;
            }

            fieldset#c-h {
                height: 30px;
                width: 120px;
                position: relative;
                top: -220px;	
                left: 475px;
            }

            fieldset#c-i {
                height: 30px;
                width: 394px;
                position: relative;
                top: -270px;	
                left: 625px;
            }

            fieldset#c-j {
                height: 30px;
                width: 610px;
                position: relative;
                top: -265px;	
                left: -15px;
            }

            fieldset#c-k {
                height: 30px;
                width: 394px;
                position: relative;
                top: -314px;	
                left: 625px;
            }

            fieldset#c-l {
                height: 35px;
                width: 1000px;
                position: relative;
                top: -314px;	
                left: 0px;

            }

            fieldset#d {
                height: 430px;
            }

            fieldset#d-a {
                height: 40px;
                width: 1000px;
                position: relative;
                left: 0px;
            }

            fieldset#d-b {
                height: 37px;
                width: 350px;
                position: relative;
                top: 5px;
                left: 0px;
            }

            fieldset#d-c {
                height: 37px;
                width: 150px;
                position: relative;
                top: -51px;
                left: 383px;
            }

            fieldset#d-d {
                height: 10px;
                width: 200px;
                position: relative;
                top: -109px;
                left: 580px;
            }

            fieldset#d-e {
                height: 10px;
                width: 200px;
                position: relative;
                top: -109px;
                left: 580px;
            }

            fieldset#d-f {
                height: 37px;
                width: 190px;
                position: relative;
                top: -167px;
                left: 810px;
            }

            fieldset#d-g {
                height: 35px;
                width: 552px;
                position: relative;
                top: -162px;
                left: 0px;
            }

            fieldset#d-h {
                height: 35px;
                width: 198px;
                position: relative;
                top: -216px;
                left: 582px;
            }

            fieldset#d-i {
                height: 35px;
                width: 190px;
                position: relative;
                top: -270px;
                left: 810px;
            }

            fieldset#d-j {
                height: 35px;
                width: 320px;
                position: relative;
                top: -265px;
                left: 0px;
            }

            fieldset#d-k {
                height: 35px;
                width: 320px;
                position: relative;
                top: -319px;
                left: 350px;
            }

            fieldset#d-l {
                height: 35px;
                width: 300px;
                position: relative;
                top: -374px;
                left: 700px;
            }

            fieldset#d-m {
                height: 35px;
                width: 1000px;
                position: relative;
                top: -370px;
                left: 0px;
            }

            fieldset#d-n {
                height: 35px;
                width: 1000px;
                position: relative;
                top: -365px;
                left: 0px;
            }

            fieldset#d-o {
                height: 35px;
                width: 1000px;
                position: relative;
                top: -360px;
                left: 0px;
            }

            fieldset#e {
                height: 250px;
                top: -360px;
            }

            fieldset#f {
                height: 130px;

            }

            fieldset#f-a {
                height: 15px;
                width: 250px;
                position: relative;
                top: -8px;
                left: -15px;
            }

            fieldset#f-b {
                height: 92px;
                width: 250px;
                position: relative;
                top: -5px;
                left: -15px;
            }

            fieldset#f-c {
                height: 60px;
                width: 130px;
                position: relative;
                top: -155px;
                left: 262px;
            }

            fieldset#f-d {
                height: 60px;
                width: 130px;
                position: relative;
                top: -234px;
                left: 418px;
            }

            fieldset#f-e {
                height: 60px;
                width: 130px;
                position: relative;
                top: -314px;
                left: 575px;
            }

            fieldset#f-f {
                height: 60px;
                width: 130px;
                position: relative;
                top: -393px;
                left: 732px;
            }
            fieldset#f-g {
                height: 60px;
                width: 130px;
                position: relative;
                top: -472px;
                left: 888px;
            }

            fieldset#f-h {
                height: 17px;
                width: 130px;
                position: relative;
                top: -475px;
                left: 262px;
            }

            fieldset#f-i {
                height: 17px;
                width: 130px;
                position: relative;
                top: -477px;
                left: 262px;
            }

            fieldset#f-j {
                height: 17px;
                width: 600px;
                position: relative;
                top: -548px;
                left: 418px;
            }

            fieldset#f-k {
                height: 17px;
                width: 600px;
                position: relative;
                top: -548px;
                left: 418px;
            }

            div#divformulario {
                background-color: lightgray;
                width: 100%;
            }




            textarea:focus,textarea, input:focus, select:focus {
                box-shadow: 0 0 0 0;
                border: 0 none;
                outline: 0;
            } 
            input, textarea, select {
                outline: 0;
                box-shadow: 0 0 0 0;
                border: 0 none;
            } 

            textarea.obs {
                font-family: 'Open Sans', Arial, Helvetica, sans-serif;
                font-weight: 700;
                width: 100%;
                padding: 5px 0px;
                margin-bottom: 20px;
                resize: vertical;
                font-size: 11px;
                line-height: 24px;
                border-bottom: 2px solid;
                -webkit-appearance: none;
                border-radius: 0;
                background: url(notebook.png);
            }

            label{
                font-weight: bolder;
                font-size: large;
                padding-right: 15px;
            }

        </style>
    </head>
    <body>
        <form action="" method="post">

            <fieldset id="a">
                <img src="brasao.png" title="brasao" align="left" width="130px" height="115px" vspace="10px" hspace="15px"/>
                <img src="upa.png" title="upa" align="right" width="130px" height="82px" vspace="25px" hspace="15px"/>
                <div id="secretaria"> SECRETARIA DE SAÚDE DE MAUÁ - FICHA DE ATENDIMENTO </div>
            </fieldset>
            <fieldset id="b">
                <div id="acolhimento">ACOLHIMENTO</div>
                <fieldset id="b-a">
                    <label>Nome</label>
                    <input type="text" name="nome" id="" size="70" value="<?php echo $paciente->getNmPaciente(); ?>">
                </fieldset>
                <fieldset id="b-b">
                    <label>FAA</label>
                    <input type="text" name="FAA" size="25" value="">
                </fieldset>
                <fieldset id="b-c">
                    <label>Queixa</label>
                    <input type="text" name="queixa" size="70" value="<?php echo $triagem->getDsQueixa(); ?>">
                </fieldset>
                <fieldset id="b-d">
                    <label>Prioridade</label>
                    <input type="text" name="prioridade" value="">
                </fieldset>
                <fieldset id="b-e">
                    <label>Data</label>
                    <input type="text" name="data" size="30" value="<?php echo $triagem->getDtRegistro(); ?>">
                </fieldset>
                <fieldset id="b-f">
                    <label>Idade:</label>
                    <input type="text" name="data" size="30">
                </fieldset>
                <fieldset id="b-g">
                    <label>Hora</label>
                    <input type="text" name="hora" size="15" value="<?php echo $paciente->getHrRegistro(); ?>">
                </fieldset>
                <fieldset id="b-i">
                    <label>Sexo</label>
                    <input type="textarea" name="sexo" value="<?php echo $paciente->getIcSexo(); ?>">
                </fieldset>		
            </fieldset>
            <fieldset id="c">
                <div id="acolhimento">RECEPÇÃO</div>
                <fieldset id="c-a">
                    <label>Cartão SUS</label>
                    <input type="text" name="cartaosus" size="15" value="<?php echo $paciente->getCdCnsPaciente(); ?>">
                </fieldset>
                <fieldset id="c-b">
                    <label>Nº RG</label>
                    <input type="text" name="datanasc" size="20" value="<?php echo $paciente->getCdDocumentoResponsavel(); ?>">
                </fieldset>
                <fieldset id="c-c">
                    <label>Data de nascimento</label>
                    <input type="text" name="datanasc" size="15" value="<?php echo date("d/m/Y", strtotime($paciente->getDtNascimento())); ?>">
                </fieldset>
                <fieldset id="c-d">
                    <label>Logradouro</label>
                    <input type="text" name="logradouro" size="60" value="<?php echo $paciente->getNmLogradouro(); ?>">
                </fieldset>
                <fieldset id="c-e">
                    <label>Nº</label>
                    <input type="text" name="n" size="5" value="<?php echo $paciente->getNmComplemento(); ?>">
                </fieldset>
                <fieldset id="c-f">
                    <label>Bairro</label>
                    <input type="text" name="bairro" size="25" value="<?php echo $paciente->getNmBairro(); ?>">
                </fieldset>
                <fieldset id="c-g">
                    <label>Municipio</label>
                    <input type="text" name="municipio" size="25" value="<?php echo $paciente->getNmMunicipioResidencia(); ?>">
                </fieldset>
                <fieldset id="c-h">
                    <label>UF</label>
                    <input type="text" name="uf" size="12">
                </fieldset>
                <fieldset id="c-i">
                    <label>UBS de referência</label>
                    <input type="text" name="ubsderef" size="20" value="<?php echo $paciente->getCdUbsReferencia(); ?>">
                </fieldset>
                <fieldset id="c-j">
                    <label>Responsável</label>
                    <input type="text" name="responsavel" size="60" value="<?php echo $paciente->getNmResponsavel(); ?>">
                </fieldset>
                <fieldset id="c-k">
                    <label>Telefone</label>
                    <input type="text" name="telefone" size="40">
                </fieldset>
                <fieldset id="c-l">
                    <label>Assinatura do responsável</label>
                    <input type="text" name="assrespon" size="80">
                </fieldset>
            </fieldset>
            <fieldset id="d">
                <div id="classrisco">CLASSIFICAÇÃO DE RISCO</div>
                <fieldset id="d-a">
                    <label>Queixa principal</label>
                    <input type="textarea" name="queixaprincipal" value="<?php echo $triagem->getDsQueixa(); ?>">
                </fieldset>
                <fieldset id="d-b">
                    <label>Hora da Avaliação</label>
                    <input type="text" name="hravaliacao" value="<?php echo $triagem->getHrRegistro(); ?>">
                </fieldset>
                <fieldset id="d-c">
                    <label>Nível de Consciência</label>
                    <input type="text" name="niveldecons" size="20" value="<?php echo $triagem->getVlNivelConsciencia(); ?>">
                </fieldset>
                <fieldset id="d-d">
                    <input type="radio" name="normal" value="">
                    <label>Normal</label>					
                </fieldset>
                <fieldset id="d-e">
                    <input type="radio" name="alterado" value="">
                    <label>Alterado</label>					
                </fieldset>
                <fieldset id="d-f">
                    <label>Peso</label>
                    <input type="text" name="peso" size="15" value="">
                </fieldset>
                <fieldset id="d-g">
                    <label>PA</label>
                    <input type="text" name="pa" size="15" value="<?php echo $triagem->getVlPressaoMax(); ?>">
                    x 
                    <input type="text" name="mmhg" size="10" value="<?php echo $triagem->getVlPressaoMin(); ?>">
                    <label>mmHg</label>
                </fieldset>
                <fieldset id="d-h">
                    <label>Pulso</label>
                    <input type="text" name="pulso" size="10" value="<?php echo $triagem->getVlPulso(); ?>">
                    bpm					
                </fieldset>
                <fieldset id="d-i">
                    <label>Temperatura</label>
                    <input type="text" name="temperatura" size="05" value="<?php echo $triagem->getVlTemperatura(); ?>">
                    ºC					
                </fieldset>
                <fieldset id="d-j">
                    <label>Respiração</label>
                    <input type="text" name="respiracao" size="10" value="<?php echo $triagem->getVlRespiracao(); ?>">
                    rpm					
                </fieldset>
                <fieldset id="d-k">
                    <label>Saturação</label>
                    <input type="text" name="saturacao" size="10" value="<?php echo $triagem->getVlSaturacao(); ?>">
                    %					
                </fieldset>
                <fieldset id="d-l">
                    <label>Glicemia</label>
                    <input type="text" name="glicemia" size="10" value="<?php echo $triagem->getVlGlicemia(); ?>">
                    mg/dl					
                </fieldset>
                <fieldset id="d-m">
                    <label>Escala de Dor</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="leve" value="<?php echo $triagem->getVlEscalaDor(); ?>">


                </fieldset>
                <fieldset id="d-n">
                    <label>Alergia a medicamentos</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="sim" value="<?php echo $triagem->getIcAlergia(); ?>">									
                </fieldset>
                <fieldset id="d-o">
                    <label>Quais?</label>
                    <input type="text" name="quais" size="80" value="<?php echo $triagem->getDsAlergia(); ?>">
                </fieldset>
            </fieldset>
            <fieldset id="e">
                <label>Observações</label>
                <textarea class="obs" cols="125" rows="9"><?php echo $triagem->getDsObservacao(); ?></textarea>
            </fieldset>
            <fieldset id="f">
                <fieldset id="f-a">
                    <label>Carimbo/Assinatura do Enfermeiro</label>
                </fieldset>
                <fieldset id="f-b">
                </fieldset>
                <fieldset id="f-c">
                    <label>Vermelho</label>
                    <input type="radio" name="verm" <?php
                    if ($triagem->getVlClassificacaoRisco() == 5) {
                        echo 'checked="checked"';
                    }
                    ?>>
                </fieldset>
                <fieldset id="f-d">
                    <label>Laranja</label>
                    <input type="radio" name="laran" <?php
                    if ($triagem->getVlClassificacaoRisco() == 4) {
                        echo 'checked="checked"';
                    }
                    ?>>
                </fieldset>
                <fieldset id="f-e">
                    <label>Amarelo</label>
                    <input type="radio" name="amare" <?php
                    if ($triagem->getVlClassificacaoRisco() == 3) {
                        echo 'checked="checked"';
                    }
                    ?>>
                </fieldset>
                <fieldset id="f-f">
                    <label>Verde</label>
                    <input type="radio" name="verd" <?php
                    if ($triagem->getVlClassificacaoRisco() == 2) {
                        echo 'checked="checked"';
                    }
                    ?>>
                </fieldset>
                <fieldset id="f-g">
                    <label>Azul</label>
                    <input type="radio" name="azul" <?php
                    if ($triagem->getVlClassificacaoRisco() == 1) {
                        echo 'checked="checked"';
                    }
                    ?>>
                </fieldset>
                <fieldset id="f-h">
                    <label>Linha de Cuidado</label>
                </fieldset>
                <fieldset id="f-i">
                    Outras Condições
                </fieldset>
                <fieldset id="f-j">
                    <input type="radio" name="gest">
                    <label>GEST</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="has" <?php
                    if ($triagem->getDsOutrasCondicoes() == "gestacao") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>HAS</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="om" <?php
                    if ($triagem->getDsOutrasCondicoes() == "has") {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>OM</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="ano" <?php
                    if ($triagem->getVlClassificacaoRisco() == 1) {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Ano</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="sm" <?php
                    if ($triagem->getVlClassificacaoRisco() == 1) {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>SM</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="ad" <?php
                    if ($triagem->getVlClassificacaoRisco() == 1) {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Ad</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="viol" <?php
                    if ($triagem->getVlClassificacaoRisco() == 1) {
                        echo 'checked="checked"';
                    }
                    ?>>
                    <label>Violencia</label>
                </fieldset>
                <fieldset id="f-k">
                    <input type="radio" name="asma">
                    <label>ASMA</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="dpoc">
                    <label>DPOC</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="ice">
                    <label>ICE</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="onco">
                    <label>ONCO</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="outros">
                    <label>Outros</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </fieldset>
            </fieldset>
        </form>
    </body>
</html>


