<?php
include 'db_connection.php';

include 'db_connection.php';

$surveyId = $_POST['survey_id'];
$newStatus = $_POST['new_status'];

$sql = "UPDATE Encuesta SET estado = ? WHERE idPregunta = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $newStatus, $surveyId);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Encuesta actualizada con éxito.";
} else {
    echo "No se actualizó ninguna encuesta.";
}

$stmt->close();
$conn->close();


// Assuming you pass the survey ID and the new status as POST parameters
//$surveyId = $_POST['survey_id'];
//$newStatus = $_POST['new_status'];

// SQL to update the survey's status
//$sql = "UPDATE Encuesta SET estado = ? WHERE idPregunta = ?";

//$stmt = $conn->prepare($sql);
//$stmt->bind_param("si", $newStatus, $surveyId);
//$stmt->execute();

//if ($stmt->affected_rows > 0) {
  //  echo "Survey updated successfully.";
//} else {
    //echo "No survey was updated.";
//}

//$stmt->close();
//$conn->close();
?>
