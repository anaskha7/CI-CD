FROM php:8.3-apache

COPY index.php /var/www/html/index.php
COPY styles.css /var/www/html/styles.css

EXPOSE 80
