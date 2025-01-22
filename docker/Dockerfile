FROM php:8.0.2-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Проверка установки Composer
RUN composer --version

# Установка прав на выполнение Composer
RUN chmod +x /usr/local/bin/composer

# Установка рабочей директории
WORKDIR /var/www