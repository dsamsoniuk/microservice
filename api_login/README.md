# Api LOGIN


php bin/console doctrine:fixtures:load


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