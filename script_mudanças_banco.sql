alter table tb_paciente add ic_ubs_espera int(11) default 0 after cd_cns_paciente;
alter table tb_paciente drop ic_espera;
alter table tb_diagnostico add cd_cnes int(11) after cd_diagnostico;
alter table tb_diagnostico change cd_cid cd_cid varchar(30);

update tb_paciente set cd_cnes = '6950043' where cd_paciente > 0;
update tb_triagem set cd_cnes = '6950043' where cd_triagem > 0;

alter table tb_triagem add ic_finalizada bool default 0 after cd_cnes;

select * from tb_triagem;

desc tb_triagem;
desc tb_paciente;

create table tb_diagnostico(
	cd_diagnostico int(11) not null auto_increment,
    ds_avaliacao text,
    cd_cid varchar(10),
    ds_prescricao text,
    dt_diagnostico date,
    hr_diagnostico time,
    ic_situacao varchar(40),
    cd_cns_profissional_diagnostico int(11),
    cd_triagem int(11),
    constraint pk_diagnostico
		primary key(cd_diagnostico),
	constraint fk_diagnostico_triagem
		foreign key(cd_triagem) 
			references tb_triagem(cd_triagem)
);

drop table tb_diagnostico;

select * from tb_triagem;

-- CREATE VIEW [Current Product List] AS
-- SELECT ProductID, ProductName
-- FROM Products
-- WHERE Discontinued = No;

create view vw_espera as
select cd_paciente, ic_ubs_espera
	from tb_paciente
		where ic_ubs_espera != 0;
        
select * from vw_espera;

create table tb_estabelecimento(
	cd_estabelecimento int not null auto_increment,
    nm_estabelecimento varchar(60),
    cd_cnes_estabelecimento int(11) not null,
    constraint pk_estabelecimento
		primary key(cd_estabelecimento)
);

insert into tb_estabelecimento (nm_estabelecimento, cd_cnes_estabelecimento) values
('UPA ZAIRA',6919456),
('UPA VILA ASSIS',6950043),
('UPA MAGINI CENTRO',6950051),
('UPA BARAO DE MAUA',2061562);

-- DELIMITER //
-- CREATE TRIGGER `tr_entrada_estoque` AFTER INSERT ON `tb_entrada`
--  FOR EACH ROW BEGIN 
-- 		declare qtd int;
--         declare total int;
--         
--         set qtd = new.qt_entrada;
--         set total = (select qt_estoque from tb_estoque where cd_pedal = new.cd_pedal);
--         
--         set total = total + qtd;
--         
--         update tb_estoque set qt_estoque = total where cd_pedal = new.cd_pedal;
-- END
-- //
-- DELIMITER ;
drop trigger tr_finalizar_triagem;

-- ESSA TRIGGER SERVE PARA FINALIZAR A TRIAGEM DO PACIENTE QUANDO SEU DIAGNOSTICO É FEITO E TAMBÉM PARA VERIFICAR
-- SE EXISTE MAIS DE UM DIAGNOSTICO PARA UMA MESMA TRIAGEM, POIS ISSO NÃO PODE ACONTECER
DELIMITER $$
CREATE TRIGGER tr_finalizar_triagem BEFORE INSERT ON tb_diagnostico
FOR EACH ROW BEGIN
	-- declarando as variaveis que serão necessárias
    DECLARE codigo_triagem INT;
    
    -- pegando o código da triagem na qual esse diagnóstico se refere
	SET codigo_triagem = new.cd_triagem;
    
    -- verificando se existe mais de um diagnostico para a mesma triagem
	-- se houver, excluir todos exceto o primeiro
    IF ((SELECT COUNT(cd_diagnostico) FROM tb_diagnostico WHERE cd_triagem = codigo_triagem) = 0) THEN
		-- finalizando a triagem
		UPDATE tb_triagem SET ic_finalizada = 1 WHERE cd_triagem = codigo_triagem;
	ELSE
		-- alterando os valores para o insert ter erro, essa é a unica maneira de fazer isso
        -- pois nao é possivel usar insert/update/delete na mesma tabela em que a trigger está
        -- ver mais: erro 1442
        SET new.cd_cnes = 'abc';
    END IF;
END 
$$
DELIMITER ;

select * from tb_triagem; -- 13, 14 e 15
desc tb_diagnostico;

insert into tb_diagnostico (cd_cnes, ds_avaliacao, cd_cid, ds_prescricao, dt_diagnostico, hr_diagnostico, ic_situacao, cd_cns_profissional_diagnostico, cd_triagem) values
('6950043', 'Requiro exame de Raio X para melhor avaliação do paciente', 'CID 10 - J15.9', 'Tomar mel para tosse 3x ao dia', now(), now(), 'Alta sem encaminhamento a UBS', 1, 15);

select * from tb_diagnostico;
DESC tb_paciente;
DESC tb_triagem;
DESC tb_diagnostico;

SELECT COUNT(cd_paciente) from tb_paciente; 

drop trigger tr_finalizar_espera;

DELIMITER //
CREATE TRIGGER tr_finalizar_espera AFTER INSERT ON tb_triagem
FOR EACH ROW
BEGIN
	DECLARE codigo_paciente INT;
	SET codigo_paciente = new.cd_paciente;
	UPDATE tb_paciente SET ic_ubs_espera = 0 WHERE cd_paciente = codigo_paciente; 
END
//
DELIMITER ;
UPDATE tb_paciente SET ic_ubs_espera = '6950043' WHERE cd_paciente > 0; 

select * from tb_paciente;