from django.db import models
from Equipamento.models import Equipamento

# Create your models here.
class Pedido(models.Model):
	cd_pedido      = models.AutoField(primary_key=True)
	dt_pedido      = models.DateField(auto_now=True)
	hr_pedido      = models.TimeField(auto_now=True)
	nm_solicitante = models.CharField(max_length=120, null=True)
	ds_problema    = models.TextField(null=True)
	ic_processo    = models.IntegerField(default=0)
	cd_equipamento = models.ForeignKey(Equipamento, on_delete=models.CASCADE)