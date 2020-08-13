
# Sistema de Registro Deportivo (SIRED)

Aplicación web creada con **Laravel 7** que permite el CRUD de equipos deportivos, jugadores, partidos, canchas y árbitros, además de arrojar los resultados de los partidos, anotaciones del jugador y datos del equipo.

## Clonar proyecto

Para obtener una copia funcional en maquina local es necesario cumplir con los siguientes requerimientos:

- Sistema Gestor de Bases de Datos SQL (SGBD) inatalado con versión de PHP mínimo a 7.2.5.
- Composer instalado.


### Instalación de SGBD

Puede instalar el SGBD que prefiera y seguir los métodos de instalación de cada uno:

- [XAMPP](https://www.apachefriends.org/es/index.html).
- [PostgreSQL](https://www.postgresql.org/download/).
- [MySQL](https://www.mysql.com/downloads/).

### Instalación de Composer

Ingrese a la página oficial de [composer](https://getcomposer.org/download/) y seguir las instrucciones de instalación de composer, Posteriormente agregarlo a las variables de entorno.

### Instalación de Laravel

Descargar el instalador de Laravel mediante composer usando el comando:
```
composer global require laravel/installer
```

### Crear la base de datos

Para la creación de la base de datos debe: 

- Ejecutar los modulos de apache y mysql mediante el SGBD.
- En el administrador de mysql (phpMyAdmin) importar la base de datos ubicada en /databases/BDsired.sql ubicado dentro del proyecto o crear manualmente la BD **'sired'** y realizar las importaciones desde el símbolo del sistema con el comando: 
```
php artisan migrate.
```

# Ejacutar proyecto

Para ejecutar el proyecto debe:

- Ingresar a la ruta del proyecto desde el símbolo del sistema y ejecutar el comando: 
```
php artisan serve.
```
- Copiar la ruta que le proporcionará el símbolo del sistema al ejecutar el comando anterior y pegarlo a una ventana de un navegador web.

## constroido con 

- [Laravel](https://laravel.com) como framework de desarrollo
- [Composer](https://getcomposer.org) como administrador de dependencias para PHP
- [Xampp](https://www.apachefriends.org/es/index.html) como SGBD.

