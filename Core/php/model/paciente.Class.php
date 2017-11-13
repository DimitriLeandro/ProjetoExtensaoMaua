<?php
class Paciente
{
	private $cd_paciente = '';
	private $cd_cns_paciente = '';
	private $nm_justificativa = '';
	private $nm_paciente = '';
	private $nm_mae = '';
	private $ic_sexo = '';
	private $ic_raca = '';
	private $dt_nascimento = ''; 
	private $nm_pais_nascimento = '';
	private $nm_municipio_nascimento = ''; 
	private $nm_pais_residencia = '';
	private $nm_municipio_residencia = ''; 
	private $cd_cep = '';
	private $nm_logradouro = ''; 
	private $nm_numero_residencia = ''; 
	private $nm_complemento = '';
	private $nm_bairro = '';
	private $cd_ubs_referencia = ''; 
	private $nm_responsavel = '';
	private $cd_documento_responsavel = ''; 
	private $nm_orgao_emissor = '';
	private $cd_cnes = '';
	private $dt_adesao = '';
	private $hr_adesao = '';
	private $cd_profissional_registro = '';


	public function cadastrar_paciente()
	{
		//criando uma conexão com o banco
		require_once('conexao.Class.php');

		$conexao = new Conexao();
		$db_maua = $conexao -> conectar();

		$txt_insert = 	"INSERT INTO tb_paciente (
							cd_cns_paciente, 
							nm_justificativa, 
							nm_paciente, 
							nm_mae, 
							ic_sexo, 
							ic_raca, 
							dt_nascimento, 
							nm_pais_nascimento, 
							nm_municipio_nascimento, 
							nm_pais_residencia, 
							nm_municipio_residencia, 
							cd_cep, 
							nm_logradouro, 
							nm_numero_residencia, 
							nm_complemento, 
							nm_bairro, 
							cd_ubs_referencia, 
							nm_responsavel, 
							cd_documento_responsavel, 
							nm_orgao_emissor, 
							cd_cnes, 
							dt_adesao, 
							hr_adesao, 
							cd_profissional_registro) 
						VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

		//preparando o statement para o insert
		$stmt = $db_maua -> prepare($txt_insert);
		$stmt -> bind_param("issssssssssissssisisissi", 
								$this -> cd_cns_paciente, 
								$this -> nm_justificativa, 
								$this -> nm_paciente, 
								$this -> nm_mae, 
								$this -> ic_sexo, 
								$this -> ic_raca, 
								$this -> dt_nascimento, 
								$this -> nm_pais_nascimento,
								$this -> nm_municipio_nascimento, 
								$this -> nm_pais_residencia, 
								$this -> nm_municipio_residencia, 
								$this -> cd_cep, 
								$this -> nm_logradouro, 
								$this -> nm_numero_residencia, 
								$this -> nm_complemento, 
								$this -> nm_bairro, 
								$this -> cd_ubs_referencia, 
								$this -> nm_responsavel, 
								$this -> cd_documento_responsavel, 
								$this -> nm_orgao_emissor, 
								$this -> cd_cnes, 
								$this -> dt_adesao, 
								$this -> hr_adesao, 
								$this -> cd_profissional_registro);

		//executando o statement
		if($stmt -> execute())
		{
			//verificando se o statement deu certo
			$ok = 1;
			if($stmt -> affected_rows == 0)
			{
				$ok = 0;
			}
			else
			{
				$this -> cd_paciente = $stmt -> insert_id;
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

	public function selecionar_paciente($codigo_paciente)
	{
		//estabelecendo conexão com o banco
		require_once('conexao.Class.php');
		$conexao = new Conexao();
		$db_maua = $conexao -> conectar();

		//escrevendo o comando select
		$select = "	SELECT 	cd_paciente,
							cd_cns_paciente, 
							nm_justificativa, 
							nm_paciente, 
							nm_mae, 
							ic_sexo, 
							ic_raca, 
							dt_nascimento, 
							nm_pais_nascimento,
							nm_municipio_nascimento, 
							nm_pais_residencia, 
							nm_municipio_residencia, 
							cd_cep, 
							nm_logradouro, 
							nm_numero_residencia, 
							nm_complemento, 
							nm_bairro, 
							cd_ubs_referencia, 
							nm_responsavel, 
							cd_documento_responsavel, 
							nm_orgao_emissor, 
							cd_cnes, 
							dt_adesao, 
							hr_adesao, 
							cd_profissional_registro
				   	FROM tb_paciente 
				   	WHERE cd_paciente = ?";

		//iniciando o statement
		if ($stmt = $db_maua->prepare($select))
		{
			$stmt->bind_param('i', $codigo_paciente);
		    $stmt->execute();
		    $stmt->bind_result(	$attr_1, 
		    					$attr_2,
								$attr_3,
								$attr_4,
								$attr_5,
								$attr_6,
								$attr_7,
								$attr_8,
								$attr_9,
								$attr_10,
								$attr_11,
								$attr_12,
								$attr_13,
								$attr_14,
								$attr_15,
								$attr_16,
								$attr_17,
								$attr_18,
								$attr_19,
								$attr_20,
								$attr_21,
								$attr_22,
								$attr_23,
								$attr_24,
								$attr_25);
		    //setando os atributos da classe
		    while ($stmt->fetch()) 
		    {
		        $this->set_cd_paciente($attr_1);
				$this->set_cd_cns_paciente($attr_2);
				$this->set_nm_justificativa($attr_3);
				$this->set_nm_paciente($attr_4);
				$this->set_nm_mae($attr_5);
				$this->set_ic_sexo($attr_6);
				$this->set_ic_raca($attr_7);
				$this->set_dt_nascimento($attr_8);
				$this->set_nm_pais_nascimento($attr_9);
				$this->set_nm_municipio_nascimento($attr_10);
				$this->set_nm_pais_residencia($attr_11);
				$this->set_nm_municipio_residencia($attr_12);
				$this->set_cd_cep($attr_13);
				$this->set_nm_logradouro($attr_14);
				$this->set_nm_numero_residencia($attr_15);
				$this->set_nm_complemento($attr_16);
				$this->set_nm_bairro($attr_17);
				$this->set_cd_ubs_referencia($attr_18);
				$this->set_nm_responsavel($attr_19);
				$this->set_cd_documento_responsavel($attr_20);
				$this->set_nm_orgao_emissor($attr_21);
				$this->set_cd_cnes($attr_22);
				$this->set_dt_adesao($attr_23);
				$this->set_hr_adesao($attr_24);
				$this->set_cd_profissional_registro($attr_25);
		    }
		}

		$stmt->close();
		$db_maua->close();
		unset($conexão);
	}


	//FUNÇÕES DE SET-----------------------------------------------------------------------------------------------
	public function set_cd_paciente($aux)
	{
		$this->cd_paciente = $aux;
	}
	public function set_cd_cns_paciente($aux)
	{
		$this->cd_cns_paciente = $aux;
	}
	public function set_nm_justificativa($aux)
	{
		$this->nm_justificativa = $aux;
	}
	public function set_nm_paciente($aux)
	{
		$this->nm_paciente = $aux;
	}
	public function set_nm_mae($aux)
	{
		$this->nm_mae = $aux;
	}
	public function set_ic_sexo($aux)
	{
		$this->ic_sexo = $aux;
	}
	public function set_ic_raca($aux)
	{
		$this->ic_raca = $aux;
	}
	public function set_dt_nascimento($aux)
	{
		$this->dt_nascimento = $aux;
	}
	public function set_nm_pais_nascimento($aux)
	{
		$this->nm_pais_nascimento = $aux;
	}
	public function set_nm_municipio_nascimento($aux)
	{
		$this->nm_municipio_nascimento = $aux;
	}
	public function set_nm_pais_residencia($aux)
	{
		$this->nm_pais_residencia = $aux;
	}
	public function set_nm_municipio_residencia($aux)
	{
		$this->nm_municipio_residencia = $aux;
	}
	public function set_cd_cep($aux)
	{
		$this->cd_cep = $aux;
	}
	public function set_nm_logradouro($aux)
	{
		$this->nm_logradouro = $aux;
	}
	public function set_nm_numero_residencia($aux)
	{
		$this->nm_numero_residencia = $aux;
	}
	public function set_nm_complemento($aux)
	{
		$this->nm_complemento = $aux;
	}
	public function set_nm_bairro($aux)
	{
		$this->nm_bairro = $aux;
	}
	public function set_cd_ubs_referencia($aux)
	{
		$this->cd_ubs_referencia = $aux;
	}
	public function set_nm_responsavel($aux)
	{
		$this->nm_responsavel = $aux;
	}
	public function set_cd_documento_responsavel($aux)
	{
		$this->cd_documento_responsavel = $aux;
	}
	public function set_nm_orgao_emissor($aux)
	{
		$this->nm_orgao_emissor = $aux;
	}
	public function set_cd_cnes($aux)
	{
		$this->cd_cnes = $aux;
	}
	public function set_dt_adesao($aux)
	{
		$this->dt_adesao = $aux;
	}
	public function set_hr_adesao($aux)
	{
		$this->hr_adesao = $aux;
	}
	public function set_cd_profissional_registro($aux)
	{
		$this->cd_profissional_registro = $aux;
	}

	//FUNÇÕES DE GET----------------------------------------------------------------------------------------------
	public function get_cd_paciente()
	{
		return $this->cd_paciente;
	}
	public function get_cd_cns_paciente()
	{
		return $this->cd_cns_paciente;
	}
	public function get_nm_justificativa()
	{
		return $this->nm_justificativa;
	}
	public function get_nm_paciente()
	{
		return $this->nm_paciente;
	}
	public function get_nm_mae()
	{
		return $this->nm_mae;
	}
	public function get_ic_sexo()
	{
		return $this->ic_sexo;
	}
	public function get_ic_raca()
	{
		return $this->ic_raca;
	}
	public function get_dt_nascimento()
	{
		return $this->dt_nascimento;
	}
	public function get_nm_pais_nascimento()
	{
		return $this->nm_pais_nascimento;
	}
	public function get_nm_municipio_nascimento()
	{
		return $this->nm_municipio_nascimento;
	}
	public function get_nm_pais_residencia()
	{
		return $this->nm_pais_residencia;
	}
	public function get_nm_municipio_residencia()
	{
		return $this->nm_municipio_residencia;
	}
	public function get_cd_cep()
	{
		return $this->cd_cep;
	}
	public function get_nm_logradouro()
	{
		return $this->nm_logradouro;
	}
	public function get_nm_numero_residencia()
	{
		return $this->nm_numero_residencia;
	}
	public function get_nm_complemento()
	{
		return $this->nm_complemento;
	}
	public function get_nm_bairro()
	{
		return $this->nm_bairro;
	}
	public function get_cd_ubs_referencia()
	{
		return $this->cd_ubs_referencia;
	}
	public function get_nm_responsavel()
	{
		return $this->nm_responsavel;
	}
	public function get_cd_documento_responsavel()
	{
		return $this->cd_documento_responsavel;
	}
	public function get_nm_orgao_emissor()
	{
		return $this->nm_orgao_emissor;
	}
	public function get_cd_cnes()
	{
		return $this->cd_cnes;
	}
	public function get_dt_adesao()
	{
		return $this->dt_adesao;
	}
	public function get_hr_adesao()
	{
		return $this->hr_adesao;
	}
	public function get_cd_profissional_registro()
	{
		return $this->cd_profissional_registro;
	}

}
?>