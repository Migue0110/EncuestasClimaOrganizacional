<?php

// importarEmpleados.php

//Conexión base de datos ...
include("../db_connection.php");

// Verificar si se ha enviado un archivo

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivoCSV'])) {
    $archivoCSV = $_FILES['archivoCSV']['tmp_name'];

    // ... (código para abrir el archivo CSV)
    $csvFile = fopen($archivoCSV, 'r');
    $numRegistrosInsertados = 0;

    // Diccionarios con los ID correspondientes a cada categoría

    $areasDic = ['1' => 'Recursos Humanos', '2' => 'Tecnología', '3' => 'Finanzas', '4' => 'Ventas'];
    $rolesDic = ['1' => 'Administrador', '2' => 'Empleado'];
    $cargosDic = ['1' => 'Gerente', '2' => 'Desarrollador', '3' => 'Analista Financiero', '4' => 'Asesor comercial'];

    // Iterar sobre cada línea del archivo CSV
    while (($data = fgetcsv($csvFile, 1000, ',')) !== false) {
        // Los datos están en el array $data

        $nombre = filter_var($conn->real_escape_string($data[0]), FILTER_SANITIZE_STRING);
        $apellido = filter_var($conn->real_escape_string($data[1]), FILTER_SANITIZE_STRING);
        $identificacion = filter_var($conn->real_escape_string($data[2]), FILTER_VALIDATE_INT);
        $area = filter_var($conn->real_escape_string($data[3]), FILTER_SANITIZE_STRING);
        $cargo = filter_var($conn->real_escape_string($data[4]), FILTER_SANITIZE_STRING);
        $correoElectronico = filter_var($conn->real_escape_string($data[5]), FILTER_VALIDATE_EMAIL);
        $telefono = filter_var($conn->real_escape_string($data[6]), FILTER_VALIDATE_INT);
        
        // Validar ID de área
        $areaId = filter_var($conn->real_escape_string($data[7]), FILTER_VALIDATE_INT);
        if (!array_key_exists($areaId, $areasDic)) {
            $response[] = array("status" => "error", "message" => "Error en el empleado {$data[2]}: ID de área no válido");
            continue;
        }

        // Validar ID de rol
        $rolId = filter_var($conn->real_escape_string($data[8]), FILTER_VALIDATE_INT);
        if (!array_key_exists($rolId, $rolesDic)) {
            $response[] = array("status" => "error", "message" => "Error en el empleado {$data[2]}: ID de rol no válido");
            continue;
        }

        // Validar ID de cargo
        $cargoId = filter_var($conn->real_escape_string($data[9]), FILTER_VALIDATE_INT);
        if (!array_key_exists($cargoId, $cargosDic)) {
            $response[] = array("status" => "error", "message" => "Error en el empleado {$data[2]}: ID de cargo no válido");
            continue;
        }
        if ($correoElectronico === false) {
            // El correo electrónico no es válido, maneja la situación según tus necesidades
            $response[] = array("status" => "error", "message" => "El correo electrónico no es válido = " . strval($data[5]));
        } else {
            // Verificar la longitud del número de teléfono sea 10 dígitos.
            if (strlen($telefono) === 10) {
                
                // Verificar si la identificación, correo o teléfono ya existen en la base de datos
                $sql_verificar = "SELECT * FROM empleado WHERE identificacion = '$identificacion' OR correo_electronico = '$correoElectronico' OR telefono = '$telefono'";
                $resultado_verificar = $conn->query($sql_verificar);

                if ($resultado_verificar->num_rows > 0) {
                    // Los datos ya existen en la base de datos
                    $response[] = array("status" => "error", "message" => "Error: Los datos ya existen en la base de datos.");
                } else {
                    // Insertar datos en la base de datos
                    $sql = "INSERT INTO empleado (nombre, apellido, identificacion, area, cargo, correo_electronico, telefono, area_idArea, rol_idRol, Cargo_idCargo) VALUES ('$nombre', '$apellido', '$identificacion', '$area', '$cargo', '$correoElectronico', '$telefono', '$areaId', '$rolId', '$cargoId')";
                    print_r ($sql);
                    if ($conn->query($sql) === TRUE) {
                        $numRegistrosInsertados++;
                    } else {
                        $response[] = array("status" => "error", "message" => "Error al insertar datos: " . $conn->error);
                    }
                }
            } else {
                // La longitud no es válida o el valor no es un entero válido
                $response[] = array("status" => "error", "message" => "El número de teléfono no tiene la longitud válida o esta duplicado = " . $telefono);
            }
        }
    }

    // ... (código para cerrar el archivo CSV)
    fclose($csvFile);
    // Cerrar la conexión a la base de datos
    $conn->close();

    // Enviar respuesta
    if ($numRegistrosInsertados > 0) {
        $response[] = array("status" => "success", "message" => "Datos importados correctamente. Número de registros insertados: " . $numRegistrosInsertados);
    } else {
        $response[] = array("status" => "error", "message" => "No se insertaron registros.");
    }
    
    echo json_encode($response);
} else {
    // Si no se ha enviado un archivo CSV
    $response = array("status" => "error", "message" => "Error: No se ha enviado un archivo CSV.");
    echo json_encode($response);
}
?>