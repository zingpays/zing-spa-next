FROM bitnami/php-fpm:8.1

#COPY docker/sources.list.buster /etc/apt/sources.list
#RUN sed -i 's#date.timezone = UTC#date.timezone = Asia/Shanghai#g' /opt/bitnami/php/etc/php.ini


RUN sed -i 's#opcache.revalidate_freq = 60#opcache.revalidate_freq = 0#g' /opt/bitnami/php/etc/php.ini
RUN sed -i 's#;opcache.validate_timestamps=1#opcache.validate_timestamps=1#g' /opt/bitnami/php/etc/php.ini


RUN install_packages supervisor nginx vim telnet curl net-tools inetutils-ping

COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/
COPY docker/nginx/nginx.conf /etc/nginx/sites-enabled/default

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
