FROM php:8.2-apache

WORKDIR /var/www/html

# 1. تثبيت التبعيات الأساسية
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# 2. تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 3. نسخ ملفات Composer أولاً (لتحسين البناء)
COPY composer.json composer.lock ./

# 4. تثبيت الحزم مع تحسينات
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# 5. نسخ كل الملفات
COPY . .

# 6. تنفيذ أوامر Artisan
RUN composer run-script post-autoload-dump

# 7. إعداد الصلاحيات
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# 8. تكوين Apache
COPY .docker/000-default.conf /etc/apache2/sites-available/
RUN a2enmod rewrite && a2ensite 000-default.conf

# 9. أمر التشغيل
CMD ["apache2-foreground"]