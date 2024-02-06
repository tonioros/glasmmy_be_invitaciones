# Glassmy Invitaciones Back End

Proyect hecho con Laravel v10 para servir datos para proyecto de Invitaciones, Confirmacion y presentacion de datos de invitados

## Instalacion
Si eres usuario Windows puedes usar XAMPP y ahorrarte el resto del tutorial: [XAMPP Apache + MariaDB + PHP + Perl](https://www.apachefriends.org/es/index.html)

En caso que no sigue los siguientes pasos
### Instalar PHP
Para configurarlo debes tener instalado PHP v8.1^, depende tu OS los pasos cambiaran: 

Windows: [How to install PHP on Windows](https://www.geeksforgeeks.org/how-to-install-php-in-windows-10/)

Linux: [How to Install PHP on Linux?
](https://www.geeksforgeeks.org/how-to-install-php-on-linux/)

MacOS: [How to Install PHP on MacOS?
](https://www.geeksforgeeks.org/how-to-install-php-on-macos/)

### Instalar MySQL
Si sabes usar Docker puedes descargar un Container de MySQL aca: [crear un contenedor con Docker-Mysql](https://platzi.com/tutoriales/1432-docker-2018/3268-como-crear-un-contenedor-con-docker-mysql-y-persistir-la-informacion/)

Nota: Verifica el Port de salida

En caso de querer instalar el servidor de MySQL descarga e installa el server [Download MySQL Server](crear un contenedor con Docker-Mysql)


### Configurar Composer

Composer es un manejador de paquetes para PHP, asi como NPM, Maven o NuGet, deberas configurar Composer dentro de tu entorno: [Download Composer](https://getcomposer.org/download/)

### Configurar Laravel

Deberas instalar las dependecias de Laravel con el siguiente comando

`composer install --ignore-platform-reqs`

Esto tomara unos minutos, ve por un ☕/🍺/🥤 lo que prefieras

Luego de esto deberas ejecutar, esto generara un HASH unico el cual servidara para generar claves HASH internas:

`php artisan key:generate`

Configura el archivo .env, aca deberas agregar credenciales de BD, Correo y mas

## Iniciar Proyecto

Para iniciar el proyecto ejecuta

`php artisan serve`

Si obtienes algo como esto:

`INFO  Server running on [http://127.0.0.1:8000].
Press Ctrl+C to stop the server`

Felicidades!! has logrado iniciar el proyecto con exito, enjoy! 🙌🏽🎉🍾🥂

## About Laravel

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
