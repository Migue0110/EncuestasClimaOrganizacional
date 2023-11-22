<?php

// CrearEmpleados.php

//Conexión base de datos ...

include("../db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $areasDic = ['1' => 'Recursos Humanos', '2' => 'Tecnología', '3' => 'Finanzas', '4' => 'Ventas'];
    $cargosDic = ['1' => 'Gerente', '2' => 'Desarrollador', '3' => 'Analista Financiero', '4' => 'Asesor comercial'];

    // Obtener los datos del formulario

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $identificacion = $_POST["identificacion"];
    $area = $_POST["area"];
    $cargo = $_POST["cargo"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    if ($_POST["rol"] === "Administrador") {
        $rol = 1;
    } else {
        $rol = 2;
    }
    
    // Verificar si la identificación, correo o teléfono ya existen
    $verificarExistencia = "SELECT * FROM empleado WHERE identificacion = '$identificacion' OR correo_electronico = '$correo' OR telefono = '$telefono'";
    $resultado = $conn->query($verificarExistencia);

    if ($resultado->num_rows > 0) {
        $mensaje = "El empleado que intentas agregar ya existe.";
        $color = "red";
    } else {
        // Si no existe, realizar la inserción
        if (in_array($area, $areasDic)) {
            // Obtener el ID correspondiente al valor de $area
            $idArea = array_search($area, $areasDic);
        }
        if (in_array($cargo, $cargosDic)) {
            // Obtener el ID correspondiente al valor de $cargo
            $idCargo = array_search($cargo, $cargosDic);
        }
        $sql = "INSERT INTO empleado (nombre, apellido, identificacion, area, cargo, correo_electronico, telefono, area_idArea, rol_idRol, Cargo_idCargo) VALUES ('$nombre', '$apellido', '$identificacion', '$area', '$cargo', '$correo', '$telefono', '$idArea', '$rol', '$idCargo')";
        if ($conn->query($sql) === TRUE) {
            $mensaje = "Empleado registrado exitosamente.";
            $color = "green";
        } else {
            $mensaje = "Error al registrar el empleado.";
            $color = "red";
        }
    }
}
?>