FROM php:8.2-apache

# تثبيت dependencies الأساسية
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo_mysql

# تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# نسخ المشروع وتعيين الصلاحيات
WORKDIR /var/www/html
COPY . .
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 storage bootstrap/cache

# تثبيت dependencies
RUN composer install --no-dev --optimize-autoloader

# تهيئة Apache
RUN a2enmod rewrite
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf