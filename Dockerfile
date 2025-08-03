# استخدام صورة PHP الرسمية مع Apache
FROM php:8.2-apache

# تحديث النظام وتثبيت الحزم الأساسية
RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y \
    libpq-dev \          # لمكتبات PostgreSQL
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev

# تثبيت إضافات PHP المطلوبة
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install \
    pdo \
    pdo_pgsql \         # لدعم PostgreSQL
    pdo_mysql \         # اختياري إذا كنت تستخدم MySQL أيضًا
    zip \
    gd \
    opcache

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تهيئة مجلد العمل ونسخ الملفات
WORKDIR /var/www/html
COPY . .

# تعيين الصلاحيات (ضروري لـ Laravel)
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# تثبيت التبعيات وتوليد المفاتيح
RUN composer install --no-dev --optimize-autoloader --no-interaction && \
    php artisan key:generate --force

# إنشاء جدول الجلسات وتنفيذ migrations
RUN php artisan session:table && \
    php artisan migrate --force

# تهيئة Apache
RUN echo "<VirtualHost *:80>\n\
    ServerName localhost\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
    ErrorLog \${APACHE_LOG_DIR}/error.log\n\
    CustomLog \${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf && \
    a2enmod rewrite && \
    a2ensite 000-default

# الأمر الرئيسي للتشغيل
CMD ["apache2-foreground"]