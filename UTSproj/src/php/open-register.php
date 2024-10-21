<?php
require "connect.php";
session_start();

if (isset($_POST['event_id'], $_POST['full_name'], $_POST['email'], $_POST['tickets'])) {
    $event_id = $_POST['event_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $tickets = (int) $_POST['tickets'];
    $user_id = $_SESSION['user_id'];

    $check_sql = "SELECT * FROM registrations WHERE user_id = ? AND event_id = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("ii", $user_id, $event_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        $_SESSION['message'] = [
            'type' => 'danger',
            'text' => 'You have already registered for this event.'
        ];
    } else {
        $sql = "INSERT INTO registrations (user_id, event_id, tickets) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $user_id, $event_id, $tickets);

        if ($stmt->execute()) {
            $_SESSION['message'] = [
                'type' => 'success',
                'text' => 'Registration successful!'
            ];
        } else {
            $_SESSION['message'] = [
                'type' => 'danger',
                'text' => 'Registration failed. Please try again.'
            ];
        }

        $stmt->close();
    }

    $stmt_check->close();
    header('Location: myevents.php'); 
    exit();
} else {
    $_SESSION['message'] = [
        'type' => 'danger',
        'text' => 'Invalid request.'
    ];
    header('Location: myevents.php');
    exit();
}

$conn->close();
?>
