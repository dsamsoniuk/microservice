# Api LOGIN

# Install

```
docker compose up

php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

### Get Token JWT

REQUEST

send:  POST /localhost/login
body: 
{
    "username": "damian@poczta.pl",
    "password": "damian"
}

RESPONSE

{
    "token": "eyJ0eXAiOiJKV1QiLCJh....."
}