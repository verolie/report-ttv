FROM php:7.4-apache

# Install required packages and extensions
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install zip

# Set the working directory
WORKDIR /var/www/html

# Copy the application code into the image
COPY . /var/www/html/

# Set the ownership of the storage and bootstrap/cache directories
RUN chown -R www-data:www-data storage bootstrap/cache

# Run database migrationsup
# RUN php artisan migrate

# Enable the Apache rewrite module
RUN a2enmod rewrite

# Expose port 80
EXPOSE 8081

# Set the entrypoint command
CMD ["apache2-foreground"]
