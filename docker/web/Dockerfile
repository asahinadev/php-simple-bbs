# base image https://hub.docker.com/_/nginx
FROM nginx:1.19

RUN apt-get -y update
RUN apt-get -y install apt-utils vim iputils-ping dnsutils procps

WORKDIR /var/www/html