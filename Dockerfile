FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql mbstring zip bcmath opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

COPY .env.production .env

RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

RUN composer install --no-dev --optimize-autoloader

EXPOSE 9000

RUN php artisan config:clear && php artisan cache:clear && php artisan optimize:clear

CMD ["php-fpm"]



