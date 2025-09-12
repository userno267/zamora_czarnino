FROM php:8.2-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Set working dir
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html

# Apache config override
RUN echo '<Directory /var/www/html/>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/app.conf \
    && a2enconf app
