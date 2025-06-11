FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tambahkan user non-root (opsional)
RUN groupadd -g 1000 www \
    && useradd -u 1000 -ms /bin/bash -g www www

# Set working directory
WORKDIR /var/www

# Salin semua file ke dalam container
COPY . .

# Install dependencies Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Salin file .env ke dalam container
COPY .env.example .env

# Jalankan migrasi database
RUN php artisan migrate

# Permission Laravel
RUN chmod -R 775 storage bootstrap/cache

# Expose port Laravel dev server
EXPOSE 8000

# Jalankan Laravel dengan artisan serve
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
