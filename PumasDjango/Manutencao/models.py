from django.db import models
from Pedido.models import Pedido

# Create your models here.
class Manutencao(models.Model):
	cd_manutencao  = models.AutoField(primary_key=True)
	dt_manutencao  = models.DateField()
	dt_final       = models.DateField()
	ds_solucao     = models.TextField()
	nm_funcionario = models.TextField()
	cd_pedido      = models.ForeignKey(Pedido, on_delete=models.CASCADE)