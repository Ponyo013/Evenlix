    <?php
    require "connect.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_POST['id_events']) && isset($_POST['tickets'])) {
        $user_id = $_SESSION['user_id'];  
        $event_id = $_POST['id_events'];
        $tickets = $_POST['tickets'];

        $sql = "INSERT INTO registrations (user_id, id_events, tickets) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $user_id, $event_id, $tickets);

        if ($stmt->execute()) {
            header("Location: myevents.php");
            exit(); 
        } else {
            echo "<script>alert('There was an error registering for the event.');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please fill out all fields.');</script>";
    }

    $conn->close();
    ?>
