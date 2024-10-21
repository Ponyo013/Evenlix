<?php
session_start();
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword !== $confirmPassword) {
        $_SESSION['error_message'] = "New password and confirm password do not match.";
        header("Location: profile.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($currentPassword, $hashedPassword)) {
        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
        $stmt->bind_param("si", $newHashedPassword, $userId);
        
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Password updated successfully!";
        } else {
            $_SESSION['error_message'] = "Failed to update password. Please try again.";
        }
        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Current password is incorrect.";
    }

    $conn->close();
    header("Location: profile.php");
    exit;
}
?>
