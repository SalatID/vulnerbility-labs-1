#!/bin/sh

# Ganti nilai di .env
sed -i 's|^APP_URL=.*|APP_URL=https://pentest1.hlp.my.id|' .env
sed -i 's|^APP_ENV=.*|APP_ENV=production|' .env

# Set permission
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Jalankan PHP-FPM
exec php-fpm
