<?php
    include 'connect.php'; 

    $user_id = $_SESSION['user_id']; 

    $sql = "SELECT username, email, foto FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
?>