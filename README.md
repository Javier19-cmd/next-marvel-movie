# Next Marvel Movie

Este repositorio contiene una aplicación que muestra la próxima película de Marvel utilizando PHP y Docker.

## Descripción

La aplicación obtiene datos sobre las próximas películas de Marvel y las muestra en una interfaz web. Está desarrollada en PHP y utiliza Docker para facilitar su despliegue.

## Requisito

- Docker

## Instalación

1. Clona este repositorio:
    ```bash
    git clone https://github.com/Javier19-cmd/next-marvel-movie.git
    cd next-marvel-movie
    ```

2. Construye y ejecuta los contenedores de Docker:
    ```bash
    docker build -t app-php .
    docker run -d -p 80:80 app-php
    ```

3. Abre tu navegador y ve a `http://localhost` para ver la aplicación en funcionamiento.

## Archivos Principales

- `Dockerfile`: Define la imagen de Docker para la aplicación.
- `index.php`: Archivo principal que muestra la interfaz web.
- `rate_limit.php`: Maneja la limitación de la tasa de peticiones a la API de Marvel.

## Contribución

Si deseas contribuir, por favor sigue estos pasos:

1. Haz un fork de este repositorio.
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -am 'Añadir nueva funcionalidad'`).
4. Empuja la rama (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request.