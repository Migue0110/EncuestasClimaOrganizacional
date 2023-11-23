<?php
// Conexión a la base de datos
include("../db_connection.php");
// Obtener las preguntas a guardar en la tabla 'seleccionpregunta'
$preguntasAAgregar = json_decode($_POST['preguntas']);

// Insertar las preguntas en la tabla 'seleccionpregunta'
$stmt = $conn->prepare("INSERT INTO seleccionpregunta (bancopreguntas_idPregunta) VALUES (?)");
$stmt->bind_param("i", $preguntaID);

foreach ($preguntasAAgregar as $preguntaID) {
    $stmt->execute();
}

$stmt->close();
$conn->close();
?>
