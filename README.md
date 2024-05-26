
instruciones del ejercicio 
Usar Angular y laravel
Se tiene que generar un API

La cual tiene que registrar las CITAS la CURP solo puede tener un registro por fecha y tienen que tener las validaciones que consideres necesarias.
El api tiene que tener la posibilidad del crud completo
Utilizar Postgresql.
De preferencia generar el dockerfile y docker compose necesario para levantar el proyecto
index
get
create
update
delete 
Al momento de generar una nueva CURP se tiene que generar un usuario nuevo. el cual va a poder eliminar solamente su trámite, utilizando middlewares

1.-Copiar en el archivo .env
  cp .env.example .env

2.-cree las base de datos
  CREATE DATABASE softdb;

3.- cree las tablas y sus datos
php artisan migrate:fresh --seed

librerias usadas
1.- composer require tymon/jwt-auth
2.-composer require fruitcake/laravel-cors
3.-composer require laravel/ui
4.- npm i axios
5.-php artisan ui bootstrap --auth
6.-feke
