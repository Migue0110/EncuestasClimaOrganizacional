<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "preguntas_db"; // Nombre de la base de datos creada en phpMyAdmin

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM preguntas";
$result = $conn->query($sql);

$preguntas = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $preguntas[] = $row;
    }
}

$conn->close();

echo json_encode($preguntas);
?>
