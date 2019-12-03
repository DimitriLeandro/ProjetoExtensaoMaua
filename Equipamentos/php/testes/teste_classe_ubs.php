<pre>
    <?php
    require_once '../classes/ubs.Class.php';

    if (isset($_GET['cd_cep'])) {
        $obj_ubs = new Ubs();

        $obj_ubs->pesquisarPorCep($_GET['cd_cep']);
        echo "<br/>" . $obj_ubs->getCdUbs();
        echo "<br/>" . $obj_ubs->getCdCep();
        echo "<br/>" . $obj_ubs->getNmLogradouro();
        echo "<br/>" . $obj_ubs->getNmBairro();
        echo "<br/>" . $obj_ubs->getNmUbs();
    } else {
        header("location: ../../index.php");
    }
    ?> 
</pre>