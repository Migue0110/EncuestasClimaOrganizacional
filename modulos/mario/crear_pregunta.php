<?php
// Conexión a la base de datos
include("../db_connection.php");

// Verificar si se recibieron los datos por AJAX
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevaPregunta = $_POST['nueva_pregunta'];

    // Preparar la consulta SQL para insertar la nueva pregunta
    $sql = "INSERT INTO bancopreguntas (pregunta) VALUES ('$nuevaPregunta')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../../views/crear_pregunta_exitoso.php');
    } else {
        echo "Error al crear la pregunta: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>






