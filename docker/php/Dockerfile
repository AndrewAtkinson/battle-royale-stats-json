
FROM php:7.1-fpm

WORKDIR /var/www

RUN apt-get update
RUN apt-get install -y \
        libcurl4-gnutls-dev \
        libsqlite3-0 \
        libxml2-dev \
        libmcrypt-dev \
        libjpeg62-turbo-dev \
        libicu-dev \
        libpng-dev \
        libjpeg-dev \
        libxrender1 \
        libfontconfig \
        libxext6 \
        libicu-dev \
        curl \
        mysql-client

RUN docker-php-ext-configure gd --with-jpeg-dir=/usr/lib/x86_64-linux-gnu --with-png-dir=/usr/lib/x86_64-linux-gnu

## PHP Extensions
RUN docker-php-ext-install curl
RUN docker-php-ext-install json
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install xml
RUN docker-php-ext-install intl
RUN docker-php-ext-install gd

ADD php.ini /usr/local/etc/php/php.ini