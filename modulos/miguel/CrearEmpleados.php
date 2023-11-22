<?php

// CrearEmpleados.php

//Conexión base de datos ...
include("../db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $identificacion = $_POST["identificacion"];
    $area = $_POST["area"];
    $cargo = $_POST["cargo"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    if ($_POST["rol"] === "Empleado") {
        $rol = 1;
    } else {
        $rol = 2;
    }
    // Verificar si la identificación, correo o teléfono ya existen
    $verificarExistencia = "SELECT * FROM empleado WHERE identificacion = '$identificacion' OR correo_electronico = '$correo' OR telefono = '$telefono'";
    $resultado = $conn->query($verificarExistencia);

    if ($resultado->num_rows > 0) {
        $response = array("status" => "error", "message" => "El empleado que intentas agregar ya existe.");
    } else {
        // Si no existe, realizar la inserción
        $sql = "INSERT INTO empleado (nombre, apellido, identificacion, area, cargo, correo_electronico, telefono, rol_idRol) VALUES ('$nombre', '$apellido', '$identificacion', '$area', '$cargo', '$correo', '$telefono', '$rol')";
        if ($conn->query($sql) === TRUE) {
            $response = array("status" => "success", "message" => "Empleado registrado exitosamente.");
        } else {
            $response = array("status" => "error", "message" => "Error al registrar el empleado.");
        }
    }
}
echo json_encode($response);
?>