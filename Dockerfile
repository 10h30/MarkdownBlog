# Use the official PHP image with Laravel dependencies
FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Set Laravel environment
ENV APP_ENV=production

# Expose port
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
