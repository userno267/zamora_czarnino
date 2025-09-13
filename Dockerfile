FROM php:8.2-apache
RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . /var/www/html

RUN echo '<Directory /var/www/html/>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
    DirectoryIndex index.php\n\
</Directory>' > /etc/apache2/conf-available/app.conf \
    && a2enconf app
