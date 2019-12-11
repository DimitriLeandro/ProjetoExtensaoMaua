from django import forms

from .models import Pedido

class CadastroPedido(forms.ModelForm):
	class Meta:
		model = Pedido
		fields = [
			'cd_pedido',			
			'nm_solicitante',
			'ds_problema',
			'cd_equipamento'
		]