<?php // http://localhost/sitio_mundo/tabla.php

    /*
        Mostrar en una tabla HTML 
        el nombre del país y su capital
    */

    // 1) Conexión con la BD
    $cadena = "mysql:host=localhost;dbname=bd_mundo;charset=utf8";
    $usuario = "root";
    $clave = "";
    $pdo = new PDO($cadena, $usuario, $clave);

    // 2) Consulta la tabla países que hay en la BD
    $sql = "SELECT pais, capital
            FROM paises 
            ORDER BY pais";
    $sentencia = $pdo->query($sql); 
    $resultado = $sentencia->fetchAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla de países</title>
</head>
<body>
    <h1>Tabla de países</h1>
    <table border="1">
      <tr><th>País</th><th>Capital</th></tr>
      <?php foreach($resultado as $pais): ?>
        <tr>
            <td><?= $pais['pais'] ?></td>
            <td><?= $pais['capital'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
</body>
</html>