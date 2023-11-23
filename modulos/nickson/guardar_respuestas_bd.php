<?php
include("../db_connection.php");

// Activar reporte de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['respuesta']) && is_array($_POST['respuesta'])) {
    foreach ($_POST['respuesta'] as $idPregunta => $valorRespuesta) {
        if (isset($_POST['empleado_idEmpleado'])) {
            // Intenta insertar la pregunta y captura cualquier posible error
            $resultado = insertar_pregunta($conn, $valorRespuesta, $_POST['empleado_idEmpleado'], $idPregunta);
            if ($resultado) {
                echo "Pregunta con ID $idPregunta insertada con éxito.<br>";
            }
        } else {
            echo "ID de empleado no proporcionado.<br>";
        }
    }
} else {
    echo "No se recibieron respuestas o el formato no es correcto.<br>";
}

function insertar_pregunta($conn, $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta) {
    $sql = "INSERT INTO SeleccionPregunta (respuesta, empleado_idEmpleado, bancopreguntas_idPregunta) VALUES (?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iii", $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta);
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al insertar pregunta: " . $stmt->error . "<br>";
            return false;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la declaración: " . $conn->error . "<br>";
        return false;
    }
}

$conn->close();
?>
