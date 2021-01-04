FROM php:8.0-apache

RUN apt update && apt install -y git unzip

RUN ln -s "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN curl -fsSL 'https://github.com/amphp/ext-fiber/archive/master.zip' -o fiber.zip \
    && unzip fiber.zip \
    && rm fiber.zip \
    && ( \
        cd ext-fiber-master \
        && phpize \
        && ./configure \
        && make -j "$(nproc)" \
        && make install \
    ) \
    && rm -r ext-fiber-master \
    && docker-php-ext-enable fiber

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
