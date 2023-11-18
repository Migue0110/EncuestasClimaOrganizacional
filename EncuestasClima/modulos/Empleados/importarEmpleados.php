<?php
// importarEmpleados.php

// Verificar si se ha enviado un archivo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivoCSV'])) {
    $archivoCSV = $_FILES['archivoCSV']['tmp_name'];

    // Verificar si es un archivo CSV
    $file_info = pathinfo($_FILES['archivoCSV']['name']);
    if ($file_info['extension'] !== 'csv') {
        $response = array("status" => "error", "message" => "Error: El archivo no es un archivo CSV válido.");
        die(json_encode($response));
    }

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

    // Abrir el archivo CSV
    $csvFile = fopen($archivoCSV, 'r');

    // Contador para el número de registros insertados
    $numRegistrosInsertados = 0;

    // Iterar sobre cada línea del archivo CSV
    while (($data = fgetcsv($csvFile, 1000, ',')) !== false) {
        // Los datos están en el array $data

        $nombre = filter_var($conexion->real_escape_string($data[0]), FILTER_SANITIZE_STRING);
        $apellido = filter_var($conexion->real_escape_string($data[1]), FILTER_SANITIZE_STRING);
        $identificacion = filter_var($conexion->real_escape_string($data[2]), FILTER_VALIDATE_INT);
        $area = filter_var($conexion->real_escape_string($data[3]), FILTER_SANITIZE_STRING);
        $cargo = filter_var($conexion->real_escape_string($data[4]), FILTER_SANITIZE_STRING);
        $correoElectronico = filter_var($conexion->real_escape_string($data[5]), FILTER_VALIDATE_EMAIL);
        if ($correoElectronico === false) {
            // El correo electrónico no es válido
            echo "El correo electrónico no es válido.";
        } else {
            $telefono = $conexion->real_escape_string($data[6]);
        $telefono = $conexion->real_escape_string($data[6]);

        // Verificar la longitud del número de teléfono sea 10 digitos.
        if (strlen($telefono) === 10 && filter_var($telefono, FILTER_VALIDATE_INT) !== false) {
    
         $telefono = filter_var($telefono, FILTER_VALIDATE_INT);
        } else {
        // La longitud no es válida o el valor no es un entero válido, maneja la situación según tus necesidades
        echo "El número de teléfono no tiene la longitud válida.";
        }
        }
        // Verificar si la identificación, correo o teléfono ya existen en la base de datos
        $sql_verificar = "SELECT * FROM empleado WHERE identificacion = '$identificacion' OR correo_electronico = '$correoElectronico' OR telefono = '$telefono'";
        $resultado_verificar = $conn->query($sql_verificar);

        if ($resultado_verificar->num_rows > 0) {
            // Los datos ya existen en la base de datos
            $response = array("status" => "error", "message" => "Error: Los datos ya existen en la base de datos.");
        } else {
            // Insertar datos en la base de datos
            $sql = "INSERT INTO empleado (nombre, apellido, identificacion, area, cargo, correo_electronico, telefono) VALUES ('$nombre', '$apellido', '$identificacion', '$area', '$cargo', '$correoElectronico', '$telefono')";
            if ($conn->query($sql) === TRUE) {
                $numRegistrosInsertados++;
            } else {
                $response = array("status" => "error", "message" => "Error al insertar datos: " . $conn->error);
            }
        }
    }

    // Cerrar el archivo CSV
    fclose($csvFile);

    // Cerrar la conexión a la base de datos
    $conn->close();

    // Enviar respuesta
    $response = array("status" => "success", "message" => "Datos importados correctamente. Número de registros insertados: " . $numRegistrosInsertados);
    echo json_encode($response);
} else {
    // Si no se ha enviado un archivo CSV
    $response = array("status" => "error", "message" => "Error: No se ha enviado un archivo CSV.");
    echo json_encode($response);
}
?>