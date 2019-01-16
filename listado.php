<?php

    // 1) Conectar con la BD
    $cadena = "mysql:host=localhost;dbname=bd_mundo;charset=utf8";
    $usuario = "root";
    $clave = "";
    $pdo = new PDO($cadena, $usuario, $clave);

    // 2) Ejecutar la consulta
    $sql = "SELECT pais, moneda, poblacion
            FROM paises
            ORDER BY pais";
    $sentencia = $pdo->query($sql);
    $paises = $sentencia->fetchAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado</title>
    <style>
      td:nth-child(3) { text-align:right; }
    </style>
</head>
<body>
    <h1>Listado</h1>
    <table border="1">
      <tr>
        <th>País</th>
        <th>Moneda</th>
        <th>Población</th>
      </tr>
      <?php foreach($paises as $pais): ?>
        <tr>
            <td><?= htmlspecialchars($pais['pais']) ?></td>
            <td><?= htmlspecialchars($pais['moneda']) ?></td>
            <td><?= number_format($pais['poblacion'], 0, ",", ".") ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
</body>
</html>