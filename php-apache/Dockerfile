FROM php:7.2.1-apache
RUN docker-php-ext-install pdo pdo_mysql mysqli && docker-php-ext-enable mysqli
RUN pecl install 