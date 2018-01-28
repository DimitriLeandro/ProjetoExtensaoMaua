SHOW TRIGGERS;

SHOW CREATE TRIGGER tr_finalizar_espera;
drop trigger tr_finalizar_espera;

drop view vw_espera;
create table tb_espera(
	cd_espera int not null auto_increment,
    ic_finalizada boolean,
    dt_registro date,
    hr_registro time,
    cd_paciente int,
    cd_ubs int,
    cd_usuario_registro int,
    constraint pk_espera primary key (cd_espera),
    constraint fk_espera_paciente foreign key (cd_paciente) references tb_paciente (cd_paciente),
    constraint fk_espera_ubs foreign key (cd_ubs) references tb_ubs (cd_ubs),
    constraint fk_espera_users foreign key (cd_usuario_registro) references users (id)
);

alter table tb_paciente drop ic_ubs_espera;

DELIMITER $$
CREATE TRIGGER tr_finalizar_espera AFTER INSERT ON tb_triagem
FOR EACH ROW
BEGIN
	UPDATE tb_espera SET ic_finalizada = 1 WHERE cd_paciente = new.cd_paciente;
END; $$
DELIMITER ;

desc tb_espera;
select * from tb_espera;

call sp_insert_espera(64, 4, 1);

DELIMITER **
CREATE PROCEDURE sp_insert_espera(IN paciente INT, IN ubs INT, IN usuario INT)
BEGIN
	DECLARE qtd_esperas_ativas INT;
    DECLARE id INT; -- cd_espera
    
    SET qtd_esperas_ativas = (SELECT COUNT(cd_espera) FROM tb_espera WHERE cd_paciente = paciente AND ic_finalizada = 0);
    IF qtd_esperas_ativas = 0 THEN
		INSERT IGNORE INTO tb_espera values (null, 0, now(), now(), paciente, ubs, usuario);
        SET id = LAST_INSERT_ID();
    ELSE
		SET id = 0;
    END IF;
    -- select como retorno da stored procedure
    SELECT id;
END; **
DELIMITER ;

update tb_espera set ic_finalizada = 1 where cd_paciente = 65;
call sp_insert_espera(65, 4, 1);
select * from tb_espera;
delete from tb_espera where cd_espera > 0;
select * from tb_paciente;