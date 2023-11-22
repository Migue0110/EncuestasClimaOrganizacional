<?php
include("../db_connection.php");

include 'db_connection.php';

// Asumiendo que 'respuesta' es un array con idPregunta como clave y la respuesta como valor
foreach ($_POST['respuesta'] as $idPregunta => $respuesta) {
    // Aquí, insertas cada respuesta en la base de datos
    $sql = "INSERT INTO SeleccionPregunta (respuesta, empleado_idEmpleado, bancopreguntas_idPregunta) VALUES (?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iii", $respuesta, $_POST['empleado_idEmpleado'], $idPregunta);
        $stmt->execute();
    }
}

$conn->close();
// Redireccionar a otra página después de guardar las respuestas
header('Location: alguna_pagina_de_confirmacion.php');
exit();


//echo(json_encode($_POST) . '<br><br>');
//$tamano = count($_POST['respuesta']);
//for( $i = 0; $i < $tamano; $i++ ) {
    //insertar_pregunta($conn, $_POST['respuesta'][$i],$_POST['empleado_idEmpleado'] ,$_POST['bancopreguntas_idPregunta'][$i]);
//}




//function insertar_pregunta($conn, $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta){
    //$sql = "INSERT INTO SeleccionPregunta (respuesta, empleado_idEmpleado, bancopreguntas_idPregunta) VALUES (?, ?, ?)";
//    $stmt = $conn->prepare($sql);
    //$stmt->bind_param("iii", $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta);
//    $stmt->execute();
//}

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