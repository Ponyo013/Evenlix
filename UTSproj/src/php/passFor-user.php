<?php
require 'connect.php'; 
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $_SESSION['error'] = 'Passwords do not match!';
        header('Location: PassFor.php');
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 

        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashedPassword, $email);

        if ($stmt->execute()) {
            $_SESSION['success'] = 'Password successfully updated! You can now login.';
            header('Location: PassFor.php'); 
            exit;
        } else {
            $_SESSION['error'] = 'Error updating password: ' . $stmt->error;
            header('Location: PassFor.php'); 
            exit;
        }
    } else {
        $_SESSION['error'] = 'Email does not exist!';
        header('Location: PassFor.php'); 
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>
