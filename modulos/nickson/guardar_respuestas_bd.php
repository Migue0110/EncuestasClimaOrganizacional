<?php
include("../db_connection.php");

if (isset($_POST['respuesta']) && is_array($_POST['respuesta'])) {
    // Si existe y es un array, entonces procedemos a contar y procesar las respuestas
    $tamano = count($_POST['respuesta']);
    for ($i = 0; $i < $tamano; $i++) {
        if (isset($_POST['bancopreguntas_idPregunta'][$i], $_POST['empleado_idEmpleado'])) {
            // Asegúrate de que la pregunta y el ID del empleado estén establecidos antes de intentar insertar
            insertar_pregunta($conn, $_POST['respuesta'][$i], $_POST['empleado_idEmpleado'], $_POST['bancopreguntas_idPregunta'][$i]);
        }
    }
} else {
    // Manejar el caso en que no se reciben respuestas
    echo "No se recibieron respuestas.";
}

function insertar_pregunta($conn, $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta) {
    $sql = "INSERT INTO SeleccionPregunta (respuesta, empleado_idEmpleado, bancopreguntas_idPregunta) VALUES (?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iii", $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta);
        if ($stmt->execute()) {
            echo "Pregunta insertada con éxito.";
        } else {
            echo "Error al insertar pregunta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la declaración: " . $conn->error;
    }
}

$conn->close();
