FROM php:8.2-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Copy project
COPY . /var/www/html

# Set app folder as DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html/app

# Update Apache config to use new root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Allow .htaccess
RUN echo '<Directory ${APACHE_DOCUMENT_ROOT}>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/app.conf \
    && a2enconf app
