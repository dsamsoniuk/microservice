# Api LOGIN
=============

## Start server

```
docker compose up
```

### Load fixture and migration

```
composer run migration-with-data
```

#### Database login/password add 

```
php bin/console secrets:set DB_LOGIN
php bin/console secrets:set DB_PASSWD
```

#### Login data

login: damian@poczta.pl 
haslo: damian


## Get Token JWT - Example
================================

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