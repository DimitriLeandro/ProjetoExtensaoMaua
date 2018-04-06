<?php
require_once 'classes/relatorio.Class.php';
$objRelatorio = new Relatorio();

$data1 = $_GET['dtInicio'];
$data2 = $_GET['dtFinal'];
?>

<p><label>Total de Queixas Registradas: <?php echo $objRelatorio->totalAtendimentos($data1, $data2); ?></label></p>
<br/><br/>

<p><label>Queixas em ordem de maior recorrência: </label></p>

<?php $queixasRecorrentes = $objRelatorio->queixasRecorrentes($data1, $data2); ?>
<table>
    <thead>
    <td width="50%">Queixa</td>
    <td width="25%">Ocorrências</td>
    <td width="25%">Percentual sobre o total</td>
</thead>
<?php
foreach ($queixasRecorrentes as $row) {
    echo '<tr><td>' . $row["Queixa"] . '</td><td style="width: 50px">' . $row["Qtd"] . '</td><td>' . $row["Percentual"] . '</td></tr>';
}
?>
</table>
<br/><br/>

<?php $array_sexo = $objRelatorio->totalAtendimentosPorSexo($data1, $data2); ?>    
<p><label>Total de Atendimentos(Masculino): <?php echo $array_sexo["Masculino"]; ?></label></p>
<p><label>Total de Atendimentos(Feminino): <?php echo $array_sexo["Feminino"]; ?></label></p>
<br/><br/>

<p><label>Queixas por faixa etária: </label></p>
<?php $array_idades = $objRelatorio->totalAtendimentosPorIdade($data1, $data2); ?>
<table>
    <thead>
    <td width="50%">Idade</td>
    <td width="25%">Ocorrências</td>
</thead>
<tr>
    <td>0 - 2 anos</td>
    <td><?php echo $array_idades["zerodois"]; ?></td>
</tr>
<tr>
    <td>3 - 5 anos</td>
    <td><?php echo $array_idades["trescinco"]; ?></td>
</tr>
<tr>
    <td>6 - 13 anos</td>
    <td><?php echo $array_idades["seistreze"]; ?></td>
</tr>
<tr>
    <td>14 - 18 anos</td>
    <td><?php echo $array_idades["quatorzedezoito"]; ?></td>
</tr>
<tr>
    <td>19 - 40 anos</td>
    <td><?php echo $array_idades["dezenovequarenta"]; ?></td>
</tr>
<tr>
    <td>41 - 60 anos</td>
    <td><?php echo $array_idades["quarentaeumsessenta"]; ?></td>
</tr>
<tr>
    <td>60+ anos</td>
    <td><?php echo $array_idades["sessentamais"]; ?></td>
</tr>
</table>
<br/><br/>

<p><label>Lista de pacientes fora da UBS de referência: </label></p>
<?php $lstPacientes = $objRelatorio->pacientesForaUBSReferencia($data1, $data2); ?>
<table>
    <thead>
    <td width="20%">Nome do Paciente</td>
    <td width="25%">UBS onde deveria ter sido atendido</td>
</thead>
<?php
foreach ($lstPacientes as $row) {
    echo '<tr><td>' . $row["nm_paciente"] . '</td><td>' . $row["nm_ubs"] . '</td></tr>';
}
?>
</table>