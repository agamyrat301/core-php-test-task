FROM php:8.2-apache

# Enable mod_rewrite for .htaccess routing
RUN a2enmod rewrite

# Install system deps: unzip for Composer, nodejs for SCSS build, PDO MySQL driver
RUN apt-get update && apt-get install -y --no-install-recommends unzip nodejs npm \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo pdo_mysql

# Allow .htaccess overrides in document root
COPY docker/apache.conf /etc/apache2/conf-enabled/interview.conf

WORKDIR /var/www/html

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies (cached layer)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --no-interaction

# Install Node deps and compile SCSS (cached layer)
COPY package.json package-lock.json ./
RUN npm ci

# Copy application source
COPY . .

# Compile SCSS → public/css/app.css
RUN npm run build

# Optimise autoloader
RUN composer dump-autoload --optimize --no-dev

# Smarty needs writable compile/cache dirs
RUN chown -R www-data:www-data storage/smarty \
    && chmod -R 775 storage/smarty
