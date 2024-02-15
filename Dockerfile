FROM php:8.0-apache

RUN apt-get update && \
    apt-get install \
    wget \
    -y --no-install-recommends

COPY ./install-composer.sh ./

RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && sh ./install-composer.sh \
    && rm ./install-composer.sh

# WORKDIR /var/www/html

COPY composer.* ./
RUN composer install --no-autoloader
COPY . ./
RUN composer dump-autoload