# Generated by Django 3.0 on 2019-12-11 23:25

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('Pedido', '0002_auto_20191211_1715'),
    ]

    operations = [
        migrations.AlterField(
            model_name='pedido',
            name='ic_processo',
            field=models.IntegerField(default=0),
        ),
    ]