@echo off

REM Install project dependencies
composer install

REM Generate .env file
copy .env.example .env

REM Generate application key
php artisan key:generate

REM Configure the database
REM Update the database credentials in the .env file

REM Run migrations
php artisan migrate

REM Start the development server
php artisan serve
