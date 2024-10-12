<?php
// Connect to MySQL database
$conn = new mysqli('localhost', 'root', '', 'event_registration');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data from POST request
$event_name = $_POST['event-name'];
$date_time = $_POST['DnT'];
$max_capacity = $_POST['slot'];
$location = $_POST['lokasi'];
$description = $_POST['deskripsi'];

// Define the directory to store uploaded photos
$target_dir = "assets/images/blog/";

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true); // Create the directory if it doesn't exist
}

$target_file = $target_dir . basename($_FILES["Foto"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Validate the uploaded image
$check = getimagesize($_FILES["Foto"]["tmp_name"]);
if ($check === false) {
    die("File is not an image.");
}

// Check file size (limit to 2MB)
if ($_FILES["Foto"]["size"] > 2000000) {
    die("Sorry, your file is too large.");
}

// Allow only certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    die("Sorry, only JPG, JPEG, & PNG files are allowed.");
}

// Move the uploaded file to the target directory
if (!move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {
    die("Sorry, there was an error uploading your file.");
}

// Insert the event data into the database
// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO events (event_name, date_time, max_capacity, location, description, photo) 
                        VALUES (?, ?, ?, ?, ?, ?)");

// Bind the parameters to the statement
$stmt->bind_param("ssisss", $event_name, $date_time, $max_capacity, $location, $description, $target_file);

// Execute the statement
if ($stmt->execute()) {
    echo "New event added successfully";
    header("Location: index.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>