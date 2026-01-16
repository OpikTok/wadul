FROM php:8.2-cli

# Instalasi library dasar yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    zip unzip git curl \
    && docker-php-ext-install pdo_mysql gd

WORKDIR /var/www/html
COPY . .

# Instal Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# IZIN FOLDER: Dibuat lebih fleksibel agar bisa menulis file/foto
RUN chmod -R 777 storage bootstrap/cache

# Tambahkan ini agar folder storage terhubung
RUN php artisan storage:link

# GUNAKAN FORMAT INI: Menghindari error string + int
# Gunakan format exec (tanda kurung siku) untuk menghindari error operand
CMD php artisan serve --host=0.0.0.0 --port=$PORT