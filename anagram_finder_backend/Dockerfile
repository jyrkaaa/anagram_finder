FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    unzip git curl libpq-dev zip \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/symfony
