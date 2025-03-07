# Stage 1: Build Laravel Dependencies
FROM composer:2 AS builder
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Stage 2: Laravel Application (Using PHP 8.4 FPM Alpine)
FROM php:8.4-fpm-alpine

# Install dependencies
RUN apk add --no-cache \
    curl \
    unzip \
    git \
    sqlite-libs \
    sqlite \
    oniguruma-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Set working directory
WORKDIR /var/www/html

# Copy Laravel files
COPY . .

# Copy dependencies from build stage
COPY --from=builder /app/vendor ./vendor

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
