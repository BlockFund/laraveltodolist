FROM webdevops/php-apache:7.4-alpine

COPY vhost.conf /opt/docker/etc/httpd/vhost.conf

RUN apk add --update nodejs
RUN apk add --update npm

VOLUME /mysql-5.7-bfc