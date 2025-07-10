from django.contrib.auth.models import Group, User
from .models import Product
from rest_framework import serializers
import uuid

class UserSerializer(serializers.HyperlinkedModelSerializer):
    user_uuid = serializers.UUIDField(default=uuid.uuid4)
    class Meta:
        model = User
        fields = ['url', 'username', 'email', 'groups', 'user_uuid']


class GroupSerializer(serializers.HyperlinkedModelSerializer):
    class Meta:
        model = Group
        fields = ['url', 'name']

class ProductSerializer(serializers.HyperlinkedModelSerializer):
    class Meta:
        model = Product
        fields = [ 'name', 'description', 'price']

class ProductListSerializer(serializers.HyperlinkedModelSerializer):
    class Meta:
        model = Product
        fields = [ 'name', 'description']