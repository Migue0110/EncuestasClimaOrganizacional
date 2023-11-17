<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "preguntas_db";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la nueva pregunta del formulario
    $nuevaPregunta = $_POST["nuevaPregunta"];

    // Insertar la nueva pregunta en la base de datos
    $sql = "INSERT INTO preguntas (pregunta, opcion1, opcion2, opcion3, opcion4) VALUES ('$nuevaPregunta', '1', '2', '3', '4')";
    if ($conn->query($sql) === TRUE) {
        echo "Pregunta agregada con éxito.";
    } else {
        echo "Error al agregar la pregunta: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>