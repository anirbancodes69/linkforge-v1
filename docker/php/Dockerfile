# Use official PHP image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    libxml2-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*
    
# Install PHP extensions
RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    mbstring \
    zip \
    exif \
    pcntl \
    opcache

# Install Redis extension (IMPORTANT for queues)
# RUN pecl install redis && docker-php-ext-enable redis

# Install Composer (from official image)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Production build (uncomment for production) **************************

# # Copy composer files first (for caching)
# COPY backend/composer.json backend/composer.lock ./

# # Install dependencies (optimized)
# RUN composer install --no-dev --optimize-autoloader --no-scripts

# # Copy full application
# COPY backend/ .

# # Generate Laravel cache (optional but good)
# RUN php artisan config:cache || true
# RUN php artisan route:cache || true
# RUN php artisan view:cache || true

# # Set permissions
# RUN chown -R www-data:www-data /var/www \
#     && chmod -R 775 storage bootstrap/cache

# Expose port
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]