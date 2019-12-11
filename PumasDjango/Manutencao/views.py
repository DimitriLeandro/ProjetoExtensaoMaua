from django.shortcuts import render

# Create your views here.
from .models import Manutencao
from .forms import CadastroManutencao

def cadastroManutencaoView(request):
	form = CadastroManutencao(request.POST or None)
	if form.is_valid():
		form.save()
		form = CadastroManutencao()

	context = {
		'form': form
	}

	return render(request, "cadastroManutencao.html", context)