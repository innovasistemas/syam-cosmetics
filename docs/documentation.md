Curso Laravel

Fuente:
https://styde.net/laravel-5/

https://laravel.com/docs/5.5/migrations#columns
https://laravel.com/docs/8.x/migrations

Eliminar registros:
https://styde.net/eliminar-registros-en-laravel-6/

Actualizar registros:
https://styde.net/actualizar-registros-en-laravel-6/


Laravel 

1. Instalación proyecto
>composer create-project --prefer-dist laravel/laravel mi-proyecto

2. Versión Laravel
>php artisan --version

3. Iniciar servidor Laravel
>php artisan serve

4. Generar un controlador
>php artisan make:controller NameController

5. Generar pruebas
>php artisan make:test NameTest

6. Limpiar caché de vistas
Carpeta: /storage/framework/views
>php artisan view:clear

7. Lista de rutas
>php artisan route:list

8. Ejecutar migración
>php artisan migrate
>php artisan make:migration add_profession_to_users
>php artisan make:migration create_professions_table

>php artisan migrate:reset

>php artisan migrate:refresh
>php artisan migrate:fresh

>php artisan migrate:rollback

9. Generar un seeder
>php artisan make:seeder ProfessionSeeder

10. Ejecutar un seeder
>php artisan db:seed
>php artisan db:seed --class=ProfessionSeeder

11. Generar un modelo
>php artisan make:model Profession

12. Generar key
>php artisan key:generate

Pendientes
18, 21-25, 27, 29 (parte), 32-
CRUD:
Eliminar: validar datos
Actualizar
