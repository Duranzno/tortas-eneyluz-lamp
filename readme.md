# Repo para la materia Base de Datos de UNEXPO Electronica 2018-II
Diseñado para ser usado junto con WAMP (previamente Docker-compose pero se han hecho cambios)
---
a
En el boton de arriba se puede descargar una version zip de todo lo que esta en este repositorio colocar esto en la carpeta C:/wamp/www o donde sea que este instalado wamp de forma de que siempre exista algun directorio www/tortas-eneyluz

---
Una vez instalado WAMP abrir PHPMyAdmin y hacer una nueva base de datos llamada "testdb"
Aqui adentro hacer dos tablas.
1. Tabla "usuarios" con dos columnas TEXT llamadas "usuario" y "password", aqui se incluiran los nombres de usuario de administrador para entrar a la parte de admin
2. Tabla  "pedidos" con tres columnas
	1. "nombre" de tipo TEXT
	2. "pedido" de tipo TEXT
	3. "fecha"  de tipo DATE 
----
Al momento de acceder ir a localhost/tortas-eneyluz
