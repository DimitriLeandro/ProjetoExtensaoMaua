<?php
//verificando se algum dos campos realmente cont´em alguma coisa para ser pesquisada
if ((isset($_GET['nm_paciente']) && $_GET['nm_paciente'] != "") || (isset($_GET['cd_cns_paciente']) && $_GET['cd_cns_paciente'] != "")) {
    //fazendo a conexao com o banco e com a classe Paciente
    require_once('classes/paciente.Class.php');
    require_once('classes/conexao.Class.php');
    $conexao = new Conexao();
    $paciente = new Paciente();
    $db_maua = $conexao->get_db_maua();

    $select = ""; //essa variavel sera o texto do select no banco de dados. Ela muda dependendo do campo que foi preenchido para pesquisa.
    //esse IF escrever´a o SELECT de acordo com o campo preenchido e iniciar o statement
    if (isset($_GET['nm_paciente']) && $_GET['nm_paciente'] != "") {
        $select = "SELECT cd_paciente FROM tb_paciente WHERE nm_paciente LIKE ? ORDER BY nm_paciente;";
        if ($stmt = $db_maua->prepare($select)) {
            $nome_inserido = "%" . $_GET['nm_paciente'] . "%";
            $stmt->bind_param('s', $nome_inserido);
        }
    } else {
        if (isset($_GET['cd_cns_paciente']) && $_GET['cd_cns_paciente'] != "") {
            $select = "SELECT cd_paciente FROM tb_paciente WHERE cd_cns_paciente = ?;";
            if ($stmt = $db_maua->prepare($select)) {
                $stmt->bind_param('i', $_GET['cd_cns_paciente']);
            }
        }
    }

    //verificando se foi escrito o select e criado o statement de fato
    if ($select != "" && isset($stmt)) {
        //executando o SELECT e pegando os resultados
        $stmt->execute();
        $stmt->bind_result($codigo_paciente);

        while ($stmt->fetch()) {
            //enquanto houverem pacientes, o objeto da classe Paciente chama a funç~ao de pesquisar paciente, dessa forma, ´e possivel obter os dados de cada paciente conforme o while vai rodando
            //a variavel $var_endereço ´e necess´aria para mandar o m´etodo GET para a p´agina de triagem
            $paciente->selecionar($codigo_paciente);
            $redirect_visualizar_triagens = "pesquisar_triagem.php?cd_paciente=" . $codigo_paciente;
            ?>
            <fieldset style="border: solid 1px; padding: 15px;">
                <p>
                    <label class="margem">Nome: <?php echo $paciente->getNmPaciente(); ?></label>
                    <label class="margem">CNS: <?php echo $paciente->getCdCnsPaciente(); ?></label>
                    <label class="margem">Data de Nascimento: <?php echo $paciente->getDtNascimento(); ?></label>
                </p>
                <p>
                    <label class="margem">Bairro: <?php echo $paciente->getNmBairro(); ?></label>
                    <label class="margem">Cidade: <?php echo $paciente->getNmMunicipioResidencia(); ?></label>
                </p>
                <p align="right">
                    <button type="button" class="botao" onclick="imprimir('<?php echo $codigo_paciente; ?>')">Gerar Etiqueta</button>
                    <button type="button" class="botao" onclick="window.location.href = '<?php echo $redirect_visualizar_triagens; ?>';">Triagens do Paciente</button>
                </p>
            </fieldset><br />
            <?php
        }
        unset($paciente);
        $stmt->close();
        $db_maua->close();
        unset($conexao);
    }
}
?>