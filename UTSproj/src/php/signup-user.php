<?php
require 'connect.php';
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if ($password === $cpassword) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = 'Email already exists!';
            header('Location: signup.php');
            exit;
        } else {
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashedPassword);

            if ($stmt->execute()) {
                $_SESSION['success'] = 'Signup successful! You can now login.';
                header('Location: signup.php');
                exit;
            } else {
                $_SESSION['error'] = 'Error: ' . $stmt->error;
                header('Location: signup.php');
                exit;
            }
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = 'Passwords do not match!';
        header('Location: signup.php');
        exit;
    }

    $conn->close();
}
?>
