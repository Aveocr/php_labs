# Используем официальный образ PHP
FROM php:8.1-apache as base

# Устанавливаем необходимые расширения (если нужно)
RUN docker-php-ext-install pdo pdo_mysql

# Копируем ваш код в контейнер
COPY ./ /var/www/html

# Устанавливаем рабочую директорию
WORKDIR /usr/src/OOP

# Команда по умолчанию
