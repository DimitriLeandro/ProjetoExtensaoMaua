<?php

/*
 * Essa classe é a progenitora das classes Paciente, Triagem e Diagnostico
 * Os atributos protegidos são aqueles que foram repetidos nas respectivas tabelas no banco de dados
 * usuarioRegistro -> nas três tabelas do banco esse atributo serve para informar quem foi o funcionário que realizou um determinado registro
 * ubs -> informa em qual ubs o registro foi feito
 * data e hora -> tem nessas três tabelas também.
 * O usuarioRegistro está numa $_SESSION do próprio userspice. Para receber esse valor será usada outra classe que será instanciada no método construtor.
 */

require_once 'conexao.Class.php';
require_once 'usuario.Class.php';

abstract class Ciclo {

    protected $cdUsuarioRegistro;
    protected $cdUbs;
    protected $dtRegistro;
    protected $hrRegistro;
    protected $db_maua; //não tem get nem set
    protected $attr; //isso é um array que serve para os métodos de selecionar() //não tem get nem set

    //CONSTRUTOR

    public function __construct() {
        //fazendo a conexão com o banco para que todas as classes filhas não precisem fazer isso novamente
        $obj_conn = new Conexao();
        $this->db_maua = $obj_conn->get_db_maua();
        //atribuindo um valor ao atributo usuarioRegistro
        $obj_usuario = new Usuario();
        $this->cdUsuarioRegistro = $obj_usuario->getId();
        //atribuindo valor ao $cdUbs
        $this->setCdUbs('4');
        //dizendo que $attr é um array
        $this->attr = array();
    }

    abstract function cadastrar();

    abstract function selecionar($id);

    abstract function atualizar($id);

    //----------------------------FUNÇÕES GET E SET -- menos getset pro $db_maua e set pro cdUsuarioRegistro
    function getCdUsuarioRegistro() {
        return $this->cdUsuarioRegistro;
    }

    function getCdUbs() {
        return $this->cdUbs;
    }

    function getDtRegistro() {
        return $this->dtRegistro;
    }

    function getHrRegistro() {
        return $this->hrRegistro;
    }

    function setCdUsuarioRegistro($cdUsuarioRegistro) {
        $this->cdUsuarioRegistro = $cdUsuarioRegistro;
    }

    function setCdUbs($cdUbs) {
        $this->cdUbs = $cdUbs;
    }

    function setDtRegistro($dtRegistro) {
        $this->dtRegistro = $dtRegistro;
    }

    function setHrRegistro($hrRegistro) {
        $this->hrRegistro = $hrRegistro;
    }

}
