# base image https://hub.docker.com/_/php
FROM php:7.4-fpm

RUN apt-get -y update
RUN apt-get -y install apt-utils vim iputils-ping dnsutils procps
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli
