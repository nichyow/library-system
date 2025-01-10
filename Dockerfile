# Menggunakan PHP dengan Apache sebagai base image
FROM php:8.1-apache

# Install dependencies for PHP and PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Menyalin semua file project lokal ke dalam container
COPY . /var/www/html

# Mengatur direktori kerja di dalam container
WORKDIR /var/www/html

# Install ekstensi PHP yang diperlukan oleh CodeIgniter 4
RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql

# Memberikan izin ke folder writable (dibutuhkan oleh CodeIgniter 4)
RUN chown -R www-data:www-data /var/www/html/writable

# Mengekspos port 80 untuk server Apache
EXPOSE 80

# Menjalankan Apache saat container dijalankan
CMD ["apache2-foreground"]
