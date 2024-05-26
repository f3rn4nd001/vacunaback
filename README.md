Usar Angular y Laravel

Se tiene que generar una API que registre las CITAS. La CURP solo puede tener un registro por fecha y deben implementarse las validaciones necesarias. El API debe permitir el CRUD completo y utilizar Postgresql. De preferencia, generar el Dockerfile y Docker Compose necesarios para levantar el proyecto.

Requerimientos de la API:

Endpoinsts CRUD:

index
get
create
update
delete
Restricciones y Validaciones:

Al registrar una nueva CURP, solo puede haber un registro por fecha.
Al crear una nueva CURP, se debe generar un usuario nuevo.
El usuario podrá eliminar únicamente su trámite, utilizando middlewares para la seguridad.
Pasos para la Configuración del Proyecto:

Copiar en el archivo .env:
cp .env.example .env

Crear la base de datos:
CREATE DATABASE softdb;

Crear las tablas y sus datos:
php artisan migrate:fresh --seed


Librerías Usadas:
JWT Authentication:
composer require tymon/jwt-auth

CORS Middleware:
composer require fruitcake/laravel-cors

UI Scaffolding:
composer require laravel/ui

Axios para peticiones HTTP en el frontend:
npm i axios

Generar la autenticación con Bootstrap:
php artisan ui bootstrap --auth

Faker (probablemente te referías a Faker para generar datos de prueba):
composer require fakerphp/faker

Ejecución del Proyecto:
php artisan serve --host 0.0.0.0

Notas Adicionales:
Implementa los middlewares necesarios para que los usuarios solo puedan eliminar sus propios trámites.
Utiliza Postgresql como base de datos para el proyecto.
Si tienes alguna duda o necesitas más detalles, no dudes en preguntar.
