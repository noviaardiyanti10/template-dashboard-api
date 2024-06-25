**Requirement**
- PHP min version 8.2
- Composer min version 2.x
- Tools xampp/laragon
  
Install
- composer install
- cp .env.example .env
- php artisan key:generate
- kalau error run command php artisan config:cache
- php artisan serve

Model: **php artisan make:model ModelName (singular)**

Request: **php artisan make:request DataRequest**

Controller: **php artisan make:controller -r** 

Documentation: https://laravel.com/docs/11.x
