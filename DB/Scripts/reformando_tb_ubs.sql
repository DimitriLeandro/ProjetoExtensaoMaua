select * from tb_ubs;
alter table tb_ubs drop nm_ubs;
alter table tb_ubs drop cd_cnes;
alter table tb_ubs drop cd_cep;
alter table tb_ubs add cd_cep varchar(9);
alter table tb_ubs add nm_logradouro varchar(80);
alter table tb_ubs add nm_bairro varchar(50);
alter table tb_ubs add nm_ubs varchar(50);
delete from tb_ubs where cd_ubs != 4;

-- script do insert aqui, n vou colocar pq são trocentas linhas

update tb_ubs set nm_ubs = 'Não foi possível determinar a UBS de referência' where cd_ubs = 4;

select nm_paciente, cd_ubs_referencia, nm_ubs
	from tb_paciente, tb_ubs
		where tb_paciente.cd_ubs_referencia = tb_ubs.cd_ubs;