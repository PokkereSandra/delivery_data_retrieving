Logistics program for retrieving data about clients and deliveries from 5 related tables.

### Used technologies:
- PHP 8.0
- Laravel 9
- MySQL 8.0.25

### To run program enter commands from here:
- git clone git@github.com:PokkereSandra/delivery_data_retrieving.git (clone project from github)
- composer install
- make database schema in mysql
- fill .env file as in .env.example
- php artisan migrate
- php artisan db:seed (if fake data is needed)
- php artisan key:generate
- php artisan serve
