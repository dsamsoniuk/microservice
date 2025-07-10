import jwt
from rest_framework.authentication import BaseAuthentication
from rest_framework.exceptions import AuthenticationFailed
from django.conf import settings

class JwtOnlyAuthentication(BaseAuthentication):
    def authenticate(self, request):
        auth_header = request.META.get('HTTP_AUTHORIZATION')
        if not auth_header:
            return None

        try:
            token_type, token = auth_header.split(' ')
            if token_type.lower() != 'bearer':
                raise AuthenticationFailed('Invalid token type')
        except ValueError:
            raise AuthenticationFailed('Invalid authorization header')

        try:
            # Weryfikacja podpisu (Symmetric HMAC lub RSA w zależności co masz)
            decoded = jwt.decode(
                token,
                settings.PUBLIC_KEY,  # jeśli masz RSA
                algorithms=["RS256"],     # albo HS256 jeśli HMAC
                options={"verify_aud": False}
            )
        except jwt.ExpiredSignatureError:
            raise AuthenticationFailed('Token expired')
        except jwt.InvalidTokenError:
            raise AuthenticationFailed('Invalid token')

        # Zwracamy user=None, bo nie mamy użytkownika
        return (None, decoded)