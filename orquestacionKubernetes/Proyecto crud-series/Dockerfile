#Imagen de php-apache
FROM php:8.0-apache

#Dependencias para poder usar Mysqli en el proyecto crud
#RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get upgrade -y


#Copiar los archivos a la imagen 
COPY ./php /var/www/html

#Exponer el puerto 80
EXPOSE 80
