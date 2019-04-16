select * from tb_diagnostico;
select * from tb_triagem;

insert into tb_diagnostico (cd_cnes, ds_avaliacao, cd_cid, ds_prescricao, dt_diagnostico, hr_diagnostico, ic_situacao, cd_cns_profissional_diagnostico, cd_triagem) values
('6950043', 'Dor de dente muito forte devido a carie', 'CID 14 - J15.9', 'Encaminhamento ao dentista para obturação', now(), now(), 'Alta sem encaminhamento a UBS', 1, 23);

drop trigger tr_finalizar_triagem;

desc tb_diagnostico;
desc tb_triagem;

DELIMITER //
/* 	ESSA PROCEDURE FAZ O INSERT NA TABELA DE DIAGNOSTICO
	UMA TRIAGEM SÓ PODE TER UM DIAGNOSTICO, ESSA PROCEDURE VERIFICA SE JÁ HÁ ALGUM DIAGNOSTICO PARA UMA TRIAGEM ESPECIFICA ANTES DE FAZER O INSERT
	CASO JÁ EXISTA, A PROCEDURE NÃO FARÁ O INSERT
    ESSE PROCEDIMENTO NÃO ODE SER FEITO COM TRIGGER POIS UM TRIGGER NÃO PODE FAZER INSERT/UPDATE/DELETE NA MESMA TABELA QUE DISPARA O TRIGGER
    OS PARAMETROS DE DATA E HORA NÃO PRECISAM SER ENVIADOS PARA ESSA PROCEDURE POIS O MYSQL PODE PEGAR ESSES VALORES SOZINHO COM O COMANDO "NOW()"
    
    tb_triagem:1::1:tb_diagnostico, apesar de usar uma chave estrangeira, é uma relação 1 para 1
    
    ESSA PROCEDURE RETORNA O PARAMETRO "id" QUE É O ID DO DIAGNOSTICO INSERIDO, OU 0 CASO O INSERT NÃO SEJA EXECUTADO
*/ 
CREATE PROCEDURE sp_insert_diagnostico(IN cnes INT, IN avaliacao TEXT, IN cid VARCHAR(30), IN prescricao TEXT, IN situacao VARCHAR(40), IN cns_medico INT(11), IN triagem INT(11))
BEGIN 
	-- USANDO UMA VARIAVEL PARA SABER A QUANTIDADE DE DIAGNOSTICOS QUE A TRIAGEM EM QUESTÃO TEM
    DECLARE id INT;
	DECLARE qtd INT;
    SET qtd = (SELECT COUNT(cd_diagnostico) FROM tb_diagnostico WHERE cd_triagem = triagem);
	-- SE FOR 0, OK, PODE FAZER O INSERT, SENÃO, ALGO DE ERRADO NÃO ESTÁ CERTO, POIS UMA TRIAGEM NÃO PODE TER MAIS DE UM DIAGNOSTICO
    IF qtd = 0 THEN
		INSERT IGNORE INTO tb_diagnostico (cd_cnes, ds_avaliacao, cd_cid, ds_prescricao, dt_diagnostico, hr_diagnostico, ic_situacao, cd_cns_profissional_diagnostico, cd_triagem) VALUES
		(cnes, avaliacao, cid, prescricao, now(), now(), situacao, cns_medico, triagem);
        SET id = LAST_INSERT_ID();
	ELSE
		SET id = 0;
    END IF;
    -- AGORA É NECESSÁRIO VERIFICAR SE HOUVE INSERT, CASO SIM, ENTÃO A TRIAGEM DEVE SER FINALIZADA.
    IF id != 0 THEN
		UPDATE tb_triagem SET ic_finalizada = 1 WHERE cd_triagem = triagem;
    END IF;
    -- FAZENDO O SELECT PARA SER O RETORNO DO PROCEDIMENTO
    SELECT id;
END //
DELIMITER ;

drop PROCEDURE sp_insert_diagnostico;

delete from tb_diagnostico where cd_diagnostico > 0;

update tb_triagem set ic_finalizada = 0 where cd_triagem > 0;

CALL sp_insert_diagnostico ('6950043', 'Dor de dente muito forte devido a carie', 'CID 14 - J15.9', 'Encaminhamento ao dentista para obturação', 'Alta sem encaminhamento a UBS', 1, 14);