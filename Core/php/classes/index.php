<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body><pre>
            <?php
            require_once 'paciente.Class.php';

            $paciente = new Paciente();

            $paciente->setData('2017-12-26');
            $paciente->setHora('22:00');

            $ok = $paciente->cadastrar();
            echo $ok;
            ?>
        </pre></body>
</html>
