FROM wordpress:php8.1-apache

COPY ./wp-content /var/www/html/wp-content

RUN echo "ServerName localhost" > /etc/apache2/conf-available/servername.conf && \
    a2enconf servername

RUN chown -R www-data:www-data /var/www/html/wp-content
