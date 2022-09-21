FROM ubuntu:20.04

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    php \
    php-cli \
    php-dev \
    php-common \
    php-intl \
    php-json \
    php-gd \
    php-zip \
    php-xml \
    php-curl \
    php-tokenizer \
    php-bcmath \
    php-mbstring \
    php-pgsql \
    unzip

RUN apt-get clean && apt-get -y autoremove

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

CMD [ "bash", "-c", "php artisan serve --host=0.0.0.0 --port=80" ]
