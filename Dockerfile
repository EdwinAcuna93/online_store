FROM php:7.4-apache
MAINTAINER Edwin Acuña edwinalex0093@gmail.com
COPY app/ /var/www/html
RUN apt-get update
RUN docker-php-ext-install mysqli
RUN apt-get install nano
RUN a2enmod rewrite
EXPOSE 80
