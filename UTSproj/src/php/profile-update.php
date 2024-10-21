<?php
session_start();
require 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $userId = $_SESSION['user_id']; 

    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "../assets/images/profile/";
        $fileName = basename($_FILES['profileImage']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array(strtolower($fileType), $allowedTypes)) {
            if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFilePath)) {
                $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, foto = ? WHERE user_id = ?");
                $stmt->bind_param("sssi", $username, $email, $fileName, $userId);
            } else {
                echo "Failed to upload image. Please try again.";
                exit;
            }
        } else {
            echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
            exit;
        }
    } else {
        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE user_id = ?");
        $stmt->bind_param("ssi", $username, $email, $userId);
    }

    if ($stmt->execute()) {
        header("Location: profile.php"); 
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
