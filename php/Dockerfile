FROM php:8.4-fpm

# Включаем нужные расширения
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Устанавливаем composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Копируем php.ini
COPY php.ini /usr/local/etc/php/