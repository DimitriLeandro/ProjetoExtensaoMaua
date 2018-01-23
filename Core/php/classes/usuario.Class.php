<?php

/*
  O Userspice já tem uma classe de usuário em: /users/classes/User.php
  Porém, para manter a organização do código e principalmente para não misturar o código do userspice com o código próprio, foi melhor criar essa classe.

  A criação dessa classe se deve pelos atributos "cd_usuario_registro" do banco de dados. Esse atributo está nas classes tb_paciente, tb_triagem e tb_diagnostico apenas para informar qual funcionário da UPA fez um determinado registro. Ou seja, quem cadastrou o paciente, quem realizou a triagem e quem deu o diagnóstico.

  O próprio sistema do userspice já inicia uma sessão quando um usuário loga no sistema. Essa sessão será usada para preencher os campos "cd_usuario_registro" nos cadastros de paciente, triagem e diagnostico.

  O método construtor dessa classe coloca o id do usuário logado no atributo $id
 */
require_once 'conexao.Class.php';

final class Usuario {

    private $id;
    private $permission;

    public function __construct() {
        //verificando se a sessão já foi iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //verificando se existe a sessão "user"
        if (isset($_SESSION['user'])) {
            $this->setId($_SESSION['user']);
	    //agora buscando a permissão do usuário
	    $this->buscarPermissao();
        }
        else
        {
            $this->setId(null);
        }
    }
    
    private function buscarPermissao(){
	$obj_conexao = new Conexao();
	$db_maua = $obj_conexao->get_db_maua();
	$txt_select = "select permissions.name from users, permissions, user_permission_matches where users.id = user_permission_matches.user_id and user_permission_matches.permission_id = permissions.id and permissions.name != 'User' and users.id = ?;";
	$stmt = $db_maua->prepare($txt_select);
	$stmt->bind_param("i", $this->id);
	$stmt->execute();
	$stmt->bind_result($nm_permissao);
	while($stmt->fetch()){
	    $this->setPermission($nm_permissao);
	}
	$stmt->close();
    }

    public function getId() {
	return $this->id;
    }

    public function getPermission() {
	return $this->permission;
    }

    private function setId($id) {
	$this->id = $id;
    }

    private function setPermission($permission) {
	$this->permission = $permission;
    }

}

?>