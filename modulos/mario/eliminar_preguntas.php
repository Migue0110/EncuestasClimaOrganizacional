<?php
// Conexión a la base de datos
include("../db_connection.php");
// Obtener las preguntas a eliminar
$preguntasAEliminar = json_decode($_POST['preguntas']);

// Eliminar las preguntas de la base de datos
foreach ($preguntasAEliminar as $preguntaID) {
    $sql = "DELETE FROM bancopreguntas WHERE idPregunta = $preguntaID";
    if ($conn->query($sql) !== TRUE) {
        echo "Error al eliminar pregunta: " . $conn->error;
        exit();
    }
}

$conn->close();
?>
