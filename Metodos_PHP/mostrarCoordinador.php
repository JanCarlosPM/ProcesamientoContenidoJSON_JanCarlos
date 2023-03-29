<?php

//ACA SE MUESTRA LOS COORDINADORES QUE CUYA EDAD EXCEDA LOS 60 AÑOS//
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once 'conexion.php';

    $sql = "SELECT
    idC,
    nombres,
    apellidos,
    fechaNac,
    titulo,
    email,
    facultad
  FROM
    coordinador
  WHERE
    TIMESTAMPDIFF(YEAR, fechaNac, CURDATE()) > 60;
  ";
    $resultado = $mysql->query($sql);

    $datos = array();
    while ($row = $resultado->fetch_assoc()) {
        $datos[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($datos);

    $resultado->close();
}





?>