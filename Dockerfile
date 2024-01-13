FROM richarvey/nginx-php-fpm:1.7.2

# Use the official PHP 8.1 image as the base image
FROM php:8.1-fpm

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public/sureoddbackend/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr


# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1


# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        unzip \
        git \
    && docker-php-ext-install zip pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Install dependencies using Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/public/sureoddbackend/storage /var/www/html/public/sureoddbackend/bootstrap/cache

CMD ["/start.sh","php-fpm" ]


