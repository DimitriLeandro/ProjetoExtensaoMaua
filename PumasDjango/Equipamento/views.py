from django.shortcuts import render

# Create your views here.
from .forms import CadastroEquipamento

def cadastroEquipamentoView(request):
	form = CadastroEquipamento(request.POST or None)
	if form.is_valid():
		form.save()

	context = {
		'form': form
	}

	return render(request, "cadastroEquipamento.html")