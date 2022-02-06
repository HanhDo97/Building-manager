FROM php:apache

COPY 000-default.conf /etc/apache2/sites-available/

RUN apt-get update && apt-get install -y gnupg2 && \
  a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www/html/building-manager-server

