<?php

if(file_exists("install/index.php")){
  //perform redirect if installer files exist
  //this if{} block may be deleted once installed
  header("Location: install/index.php");
}

require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>


<?php
  require_once 'users/init.php';
  $db = DB::getInstance();
  if (!securePage($_SERVER['PHP_SELF'])){die();} 
?>
<?php
    //essa pagina precisa do codigo do paciente no metodo GET para fazer o insert na chave estrangeira do banco, aqui esta sendo feita uma verificaçao pra saber se esse get foi setado e se o valor setado realmente existe como um usuario. Caso contrario, o usuario volta pra pagina de pesquisar_paciente.php

    if(isset($_GET['cd_paciente']) && $_GET['cd_paciente'] != '')
    {
        //verificando se o valor existe no banco
        require_once('php/model/paciente.Class.php');
        $paciente = new Paciente();

        $paciente -> selecionar_paciente($_GET['cd_paciente']);

        if($paciente -> get_cd_paciente() == '' || $paciente -> get_cd_paciente() == 0)
        {
            unset($paciente);
            header("location: pesquisar_paciente.php");
        }
    }
    else
    {
        unset($paciente);
        header("location: pesquisar_paciente.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <title>Cadastramento paciente</title>
  <meta charset="utf-8" />
  <link href="css/formulario.css" rel="stylesheet">
  <script src="users/js/jquery.js"></script>
</head>
<body>

  <div>

    <form method="post" class="form-style">
        <h1>TRIAGENS DE </h1>

        <?php

				require_once('php/model/conexao.Class.php');
                $conexao = new Conexao();
                $db_maua = $conexao -> conectar();

                if ($stmt = $db_maua->prepare('SELECT cd_triagem FROM tb_triagem WHERE cd_paciente = ?;'))
                {
                    $stmt -> bind_param('i', $_GET['cd_paciente']);
                    $stmt->execute();
                    $stmt->bind_result($codigo_triagem);

                    require_once('php/model/triagem.Class.php');
                    $triagem = new Triagem();

                    while ($stmt->fetch()) 
                    {
                    	$triagem -> selecionar_triagem($codigo_triagem);
                    	?>
                    		<fieldset>
                    			<label>Queixa: <?php echo $triagem -> get_ds_queixa() ?> </label><br/>
                    			<label>Data: <?php echo $triagem -> get_dt_triagem() ?> </label><br/>
                    			<label>Hora: <?php echo $triagem -> get_hr_triagem() ?></label><br/>
                    		</fieldset>
                    	<?php
                    }
                }
		?>     
    
      <!-- <fieldset>
          <label for="idestab" class="margem3" >Identificação do SUS</label>
          <input type="text" name="cd_cnes" id="idstab"  /><br />
          <label for="profregist" class="margem3">Identificação do cadastrante </label>
          <input type="number" name="cd_cns_profissional" id="profregist"  /><br />
      </fieldset><br />  -->      
    </form>
  </div>
</body>
</html>