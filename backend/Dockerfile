# V3
# Use an official PHP runtime as a parent image
FROM php:8.2.12-fpm

# Set the working directory to /app
WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath soap zip pdo_pgsql pgsql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the application code to the container
COPY . .

# Copy the example env file to .env, adjust this line according to your project structure if needed
COPY .env.example .env

# Install Composer dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install whichbrowser/parser dependency
RUN composer require whichbrowser/parser

# Generate key (The command is optional, use if you need to generate a new key)
RUN php artisan key:generate

# Create the symbolic link for the storage
RUN php artisan storage:link

# Set permissions for storage and bootstrap cache
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Expose port 8000 (assuming it's the port used by your Laravel application)
EXPOSE 8000

# Use CMD to define the default command to run when the container starts
CMD php artisan serve --host=0.0.0.0 --port=8000




# # V2
# # Use an official PHP runtime as a parent image
# FROM php:8.2.12-fpm

# # Set the working directory to /app
# WORKDIR /app

# # Install system dependencies
# RUN apt-get update && apt-get install -y \
#     git \
#     unzip \
#     libonig-dev \
#     libxml2-dev \
#     libzip-dev \
#     && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath soap zip \
#     && pecl install xdebug \
#     && docker-php-ext-enable xdebug

# # Install Composer globally
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # Copy the application code to the container
# COPY . .

# # Copy the example env file to .env, adjust this line according to your project structure if needed
# COPY .env.example .env

# # Install Composer dependencies
# RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# # Generate key (The command is optional, use if you need to generate a new key)
# RUN php artisan key:generate

# # Create the symbolic link for the storage
# RUN php artisan storage:link
# # RUN php artisan migrate --force
# # RUN php artisan db:seed --force

# # Set permissions for storage and bootstrap cache
# RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# # Expose port 8000 (assuming it's the port used by your Laravel application)
# EXPOSE 8000

# # Use CMD to define the default command to run when the container starts
# CMD php artisan serve --host=0.0.0.0 --port=8000

# V1

# # Use an official PHP runtime as a parent image
# FROM php:8.2.12-fpm

# # Set the working directory to /app
# WORKDIR /app

# # Install dependencies
# RUN apt-get update && apt-get install -y \
#     git \
#     unzip \
#     libonig-dev \
#     libxml2-dev \
#     libzip-dev \
#     && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath soap zip \
#     && pecl install xdebug \
#     && docker-php-ext-enable xdebug


# # Install Composer globally
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # Copy the rest of the application code
# COPY . .

# # Set permissions
# RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# # Expose port 8000 (assuming it's the port used by your Laravel application)
# EXPOSE 8000

# # Use CMD to define the default command to run when the container starts
# CMD php artisan serve --host=0.0.0.0 --port=8000
