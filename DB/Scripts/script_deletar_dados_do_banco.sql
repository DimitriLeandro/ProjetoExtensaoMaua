-- TOTAL DE CADA TABELA
select 
	(select count(*) from tb_paciente) as pacientes,
    (select count(*) from tb_triagem) as triagens,
    (select count(*) from tb_diagnostico) as diagnosticos;
    
-- DELETANDO PACIENTES
select * from tb_paciente where cd_paciente > 0 limit 1000;
select * from tb_triagem where cd_paciente > 1121;
delete from tb_diagnostico where cd_triagem >= 1633;
delete from tb_triagem where cd_paciente > 1121;
delete from tb_espera where cd_paciente > 1121;
delete from tb_paciente where cd_paciente > 1121;

-- DELETANDO TRIAGENS
select * from tb_triagem where cd_triagem > 0 limit 1000;
delete from tb_diagnostico where cd_triagem > 1152;
delete from tb_triagem where cd_triagem > 1152;

-- DELETANDO DIAGNOSTICOS
select * from tb_diagnostico where cd_diagnostico > 0 limit 1000;
delete from tb_diagnostico where cd_diagnostico > 5135;


-- QUAIS TRIAGENS NÃO TEM DIAGNOSTICOS
select u.cd_triagem
from tb_triagem u
left outer join tb_diagnostico a on a.cd_triagem = u.cd_triagem
where a.cd_triagem is null;

select * from tb_triagem where cd_triagem = 10153;
select * from tb_diagnostico where cd_triagem = 10153;
delete from tb_diagnostico where cd_triagem = 10153;
delete from tb_triagem where cd_triagem = 10153;