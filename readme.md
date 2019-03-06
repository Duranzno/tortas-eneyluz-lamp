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
<<<<<<< HEAD
---
Cosas por hacer 
* guardar datos de comprador en una base de datos y redireccionar a compra
* insertar datos de formulario (tipos de tortas) con una conexión a una base de datos P.17 intphpmysql
* definir finalmente el modelo de negocios y decidir que variables son 
* crear tablas y datos originales (tipos de tortas, usuarios administrador) desde el mismo codigo PHP para no tener que hacer todo por PHPMyAdmin o la terminal de comandos
* mejorar interfaz de administrador al momento de mostrar los pedidos
* llenar de contenido pantalla inicial


=======
>>>>>>> 714da75539a882a70cc35639729871fe9e6666a0
