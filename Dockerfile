FROM php:8.2-apache

# Instalasi library yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    zip unzip git curl \
    && docker-php-ext-install pdo_mysql gd

# Aktifkan mode rewrite untuk URL Laravel
RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

# Instal Composer secara otomatis
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Atur izin folder agar tidak error 500
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Arahkan Apache langsung ke folder /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Perintah tunggal untuk menjalankan server tanpa bentrok
CMD ["apache2-foreground"]