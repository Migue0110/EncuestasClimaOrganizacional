<?php
// Conexión a la base de datos
include("../db_connection.php");
// Consulta para obtener las preguntas
$sql = "SELECT idPregunta, pregunta FROM bancopreguntas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $preguntas = array();
    while($row = $result->fetch_assoc()) {
        $preguntas[] = $row;
    }
    echo json_encode($preguntas);
} else {
    echo "0 resultados";
}
$conn->close();
?>
