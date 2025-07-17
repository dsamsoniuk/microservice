# Aplikacja mikroserwis

Zestaw mikroserwisów składający się z aplikacji REST API zbudowanych w Symfony oraz Django, a także jednostronicowej aplikacji (SPA) opartej na Vue.js. Projekt stanowi przykład integracji niezależnych serwisów w spójną, skalowalną architekturę, przy jednoczesnym zachowaniu separacji odpowiedzialności każdego z komponentów.

1. Symfony 
2. Vue
3. Django rest

### Start

1. stworz siec lokalna przed uruchomienie kontenerów

```
docker network create microservice-net
```

2. Osobno kazdy serwis wchodzac po kolei do katalogow api_login/ itd.

```
cd api_login/

docker compose up

cd spa/ 
cd api_product/
```

Uwaga: 

po postawieniu kazdego serwisu wchodzimy do katalogu i osobno wykonujemy polecenia dodatkowe
jak migracje czy tworzenie uzytkownika.

### SPA - front

Aplikacja oparta o Vue

* localhost:8080

### Api login - backend

Api oparte o MVC Symfony 6 + JWT

url-e:
* localhost/
* localhost/api/login - tworzenie tokena
* localhost/api/default - prosty response


### Api Product - backend

Api oparte o MVC Django Rest + weryfikacja JWT

url-e:
* localhost:8000/ - widok dostepnych endpointow
* localhost:8000/admin - panel 





