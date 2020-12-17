# base image https://hub.docker.com/_/redis
FROM redis

#
# 処理で基本不要なもの
#
RUN \
  apt-get -y update ;\
  apt-get -y install apt-utils vim iputils-ping dnsutils procps
