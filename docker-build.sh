#!/bin/bash

 إنشاء .env إذا لم يكن موجودًا
if [ ! -f .env ]; then
    cp .env.example .env
  php artisan key:generate --force
fi

# إصلاح الصلاحيات
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# تركيب dependencies
composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# تهيئة التطبيق
php artisan config:clear
php artisan view:clear
php artisan route:clear
php artisan optimize

# تنفيذ migrations
php artisan migrate --force