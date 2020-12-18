composer install
php artisan clear-compiled
php artisan migrate --force
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan config:clear