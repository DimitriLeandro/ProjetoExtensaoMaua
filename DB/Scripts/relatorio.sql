select * from tb_ubs;
select * from tb_triagem order by dt_registro;
select distinct ic_raca from tb_paciente;


-- SELECT DO RELATÓRIO
select 
	count(cd_triagem) as 'totalTriagens',
    (select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
			and ic_sexo = 'Masculino'
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27') as 'totalMasculino',
    (select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
			and ic_sexo = 'Feminino'
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27') as 'totalFeminino',
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 0
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 3) AS '0 - 3 anos',
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 3
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 6) AS '3 - 6 anos',
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 6
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 14) AS '6 - 14 anos',
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 14
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 19) AS '14 - 19 anos',
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 19
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 41) AS '19 - 41 anos',
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 41
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 60) AS '41 - 60 anos',
	(select count(tb_paciente.cd_paciente)
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 60) AS '60+',
	(select ds_queixa from tb_triagem where dt_registro between '2017-01-27' and '2018-02-27' group by ds_queixa order by count(cd_triagem) desc limit 1) as 'queixaPrincipal',
    (select count(distinct(tb_paciente.cd_paciente)) from tb_triagem, tb_paciente, tb_ubs 
	where tb_triagem.cd_paciente = tb_paciente.cd_paciente
    and tb_paciente.cd_ubs_referencia = tb_ubs.cd_ubs
    and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
    and cd_ubs_referencia != 897) as 'qtdPacientesForaUbsReferencia'
	from tb_triagem 
		where dt_registro between '2017-01-27' and '2018-02-27';
        
-- --------------------------------------------------------------------------------------- SELECTS SEPARADOS
-- qtd de atendimentos entre as datas A e B
select count(cd_triagem) as 'totalTriagens' 
	from tb_triagem 
		where dt_registro between '2017-01-27' and '2018-02-27';

-- qtd de atendimentos de pacientes por sexo entre um pariodo
select
(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
			and ic_sexo = 'Masculino'
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27') as 'masculino',
(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
			and ic_sexo = 'Feminino'
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27') as 'feminino';
       
-- qtd de atendimentos por idade
select
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 0
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 3) AS '0 - 3 anos',
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 3
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 6) AS '3 - 6 anos',
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 6
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 14) AS '6 - 14 anos',
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 14
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 19) AS '14 - 19 anos',
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 19
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 41) AS '19 - 41 anos',
	(select count(tb_paciente.cd_paciente) 
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 41
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) < 60) AS '41 - 60 anos',
	(select count(tb_paciente.cd_paciente)
	from tb_paciente, tb_triagem 
		where tb_paciente.cd_paciente = tb_triagem.cd_paciente
            and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
            and TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= 60) AS '60+';
        
-- Queixas mais recorrentes
select ds_queixa, count(cd_triagem) 
	from tb_triagem 
		where dt_registro between '2018-02-01' and '2018-03-01' 
			group by ds_queixa 
				order by count(cd_triagem) desc;
        
-- quais pacientes não estão na ubs de referencia?
select distinct(tb_paciente.cd_paciente), nm_paciente, tb_triagem.dt_registro, tb_ubs.cd_ubs, nm_ubs 
	from tb_triagem, tb_paciente, tb_ubs 
		where tb_triagem.cd_paciente = tb_paciente.cd_paciente and tb_paciente.cd_ubs_referencia = tb_ubs.cd_ubs
			and tb_triagem.dt_registro between '2017-01-27' and '2018-02-27'
				and cd_ubs_referencia != 897
					order by nm_ubs, tb_triagem.dt_registro;