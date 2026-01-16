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
RUN chmod -R 777 storage bootstrap/cache

# Perintah menjalankan server paling simpel
# Kita hapus --port=$PORT dan biarkan Railway yang menentukan secara otomatis
CMD php artisan serve --host=0.0.0.0 --port=8080