Repaso PDO (PHP Data Objects)
==========

http://php.net/manual/en/book.pdo.php

Me permite conectar y usar una base de datos desde PHP.
Podemos hacer un sitio web que acceda a BD.
Equivalente al JDBC de Java.

Clases que tiene esta extensión:

 - PDO = Conectar con la base de datos
 - PDOStatement = Acceder al resultado de una consulta
 
## Antes de empezar

Estamos usando el XAMPP. 
En el panel de control de XAMPP hay que arrancar Apache y MySQL.

Necesitamos una BD. Con el phpMyAdmin podemos crear desde cero una base de datos, o bien importar una que ya esté hecha.

http://localhost/phpmyadmin

## Código PHP

### 1) Conectar con la BD

		$pdo = new PDO($cadena, $usuario, $clave);
		
Los elementos que se indican en la **cadena** de conexión dependen del tipo de base de datos: MySQL, SQLite, Oracle, etc.

[Drivers de PDO](http://php.net/manual/en/pdo.drivers.php)

#### MySQL

En el caso de MySQL la cadena de conexión es:

		"mysql:host=HOST;dbname=DATABASE;charset=utf8"

Dónde HOST suele ser localhost y DATABASE es el nombre de la base de datos, por ejemplo "bd_mundo"

		"mysql:host=localhost;dbname=bd_mundo;charset=utf8"
		
#### SQLite

En la cadena de conexión de SQLite tan sólo hay que especificar la ruta al fichero de la base de datos.

		"sqlite:/tmp/foo.db"


### 2) Ejecutar una consulta sobre una tabla

		$sentencia = $pdo->query($sql);

- Accede al método query del objeto $pdo. 
- La variable $sql es un texto en lenguaje SQL.
- El objeto $sentencia es de la clase PDOStatement. La cual nos permite acceder al resultado.

### 3) Obtener el resultado

		echo $sentencia->rowCount();
		print_r($sentencia->fetchAll());
		print_r($sentencia->fetch());









