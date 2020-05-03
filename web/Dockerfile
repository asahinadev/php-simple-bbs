From centos:8

EXPOSE 80

# YUM リポジトリ設定
RUN dnf -y install epel-release
RUN dnf -y install http://rpms.famillecollet.com/enterprise/remi-release-8.rpm
RUN dnf -y install 'dnf-command(config-manager)'
RUN dnf -y module disable php
RUN dnf -y module enable php:remi-7.4
RUN dnf config-manager --set-enabled PowerTools
RUN dnf config-manager --set-enabled epel-testing

RUN dnf -y install \
 httpd \
 httpd-devel \
 php \
 php-fpm \
 php-intl \
 php-mbstring \
 php-mysqlnd \
 php-xml \
 php-redis \
 php-pecl-zip \
 php-pecl-mongodb 

WORKDIR /var/www

ADD startup.sh /var/www/startup.sh
RUN sed -i "s/\r//g" /var/www/startup.sh
RUN chmod +x /var/www/startup.sh

WORKDIR /var/www/html

CMD [ "/var/www/startup.sh" ]