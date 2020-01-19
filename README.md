<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Proyecto X

### 1) Metodología y directorios

Para la realización de la prueba he seguido los patrones:

-   Modelo-Vista-Controlador: Generando las clases XXXX que son tratadas por los controladores YYY antes de ser entregadas a las vistas ZZZ que hacen uso del motor de plantillas blade de laravel.

-   Active Record: Ya que Eloquent, el ORM de Laravel mapea cada objeto en cada fila de una tabla de la base de datos

-   Factory Pattern: Al crear las interfaces para los repositorios e inyectarlas como dependencias abstrayendonos así del origen de los datos: sea Base de datos, un fichero, API REST, etc.. ( "D" en SOLID)

El proyecto está realizado en laravel 6. Las clases se encuentran en el directorio **app/** , una serie de controladores bajo **app/Http/Controllers**, las vistas en la ruta **resources/views** y interfaces en ...

### 2) Pruebas y como ejecutarlas

_Es necesario ejecutar **composer install** para instalar dependencias de test como laravel dusk_

Las pruebas están alojadas bajo el directorio **tests/** . Se han realizado pruebas unitarias y pruebas de integración con phpunit y usado laravel dusk ( un wrapper de Selenium para las pruebas de interfaz).

-   Para ejecutar las pruebas realizadas con phpunit basta con ejecutar phpunit en la raiz del proyecto. En entorno windows el comando es **php vendor/phpunit/phpunit/phpunit** ya que de estar instalado phpunit de forma global en el sistema la configuracion puede variar con respecto a la del proyecto.

-   Para las pruebas realizadas con dusk el comando a ejecutar el **php artisan dusk**

### 3) Ver proyecto en navegador

_Es necesario ejecutar **composer install** para instalar dependencias de laravel_

Para lanzar el proyecto en el navegador el comando a usar es **php artisan serve** que levantará un pequeño servidor en el puerto 8000
