<?php
require 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'];

    $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?"); 
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        header("Location: userManage.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
