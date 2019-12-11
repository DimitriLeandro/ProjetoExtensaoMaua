"""PumasDjango URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/2.2/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path

from Paginas.views import homeView
from Equipamento.views import cadastroEquipamentoView
from Pedido.views import cadastroPedidoView
from Manutencao.views import cadastroManutencaoView

urlpatterns = [
	path('', homeView, name='home'),
    path('admin/', admin.site.urls),
    path('equipamento/cadastro', cadastroEquipamentoView),
    path('pedido/cadastro', cadastroPedidoView),
    path('manutencao/cadastro', cadastroManutencaoView)
]
