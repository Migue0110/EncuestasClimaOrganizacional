<?php

// db_connection.php
$servername = "localhost";
$username = "root";
//Nikcson
// $password = "";
$dbname = "encuestasclima";
// Miguel Mora
$password = "1006";
// Crear conexión a la base de datos
// Mario
//$password = "";
// Miguel Tellez
// $password = "";

$conn = new mysqli($servername, $username, $password, $dbname);

<<<<<<< HEAD
//Verificar la conexión
/*if ($conn->connect_error) 
=======
// Verificar la conexión
if ($conn->connect_error) 
>>>>>>> 3ad2e93b5dcc9c8a70bc0f6445da015783746097
{
    die("Error de conexión: " . $conn->connect_error);
}
if($conn){
    echo'conectado exitosamente a la BD';
}else{
    echo'No se pudo conectar a la BD';
<<<<<<< HEAD
}*/
=======
}


>>>>>>> 3ad2e93b5dcc9c8a70bc0f6445da015783746097
?>