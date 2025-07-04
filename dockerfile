FROM php:8.2-apache

WORKDIR /var/www/html

# 1. تثبيت dependencies النظام الأساسية
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# 2. تثبيت Composer (بنسخة مستقرة)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.6.5

# 3. نسخ فقط ملفات Composer أولاً (لتحسين البناء)
COPY composer.json composer.lock ./

# 4. تثبيت الحزم مع تحسينات للأمان والأداء
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts \
    || (echo "Composer install failed, retrying..." && composer clear-cache && composer install --no-dev --optimize-autoloader --no-interaction --no-scripts)

# 5. نسخ باقي الملفات
COPY . .

# 6. إعدادات الصلاحيات
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# 7. إعداد Apache
COPY .docker/apache.conf /etc/apache2/sites-available/000-default.conf
RUN a2ensite 000-default.conf && a2enmod rewrite

CMD ["apache2-foreground"]