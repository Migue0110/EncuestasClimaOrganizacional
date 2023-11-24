<?php

// EliminarEmpleados.php

//Conexión base de datos ...

include("../db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idEmpleado = $_POST['empleados'];
    try {
    // Realiza la consulta para eliminar al empleado
    $sqlEliminar = "DELETE FROM empleado WHERE idEmpleado = '$idEmpleado'";
    
    if ($conn->query($sqlEliminar) === TRUE) {
        header('Location: ../../views/eliminarEmpleadoExitoso.php');
    } elseif($conn->query($sqlEliminar) === FALSE) {
        header('Location: ../../views/eliminarEmpleadoFallido.php');
    }else {
    header('Location: ../../views/eliminarEmpleadoFallido.php');
    }
    } catch(Exception $e) {
        header('Location: ../../views/eliminarEmpleadoFallido.php?error=' . urlencode($e->getMessage()));
    }
}
$conn->close();
?>
