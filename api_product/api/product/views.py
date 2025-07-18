from django.shortcuts import render

# Create your views here.
from django.contrib.auth.models import Group, User
from .models import Product
from rest_framework import permissions, viewsets

from api.product.serializers import GroupSerializer, UserSerializer, ProductSerializer, ProductListSerializer
from rest_framework.views import APIView
from rest_framework.response import Response
from api.product.permissions import HasValidTokenOrAtuh
from rest_framework.reverse import reverse

class CustomApiRootView(APIView):
    """
    Niestandardowy root API – pokazuje wszystkie potrzebne endpointy
    """
    def get(self, request, format=None):
        return Response({
            'products': reverse('product-list', request=request, format=format),
            'users': reverse('user-list', request=request, format=format),
            'static-products': reverse('static-products', request=request, format=format),
        })
    
class UserViewSet(viewsets.ModelViewSet):
    """
    API endpoint that allows users to be viewed or edited.
    """
    queryset = User.objects.all().order_by('-date_joined')
    serializer_class = UserSerializer
    # permission_classes = [permissions.IsAuthenticated] # wersja weryfikujaca przez autoryzacje sessji 
    permission_classes = [HasValidTokenOrAtuh]

class GroupViewSet(viewsets.ModelViewSet):
    """
    API endpoint that allows groups to be viewed or edited.
    """
    queryset = Group.objects.all().order_by('name')
    serializer_class = GroupSerializer
    permission_classes = [HasValidTokenOrAtuh]

class ProductViewSet(viewsets.ModelViewSet):
    """
    API endpoint that allows see product
    """
    queryset = Product.objects.all().order_by('name')
    serializer_class = ProductSerializer
    permission_classes = [HasValidTokenOrAtuh]

class StaticProductListView(APIView):
    """
    API endpoint that allows see list products
    """
    permission_classes = [HasValidTokenOrAtuh]


# TODO: 
# * pobieranie z bazy danych
# * dodac fixture

    def get(self, request):
        data = [
            {"id": 2, "name": "laptop Xp"}, 
            {"id": 3, "name": "laptop Bv"},
            {"id": 4, "name": "pc XMCV"},
        ]
        return Response({'msg': 'Produkty', "data": data})