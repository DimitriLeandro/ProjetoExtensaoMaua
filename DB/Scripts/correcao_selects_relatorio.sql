-- total de atendimentos na ubs em um periodo
select count(cd_triagem) as 'totalTriagens' 
	from tb_triagem 
		where dt_registro between '2017-01-01' and '2019-01-01'
			and cd_ubs = 6;

-- atendimentos por sexo
select
                    (select count(tb_paciente.cd_paciente) 
                            from tb_paciente, tb_triagem 
                                    where tb_paciente.cd_paciente = tb_triagem.cd_paciente
                                            and ic_sexo = 'Masculino'
												and tb_triagem.dt_registro between '2017-01-01' and '2019-01-01'
													and tb_triagem.cd_ubs = 6) as 'Masculino',
                    (select count(tb_paciente.cd_paciente) 
                            from tb_paciente, tb_triagem 
                                    where tb_paciente.cd_paciente = tb_triagem.cd_paciente
                                            and ic_sexo = 'Feminino'
												and tb_triagem.dt_registro between '2017-01-01' and '2019-01-01'
                                                	and tb_triagem.cd_ubs = 6) as 'Feminino';
												

-- lista de pacientes fora da ubs de referencia
select distinct(tb_paciente.cd_paciente), nm_paciente, tb_ubs.cd_ubs, nm_ubs 
                    from tb_triagem, tb_paciente, tb_ubs 
                            where tb_triagem.cd_paciente = tb_paciente.cd_paciente and tb_paciente.cd_ubs_referencia = tb_ubs.cd_ubs
                                    and tb_triagem.dt_registro between '2017-01-01' and '2019-01-01'
                                            and cd_ubs_referencia != 6
												and tb_triagem.cd_ubs = 6
                                                    order by nm_ubs, nm_paciente;
                                                    
-- queixas mais recorrentes
select ds_queixa, count(cd_triagem), concat(format(((count(cd_triagem)/(select count(cd_triagem) from tb_triagem where dt_registro between '2017-01-01' and '2019-01-01'))*100),2),'%')
                        from tb_triagem 
                            where dt_registro between '2017-01-01' and '2019-01-01'
				and cd_ubs = 6
                                    group by ds_queixa 
                                        order by count(cd_triagem) desc, ds_queixa;