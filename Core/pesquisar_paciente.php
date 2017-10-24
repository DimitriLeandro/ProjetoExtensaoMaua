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
    if(isset($_POST['btn_cadastrar']))
    {
        header('location: cadastrar_paciente.php');
    }
?>

<html>
<head>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <script src="users/js/jquery.js"></script>
  <title>Pesquisar Paciente</title>
  <meta charset="utf-8" />
  <link href="css/formulario.css" rel="stylesheet">
</head>
<body>

  <div>

    <form method="post" class="form-style">
        <h1>PESQUISAR PACIENTE</h1>
    <fieldset>
        <label for="ncns" class="margem">Número CNS</label>
        <input type="number" name="cd_cns_paciente" id="ncns" /><br />
        
        <label for="nomep" class="margem">Nome</label>
        <input type="text" name="nm_paciente" id="nomep" /><br />
    </fieldset><br />

    <p>
      <input type="submit" name='btn_pesquisar' value="Pesquisar" />
      <input type="submit" name='btn_cadastrar' value="Cadastrar Novo Paciente" />
    </p>
    <br />
    <div id="div_1">
      <?php
      //essa div fica invisivel até que o botão pesquisar seja setado, nesse caso, o arquivo div_pesquisar_paciente.php se encarrega de exibir o resultado da pesquisa.
        if(isset($_POST['btn_pesquisar']))
        {
            if($_POST['cd_cns_paciente'] != '' || $_POST['nm_paciente'] != '')
            {
                $cd_cns_paciente = $_POST['cd_cns_paciente'];
                $nm_paciente = $_POST['nm_paciente'];
                require_once('php/div_pesquisar_paciente.php');
            }
        }
      ?>
    </div>
    </form>
  </div>
</body>
</html>