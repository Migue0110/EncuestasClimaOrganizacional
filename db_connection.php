<?php 
// db_connection.php
$servername = "localhost";
$username = "root";
//Nikcson
// $password = "123456789";
// Miguel Mora
$password = "1006";
$dbname = "proyectofinalarquitecturadbfinal";
// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) 
{
    die("Error de conexión: " . $conn->connect_error);
}
?>