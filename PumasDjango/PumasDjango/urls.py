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

from Paginas.views import homeView, LoginView
from Equipamento.views import cadastroEquipamentoView
from Pedido.views import cadastroPedidoView
from Manutencao.views import cadastroManutencaoView
from django.views.generic import TemplateView

urlpatterns = [
    path('login/', LoginView, name='login'),
	path('', homeView, name='home'),
    path('admin/', admin.site.urls),
    path('equipamento/cadastro', cadastroEquipamentoView, name="equip_cad"),
    path('pedido/cadastro', cadastroPedidoView, name="ped_cad"),
    path('manutencao/cadastro', cadastroManutencaoView, name = "manu_cad"),
    path('bootstrap/', TemplateView.as_view(template_name = 'bootstrap/example.html'))

]
