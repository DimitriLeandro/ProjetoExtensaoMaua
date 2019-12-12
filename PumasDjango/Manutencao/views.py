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

# def cadastroManutencaoView(request):
# 	form = CadastroManutencao()
# 	if request.method == "POST":
# 		form = CadastroManutencao(request.POST)
# 		if form.is_valid():
# 			Manutencao.objects.create(**form.cleaned_data)
# 		else:
# 			print(form.errors)
	
# 	context = {
# 		'form': form
# 	}

# 	return render(request, "cadastroManutencao.html", context)