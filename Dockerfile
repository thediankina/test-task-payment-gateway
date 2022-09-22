FROM ubuntu:20.04

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    apache2 \
    php \
    php-bcmath \
    php-json \
    php-mbstring \
    php-xml \
    php-tokenizer \
    php-zip \
    php-pgsql

COPY server/000-default.conf /etc/apache2/sites-enabled/000-default.conf
COPY server/apache2.conf /etc/apache2/apache2.conf
COPY server/php.ini /etc/php/7.4/apache2/php.ini
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY app/ .

RUN COMPOSER_VENDOR_DIR="/var/vendor" composer install --ignore-platform-req=ext-curl

RUN a2enmod rewrite && service apache2 restart

EXPOSE 80

CMD [ "apachectl", "-D", "FOREGROUND" ]
