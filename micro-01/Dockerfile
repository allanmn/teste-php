FROM php:7.4-fpm

ARG user
ARG uid

# INSTALL SYSTEM DEPENDENCIES
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# CLEAR CACHE
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# INSTALL PHP EXTENSIONS
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# GET LATEST COMPOSER
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# CREATE SYSTEM USER TO RUN COMPOSER AND ARTISAN COMMANDS
RUN useradd -G www-data,root -u $uid -d /hom/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# SET WORKING DIRECTORY
WORKDIR /var/www

USER $user 
