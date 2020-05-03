#!/bin/sh

mkdir /run/php-fpm
php-fpm -c /var/www/html
/usr/sbin/httpd -DFOREGROUND

