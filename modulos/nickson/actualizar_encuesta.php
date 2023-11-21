<?php
include 'db_connection.php';

// Assuming you pass the survey ID and the new status as POST parameters
$surveyId = $_POST['survey_id'];
$newStatus = $_POST['new_status'];

// SQL to update the survey's status
$sql = "UPDATE Encuesta SET estado = ? WHERE idPregunta = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $newStatus, $surveyId);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Survey updated successfully.";
} else {
    echo "No survey was updated.";
}

$stmt->close();
$conn->close();
?>
