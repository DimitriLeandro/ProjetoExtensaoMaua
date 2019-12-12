from django import forms

from .models import Manutencao
from Pedido.models import Pedido

# class CadastroManutencao(forms.Form):
# 	#cd_manutencao  = forms.IntegerField()
# 	Data  = forms.DateField()
# 	dt_final       = forms.DateField()
# 	ds_solucao     = forms.CharField()
# 	nm_funcionario = forms.CharField()
# 	cd_pedido      = forms.ModelChoiceField(queryset = Pedido.objects.all())

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