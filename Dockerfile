FROM richarvey/nginx-php-fpm:1.7.2

# Use the official PHP 8.1 image as the base image
FROM php:8.1-fpm

# Copy the application files to the container
COPY . .

# Set the working directory
WORKDIR /var/www/html/public/sureoddbackend


# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public/sureoddbackend
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]

