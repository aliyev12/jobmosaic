#!/bin/sh

# Set correct permissions
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Wait for database to be ready (optional, if necessary)
# while ! nc -z db 5432; do
#   sleep 1
# done

# Run Artisan commands after dependencies are ready
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM
exec "$@"
