FROM php:8.2-apache

WORKDIR /var/www/html

# 1. تثبيت التبعيات
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libzip-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# 2. تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 3. نسخ الملفات الأساسية أولاً
COPY composer.json composer.lock ./

# 4. تثبيت الحزم
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# 5. نسخ كل الملفات
COPY . .

# 6. إعداد الصلاحيات (مهم جداً)
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# 7. تكوين Apache
COPY .docker/000-default.conf /etc/apache2/sites-available/
RUN a2ensite 000-default.conf && a2enmod rewrite

# 8. إنشاء .env من .env.production إذا لم يكن موجوداً
RUN if [ ! -f .env ]; then \
        cp .env.production .env && \
        php artisan key:generate; \
    fi

CMD ["apache2-foreground"]