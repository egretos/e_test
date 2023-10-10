FROM php:8.0-fpm

RUN apt-get update
RUN apt install zip unzip libonig-dev
RUN apt-get install -y curl wget git libmcrypt-dev libzip-dev supervisor libgmp-dev
RUN pecl install mcrypt-1.0.4
RUN pecl install redis
RUN docker-php-ext-enable mcrypt
RUN docker-php-ext-install mbstring zip pdo_mysql bcmath gmp

WORKDIR /var/www
CMD ["/usr/bin/supervisord","-n"]