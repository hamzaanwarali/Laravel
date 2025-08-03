FROM php:8.3-cli

# تثبيت الإضافات الأساسية
RUN apt-get update && apt-get install -y \
    zip unzip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# نسخ المشروع
WORKDIR /var/www/html
COPY . .

# الصلاحيات والتجهيز
RUN chmod -R 775 storage bootstrap/cache
RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:generate --force

# استخدام Apache بدل CLI إن أردت
FROM php:8.3-apache
COPY --from=0 /var/www/html /var/www/html
RUN a2enmod rewrite