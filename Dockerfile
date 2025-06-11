FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user (uid:1000) dan group www
RUN groupadd -g 1000 www \
    && useradd -u 1000 -ms /bin/bash -g www www

# Set working directory
WORKDIR /var/www

# Copy semua file dengan owner www
COPY --chown=www:www . /var/www

COPY start.sh /var/www/start.sh
RUN chmod +x /var/www/start.sh

# Ganti user ke www
USER root

# Set permission yang dibutuhkan Laravel
RUN chmod -R ug+rwx storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
