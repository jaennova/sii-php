# Dockerfile
FROM php:8.2-apache

# Instalar extensiones de PHP y dependencias necesarias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Habilitar el módulo rewrite de Apache
RUN a2enmod rewrite

# Copiar la configuración de PHP personalizada si es necesaria
# COPY php.ini /usr/local/etc/php/