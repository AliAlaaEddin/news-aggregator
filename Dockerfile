# Base Image
FROM php:8.3-fpm

# Set Working Directory
WORKDIR /var/www

# Install Dependencies
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    libpng-dev \
    libonig-dev \
    supervisor

# Install PHP Extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy Project Files
COPY . .

# Set Permissions
RUN chown -R www-data:www-data /var/www

# Install Laravel Dependencies
RUN composer install --optimize-autoloader --no-dev

# Copy Supervisor Configuration
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose Port
EXPOSE 8000

# Start Supervisor
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]


CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
