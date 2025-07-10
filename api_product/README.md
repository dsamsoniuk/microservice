# API PRODUCT


### uruchom server

```
# docker
docker compose up
# lub
python manage.py runserver
```


url admin panel:   localhost:8000/admin/
Super user account:  admin admin   -- admin@example.com


### Generate requirements file
```
pip3 freeze > requirements.txt
```

### Migracja

python manage.py makemigrations api
python manage.py migrate