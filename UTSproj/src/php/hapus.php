<?php
$conn = new mysqli('localhost', 'root', '', 'event_registration');

// Check if 'id_events' is set and is a valid number
if (isset($_GET['id_events']) && is_numeric($_GET['id_events'])) {
    $id = $_GET['id_events'];

    // Sanitize input to prevent SQL injection
    $id = $conn->real_escape_string($id);

    // SQL query to delete the event
    $sql = "DELETE FROM events WHERE id_events = $id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Event deleted successfully";
        header("Location: index.php");
        exit(); // Make sure script stops after redirect
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // If 'id_events' is not set or invalid
    echo "Invalid event ID.";
}

// Close the database connection
$conn->close();
?>

