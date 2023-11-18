<?php
// validate_login.php
include("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta a la base de datos para validar el inicio de sesión
    $query = "SELECT * FROM empleado WHERE usuario = '$username' AND contrasena = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "success";
    } else {
        echo "failure";
    }
} else {
    echo "Método de solicitud inválido";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
