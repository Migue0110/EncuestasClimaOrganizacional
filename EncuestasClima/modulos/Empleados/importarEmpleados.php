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

    // Conectar a la base de datos (ajusta los datos de conexión según tus configuraciones)
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
        // Ajusta esto según la estructura de tu CSV y la base de datos

        $nombre = $data[0];
        $apellido = $data[1];
        $identificacion = $data[2];
        $area = $data[3];
        $cargo = $data[4];
        $correoElectronico = $data[5];
        $telefono = $data[6];

        // Verificar si la identificación, correo o teléfono ya existen en la base de datos
        $sql_verificar = "SELECT * FROM empleado WHERE identificacion = '$identificacion' OR correo_electronico = '$correoElectronico' OR telefono = '$telefono'";
        $resultado_verificar = $conn->query($sql_verificar);

        if ($resultado_verificar->num_rows > 0) {
            // Los datos ya existen en la base de datos, puedes manejarlo según tus necesidades
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

    // Enviar respuesta en formato JSON con el número de registros insertados
    $response = array("status" => "success", "message" => "Datos importados correctamente. Número de registros insertados: " . $numRegistrosInsertados);
    echo json_encode($response);
} else {
    // Si no se ha enviado un archivo CSV
    $response = array("status" => "error", "message" => "Error: No se ha enviado un archivo CSV.");
    echo json_encode($response);
}
?>