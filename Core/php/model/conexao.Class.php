<?php
class Conexao
{
	public function conectar()
	{
		$db_maua = new mysqli('localhost', 'root', 'root', 'db_maua');

		if ($db_maua -> connect_error) 
		{
	    	die("Falha na conexão: " . $db_maua -> connect_error);
		} 
		//echo "Conexão estabelecida.";

		return $db_maua;
	}
}
?>