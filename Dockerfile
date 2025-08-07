FROM php:8.2-apache

# 1. تثبيت الحزم الأساسية
RUN apt-get update && apt-get install -y \
    libpq-dev git unzip libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# 2. تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. تهيئة مجلد العمل
WORKDIR /var/www/html
COPY . .

# 4. إنشاء مجلدات التخزين وتعيين الصلاحيات
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && chown -R www-data:www-data storage \
    && chmod -R 775 storage

# 5. نسخ .env مثال إذا لم يكن موجودًا
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# 6. تثبيت التبعيات
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 7. توليد APP_KEY (مع حل بديل إذا فشل)
# RUN if ! php artisan key:generate --force; then \
#  echo -e "APP_KEY=\n" >> .env && \
#   php artisan key:generate --force; \
#   fi
    
RUN (php artisan session:table || true) && \
    (php artisan migrate --force || true)

# 9. تكوين Apache
RUN echo "<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf \
    && a2enmod rewrite

CMD ["apache2-foreground"]