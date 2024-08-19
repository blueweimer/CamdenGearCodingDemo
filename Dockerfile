# Use the official PHP image as the base image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

RUN bin/cake bake all

RUN bin/cake bake all posts

RUN bin/cake server

RUN docker-php-ext-install gettext intl pdo_mysql
