<?php
class Diagnostico
{
	private $cd_diagnostico = '';
	private $cd_cnes = '';
	private $ds_avaliacao = '';
	private $cd_cid = '';
	private $ds_prescricao = '';
	private $dt_diagnostico = '';
	private $hr_diagnostico = '';
	private $ic_situacao = '';
	private $cd_cns_profissional_diagnostico = '';
	private $cd_triagem = '';

	public function cadastrar_diagnostico()
	{
		//O INSERT NA TABELA DIAGNOSTICO É FEITO ATRAVÉS DE PROCEDURE
		//O CÓDIGO DA PROCEDURE ESTÁ COMENTADO LA EM BAIXO NO FINAL DESSE ARQUIVO
		require_once('conexao.Class.php');

		$conexao = new Conexao();
		$db_maua = $conexao -> conectar();

		//preparando o statement para o insert
		$stmt = $db_maua -> prepare("CALL sp_insert_diagnostico (?, ?, ?, ?, ?, ?, ?);");
		$stmt -> bind_param("issssii", 
								$this -> cd_cnes,
								$this -> ds_avaliacao,
								$this -> cd_cid,
								$this -> ds_prescricao,
								$this -> ic_situacao,
								$this -> cd_cns_profissional_diagnostico,
								$this -> cd_triagem
							);

		//executando o statement
		if($stmt -> execute())
		{
			//verificando se o statement deu certo
			$ok = 1;
			if($stmt -> affected_rows == 0)
			{
				$ok = 0;
			}
		}
		else
		{
			$ok = 0;
		}

		//encerrando a conexão com o banco e o statement
		$stmt -> close();
		$db_maua -> close();
		unset($conexão);

		return $ok;
	}

	//------------------------------FUNÇÕES DE SET 
	public function set_cd_diagnostico($aux)
	{
		$this -> cd_diagnostico = $aux;
	}
	public function set_cd_cnes($aux)
	{
		$this -> cd_cnes = $aux;
	}
	public function set_ds_avaliacao($aux)
	{
		$this -> ds_avaliacao = $aux;
	}
	public function set_cd_cid($aux)
	{
		$this -> cd_cid = $aux;
	}
	public function set_ds_prescricao($aux)
	{
		$this -> ds_prescricao = $aux;
	}
	public function set_dt_diagnostico($aux)
	{
		$this -> dt_diagnostico = $aux;
	}
	public function set_hr_diagnostico($aux)
	{
		$this -> hr_diagnostico = $aux;
	}
	public function set_ic_situacao($aux)
	{
		$this -> ic_situacao = $aux;
	}
	public function set_cd_cns_profissional_diagnostico($aux)
	{
		$this -> cd_cns_profissional_diagnostico = $aux;
	}
	public function set_cd_triagem($aux)
	{
		$this -> cd_triagem = $aux;
	}

	//---------------------------FUNÇÕES DE GET
	public function get_cd_diagnostico()
	{
		return $this -> cd_diagnostico;
	}
	public function get_cd_cnes()
	{
		return $this -> cd_cnes;
	}
	public function get_ds_avaliacao()
	{
		return $this -> ds_avaliacao;
	}
	public function get_cd_cid()
	{
		return $this -> cd_cid;
	}
	public function get_ds_prescricao()
	{
		return $this -> ds_prescricao;
	}
	public function get_dt_diagnostico()
	{
		return $this -> dt_diagnostico;
	}
	public function get_hr_diagnostico()
	{
		return $this -> hr_diagnostico;
	}
	public function get_ic_situacao()
	{
		return $this -> ic_situacao;
	}
	public function get_cd_cns_profissional_diagnostico()
	{
		return $this -> cd_cns_profissional_diagnostico;
	}
	public function get_cd_triagem()
	{
		return $this -> cd_triagem;
	}
}

/*----------------------------------------------------------SCRIPT DA PROCEDURE DE INSERT---------------------------------
DELIMITER //
--	ESSA PROCEDURE FAZ O INSERT NA TABELA DE DIAGNOSTICO
--	UMA TRIAGEM SÓ PODE TER UM DIAGNOSTICO, ESSA PROCEDURE VERIFICA SE JÁ HÁ ALGUM DIAGNOSTICO PARA UMA TRIAGEM ESPECIFICA ANTES DE FAZER O INSERT
--	CASO JÁ EXISTA, A PROCEDURE NÃO FARÁ O INSERT
--  ESSE PROCEDIMENTO NÃO ODE SER FEITO COM TRIGGER POIS UM TRIGGER NÃO PODE FAZER INSERT/UPDATE/DELETE NA MESMA TABELA QUE DISPARA O TRIGGER
--  OS PARAMETROS DE DATA E HORA NÃO PRECISAM SER ENVIADOS PARA ESSA PROCEDURE POIS O MYSQL PODE PEGAR ESSES VALORES SOZINHO COM O COMANDO "NOW()"
    
--  tb_triagem:1::1:tb_diagnostico, apesar de usar uma chave estrangeira, é uma relação 1 para 1
    
--  ESSA PROCEDURE RETORNA O PARAMETRO "id" QUE É O ID DO DIAGNOSTICO INSERIDO, OU 0 CASO O INSERT NÃO SEJA EXECUTADO

CREATE PROCEDURE sp_insert_diagnostico(IN cnes INT, IN avaliacao TEXT, IN cid VARCHAR(30), IN prescricao TEXT, IN situacao VARCHAR(40), IN cns_medico INT(11), IN triagem INT(11))
BEGIN 
	-- USANDO UMA VARIAVEL PARA SABER A QUANTIDADE DE DIAGNOSTICOS QUE A TRIAGEM EM QUESTÃO TEM
    DECLARE id INT;
	DECLARE qtd INT;
    SET qtd = (SELECT COUNT(cd_diagnostico) FROM tb_diagnostico WHERE cd_triagem = triagem);
	-- SE FOR 0, OK, PODE FAZER O INSERT, SENÃO, ALGO DE ERRADO NÃO ESTÁ CERTO, POIS UMA TRIAGEM NÃO PODE TER MAIS DE UM DIAGNOSTICO
    IF qtd = 0 THEN
		INSERT IGNORE INTO tb_diagnostico (cd_cnes, ds_avaliacao, cd_cid, ds_prescricao, dt_diagnostico, hr_diagnostico, ic_situacao, cd_cns_profissional_diagnostico, cd_triagem) VALUES
		(cnes, avaliacao, cid, prescricao, now(), now(), situacao, cns_medico, triagem);
        SET id = LAST_INSERT_ID();
	ELSE
		SET id = 0;
    END IF;
    -- AGORA É NECESSÁRIO VERIFICAR SE HOUVE INSERT, CASO SIM, ENTÃO A TRIAGEM DEVE SER FINALIZADA.
    IF id != 0 THEN
		UPDATE tb_triagem SET ic_finalizada = 1 WHERE cd_triagem = triagem;
    END IF;
    -- FAZENDO O SELECT PARA SER O RETORNO DO PROCEDIMENTO
    SELECT id;
END //
DELIMITER ;
*/
?>