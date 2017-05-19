#!/bin/bash  

php artisan route:clear
php artisan view:clear
php artisan clear-compiled
php artisan route:cache
php artisan config:cache
git add --all
