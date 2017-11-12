function validarNome()
{
	var cadastro = document.forms.cadastro_paciente, nome = cadastro_paciente.nm_paciente.value;
	//alert(nome+"");
	
	nome = nome.replace(/ /g,'');
	if(/^[a-zA-Z]+$/.test(nome) == false || nome.length < 5 || nome.length > 60) {
		document.getElementById("nm_paciente").style.outline = "solid 1px #FF0000";
		//x_nome = false;		
	}
	else
	{
		document.getElementById("nm_paciente").style.outline = "solid 1px #00FF00";	
		//x_nome = true;
	}
}

