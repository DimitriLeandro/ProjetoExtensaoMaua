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

-- criar uma tabela cópia da ubs mas com códigos não repetidos chamada tb_ubs
alter table tb_endereco_ubs add aux varchar(50) after nm_bairro;
select tb_antiga.cd_cep, tb_antiga.nm_logradouro, tb_antiga.nm_bairro, tb_antiga.nm_ubs as teste, (select cd_ubs from tb_ubs where nm_ubs = teste) as meudeus from tb_antiga order by meudeus;