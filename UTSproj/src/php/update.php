<?php
require "connect.php";  // Ensure connection

if (isset($_GET['id_events']) && is_numeric($_GET['id_events'])) {
    $id = $_GET['id_events'];

    $id = $conn->real_escape_string($id);

$event_name = $_POST['event-name'];
$date_time = $_POST['DnT'];
$location = $_POST['lokasi'];
$description = $_POST['deskripsi'];
$max_capacity = $_POST['slot'];
$target_file = null;
}

// Handle file upload for event image
if ($_FILES["Foto"]["name"]) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["Foto"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check file size and format
    if ($_FILES["Foto"]["size"] > 2000000 || !in_array($imageFileType, ['jpg', 'png', 'jpeg'])) {
        die("File upload error. Please upload a valid image (jpg, jpeg, png) under 2MB.");
    }
    
    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }
}

// Update the event in the database
if ($target_file) {
    // If new image uploaded
    $sql = "UPDATE events SET event_name='$event_name', date_time='$date_time', location='$location', description='$description', max_capacity='$max_capacity', photo='$target_file' WHERE id_events=$id_events";
} else {
    // No new image
    $sql = "UPDATE events SET event_name='$event_name', date_time='$date_time', location='$location', description='$description', max_capacity='$max_capacity' WHERE id_events=$id_events";
}

if ($conn->query($sql) === TRUE) {
    echo "Event updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
