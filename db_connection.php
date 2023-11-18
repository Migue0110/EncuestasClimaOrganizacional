<?php
// db_connection.php
$servername = "localhost"; // Cambiar a la dirección de tu servidor de base de datos si es diferente
$username = "root";

//Nikcson
// $password = "123456789";
$password = "";

$dbname = "contestarencuestanick";

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
