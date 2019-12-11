from django import forms

from .models import Manutencao

class CadastroManutencao(forms.ModelForm):
	class Meta:
		model = Manutencao
		fields = [
			'cd_manutencao',
			'dt_manutencao',
			'dt_final',
			'ds_solucao',
			'nm_funcionario',
			'cd_pedido'
		]