# base image https://hub.docker.com/_/php
FROM php:7.4-fpm

# サーバー初期設定
RUN \
  apt-get -y update &&\
  apt-get -y install apt-file apt-utils vim iputils-ping dnsutils procps &&\
  apt-file  update

# マルチバイト対応
RUN apt-get -y install libonig-dev

# 国際化対応
RUN \
  apt-get -y install libicu-dev &&\
  docker-php-ext-install intl


# 永続化
RUN \
  docker-php-ext-install pdo_mysql mysqli

# 分散化
RUN \
  pecl install redis &&\
  docker-php-ext-enable redis
