FROM php:8.2-cli

# Instalasi library
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    zip unzip git curl \
    && docker-php-ext-install pdo_mysql gd

WORKDIR /var/www/html

# Salin semua file
COPY . .

# Instal Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# IZIN FOLDER: Menggunakan 777 agar tidak error permission
RUN chmod -R 777 storage bootstrap/cache

# Hapus baris CMD lama, ganti dengan port statis agar web AKTIF
CMD php artisan serve --host=0.0.0.0 --port=8080