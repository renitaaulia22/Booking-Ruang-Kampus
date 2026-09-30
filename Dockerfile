FROM php:8.2-cli

# Install dependencies dan ekstensi SQLite
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    sqlite3 \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_sqlite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy seluruh file project
COPY . .

# Install dependency PHP & build asset front-end
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN npm install && npm run build

# Buat file database SQLite jika belum ada dan atur permission penuh
RUN mkdir -p database storage bootstrap/cache \
    && touch database/database.sqlite \
    && chmod -R 777 storage bootstrap/cache database

EXPOSE 8080

# Jalankan migrasi dan nyalakan server
CMD touch database/database.sqlite \
    && chmod -R 777 storage bootstrap/cache database \
    && php artisan config:clear \
    && php artisan migrate --force \
    && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}