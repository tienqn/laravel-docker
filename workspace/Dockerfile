FROM php:8-fpm-alpine

LABEL maintainer="Tien Pham <tiens8acc@gmail.com>"

WORKDIR /var/www

# Install php drivers 
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install composer 
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

# Install git 
RUN apk add git

# Install nodejs
RUN apk add --update nodejs npm \
    && apk add --update npm

# For alpine version you need to use the permissions in the mounted folder
RUN apk add shadow && usermod -u 1000 www-data && groupmod -g 1000 www-data

EXPOSE 9000
