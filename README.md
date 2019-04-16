# Sociale controle API
## Setup 
* Clone repo
* Install composer dependencies `composer install`
* Copy config and generate keys `cp .env.example .env && php artisan key:generate`
* Run migrations `php artisan migrate --seed`
* Setup keys for Laravel Passport `php artisan passport:keys`
* Create a Passport client `php artisan passport:client --name="MixMakr" --password`
* Run seeder for default constants `php artisan db:seed`

## Local development 
We are using [Laravel valet](https://laravel.com/docs/5.7/valet) for local development.

Requirements:
* PHP ^7.1.3
* Mariadb ^10.2.7 / MySQL ^5.7
 
