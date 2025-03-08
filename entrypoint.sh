#!/bin/sh

# Check if .env exists, if not copy from example
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Check if APP_KEY is empty and generate if needed
if grep -q "APP_KEY=" .env && ! grep -q "APP_KEY=base64:.*" .env; then
    php artisan key:generate
fi

# Start PHP-FPM
php-fpm