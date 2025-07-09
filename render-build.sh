#!/usr/bin/env bash
set -euo pipefail

# إنشاء .env إذا لم يكن موجودًا
if [ ! -f .env ]; then
    cp .env.example .env
fi

# تركيب Composer وتهيئة Laravel
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache

# إعداد صلاحيات المجلدات
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/