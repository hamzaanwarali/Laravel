# استخدام صورة PHP 8.2 مع Apache
FROM php:8.2-apache

# تحديث النظام وتثبيت الحزم الأساسية
RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y \
    git \
    curl \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && apt-get clean

# تثبيت إضافات PHP المطلوبة لـ Laravel
RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd

# إعداد Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    a2enmod rewrite && \
    a2enmod headers

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# إنشاء مسار العمل ونسخ الملفات
WORKDIR /var/www/html
COPY . .

# تعيين ملكية الملفات لـ Apache
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 storage bootstrap/cache

# تحديد مسار Document Root لـ Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# مرحلة البناء (لتحسين الأداء)
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache



# الأمر الافتراضي عند التشغيل
CMD ["apache2-foreground"]