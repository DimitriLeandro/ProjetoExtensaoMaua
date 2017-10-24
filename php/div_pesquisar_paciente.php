<?php
    if(isset($cd_cns_paciente) || isset($nm_paciente))
    {
        if(isset($cd_cns_paciente) && $cd_cns_paciente != '')
        {
                require_once('model/conexao.Class.php');
                $conexao = new Conexao();
                $db_maua = $conexao -> conectar();

                if ($stmt = $db_maua->prepare('SELECT cd_paciente FROM tb_paciente WHERE cd_cns_paciente = ?;'))
                {
                    $stmt -> bind_param('i', $cd_cns_paciente);
                    $stmt->execute();
                    $stmt->bind_result($codigo_paciente);

                    require_once('model/paciente.Class.php');
                    $paciente = new Paciente();

                    while ($stmt->fetch()) 
                    {
                        //enquanto houverem pacientes, o objeto da classe Paciente chama a funç~ao de pesquisar paciente, dessa forma, ´e possivel obter os dados de cada paciente conforme o while vai rodando
                        //a variavel $var_endereço ´e necess´aria para mandar o m´etodo GET para a p´agina de triagem
                        $paciente -> selecionar_paciente($codigo_paciente);
                        $var_endereco = 'cadastrar_triagem.php?cd_paciente='.$codigo_paciente;
                    ?>
                        <fieldset>
                            <p>
                              <label class="margem">Nome: <?php echo $paciente -> get_nm_paciente(); ?></label>
                              <label class="margem">CNS: <?php echo $paciente -> get_cd_cns_paciente(); ?></label>
                              <label class="margem">Data de Nascimento: <?php echo $paciente -> get_dt_nascimento(); ?></label>
                            </p>
                            <p>
                              <label class="margem">Bairro: <?php echo $paciente -> get_nm_bairro(); ?></label>
                              <label class="margem">Cidade: <?php echo $paciente -> get_nm_municipio_residencia(); ?></label>
                              <button type="button" class="botao" onclick="window.location.href = '<?php echo $var_endereco; ?>';">Triagem</button>
                            </p>
                        </fieldset><br />

                    <?php
                    }
                    unset($paciente);
                }
                $stmt->close();
                $db_maua->close();
                unset($conexao);
        }
        else
        {
            if(isset($nm_paciente) && $nm_paciente != '')
            {
                require_once('model/conexao.Class.php');
                $conexao = new Conexao();
                $db_maua = $conexao -> conectar();
 
                if ($stmt = $db_maua->prepare('SELECT cd_paciente FROM tb_paciente WHERE nm_paciente LIKE ?;'))
                {
                    $nome_inserido = '%'.$nm_paciente.'%';
                    $stmt -> bind_param('s', $nome_inserido);
                    $stmt->execute();
                    $stmt->bind_result($codigo_paciente);

                    require_once('model/paciente.Class.php');
                    $paciente = new Paciente();

                    while ($stmt->fetch()) 
                    {
                        $paciente -> selecionar_paciente($codigo_paciente);
                        $var_endereco = 'cadastrar_triagem.php?cd_paciente='.$codigo_paciente.'';

                        ?>
                        <fieldset>
                            <p>
                              <label class="margem">Nome: <?php echo $paciente -> get_nm_paciente(); ?></label>
                              <label class="margem">CNS: <?php echo $paciente -> get_cd_cns_paciente(); ?></label>
                              <label class="margem">Data de Nascimento: <?php echo $paciente -> get_dt_nascimento(); ?></label>
                            </p>
                            <p>
                              <label class="margem">Bairro: <?php echo $paciente -> get_nm_bairro(); ?></label>
                              <label class="margem">Cidade: <?php echo $paciente -> get_nm_municipio_residencia(); ?></label>
                              <button type="button" class="botao" onclick="window.location.href = '<?php echo $var_endereco; ?>';">Triagem</button>
                            </p>
                        </fieldset><br />
                        
                    <?php
                    }
                    unset($paciente);
                }
                $stmt->close();
                $db_maua->close();
                unset($conexao);
            }
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
                        //echo $paciente -> get_cd_cns_profissional().'<br/>';
?>