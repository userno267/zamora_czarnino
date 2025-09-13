FROM php:8.2-apache

# Enable URL rewriting
RUN a2enmod rewrite

WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html

# Configure Apache to allow .htaccess and routing
RUN echo '<Directory /var/www/html/>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/app.conf \
    && a2enconf app
