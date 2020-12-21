#!/bin/sh


chmod -v +x bin/cake

CAKE=./bin/cake

sleep 120

$CAKE migrations migrate
$CAKE migrations seed
$CAKE migrations status

php-fpm


