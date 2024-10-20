<?php
require "connect.php";

if (isset($_GET['id_events']) && is_numeric($_GET['id_events'])) {
    $id = $_GET['id_events'];

    $id = $conn->real_escape_string($id);

    $sql = "DELETE FROM events WHERE id_events = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: deleteEvent.php");
        exit(); 
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid event ID.";
}

$conn->close();
?>

