FROM php:8.0-apache


RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"


COPY ./src /var/www/html


USER www-data

