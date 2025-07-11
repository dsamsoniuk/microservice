# API PRODUCT


### uruchom server

```
# docker
docker compose up
# lub
python manage.py runserver

```



### Stworz super uzytkownika

```
python manage.py createsuperuser
```

Super user account:  admin admin   -- admin@example.com

Dostep pod adresem: localhost:8000/admin/




### Generate requirements file
```
pip3 freeze > requirements.txt
```

### Migracja

python manage.py makemigrations api
python manage.py migrate