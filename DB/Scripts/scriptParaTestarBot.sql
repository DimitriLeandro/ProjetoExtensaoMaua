use db_maua;

-- PACIENTES POR SEXO
select count(*), ic_sexo from tb_paciente group by ic_sexo; 

-- PACIENTES POR RAÇA
select count(*), ic_raca from tb_paciente group by ic_raca; 

-- PACIENTES COM O MESMO NOME
select count(*) as contador, nm_paciente from tb_paciente group by nm_paciente having contador > 1; 

-- PACIENTES COM O MESMO NOME DA MÃE
select count(*) as contador, nm_mae from tb_paciente group by nm_mae having contador > 1; 

-- TRIAGENS COM MAIS DE UM DIAGNÓSTICO (ISSO NÃO PODE ACONTECER)
select count(*) as contador, cd_triagem from tb_diagnostico group by cd_triagem having contador > 1 order by contador desc; 

-- PACIENTES COM MAIS DE UMA TRIAGEM
select count(*) as contador, cd_paciente from tb_triagem group by cd_paciente having contador > 1 order by contador desc limit 100000; 

-- QUANTIDADE DE PACIENTES COM MAIS DE UMA TRIAGEM 
select count(*) as qtd_pacientes, qtd_triagens 
	from (select count(*) as qtd_triagens from tb_triagem group by cd_paciente having qtd_triagens > 0 order by qtd_triagens) as tb_virtual
		group by qtd_triagens
			having qtd_pacientes > 0;

-- PACIENTES COM CEP ERRADO
select cd_paciente, nm_paciente, ic_sexo, ic_raca, dt_nascimento, cd_cep, nm_logradouro from tb_paciente where nm_logradouro is null limit 100000; 

-- QUANTIDADE DE PACIENTES COM CEP ERRADO
select count(*) as contador from tb_paciente where nm_logradouro is null limit 100000; 

-- QUAIS CEPS DERAM ERRADO?
select distinct cd_cep from tb_paciente where nm_logradouro is null limit 100000; 

-- QUANTOS CEPS ESTÃO ERRADOS?
select count(*) as total, (((select count(*) from (select distinct cd_cep from tb_paciente where nm_logradouro is null) as tb_virtual)/(select count(*) from tb_endereco_ubs)) * 100) as percentual
	from (select distinct cd_cep from tb_paciente where nm_logradouro is null) as tb_virtual;

-- TABELAS COMPLETAS
select * from tb_paciente order by cd_paciente desc limit 1000000;
select * from tb_triagem order by cd_triagem desc limit 1000000;
select * from tb_diagnostico order by cd_diagnostico desc limit 1000000;

-- TOTAL DE CADA TABELA
select 
	(select count(*) from tb_paciente) as pacientes,
    (select count(*) from tb_triagem) as triagens,
    (select count(*) from tb_diagnostico) as diagnosticos;