FROM richarvey/nginx-php-fpm:1.7.2

# Use the official PHP 8.1 image as the base image
FROM php:8.1-fpm

# Set the working directory
WORKDIR /var/www/html/public/sureoddbackend

# Copy the application files to the container
COPY . .

# Install system dependencies
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        unzip \
        git \
    && docker-php-ext-install zip pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP extensions and other dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Set permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Set environment variables
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

# Set up image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public/sureoddbackend/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Command to start PHP-FPM
CMD [["php-fpm","/start.sh"]]



