<?php

// EliminarEmpleados.php

//Conexión base de datos ...
include("../db_connection.php");

$areaSeleccionada = $_POST['area']; // Cambiado de $_GET a $_POST
$sql = "SELECT idEmpleado, CONCAT(nombre, ' ', apellido, ' ', identificacion) AS nombre_completo FROM empleado WHERE area = '$areaSeleccionada'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Devolver las opciones para el segundo select
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["idEmpleado"] . "'>" . $row["nombre_completo"] . "</option>";
    }
} else {
    echo '<option value="" disabled selected hidden required>No hay empleados en el área de '.$areaSeleccionada.'</option>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idEmpleado = $_POST["idEmpleado"];

    $sql = "DELETE FROM empleado WHERE idEmpleado = '$idEmpleado'";
    if ($conn->query($sql) === TRUE) {
        $response = array("status" => "success", "message" => "Empleado eliminado con éxito");
    } else {
        // Error en la eliminación
        $response = array("status" => "error", "message" => "Error al eliminar empleado: " . $conn->error);
    }

    echo json_encode($response);
}
$conn->close();
?>