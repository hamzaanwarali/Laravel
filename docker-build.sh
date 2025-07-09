#!/bin/bash

# إنشاء .env إذا لم يكن موجودًا
if [ ! -f .env ]; then
    cp .env.example .env
fi

# تركيب dependencies
composer install --no-dev --optimize-autoloader


# تعيين صلاحيات المجلدات
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/