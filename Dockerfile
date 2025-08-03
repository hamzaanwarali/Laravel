# استخدام صورة رسمية من PHP مع Apache
FROM php:8.2-apache

# تثبيت حزم النظام الأساسية + إضافات PostgreSQL
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \          # حزمة PostgreSQL الأساسية
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo \
    pdo_pgsql \         # إضافة دعم PostgreSQL
    pdo_mysql \         # اختياري (إذا كنت تستخدم MySQL أيضًا)
    zip \
    gd \
    bcmath \
    opcache

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تهيئة مجلد العمل ونسخ الملفات
WORKDIR /var/www/html
COPY . .

# تعيين الصلاحيات (ضروري لـ Laravel)
RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache \
    && chmod -R 775 \
    storage \
    bootstrap/cache

# تثبيت التبعيات (بدون حزم التطوير)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# تهيئة Apache
RUN a2enmod rewrite
COPY .docker/apache.conf /etc/apache2/sites-available/000-default.conf

# تعليمات التشغيل
CMD ["apache2-foreground"]