from django.db import models
from Pedido.models import Pedido

# Create your models here.
class Manutencao(models.Model):
	cd_manutencao  = models.AutoField(primary_key=True)
	dt_manutencao  = models.DateField(null=True)
	dt_final       = models.DateField(null=True)
	ds_solucao     = models.TextField(null=True)
	nm_funcionario = models.TextField(null=True)
	cd_pedido      = models.ForeignKey(Pedido, on_delete=models.CASCADE)