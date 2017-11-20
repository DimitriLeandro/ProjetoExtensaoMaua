<?php
	//verificando se algum dos campos realmente cont´em alguma coisa para ser pesquisada
	if((isset($_GET['nm_paciente']) && $_GET['nm_paciente'] != "") || (isset($_GET['cd_cns_paciente']) && $_GET['cd_cns_paciente'] != ""))
	{
		//fazendo a conexao com o banco e com a classe Paciente
		require_once('model/paciente.Class.php');
		require_once('model/conexao.Class.php');
		$conexao = new Conexao();
		$paciente = new Paciente();
		$db_maua = $conexao -> conectar();

		$select = ""; //essa variavel sera o texto do select no banco de dados. Ela muda dependendo do campo que foi preenchido para pesquisa.

		//esse IF escrever´a o SELECT de acordo com o campo preenchido e iniciar o statement
		if(isset($_GET['nm_paciente']) && $_GET['nm_paciente'] != "")
		{
			$select = "SELECT cd_paciente FROM tb_paciente WHERE nm_paciente LIKE ?;";
			if ($stmt = $db_maua->prepare($select))
			{
				$nome_inserido = "%".$_GET['nm_paciente']."%";
				$stmt -> bind_param('s', $nome_inserido);
			}
		}
		else
		{
			if(isset($_GET['cd_cns_paciente']) && $_GET['cd_cns_paciente'] != "")
			{
				$select = "SELECT cd_paciente FROM tb_paciente WHERE cd_cns_paciente = ?;";
				if ($stmt = $db_maua->prepare($select))
				{
					$stmt -> bind_param('i', $_GET['cd_cns_paciente']);
				}
			}
		}

		//verificando se foi escrito o select e criado o statement de fato
		if($select != "" && isset($stmt))
		{
			//executando o SELECT e pegando os resultados
			$stmt->execute();
			$stmt->bind_result($codigo_paciente);

			while($stmt->fetch()) 
			{
				//enquanto houverem pacientes, o objeto da classe Paciente chama a funç~ao de pesquisar paciente, dessa forma, ´e possivel obter os dados de cada paciente conforme o while vai rodando
				//a variavel $var_endereço ´e necess´aria para mandar o m´etodo GET para a p´agina de triagem
				$paciente -> selecionar_paciente($codigo_paciente);
				$redirect_nova_triagem = "cadastrar_triagem.php?cd_paciente=".$codigo_paciente;
				$redirect_visualizar_triagens = "pesquisar_triagem.php?cd_paciente=".$codigo_paciente;
				?>
					<fieldset style="border: solid 1px; padding: 15px;">
						<iframe id="frame_etiqueta_<?php echo $codigo_paciente; ?>" name="frame_etiqueta_<?php echo $codigo_paciente; ?>" src="php/gerar_etiqueta.php?cd_paciente=<?php echo $codigo_paciente; ?>" hidden></iframe>
						<p>
							<label class="margem">Nome: <?php echo $paciente -> get_nm_paciente(); ?></label>
							<label class="margem">CNS: <?php echo $paciente -> get_cd_cns_paciente(); ?></label>
							<label class="margem">Data de Nascimento: <?php echo $paciente -> get_dt_nascimento(); ?></label>
						</p>
						<p>
							<label class="margem">Bairro: <?php echo $paciente -> get_nm_bairro(); ?></label>
							<label class="margem">Cidade: <?php echo $paciente -> get_nm_municipio_residencia(); ?></label>
						</p>
						<p align="right">
							<button type="button" class="botao" onclick="imprimir('frame_etiqueta_<?php echo $codigo_paciente; ?>')">Gerar Etiqueta</button>
							<button type="button" class="botao" onclick="window.location.href = '<?php echo $redirect_nova_triagem; ?>';">Nova Triagem</button>
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

<?php
						//echo $paciente -> get_cd_paciente().'<br/>';
						//echo $paciente -> get_cd_cns_paciente().'<br/>';
						//echo $paciente -> get_nm_justificativa().'<br/>';
						//echo $paciente -> get_nm_paciente().'<br/>';
						//echo $paciente -> get_nm_mae().'<br/>';
						//echo $paciente -> get_ic_sexo().'<br/>';
						//echo $paciente -> get_ic_raca().'<br/>';
						//echo $paciente -> get_dt_nascimento().'<br/>';
						//echo $paciente -> get_nm_pais_nascimento().'<br/>';
						//echo $paciente -> get_nm_municipio_nascimento().'<br/>';
						//echo $paciente -> get_nm_pais_residencia().'<br/>';
						//echo $paciente -> get_nm_municipio_residencia().'<br/>';
						//echo $paciente -> get_cd_cep().'<br/>';
						//echo $paciente -> get_nm_logradouro().'<br/>';
						//echo $paciente -> get_nm_numero_residencia().'<br/>';
						//echo $paciente -> get_nm_complemento().'<br/>';
						//echo $paciente -> get_nm_bairro().'<br/>';
						//echo $paciente -> get_cd_ubs_referencia().'<br/>';
						//echo $paciente -> get_nm_responsavel().'<br/>';
						//echo $paciente -> get_cd_documento_responsavel().'<br/>';
						//echo $paciente -> get_nm_orgao_emissor().'<br/>';
						//echo $paciente -> get_cd_cnes().'<br/>';
						//echo $paciente -> get_dt_adesao().'<br/>';
						//echo $paciente -> get_hr_adesao().'<br/>';
						//echo $paciente -> get_cd_profissional_registro().'<br/>';
?>