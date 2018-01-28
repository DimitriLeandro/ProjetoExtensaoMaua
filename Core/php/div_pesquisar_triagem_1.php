<?php
//Não é necessário criar um objeto da classe paciente pois isso já foi feito em pesquisar_triagem.php
require_once('classes/triagem.Class.php');
require_once('classes/conexao.Class.php');
?>
<?php
if (isset($_GET['cd_paciente']) && $_GET['cd_paciente'] != '') {
    //Validando novamente o c´odigo do paciente caso o usuario tente entrar nessa p´agina sem ser pela pesquisar_triagem.php
    $paciente->selecionar($_GET['cd_paciente']);

    if ($paciente->getCdPaciente() == '' || $paciente->getCdPaciente() == 0) {
        header("Location: ../");
    } else {
        ?>
        <form class="form-style">
            <h1>Triagens de <?php echo $paciente->getNmPaciente(); ?></h1>
            <?php
            $conexao = new Conexao();
            $db_maua = $conexao->get_db_maua();

            if ($stmt = $db_maua->prepare('SELECT cd_triagem FROM tb_triagem WHERE cd_paciente = ?;')) {
                $stmt->bind_param('i', $_GET['cd_paciente']);
                $stmt->execute();
                $stmt->bind_result($codigo_triagem);

                $triagem = new Triagem();

                while ($stmt->fetch()) {
                    $triagem->selecionar($codigo_triagem);
                    $redirect_ver_mais = 'visualizar_triagem.php?cd_triagem=' . $triagem->getCdTriagem();
                    ?>
                    <fieldset style="border: solid 1px; padding: 15px;">
                        <p><label>Queixa: <?php echo $triagem->getDsQueixa() ?> </label><p/>
                        <p><label>Data: <?php echo $triagem->getDtRegistro() ?> </label><p/>
                        <p><label>Hora: <?php echo $triagem->getHrRegistro() ?></label><p/>
                        <p><button type="button" class="botao" onclick="window.location.href = '<?php echo $redirect_ver_mais; ?>';">Ver Mais</button></p>
                    </fieldset>
                    <br/>
                    <?php
                }
            }
            ?> 
        </form>
        <?php
    }
} else {
    header("Location: ../");
}
?>