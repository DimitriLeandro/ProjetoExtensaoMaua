desc users;
desc tb_paciente;
desc tb_triagem;
desc tb_diagnostico;
desc tb_estabelecimento;
select * from tb_paciente;
select * from tb_diagnostico;
select * from tb_triagem;
-- passando as chaves estrangeiras pro final da tabela pq fica + bonito
alter table tb_triagem change cd_paciente cd_paciente int(11) not null after ds_outras_condicoes;

-- trocando a tabela tb_estabelecimento por tb_ubs pra facilitar no php
-- poderia só trocar o nome da tabela? poderia, porém ia ter que ficar dando alter table nos campos mó saco
-- essa tabela nova tb_ubs vai ter o cep tb pra lá na frente a gnt verificar qual upa ta + perto do fulano
create table tb_ubs(
	cd_ubs int(9) not null auto_increment,
    nm_ubs varchar(60),
    cd_cnes int(7) not null,
    cd_cep varchar(10),
    constraint pk_ubs primary key (cd_ubs)
);
insert into tb_ubs (nm_ubs, cd_cnes) 
	select nm_estabelecimento, cd_cnes_estabelecimento
		from tb_estabelecimento;
select * from tb_ubs;
update tb_ubs set cd_cep = '09370670' where cd_ubs = 2;
drop table tb_estabelecimento;

-- agora é fazer todos os campos das outras tabelas que fazem referencia ao cd_cnes virarem chave estrangeira de tb_ubs
-- começando com tb_paciente alter
alter table tb_paciente change cd_ubs_referencia cd_ubs_referencia int(9) after hr_adesao;
update tb_paciente set cd_ubs_referencia = 4 where cd_paciente > 0;
alter table tb_paciente add constraint fk_paciente_ubs_referencia foreign key (cd_ubs_referencia) references tb_ubs (cd_ubs);
alter table tb_paciente change cd_cnes cd_ubs int(9) after cd_ubs_referencia;
update tb_paciente set cd_ubs = 4 where cd_paciente > 0;
alter table tb_paciente drop foreign key fk_paciente_ubs;
alter table tb_paciente add constraint fk_paciente_ubs_referencia foreign key (cd_ubs_referencia) references tb_ubs (cd_ubs);
alter table tb_paciente add constraint fk_paciente_ubs foreign key (cd_ubs) references tb_ubs (cd_ubs);
-- lembrando que cd_ubs_referencia é onde o sujeito deveria estar e cd_ubs é onde ele está no momento
-- indo pra tb_triagem
alter table tb_triagem change cd_cnes cd_ubs int(9) after cd_paciente;
update tb_triagem set cd_ubs = 4 where cd_triagem > 0;
alter table tb_triagem add constraint fk_triagem_ubs foreign key (cd_ubs) references tb_ubs(cd_ubs);
-- tb_diagnostico
alter table tb_diagnostico change cd_cnes cd_ubs int(9) after ic_situacao;
update tb_diagnostico set cd_ubs = 4 where cd_diagnostico > 0;
alter table tb_diagnostico add constraint fk_diagnostico_ubs foreign key (cd_ubs) references tb_ubs(cd_ubs);