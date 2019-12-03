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

abstract class Ciclo {
	
    protected $cdUbs;
    protected $dtRegistro;
    protected $hrRegistro;
    protected $db_pumas_equipamento; //não tem get nem set
    protected $attr; //isso é um array que serve para os métodos de selecionar() //não tem get nem set

    public function __construct() {
        //fazendo a conexão com o banco para que todas as classes filhas não precisem fazer isso novamente
        $obj_conn = new Conexao();
        $this->db_pumas_equipamento = $obj_conn->get_db_pumas_equipamento();
        //atribuindo valor ao $cdUbs
		//cdUbs é diferente de cdUbsReferencia. O cdUbs é a ubs onde o sistema está sendo rodado e cdUbsReferencia é onde o paciente deveria ir
        $this->setCdUbs($obj_conn->getCdUbs());
        //dizendo que $attr é um array
        $this->attr = array();
    }

    abstract function cadastrar();

    abstract function selecionar($id);

    abstract function atualizar($id);

    //----------------------------FUNÇÕES GET E SET -- menos getset pro $db_pumas_equipamento e set pro cdUsuarioRegistro
    function getCdUbs() {
        return $this->cdUbs;
    }

    function getDtRegistro() {
        return $this->dtRegistro;
    }

    function getHrRegistro() {
        return $this->hrRegistro;
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

?>