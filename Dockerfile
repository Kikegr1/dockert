# syntax=docker/dockerfile:1
FROM php:apache

#Instala mysqli
RUN docker-php-ext-install mysqli

#Activar modulos de apache:
RUN a2enmod headers
RUN a2enmod rewrite

#Reiniciar Apache
RUN /etc/init.d/apache2 restart

#INSTALAR PYTHON:
RUN apt update