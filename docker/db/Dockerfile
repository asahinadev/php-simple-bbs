# base image https://hub.docker.com/_/mysql
FROM mysql:5.7

#
# 処理で基本不要なもの
#
RUN \
  apt-get -y update ;\
  apt-get -y install apt-utils vim iputils-ping dnsutils procps
