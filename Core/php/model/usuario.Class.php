<?php
/*
	O Userspice já tem uma classe de usuário em: /users/classes/User.php
	Porém, para manter a organização do código e principalmente para não misturar o código do userspice com o código próprio, foi melhor criar essa classe.

	A criação dessa classe se deve pelos atributos "cd_usuario_registro" do banco de dados. Esse atributo está nas classes tb_paciente, tb_triagem e tb_diagnostico apenas para informar qual funcionário da UPA fez um determinado registro. Ou seja, quem cadastrou o paciente, quem realizou a triagem e quem deu o diagnóstico.

	O próprio sistema do userspice já inicia uma sessão quando um usuário loga no sistema. Essa sessão será usada para preencher os campos "cd_usuario_registro" nos cadastros de paciente, triagem e diagnostico.

	O método construtor dessa classe coloca o id do usuário logado no atributo $id
*/
Class Usuario
{
	private $id = "";

	public function __construct()
	{
		//verificando se a sessão já foi iniciada
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}

		//verificando se existe a sessão "user"
		if(isset($_SESSION['user']))
		{
			$this -> id = "".$_SESSION['user'];
		}
	}

	public function get_id()
	{
		return $this -> id;
	}
}
?>