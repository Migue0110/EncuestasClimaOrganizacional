<?php
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "1006";
    $dbname = "proyectofinalarquitectura";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        $response = array("status" => "error", "message" => "Conexión fallida: " . $conn->connect_error);
        die(json_encode($response));
    }


?>