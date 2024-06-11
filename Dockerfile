# Usa la imagen oficial de PHP con Apache
FROM php:apache

# Establece el ServerName para evitar advertencias
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copia el archivo PHP a la carpeta de la aplicación en el contenedor
COPY . /var/www/html/

# Exponer el puerto 80 para acceder a la aplicación
EXPOSE 80

# Iniciar el servidor Apache
CMD ["apache2-foreground"]
