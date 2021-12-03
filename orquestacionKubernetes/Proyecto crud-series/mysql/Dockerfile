#Imagen de MySQL
FROM mysql:8

#Establecer la contraseña root
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=crud_db

#Copiar el script de la bd
COPY ./series.sql /docker-entrypoint-initdb.d/