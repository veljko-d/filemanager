# filemanager
A simple Laravel file manager
---------------------------------------------------------------------------------

INSTALLATION
---------------------------------------------------------------------------------

After cloning project, create the "filemanager" table and run the following commands:

composer update

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan cache:clear
