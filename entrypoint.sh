#!/bin/sh

# Set correct permissions
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Run migrations
php artisan migrate

# Run Artisan commands after dependencies are ready
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM
exec "$@"
