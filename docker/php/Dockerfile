FROM php:8.3-fpm-alpine

ARG UID=1000
ARG GID=1000

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Dependências
RUN apk add --no-cache bash curl git libzip-dev icu-dev libxml2-dev postgresql-dev \
    oniguruma-dev libpng-dev libjpeg-turbo-dev freetype-dev \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS linux-headers \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo pdo_pgsql bcmath zip opcache mbstring ctype xml intl pcntl gd sockets \
    && pecl install redis xdebug \
    && docker-php-ext-enable redis xdebug \
    && apk del .build-deps

# Usuário
RUN addgroup -g ${GID} laravel && adduser -u ${UID} -G laravel -s /bin/sh -D laravel

WORKDIR /var/www/html

USER laravel
EXPOSE 9000
CMD ["php-fpm"]