# SIBA CODING TEST

Este proyecto incluye un reto de programación para los nuevos candidatos a Desarrollador Backend Junior para la empresa SIBA S.A.

## Requisitos para correr el proyecto

- Git
- Docker

## Instrucciones para correr el proyecto

Las instrucciones para correr el proyecto son las sigientes:

0. Asegurarse que no esté corriendo ningún servicio en los puertos 80 y 8090 de su máquina local.
1. Clonar el proyecto desde este repositorio: git@github.com:mmuriel/siba-coding-test.git
2. Copiar el archivo docker-compose.yml.template hacia un archivo que se llame docker-compose.yml (necesario para funcionar con la herramienta docker-compose).
3. Modificar en el archivo docker-compose.yml los siguientes valores:
	
	- services.app.volumes
	- services.db.volumes

   Modificando el valor "/path/to/project" por la ruta absoluta en su sitema de archivos local, donde se instaló el proyecto.

4. Arrancar el proyecto con el comando: docker-compose up (ubicandose en la raiz del proyecto).


## En que cosiste el reto:

El reto consiste en desarrollar uno o una serie de scripts (queda a su criterio) en lenguaje php que realicen lo siguiente:


1. Lea los datos que se encuentran en el archivo: docs/TV-GLOBO.txt, y almacenarlos en una base de datos mysql donde se pueda posteriormente consultar los campos: 

	- Fecha y hora
	- Título del programa
	- Descripción del programa (sinopsis)

Es decir, hay que desarrollar un script php que lea desde el archivo de texto mencionado (docs/TV-GLOBO.txt), extraiga los campos mencionados (fechay hora, Título de programa y Sinopsis) y los almacene en mysql.

2. Luego de tener los datos almacenados en mysql, se debe construir otro script php que  al ser ejecutado reciba dos (2) parámetros, una fecha de inicio y una fecha de cierre para definir un rango de tiempo para recuperar los programas almacenados, con los datos recuperados desde mysql, se debe escribir un documento XML que tenga la siguiente estructura de nodos:

<programacion fecha-hora-inicio="YYYY-MM-DD HH:MM:SS">
	<evento>
		<fecha-hora>YYYY-MM-DD HH:MM:SS</fecha-hora>
		<titulo>Titulo del primer evento del rango de tiempo</titulo>
		<sinopsis>Sinopsis del evento</sinopsis>
	</evento>
	.
	.
	.
	<evento>
		<fecha-hora>YYYY-MM-DD HH:MM:SS</fecha-hora>
		<titulo>Titulo del último evento del rango de tiempo</titulo>
		<sinopsis>Sinopsis del evento</sinopsis>
	</evento>
</programacion>

El documento XML resultante se debe almacenar en la carpeta public del proyecto con el nombre de programacion.xml de tal manera que pueda ser consultado vía web. (apuntando el navegador a la dirección: http://localhost/programacion.xml)

- *Nota:* El segmento XML anterior es solo un ejemplo de la estructura del cuerpo del documento que se solicita, se deben incluir todos los tags báscios para la construcción de un documento XML válido.


## Otras consideraciones del reto:

1. Queda a su criterio la forma de programar los scripts y la forma de ser ejecutados, pueden ser script php que se ejecuten por la terminal o scripts php que se ejecuten en el navegador.

2. Para acceder al contenedor via terminal donde se ejecutan los script puede usar el siguiente comando de terminal:

> docker exec -it app /bin/bash

El proyecto se encuentra en la ruta: /home/sientifica/app dentro del contenedor: app

3. Queda a su criterio la estructura de la entidad (tabla) o entidades (tablas) en mysql para persistir los datos. Lo que si debe usar es la base base de datos ya creada que se llama: siba

... Buena programación ;-)


