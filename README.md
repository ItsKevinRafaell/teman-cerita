## Install

php artisan migrate:fresh
php artisan make:filament-user
php artisan shield:install

php artisan db:seed --class=AdditionalRolesSeeder 
php artisan db:seed --class=AdditionalAssessmentSeeder

## Schedule Work

php artisan schedule:work

# Filament Resource

php artisan make:filament-resource User
