from django import forms

from .models import Equipamento

class CadastroEquipamento(forms.ModelForm):
	class Meta:
		model = Equipamento
		fields = [
			'cd_equipamento',
			'ds_equipamento',
			'cd_patrimonio',
			'nm_modelo',
			'nm_fabricante',
			'nm_setor',
			'nm_sala',
			'ic_posse',
			'cd_fiscal',
			'vl_equipamento',
			'dt_instalacao',
			'dt_garantia',
			'ic_manutencao',
			'cd_prestador',
			'ic_tensao',
			'vl_potencia',
			'ic_operacao',
			'ic_tecnico',
			'ds_insumo',
			'ds_obs'
		]