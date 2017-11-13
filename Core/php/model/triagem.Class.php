<?php
class Triagem
{
	private $cd_triagem = '';
	private $cd_paciente = '';
	private $cd_cnes = '';
	private $ds_queixa = '';
	private $dt_triagem = '';
	private $hr_triagem = '';
	private $vl_pressao_min = '';
	private $vl_pressao_max = '';
	private $vl_pulso = '';
	private $vl_temperatura = '';
	private $vl_respiracao = '';
	private $vl_saturacao = '';
	private $vl_glicemia = '';
	private $vl_nivel_consciencia = '';
	private $vl_escala_dor = '';
	private $ic_alergia = '';
	private $ds_alergia = '';
	private $ds_observacao = '';
	private $vl_classificacao_risco = '';
	private $ds_linha_cuidado = '';
	private $ds_outras_condicoes = '';
	private $cd_cns_profissional_triagem = '';

	public function cadastrar_triagem()
	{
		//criando uma conexão com o banco
		require_once('conexao.Class.php');

		$conexao = new Conexao();
		$db_maua = $conexao -> conectar();

		$txt_insert = 	"INSERT INTO  tb_triagem (
							cd_paciente, 
							cd_cnes, 
							ds_queixa, 
							dt_triagem, 
							hr_triagem, 
							vl_pressao_min, 
							vl_pressao_max, 
							vl_pulso, 
							vl_temperatura, 
							vl_respiracao, 
							vl_saturacao, 
							vl_glicemia, 
							vl_nivel_consciencia, 
							vl_escala_dor, 
							ic_alergia, 
							ds_alergia, 
							ds_observacao, 
							vl_classificacao_risco, 
							ds_linha_cuidado, 
							ds_outras_condicoes, 
							cd_cns_profissional_triagem) 
						VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

		//preparando o statement para o insert
		$stmt = $db_maua -> prepare($txt_insert);
		$stmt -> bind_param("iisssdddddddiisssissi", 
								$this->cd_paciente, 
								$this->cd_cnes, 
								$this->ds_queixa, 
								$this->dt_triagem, 
								$this->hr_triagem, 
								$this->vl_pressao_min, 
								$this->vl_pressao_max, 
								$this->vl_pulso, 
								$this->vl_temperatura, 
								$this->vl_respiracao, 
								$this->vl_saturacao, 
								$this->vl_glicemia, 
								$this->vl_nivel_consciencia, 
								$this->vl_escala_dor, 
								$this->ic_alergia, 
								$this->ds_alergia, 
								$this->ds_observacao, 
								$this->vl_classificacao_risco, 
								$this->ds_linha_cuidado, 
								$this->ds_outras_condicoes, 
								$this->cd_cns_profissional_triagem);

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

	public function selecionar_triagem($codigo_triagem)
	{
		//esse método ainda não está completo, todos os atributos da tabela devem ser selecionados
		require_once('conexao.Class.php');
		$conexao = new Conexao();
		$db_maua = $conexao -> conectar();

		$txt_select = "SELECT 	cd_triagem,
								cd_paciente,
						        cd_cnes,
						        ds_queixa,
						        dt_triagem,
						        hr_triagem,
						        vl_pressao_min,
						        vl_pressao_max,
						        vl_pulso,
						        vl_temperatura,
						        vl_respiracao,
						        vl_saturacao,
						        vl_glicemia,
						        vl_nivel_consciencia,
						        vl_escala_dor,
						        ic_alergia,
						        ds_alergia,
						        ds_observacao,
						        vl_classificacao_risco,
						        ds_linha_cuidado,
						        ds_outras_condicoes,
						        cd_cns_profissional_triagem
						FROM tb_triagem
						WHERE cd_triagem = ?;";

		if ($stmt = $db_maua->prepare($txt_select)) 
		{
			$stmt -> bind_param('i', $codigo_triagem);
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
		    					$attr_22);
		    while ($stmt->fetch()) 
		    {
		        $this -> set_cd_triagem($attr_1);
				$this -> set_cd_paciente($attr_2); 
				$this -> set_cd_cnes($attr_3);
				$this -> set_ds_queixa($attr_4);
				$this -> set_dt_triagem($attr_5);
				$this -> set_hr_triagem($attr_6);
				$this -> set_vl_pressao_min($attr_7);
				$this -> set_vl_pressao_max($attr_8);
				$this -> set_vl_pulso($attr_9);
				$this -> set_vl_temperatura($attr_10);
				$this -> set_vl_respiracao($attr_11);
				$this -> set_vl_saturacao($attr_12);
				$this -> set_vl_glicemia($attr_13);
				$this -> set_vl_nivel_consciencia($attr_14);
				$this -> set_vl_escala_dor($attr_15);
				$this -> set_ic_alergia($attr_16);
				$this -> set_ds_alergia($attr_17);
				$this -> set_ds_observacao($attr_18);
				$this -> set_vl_classificacao_risco($attr_19); 
				$this -> set_ds_linha_cuidado($attr_20);
				$this -> set_ds_outras_condicoes($attr_21);
				$this -> set_cd_cns_profissional_triagem($attr_22);
		    }

		    $stmt->close();
		}

		$db_maua->close();
		unset($conexão);
	}


	//FUNÇÕES DE GET SET-----------------------------------------------------------------------------------
	public function set_cd_triagem($aux)
	{
		$this->cd_triagem = $aux;
	}
	public function set_cd_paciente($aux)
	{
		$this->cd_paciente = $aux;
	}
	public function set_cd_cnes($aux)
	{
		$this->cd_cnes = $aux;
	} 
	public function set_ds_queixa($aux)
	{
		$this->ds_queixa = $aux;
	} 
	public function set_dt_triagem($aux)
	{
		$this->dt_triagem = $aux;
	}
	public function set_hr_triagem($aux)
	{
		$this->hr_triagem = $aux;
	} 
	public function set_vl_pressao_min($aux)
	{
		$this->vl_pressao_min = $aux;
	} 
	public function set_vl_pressao_max($aux)
	{
		$this->vl_pressao_max = $aux;
	} 
	public function set_vl_pulso($aux)
	{
		$this->vl_pulso = $aux;
	} 
	public function set_vl_temperatura($aux)
	{
		$this->vl_temperatura = $aux;
	} 
	public function set_vl_respiracao($aux)
	{
		$this->vl_respiracao = $aux;
	} 
	public function set_vl_saturacao($aux)
	{
		$this->vl_saturacao = $aux;
	} 
	public function set_vl_glicemia($aux)
	{
		$this->vl_glicemia = $aux;
	} 
	public function set_vl_nivel_consciencia($aux)
	{
		$this->vl_nivel_consciencia = $aux;
	}
	public function set_vl_escala_dor($aux)
	{
		$this->vl_escala_dor = $aux;
	}
	public function set_ic_alergia($aux)
	{
		$this->ic_alergia = $aux;
	}
	public function set_ds_alergia($aux)
	{
		$this->ds_alergia = $aux;
	}
	public function set_ds_observacao($aux)
	{
		$this->ds_observacao = $aux;
	}
	public function set_vl_classificacao_risco($aux)
	{
		$this->vl_classificacao_risco = $aux;
	}
	public function set_ds_linha_cuidado($aux)
	{
		$this->ds_linha_cuidado = $aux;
	}
	public function set_ds_outras_condicoes($aux)
	{
		$this->ds_outras_condicoes = $aux;
	}
	public function set_cd_cns_profissional_triagem($aux)
	{
		$this->cd_cns_profissional_triagem = $aux;
	}

	//FUNÇÕES DE GET-------------------------------------------------------------------------------
	public function get_cd_triagem()
	{
		return $this->cd_triagem;
	}
	public function get_cd_paciente()
	{
		return $this->cd_paciente;
	}
	public function get_cd_cnes()
	{
		return $this->cd_cnes;
	} 
	public function get_ds_queixa()
	{
		return $this->ds_queixa;
	} 
	public function get_dt_triagem()
	{
		return $this->dt_triagem;
	}
	public function get_hr_triagem()
	{
		return $this->hr_triagem;
	} 
	public function get_vl_pressao_min()
	{
		return $this->vl_pressao_min;
	} 
	public function get_vl_pressao_max()
	{
		return $this->vl_pressao_max;
	} 
	public function get_vl_pulso()
	{
		return $this->vl_pulso;
	} 
	public function get_vl_temperatura()
	{
		return $this->vl_temperatura;
	} 
	public function get_vl_respiracao()
	{
		return $this->vl_respiracao;
	} 
	public function get_vl_saturacao()
	{
		return $this->vl_saturacao;
	} 
	public function get_vl_glicemia()
	{
		return $this->vl_glicemia;
	} 
	public function get_vl_nivel_consciencia()
	{
		return $this->vl_nivel_consciencia;
	}
	public function get_vl_escala_dor()
	{
		return $this->vl_escala_dor;
	}
	public function get_ic_alergia()
	{
		return $this->ic_alergia;
	}
	public function get_ds_alergia()
	{
		return $this->ds_alergia;
	}
	public function get_ds_observacao()
	{
		return $this->ds_observacao;
	}
	public function get_vl_classificacao_risco()
	{
		return $this->vl_classificacao_risco;
	}
	public function get_ds_linha_cuidado()
	{
		return $this->ds_linha_cuidado;
	}
	public function get_ds_outras_condicoes()
	{
		return $this->ds_outras_condicoes;
	}
	public function get_cd_cns_profissional_triagem()
	{
		return $this->cd_cns_profissional_triagem;
	}
}
?>