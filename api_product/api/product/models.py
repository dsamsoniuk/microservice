from django.db import models

# Create your models here.

class Product(models.Model):
    uuid = models.UUIDField(("uuid"), unique=True, primary_key=True)
    name = models.CharField(("name"), max_length=150)
    description = models.CharField(("description"), max_length=250)
    price = models.DecimalField(("price"), max_digits=6, max_length=10, decimal_places=2)
