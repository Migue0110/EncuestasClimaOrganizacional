<?php 

// db_connection.php
$servername = "localhost";
$username = "root";
//Nikcson
$password = "";
$dbname = "encuestasclima";

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Miguel Mora
// $password = "1006";
// Mario
//$password = "";
// Miguel Tellez
// $password = "";


// Verificar la conexión
if ($conn->connect_error) 
{
    die("Error de conexión: " . $conn->connect_error);
}
if($conn){
    echo'conectado exitosamente a la BD';
}else{
    echo'No se pudo conectar a la BD';
}


?>