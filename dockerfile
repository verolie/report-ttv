# Use the official PHP base image with Apache
FROM php:8.0-apache

# Set the working directory in the Docker image
WORKDIR /var/www/html

# Copy the source code into the Docker image
COPY . /var/www/html

# Install PHP dependencies using Composer
RUN apt-get update && \
    apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip && \
    docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set up Apache configuration
RUN a2enmod rewrite

# Set environment variables
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Configure Apache document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Expose port 80 for Apache
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]