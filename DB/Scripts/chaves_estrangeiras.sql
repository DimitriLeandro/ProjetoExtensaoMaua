use db_maua;
show tables;

select * from tb_paciente;
select * from tb_triagem;
desc tb_paciente;
desc tb_triagem;
desc tb_diagnostico;

-- mudanças em tb_paciente
alter table tb_paciente change cd_profissional_registro cd_usuario_registro int(11);
update tb_paciente set cd_usuario_registro = 4 where cd_paciente > 0;

-- mudanças em tb_triagem
alter table tb_triagem change cd_cns_profissional_triagem cd_usuario_registro int(11);
update tb_triagem set cd_usuario_registro = 6 where cd_triagem > 0;
alter table tb_triagem add constraint fk_triagem_users foreign key (cd_usuario_registro) references users(id);

-- mudanças em tb_diagnostico
alter table tb_diagnostico change cd_cns_profissional_diagnostico cd_usuario_registro int(11);
update tb_diagnostico set cd_usuario_registro = 3 where cd_diagnostico > 0;
alter table tb_diagnostico add constraint fk_diagnostico_users foreign key (cd_usuario_registro) references users(id);