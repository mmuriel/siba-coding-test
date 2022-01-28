# SIBA CODING TEST

Este proyecto incluye un reto de programación para los nuevos candidatos a Desarrollador Backend Junior para la empresa SIBA S.A.

## Requisitos para correr el proyecto

- Git
- Docker

## Instrucciones para correr el proyecto

Las instrucciones para correr el proyecto son las sigientes:

0. 
1. Clonar el proyecto desde este repositorio: git@github.com:mmuriel/siba-coding-test.git
2. Copiar el archivo docker-compose.yml.template hacia un archivo que se llame docker-compose.yml (necesario para funcionar con la herramienta docker-compose)
3. Modificar en el archivo docker-compose.yml los siguientes valores:
	
	- services.app.volumes
	- services.db.volumes

   Modificando el valor "/path/to/project" por la ruta absoluta en su sitema de archivos local, donde se instaló el proyecto.

4. Arrancar el proyecto con el comando: docker-compose up (ubicandose en la raiz del proyecto)

