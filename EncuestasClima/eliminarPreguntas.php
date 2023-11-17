<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "preguntas_db"; // Nombre de la base de datos

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener las preguntas a eliminar desde la solicitud POST
$preguntasAEliminar = $_POST['preguntasAEliminar'];

// Eliminar las preguntas de la base de datos
foreach ($preguntasAEliminar as $idPregunta) {
    $sql = "DELETE FROM preguntas WHERE id = $idPregunta";

    if ($conn->query($sql) !== TRUE) {
        echo "Error al eliminar pregunta: " . $conn->error;
    }
}

$conn->close();
?>
