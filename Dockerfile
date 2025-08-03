FROM php:8.2-apache

RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y \
    libpq-dev \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pdo_mysql \
    zip \
    gd \
    opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache && \
    composer install --no-dev --optimize-autoloader --no-interaction && \
    php artisan key:generate --force && \
    php artisan session:table && \
    php artisan migrate --force

RUN echo "<VirtualHost *:80>
    ServerName localhost
    DocumentRoot /var/www/html/public
    <Directory /var/www/html/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf && \
    a2enmod rewrite && \
    a2ensite 000-default

CMD ["apache2-foreground"]