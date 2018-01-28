	function pesquisar_cep()
	{
		//limpa os campos
		$("#nm_municipio_residencia").val("");
		$("#nm_bairro").val("");
		$("#nm_logradouro").val("");

		//Nova variável "cep" somente com numeros.
		var cep = $("#cd_cep").val().replace(/\D/g, '');

		if(cep != "") 
		{
			//validando o cep
			var validacep = /^[0-9]{8}$/;
			if(validacep.test(cep))
			{
				$("#p_carregando").show();

				$.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
					if (!("erro" in dados)) 
					{
						//Atualiza os campos com os valores da consulta.
						$("#nm_municipio_residencia").val(dados.localidade+" - "+dados.uf);
						$("#nm_bairro").val(dados.bairro);
						$("#nm_logradouro").val(dados.logradouro);
						//$("#uf").val(dados.uf);
						//$("#ibge").val(dados.ibge);
						$("#p_carregando").hide();
						$("#cd_cep").css({"outline": "solid 1px #00FF00"});
					}
					else 
					{
						//CEP pesquisado não foi encontrado.
						$("#cd_cep").css({"outline": "solid 1px #FF0000"});
						$("#p_carregando").hide();
					}
				});
			}
		}
	}