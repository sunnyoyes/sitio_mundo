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
    $paises = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    // 3) Imprimir JSON
    $json = json_encode($paises, 
        JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
    header("Content-Type: application/json");
    echo $json;