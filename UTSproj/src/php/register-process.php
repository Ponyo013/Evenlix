    <?php
    require "connect.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_POST['id_events']) && isset($_POST['tickets'])) {
        $user_id = $_SESSION['user_id'];  // Assuming user_id is stored in the session after login
        $event_id = $_POST['id_events'];
        $tickets = $_POST['tickets'];

        // Insert the registration into the database
        $sql = "INSERT INTO registrations (user_id, id_events, tickets) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $user_id, $event_id, $tickets);

        if ($stmt->execute()) {
            // Redirect to the 'My Events' page
            header("Location: myevents.php");
            exit(); // Prevent further execution after redirection
        } else {
            echo "<script>alert('There was an error registering for the event.');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please fill out all fields.');</script>";
    }

    $conn->close();
    ?>
