FROM php:8.2-apache

WORKDIR /var/www/html

# تثبيت dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring

# نسخ ملفات المشروع
COPY . .

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# صلاحيات المجلدات
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage

# إعدادات Apache
COPY .docker/000-default.conf /etc/apache2/sites-available/
RUN a2ensite 000-default.conf
RUN a2enmod rewrite

# تنظيف الذاكرة
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# أمر التشغيل
CMD ["apache2-foreground"]