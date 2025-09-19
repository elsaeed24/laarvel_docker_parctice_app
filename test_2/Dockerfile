FROM php:8.2-apache

# تثبيت إضافات Laravel
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libjpeg-dev libfreetype6-dev zip unzip libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# تفعيل Apache rewrite
RUN a2enmod rewrite

# تغيير DocumentRoot إلى public
WORKDIR /var/www/html
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# نسخ المشروع (اختياري لو هتعمل mount من docker-compose)
COPY ./src /var/www/html

# صلاحيات Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Composer (نسخة رسمية أسرع)
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

EXPOSE 80
