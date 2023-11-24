<?php

// EliminarEmpleados.php

//Conexión base de datos ...

include("../db_connection.php");

$areaSeleccionada = $_POST['area'];
$sql = "SELECT idEmpleado, CONCAT(nombre, ' ', apellido, ' ', identificacion) AS nombre_completo FROM empleado WHERE area = '$areaSeleccionada'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["idEmpleado"] . "'>" . $row["nombre_completo"] . "</option>";
    }
} else {
    echo '<option value="" disabled selected hidden required>No hay empleados en el área de ' . $areaSeleccionada . '</option>';
}

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
