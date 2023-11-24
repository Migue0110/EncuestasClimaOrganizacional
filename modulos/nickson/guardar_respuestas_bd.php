<?php
include("../db_connection.php");

$tamano = count($_POST['bancopreguntas_idPregunta']);
if(isset($_POST['idSeleccionPregunta']) ) {
    for( $i = 0; $i < $tamano; $i++ ) {
        if( isset($_POST['respuesta'][$i]) ) {
            actualizar_pregunta($conn, $_POST['idSeleccionPregunta'][$i], $_POST['respuesta'][$i],$_POST['empleado_idEmpleado'] ,$_POST['bancopreguntas_idPregunta'][$i]);
        }else{
            actualizar_pregunta($conn, $_POST['idSeleccionPregunta'][$i], null,$_POST['empleado_idEmpleado'],$_POST['bancopreguntas_idPregunta'][$i]);
        }
    }
}else{
    for( $i = 0; $i < $tamano; $i++ ) {
        if( isset($_POST['respuesta'][$i]) ) {
            insertar_pregunta($conn, $_POST['respuesta'][$i],$_POST['empleado_idEmpleado'] ,$_POST['bancopreguntas_idPregunta'][$i]);
        }else{
            insertar_pregunta($conn, null,$_POST['empleado_idEmpleado'],$_POST['bancopreguntas_idPregunta'][$i]);
        }
    }
}

header('Location: ../../views/indexEmpleado.php?empleado=' . $_POST['empleado_idEmpleado']);
exit();

function insertar_pregunta($conn, $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta){
    $sql = "INSERT INTO SeleccionPregunta (respuesta, empleado_idEmpleado, bancopreguntas_idPregunta) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta);
    $stmt->execute();
}

function actualizar_pregunta($conn, $idSeleccionPregunta, $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta){
    $sql = "UPDATE SeleccionPregunta SET respuesta = ?, empleado_idEmpleado = ?, bancopreguntas_idPregunta = ? WHERE idSeleccionPregunta = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $respuesta, $empleado_idEmpleado, $bancopreguntas_idPregunta, $idSeleccionPregunta);
    $stmt->execute();
}
