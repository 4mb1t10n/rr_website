FROM wordpress:php8.1-apache

COPY ./wp-content /var/www/html/wp-content
COPY ./wp-config.php /var/www/html/wp-config.php

RUN a2enmod ssl && \
    a2ensite default-ssl.conf

RUN echo "RewriteEngine On" >> /etc/apache2/sites-available/000-default.conf && \
    echo "RewriteCond %{HTTPS} off" >> /etc/apache2/sites-available/000-default.conf && \
    echo "RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]" >> /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /var/www/html/wp-content