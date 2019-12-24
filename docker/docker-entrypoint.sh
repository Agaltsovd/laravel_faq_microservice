#!/bin/sh
set -e

if [ "$APP_DEBUG" = true ]; then
  sudo sed -i "s/;zend_extension=xdebug.so/zend_extension=xdebug.so/" /etc/php7/conf.d/xdebug.ini
fi

if [ "$APP_ENV" != 'production' ]; then
  sudo sed -i "s/pinba.enabled=1/pinba.enabled=0/" /etc/php7/conf.d/pinba.ini
fi

if [ $# -gt 0 ]; then
    exec "$@"
else
   exec /usr/sbin/php-fpm7 -F
fi
