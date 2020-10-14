*****PostgreSQL 13*****
usuario: postgres
contraseña: 12345678	
Puerto: 5432


Para Windows, ubicarse en carpeta: 
C:\Program Files\PostgreSQL\13\bin

Versión PostgreSQL
1.
>postgres --version
>postgres -V

2.
Modo PostgreSQL
>psql -U postgres -h localhost -W
>psql -U postgres -h localhost -d syam_cosmetics -W  /* la opción -d permite indicar a que base de datos se conecta*/

3.
Versión en modo postgres 
#SELECT version();
#SHOW server_version()

4. Opciones
Listar bases de datos
#\l 
Listar tablas
#\d
Describir tablas
#\d tablename
Seleccionar base de datos
#\c dbname
Mostrar usuarios
#select * from "pg_user";
#\du


Procedimientos almacenados (funciones)
https://www.postgresql.org/docs/current/plpgsql.html
https://e-mc2.net/es/procedimientos-almacenados-y-plpgsql
https://www.postgresql.org/docs/current/sql-createfunction.html

C:\Users\desarrollotec1\AppData\Roaming\DBeaverData\workspace6\General\Scripts\queries.sql