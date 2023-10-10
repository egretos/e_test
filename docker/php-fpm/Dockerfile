FROM php:8.0-fpm
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apt-get update
RUN apt install zip unzip libonig-dev
RUN apt-get install -y curl wget git libmcrypt-dev libzip-dev supervisor libgmp-dev
RUN pecl install mcrypt-1.0.4
RUN pecl install redis
RUN docker-php-ext-enable mcrypt
RUN docker-php-ext-install mbstring zip pdo_mysql bcmath gmp

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
EXPOSE 9000
CMD ["php-fpm"]