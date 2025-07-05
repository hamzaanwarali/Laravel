FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libzip-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json composer.lock ./

RUN composer install --no-dev --optimize-autoloader --no-interaction

COPY . .

RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

COPY .docker/000-default.conf /etc/apache2/sites-available/
RUN a2ensite 000-default.conf && a2enmod rewrite

CMD ["apache2-foreground"]