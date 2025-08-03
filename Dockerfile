FROM php:8.2-apache

# تثبيت الحزم الأساسية
RUN apt-get update && apt-get install -y \
    libpq-dev git unzip libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# نسخ الملفات
WORKDIR /var/www/html
COPY . .

# الخطوة 1: الصلاحيات الأساسية فقط
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && chown -R www-data:www-data storage \
    && chmod -R 775 storage

# الخطوة 2: تثبيت التبعيات بشكل منفصل
RUN composer install --no-dev --optimize-autoloader --no-interaction

# الخطوة 3: أوامر Artisan بشكل منفصل
RUN php artisan key:generate --force
RUN php artisan session:table
RUN php artisan migrate --force

# تكوين Apache
RUN echo "<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf \
    && a2enmod rewrite

CMD ["apache2-foreground"]