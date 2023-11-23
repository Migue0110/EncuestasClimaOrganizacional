<?php

// ModificarEmpleados.php

//Conexión base de datos ...
include("../db_connection.php");

    $areaSeleccionada = $_GET['area'];
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
$conn->close();

