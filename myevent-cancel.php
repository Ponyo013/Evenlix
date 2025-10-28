<?php
session_start();
include 'connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registrationId = $_POST['id_events'];

    $stmt = $conn->prepare("DELETE FROM registrations WHERE registration_id = ?");
    $stmt->bind_param("i", $registrationId);

    if ($stmt->execute()) {
        $_SESSION['message-cancel'] = [
            'type' => 'success',
            'text' => 'Cancel Event successful!'
        ];
    } else {
        $_SESSION['message-cancel'] = [
            'type' => 'danger',
            'text' => 'Cancel Event failed. Please try again.'
        ];
    }

    $stmt->close();
    $conn->close();

   
    header("Location: myevents.php"); 
    exit;
}
?>
