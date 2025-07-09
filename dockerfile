# استخدام صورة PHP مع Apache
FROM php:8.2-apache

# تثبيت dependencies + إعدادات Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# تفعيل Apache mod_rewrite
RUN a2enmod rewrite

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# إنشاء مجلد المشروع وتعيين الصلاحيات
WORKDIR /var/www/html
RUN chown -R www-data:www-data /var/www/html

# نسخ ملفات المشروع
COPY . .

# تركيب dependencies وإنشاء .env
RUN if [ ! -f .env ]; then \
        cp .env.example .env && \
        composer install --no-dev --optimize-autoloader && \
        php artisan key:generate; \
    fi

# تعيين Apache ليشير إلى مجلد public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf