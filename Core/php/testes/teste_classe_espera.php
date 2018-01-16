<pre>
    <?php
    require_once '../classes/espera.Class.php';

    $obj_espera = new Espera();

    /* CADASTRO
      //INSERINDO PACIENTE NA LISTA DE ESPERA
      //NA VERDADE, BASTA INSTANCIAR UM OBJETO DA CLASSE ETIQUETA QUE O PRÓPRIO CONSTRUTOR JÁ COLOCA NA LISTA
      //só precisa mandar o código do paciente, o usuario que realiza o registro e a ubs já estão na classe Ciclo
      $obj_espera->setCdPaciente('71');
      echo "<br/>".$obj_espera->cadastrar();
      // */

    /* MOSTRANDO TODOS OS PACIENTES DA LISTA
      $lista = $obj_espera->selecionarListaCompleta();

      foreach($lista as $row)
      {
      echo $row['cd_paciente']." ".$row['nm_paciente']." ".$row['dt_registro']." ".$row['hr_registro']."<br/>";
      }

      print_r($lista);

      // */

    //SELECIONAR UMA ÚNICA LINHA DA TABELA
    $obj_espera->selecionar('18');
    echo "<br/>" . $obj_espera->getCdEspera();
    echo "<br/>" . $obj_espera->getIcFinalizada();
    echo "<br/>" . $obj_espera->getDtRegistro();
    echo "<br/>" . $obj_espera->getHrRegistro();
    echo "<br/>" . $obj_espera->getCdPaciente();
    echo "<br/>" . $obj_espera->getCdUbs();
    echo "<br/>" . $obj_espera->getCdUsuarioRegistro();
    ?>
</pre>