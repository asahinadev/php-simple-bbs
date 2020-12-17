# base image https://hub.docker.com/_/php
FROM php:7.4-fpm

# database
RUN docker-php-ext-install pdo_mysql mysqli

# redis session
RUN \
  pecl install redis ;\
  docker-php-ext-enable redis

#
# 処理で基本不要なもの
#
RUN \
  apt-get -y update ;\
  apt-get -y install apt-utils vim iputils-ping dnsutils procps
