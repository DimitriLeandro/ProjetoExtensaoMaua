desc tb_ubs;
drop table tb_endereco_ubs;

-- criando a tabela que vai ter os ceps das ubs
create table tb_endereco_ubs(
	cd_endereco_ubs int(9) not null auto_increment,
    cd_cep varchar(9) not null,
    nm_logradouro varchar(80),
    nm_bairro varchar(50),
    cd_ubs int(9),
    constraint pk_endereco_ubs primary key (cd_endereco_ubs),
    constraint fk_endereco_ubs_ubs foreign key(cd_ubs) references tb_ubs(cd_ubs)
);
-- trocar o nome da tb_ubs
-- criar uma tabela cópia da ubs mas com códigos não repetidos chamada tb_ubs
-- trocar todas as referencias à tabela antiga pra a nova (isso provavelmente terá que ser feito colocando todos os pacientes numa única ubs pra não dar erro)
-- insert na tabela de ceps 

RENAME TABLE `tb_ubs` TO `tb_antiga`;
desc tb_antiga;
drop table tb_ubs;
create table tb_ubs(
	cd_ubs int(9) not null auto_increment,
    nm_ubs varchar(50),
    constraint pk_ubs primary key (cd_ubs)
);

-- fazendo o insert na tabela tb_ubs a partir de um select da tabela antiga sem repetições
insert into tb_ubs (nm_ubs) select nm_ubs from tb_antiga where nm_ubs != 'Consulte Numeração da Rua' group by nm_ubs;

select * from tb_antiga;
select * from tb_ubs;
select * from tb_endereco_ubs;

delete from tb_antiga where nm_ubs = 'Consulte Numeração da Rua';

-- insert na tabela de ceps
-- só consigo criar o select comum campo a mais do nome da ubs, por isso vou adicionar um campo na tb_ubs, fazer o insert, e depois eu dou um drop nesse campo
alter table tb_endereco_ubs add aux varchar(50) after nm_bairro;
insert into tb_endereco_ubs (cd_cep, nm_logradouro, nm_bairro, aux, cd_ubs)
select tb_antiga.cd_cep, nm_logradouro, nm_bairro, tb_antiga.nm_ubs as aux, (select cd_ubs from tb_ubs where nm_ubs = aux) as cd_ubs from tb_antiga order by cd_ubs;
-- agora que já fiz o insert a apartir do select, vou excluir o campo auxiliar
alter table tb_endereco_ubs drop aux;

-- alterando todas as tabelas que faziam referencia a tb_ubs. Agora elas estão fazendo referencia a tb_antiga. Preciso trocar isso pra excluir a tb antiga
desc tb_paciente;
desc tb_triagem;
desc tb_diagnostico;
desc tb_espera;

update tb_paciente set cd_ubs = 6 where cd_paciente > 0;
update tb_paciente set cd_ubs_referencia = 6 where cd_paciente > 0;
update tb_triagem set cd_ubs = 6 where cd_triagem > 0;
update tb_diagnostico set cd_ubs = 6 where cd_diagnostico > 0;
update tb_espera set cd_ubs = 6 where cd_espera > 0;

-- agora alterando as referencias dessas tabelas de tb_antiga para tb_ubs
alter table tb_paciente drop foreign key fk_paciente_ubs;
alter table tb_paciente drop foreign key fk_paciente_ubs_referencia;
alter table tb_triagem drop foreign key fk_triagem_ubs;
alter table tb_diagnostico drop foreign key fk_diagnostico_ubs;
alter table tb_espera drop foreign key fk_espera_ubs;

-- fazendo as novas referencias
alter table tb_paciente add constraint fk_paciente_ubs foreign key (cd_ubs) references tb_ubs(cd_ubs);
alter table tb_paciente add constraint fk_paciente_ubs_referencia foreign key (cd_ubs_referencia) references tb_ubs(cd_ubs);
alter table tb_triagem add constraint fk_triagem_ubs foreign key (cd_ubs) references tb_ubs(cd_ubs);
alter table tb_diagnostico add constraint fk_diagnostico_ubs foreign key (cd_ubs) references tb_ubs(cd_ubs);
alter table tb_espera add constraint fk_espera_ubs foreign key (cd_ubs) references tb_ubs(cd_ubs);

-- agora ta tudo lindo, ta tudo maravilhoso, vamo que vamo
drop table tb_antiga;