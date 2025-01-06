FROM wordpress:php8.1-apache

COPY ./wp-content /var/www/html/wp-content

RUN chown -R www-data:www-data /var/www/html/wp-content