FROM php:7-fpm

RUN docker-php-ext-install mysqli

#     DEBIAN_FRONTEND=noninteractive apt-get update -q \
#     && DEBIAN_FRONTEND=noninteractive apt-get install -y \
#         libfreetype6-dev \
#         libjpeg62-turbo-dev \
#         libmcrypt-dev \
#         libpng12-dev \
#         libcurl4-nss-dev \
#     && docker-php-ext-install mcrypt \
#     && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
#     && docker-php-ext-install gd \
#     && docker-php-ext-install curl \
    

# WORKDIR /www
COPY ./dcimstack/ /www/