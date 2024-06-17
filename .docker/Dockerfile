# Use an official PHP image with Apache
FROM php:8.2-apache

# i uses this technique mutiple RUN to uses caches in docker (whenever one RUN failed it caches all the previour runs)
RUN apt-get update
RUN apt-get install -y libpng-dev
RUN apt-get install -y libjpeg-dev
RUN apt-get install -y libfreetype6-dev
RUN apt-get install -y zip
RUN apt-get install -y unzip
RUN apt-get install -y git
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html


# Install Composer and Laravel dependencies
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
#RUN composer install


EXPOSE 80

CMD ["apache2-foreground"]
