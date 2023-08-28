FROM php:8.1.0-apache

# Install necessary packages and PHP extensions
RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev zip unzip && \
    docker-php-ext-configure gd --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql 

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Set environment variables for Composer
ENV COMPOSER_HOME /composer
ENV PATH /composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1

# Install Composer
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install Composer dependencies
RUN composer install  && \
    npm install && \
    npm run build && \
    php artisan key:generate --force && \
    chmod -R 777 storage 
    # php artisan passport:install && \
    # php artisan passport:client --personal 

CMD php artisan serve --host=0.0.0.0 --port=8000



EXPOSE 8000