<?php
//verificando se algum dos campos realmente cont´em alguma coisa para ser pesquisada
if (isset($_GET['cd_patrimonio']) && $_GET['cd_patrimonio'] != ""|| (isset($_GET['ds_equipamento']) && $_GET['ds_equipamento'] != "")) {
    //fazendo a conexao com o banco e com a classe Paciente
    require_once('classes/equipamento.Class.php');
    require_once('classes/conexao.Class.php');
    $conexao = new Conexao();
    $equipamento = new Equipamento();
    $db_pumas_equipamento = $conexao->get_db_pumas_equipamento();

    $select = ""; //essa variavel sera o texto do select no banco de dados. Ela muda dependendo do campo que foi preenchido para pesquisa.
    //esse IF escrever´a o SELECT de acordo com o campo preenchido e iniciar o statement
    
	if (isset($_GET['cd_patrimonio']) && $_GET['cd_patrimonio'] != "") {
        $select = "SELECT cd_equipamento FROM tb_equipamento WHERE cd_patrimonio LIKE ? ORDER BY cd_patrimonio;";
        if ($stmt = $db_pumas_equipamento->prepare($select)) {
            $codigo_inserido = "%" . $_GET['cd_patrimonio'] . "%";
            $stmt->bind_param('s', $codigo_inserido);
        }
    } else {
        if (isset($_GET['ds_equipamento']) && $_GET['ds_equipamento'] != "") {
            $select = "SELECT cd_equipamento FROM tb_equipamento WHERE ds_equipamento = ?;";
            if ($stmt = $db_pumas_equipamento->prepare($select)) {
                $stmt->bind_param('i', $_GET['ds_equipamento']);
            }
        }
    }
	
    //verificando se foi escrito o select e criado o statement de fato
    if ($select != "" && isset($stmt)) {
        //executando o SELECT e pegando os resultados
        $stmt->execute();
        $stmt->bind_result($codigo_equipamento);

        while ($stmt->fetch()) {
            //enquanto houverem pacientes, o objeto da classe Paciente chama a funç~ao de pesquisar paciente, dessa forma, ´e possivel obter os dados de cada paciente conforme o while vai rodando
            $equipamento->selecionar($codigo_equipamento);
			?>
			<fieldset id="field_equipamento" style="border: solid 1px; padding: 15px;">
				<p>
					<label class="margem">Descrição do equipamento: <?php echo $equipamento->getDsEquipamento(); ?></label>
					<label class="margem">Número do patrimônio: <?php echo $equipamento->getCdPatrimonio(); ?></label>
				</p>
				<p>
					<label class="margem">Modelo do equipamento: <?php echo $equipamento->getNmModelo(); ?></label>
					<?php
                        //se o IcDelete for 0, então é pq o equipamento existe e deve ser exibida a opção de atualizar, caso contrário, aparecer a msg deletado.
                        if ($equipamento->getIcDelete() == 0) { ?>
						<button type="button" class="botao" onclick="window.location.href = 'atualizar_equipamento.php?cd_equipamento=<?php echo $equipamento->getCdEquipamento(); ?>';">Atualizar Cadastro</button>
						<?php
                        } else {
                            echo 'Deletado';
                        }
                    ?>
				</p>
			</fieldset><br />
			<?php
        }
        unset($equipamento);
        $stmt->close();
        $db_pumas_equipamento->close();
        unset($conexao);
    }
}
?>