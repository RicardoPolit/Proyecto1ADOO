Contenido:
		CSS
			Directorio que contiene los archivos con las hojas de estilo para cada pagina.
		IMG
			Directorio que contiene los archivos de imágenes de fondos y marcas de tarjetas.
		PHP
			Directorio que contiene scripts y las paginas.
			pags.
				Este subdirectorio contiene todas las paginas principales
					-Login
					-Registro
					-Cuenta
					-Inventario
					-Index
			scritps
				Este subdirectorio contiene todos los scripts que se usa en cada pagina donde haya un formulario o se necesite mostrar datos de muebles o clientes.

		SQL
			Directorio que contiene instrucciones SQL que deben ser ejecutadas en pgAdmin 4 			v1.3.

Instrucciones de instalación
1.-	Se deben crear una base de datos con nombre “mueblesquetzal”  en pgAdmin4 con los siguientes datos:
	-host : localhost
	-dbname : mueblesquetzal
	-user: postgres
	-password:root
Si estos valores no son iguales se deberá ir a la carpeta de “scritps” y modificar los valores deseados en el archivo “connect.php”	

2.- Ejecutar los scripts de la carpeta SQL con el siguiente orden:

Cliente:
———————————————————
		- Tabla Cliente
		- Tabla personaFisica
		- Tabla personaMoral
		- Tabla Domicilio
		- Tabla Tarjeta

Mueble
————————————————————
		-Tabla Mueble
		-Tabla Material
		- Tabla Acabado
		- Tabla …
		- Tabla …
3.- El directorio principal,  debe ser colocado en una carpeta htdocs de MAMP o de XAMPP para poder visualizar las pantallas correctamente de modo localhost.
4.- Para comenzar a usar la pagina web deberá usar un registro de prueba que se puede visualizar desde la página “registro.php” en la carpeta pags.
