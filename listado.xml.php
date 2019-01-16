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

    // 3) Imprimir XML
    $sxe = new SimpleXMLElement("<paises />");
    array_to_xml($paises, $sxe); 
    header("Content-Type: application/xml");
    echo $sxe->asXML();

    function array_to_xml($data, $sxe) {
        foreach ($data as $key=>$value) {
          if (is_numeric($key)) {
            $key = 'item'; //.$key; //dealing with <0/>..<n/> issues
          }
          if (is_array($value)) {
            $subnode = $sxe->addChild($key);
            array_to_xml($value, $subnode); // Recursividad
          } else {
            $sxe->addChild($key, htmlspecialchars($value));
          }
        }
      }