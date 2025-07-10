from rest_framework.permissions import BasePermission

class HasValidTokenOrAtuh(BasePermission):
    """
    Pozwala jeśli token JWT jest poprawny (bez sprawdzania usera).
    """
    def has_permission(self, request, view):
        # DRF ustawi request.auth gdy JWT jest poprawny (w JwtOnlyAuthentication)
        # return request.auth is not None
        return bool((request.user and request.user.is_authenticated) or request.auth)