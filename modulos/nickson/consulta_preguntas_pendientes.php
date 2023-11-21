<?php
include 'db_connection.php';

$employeeId = $_POST['employee_id'];

// SQL to get unanswered questions for the employee
$sql = "SELECT bp.pregunta FROM BancoPreguntas bp
        LEFT JOIN SeleccionPregunta sp ON bp.idPregunta = sp.bancopreguntas_idPregunta
        LEFT JOIN Encuesta e ON sp.idSeleccionPregunta = e.seleccionpregunta_idseleccionPregunta
        WHERE e.estado = 'Pendiente' AND e.empleado_idEmpleado = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employeeId);
$stmt->execute();
$result = $stmt->get_result();

$unansweredQuestions = [];
while ($row = $result->fetch_assoc()) {
    $unansweredQuestions[] = $row['pregunta'];
}

echo json_encode($unansweredQuestions);

$stmt->close();
$conn->close();
?>
