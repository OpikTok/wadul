FROM php:8.2-cli

# Instalasi library dasar
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    zip unzip git curl \
    && docker-php-ext-install pdo_mysql gd

    
WORKDIR /var/www/html
COPY . .

# Instal Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Izin folder
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
    RUN php artisan storage:link

# Jalankan Laravel langsung tanpa Apache
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-80}