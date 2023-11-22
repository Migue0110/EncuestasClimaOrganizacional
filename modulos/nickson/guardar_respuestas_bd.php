<?php
include("../db_connection.php");

echo(json_encode($_POST) . '<br><br>');
$tamano = count($_POST['respuesta']);
for( $i = 0; $i < $tamano; $i++ ) {
    insertar_pregunta($conn, $_POST['respuesta'][$i],$_POST['empleado_idEmpleado'] ,$_POST['bancopreguntas_idPregunta'][$i]);
}

function insertar_pregunta($conn, $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta){
    $sql = "INSERT INTO SeleccionPregunta (respuesta, empleado_idEmpleado, bancopreguntas_idPregunta) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta);
    $stmt->execute();
}

// foreach ($_POST as $key => $value) {
//     if (strpos($key, 'pregunta_') === 0) {
//         $questionId = str_replace('pregunta_', '', $key);
//         $response = $value;

//         // Insert the response into the database
//         $sql = "INSERT INTO SeleccionPregunta (respuesta, empleado_idEmpleado, bancopreguntas_idPregunta) VALUES (?, ?, ?)";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("iii", $response, $employeeId, $questionId);
//         $stmt->execute();

//         // Assuming you want to update the survey status here
//         $updateSql = "UPDATE Encuesta SET estado = 'En Proceso' WHERE empleado_idEmpleado = ?";
//         $updateStmt = $conn->prepare($updateSql);
//         $updateStmt->bind_param("i", $employeeId);
//         $updateStmt->execute();
//     }
// }

// header('Location: indexEmpleado.html?status=guardado');
// exit();
?>