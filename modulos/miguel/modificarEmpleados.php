<?php

// EliminarEmpleados.php

//Conexión base de datos ...

include("../db_connection.php");

$logFile = fopen("log.txt", "a");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formType = isset($_POST['formType']) ? $_POST['formType'] : '';

    if ($formType === 'miFormulario') {
        $idEmpleado = isset($_POST['ID']) ? $_POST['ID'] : '';
        $nombre = isset($_POST['nombreEmpleado']) ? $_POST['nombreEmpleado'] : '';
        $apellido = isset($_POST['apellidoEmpleado']) ? $_POST['apellidoEmpleado'] : '';
        $identificacion = isset($_POST['identificacionEmpleado']) ? $_POST['identificacionEmpleado'] : '';
        $area = isset($_POST['areaEmpleado']) ? $_POST['areaEmpleado'] : '';
        $cargo = isset($_POST['cargoEmpleado']) ? $_POST['cargoEmpleado'] : '';
        $correo = isset($_POST['correoEmpleado']) ? $_POST['correoEmpleado'] : '';
        $telefono = isset($_POST['telefonoEmpleado']) ? $_POST['telefonoEmpleado'] : '';
        
        $rol = ($_POST['rol'] === "Administrador") ? 1 : 2;

        $areasDic = ['1' => 'Recursos Humanos', '2' => 'Tecnología', '3' => 'Finanzas', '4' => 'Ventas'];
        $cargosDic = ['1' => 'Gerente', '2' => 'Desarrollador', '3' => 'Analista Financiero', '4' => 'Asesor comercial'];

        // Verificar si $areasDic y $cargosDic están definidos y son arrays antes de usar in_array
        if (isset($areasDic) && is_array($areasDic) && in_array($area, $areasDic)) {
            $idArea = array_search($area, $areasDic);
        } else {
            $idArea = ''; // Asignar un valor predeterminado si no se encuentra el área
        }

        if (isset($cargosDic) && is_array($cargosDic) && in_array($cargo, $cargosDic)) {
            $idCargo = array_search($cargo, $cargosDic);
        } else {
            $idCargo = ''; // Asignar un valor predeterminado si no se encuentra el cargo
        }
    }

    try {
        $sql = "UPDATE empleado SET 
            nombre = '$nombre',
            apellido = '$apellido',
            identificacion = '$identificacion',
            area = '$area',
            cargo = '$cargo',
            correo_electronico = '$correo',
            telefono = '$telefono',
            area_idArea = '$idArea',
            rol_idRol = '$rol',
            Cargo_idCargo = '$idCargo'
            WHERE idEmpleado = '$idEmpleado'";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../../views/modificarEmpleadoExitoso.php');
        } else {
            header('Location: ../../views/modificarEmpleadoFallido.php');
        }
    } catch (Exception $e) {
        header('Location: ../../views/modificarEmpleadoFallido.php?error=' . urlencode($e->getMessage()));
    }
}

fwrite($logFile, "Nombre: " . $nombre . "\n");
fwrite($logFile, "Apellido: " . $apellido . "\n");
fwrite($logFile, "Identificacion: " . $identificacion . "\n");
fwrite($logFile, "Área: " . $area . "\n");
fwrite($logFile, "Cargo: " . $cargo . "\n");
fwrite($logFile, "correo: " . $correo . "\n");
fwrite($logFile, "telefono: " . $telefono . "\n");
fwrite($logFile, "areaid: " . $idArea . "\n");
fwrite($logFile, "rolid: " . $rol . "\n");
fwrite($logFile, "cargoid: " . $idCargo . "\n");
fwrite($logFile, "empleadoid: " . $idEmpleado . "\n");

fclose($logFile);

$conn->close();
?>
