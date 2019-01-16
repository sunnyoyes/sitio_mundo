<?php

// 1) Conexión con la base de datos
//    http://php.net/manual/en/class.pdo.php

$cadena = "mysql:host=localhost;dbname=bd_mundo;charset=utf8";
$usuario = "root";
$clave = "";
$pdo = new PDO($cadena, $usuario, $clave);

// 2) Consulta la tabla países que hay en la BD

$sql = "SELECT pais, capital
        FROM paises 
        ORDER BY pais";

// Ejecuta la consulta y me da un objeto de tipo PDOStatement
$sentencia = $pdo->query($sql); 

// 3) Imprimir el resultado
// http://php.net/manual/en/class.pdostatement.php

// Si fuese Java: "Nº filas" + sentencia.rowCount()

echo "<p>";
echo "Número de filas=" . $sentencia->rowCount();
echo "</p>";

$resultado = $sentencia->fetchAll(); // Recuperar todo el resultado

echo "<pre>";
print_r($resultado);
echo "</pre>";