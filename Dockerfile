FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y nodejs npm git curl libpng-dev libonig-dev libxml2-dev zip unzip libpq-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . /var/www

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for storage and cache directories
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Run Laravel artisan commands
RUN php artisan migrate
RUN php artisan db:seed
RUN php artisan storage:link
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Install project dependencies (if applicable)
# COPY package*.json ./
RUN npm install

# Install Vite globally
RUN npm install vite

# Build Vite assets
RUN npm run build

# Command to start PHP-FPM server
CMD ["php-fpm"]
