from django.shortcuts import render

# Create your views here.
from .models import Pedido
from .forms import CadastroPedido

def cadastroPedidoView(request):
	form = CadastroPedido(request.POST or None)
	if form.is_valid():
		form.save()
		form = Pedido()

	context = {
		'form': form
	}

	return render(request, "cadastroPedido.html", context)