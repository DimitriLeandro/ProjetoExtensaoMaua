<?php
//ISSO AQUI SÓ SERVE PRA NÃO DAR TRABALHO PRA FAZER AQUELES PRIVATE ATRIBUTO NO COMEÇO DAS CLASSES

$conn_link = new mysqli('localhost', 'root', 'root', 'db_maua');

if ($conn_link->connect_error) {
    die("Falha na conexão: " . $conn_link->connect_error);
}

mysqli_set_charset($conn_link, "utf8");


//------------------------------------------------------

$nome_tabela = $_GET['tabela'];
$array_set = array();

$stmt = $conn_link->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'db_maua' AND TABLE_NAME = ?;");
$stmt->bind_param('s', $nome_tabela);
$stmt->execute();
$stmt->bind_result($att_1);
while ($stmt->fetch()) {
	$str_array = explode("_",$att_1);
	//unset($str_array[0]);
	foreach ($str_array as $key=>$value) {
    	if($key != 0)
    	{
    		$str_array[$key] = ucfirst($value);
    	}
	}
	$str = implode("", $str_array);
    echo "private $".$str. ";<br/>";

    /////////
    foreach ($str_array as $key=>$value) {
        $str_array[$key] = ucfirst($value);
    }
    $str = implode("", $str_array);
    $array_set[] = "set".$str."();";
}

echo "<br/><br/>";

foreach($array_set as $key=>$value)
{
    echo "<br/>".$array_set[$key];
}
?>