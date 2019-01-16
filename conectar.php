<?php // http://localhost/sitio_mundo/conectar.php

/*
    Probar si nos podemos conectar con 
    la base de datos "bd_mundo"

        - Funciones mysqli_
        - Clase PDO (PHP Data Object)        
*/

// Para conectar con la BD creamos un objeto PDO

$cadena_conexion = "mysql:host=localhost;dbname=bd_mundo";
$usuario = "root"; // El usuario preterminado de MySQL
$contraseña = ""; // No tiene contraseña

$pdo = new PDO($cadena_conexion, $usuario, $contraseña);

echo "¡¡¡Hurra!!! He conectado con bd_mundo";