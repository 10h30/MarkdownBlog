# Stage 1: Build Laravel Dependencies
FROM composer:2 AS builder
WORKDIR /app

# Install system dependencies required for Composer
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Stage 2: Laravel Application (Using PHP 8.4 FPM Debian-based)
FROM php:8.4-fpm

# Install required PHP extensions and system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    sqlite3 \
    libsqlite3-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo pdo_sqlite gd \
    && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Copy Laravel files
COPY . .

# Copy built dependencies from the first stage
COPY --from=builder /app/vendor ./vendor

# Set permissions for Laravel storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
