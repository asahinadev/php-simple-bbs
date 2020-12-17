# base image https://hub.docker.com/_/nginx
FROM nginx:1.19

WORKDIR /var/www/html

#
# 処理で基本不要なもの
#
RUN \
  apt-get -y update ;\
  apt-get -y install apt-utils vim iputils-ping dnsutils procps
