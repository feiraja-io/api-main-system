# api-main-system

## required
 
```
docker
```
```
php 8.3.11
```
```
composer
```

## Run project
### first step, install laravel:
```
composer install
```
### second step, generate key:
```
php artisan key:generate
```
### third step, run data base:
```
docker-compose up -d
```
### fourth step, run migrations:
```
php artisan migrate
```
### run project:
```
php artisan serve
```
