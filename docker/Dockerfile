FROM git.chocodev.kz:4567/docker-images/php:7.3-fpm-laravel

COPY ./ /srv/www/app

WORKDIR /srv/www/app

RUN chown -R www-data:www-data /srv/www/app && \
    find /srv/www/app -type f -exec chmod 644 {} \; && \
    find /srv/www/app -type d -exec chmod 755 {} \; && \
    chgrp -R www-data storage bootstrap/cache || true && \
    chmod -R ug+rwx storage bootstrap/cache || true && \
    chmod -R +x vendor/bin/* || true

USER www-data

ENTRYPOINT ["/bin/sh", "./docker/docker-entrypoint.sh"]
