from rest_framework.routers import DefaultRouter
from .views import CustomApiRootView

class CustomRouter(DefaultRouter):
    APIRootView = CustomApiRootView