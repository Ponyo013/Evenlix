<?php
require "connect.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

$user_id = $_SESSION['user_id']; 

// Updated SQL to fetch both email and username
$sql_user = "SELECT email, username FROM users WHERE user_id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($result_user->num_rows > 0) {
    $user = $result_user->fetch_assoc();
    $user_email = $user['email']; 
    $username = $user['username']; // Fetching username
} else {
    $user_email = '';
    $username = ''; // Set username to empty if not found
}

$stmt_user->close();

$sql = "SELECT * FROM events WHERE status = 'open'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $event_id = $row['id_events']; // Assuming this is the column name for the event ID
        $ticket_query = "SELECT SUM(tickets) AS registered_participants FROM registrations WHERE event_id = $event_id";
        $ticket_result = $conn->query($ticket_query);

        // Set default registered participants to 0 if there are no ticket sales
        $registered_participants = 0;
        if ($ticket_result) {
            $ticket_row = $ticket_result->fetch_assoc();
            $registered_participants = $ticket_row['registered_participants'] ?? 0;
        }

        echo "<div class='col-lg-5 mb-5 mx-4'>";
        echo "<div class='card overflow-hidden hover-img'>";
        echo "<div class='position-relative'>";

        echo "<img src='" . $row['photo'] . "' class='card-img-top' alt='" . $row['event_name'] . "' style='height: 350px; object-fit: cover;'>";
        echo "</div>";
        echo "<div class='card-body p-4'>";
        echo "<div class='d-flex align-items-center gap-4'>";

        echo "<div class='d-flex align-items-center gap-2'>";
        echo "<h2 class='fw-bold' style='font-size: 1.5rem; text-transform: uppercase;'>" . $row['event_name'] . "</h2>";
        echo "</div>";

        $dateTime = new DateTime($row['date_time']);
        $formattedDateTime = $dateTime->format('Y-m-d / H:i'); 
        
        echo "<div class='d-flex align-items-center fs-2 ms-auto'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='icon icon-tabler icons-tabler-outline icon-tabler-calendar-event'>";
        echo "<path stroke='none' d='M0 0h24v24H0z' fill='none'/>";
        echo "<path d='M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z' />";
        echo "<path d='M16 3l0 4' />";
        echo "<path d='M8 3l0 4' />";
        echo "<path d='M4 11l16 0' />";
        echo "<path d='M8 15h2v2h-2z' />";
        echo "</svg> " . $formattedDateTime . " WIB"; 
        echo "</div>";
        echo "</div>"; 

        
        echo "<p>";
        echo "<span class='short-desc' id='short-desc-" . $row['id_events'] . "'>";
        echo substr($row['description'], 0, 100); 
        echo (strlen($row['description']) > 100) ? "..." : "";
        echo "</span>";
        echo "<span class='full-desc' id='full-desc-" . $row['id_events'] . "' style='display: none;'>";
        echo $row['description'];
        echo "</span>";
        echo "<button class='btn text-primary p-0' onclick='toggleDescription(" . $row['id_events'] . ")' id='toggle-btn-" . $row['id_events'] . "'>";
        echo (strlen($row['description']) > 100) ? "Read More" : "";
        echo "</button>";
        echo "</p>"; 

        echo "<div class='d-flex align-items-center gap-4'>";
        echo "<div class='d-flex align-items-center gap-2'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='icon icon-tabler icons-tabler-outline icon-tabler-map-pin'>";
        echo "<path stroke='none' d='M0 0h24v24H0z' fill='none'/>";
        echo "<path d='M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0' />";
        echo "<path d='M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z' />";
        echo "</svg>" . $row['location'];
        echo "</div>";

        echo "<div class='d-flex align-items-center fs-2 ms-auto'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='icon icon-tabler icons-tabler-outline icon-tabler-user'>";
        echo "<path stroke='none' d='M0 0h24v24H0z' fill='none'/>";
        echo "<path d='M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0' />";
        echo "<path d='M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2' />";
        echo "</svg> " . $registered_participants . '/' . $row['max_capacity'];
        echo "</div>";
        echo "</div>";
        $status = ucfirst($row['status']);
        $bgColor = '';
        
        switch (strtolower($row['status'])) {
            case 'open':
                $bgColor = 'bg-success';
                break;
            case 'closed':
                $bgColor = 'bg-dark'; 
                break;
            case 'canceled':
                $bgColor = 'bg-danger'; 
                break;
            default:
                $bgColor = 'bg-secondary';
        }
        
        echo "<div class='d-flex justify-content-between align-items-center'>";
        echo "<div class='$bgColor mt-3 rounded-2 text-white text-center p-1 w-25' style='font-weight: bold; font-size: 1rem;'>";
        echo $status;
        echo "</div>";
        echo "<button class='btn btn-dark mt-3 ms-3 rounded-2 text-white text-center p-1 w-25' style='font-weight: bold; font-size: 1rem;' data-bs-toggle='modal' data-bs-target='#registerEventModal' onclick='setEventId(" . $row['id_events'] . ")'>Register</button>";
        echo "</div>";


        
        echo "</div>"; 
        echo "</div>"; 
        echo "</div>"; 
    }
} else {
    echo "<p class='text-center'>No events found.</p>";
}

$conn->close();
?>

<div class="modal fade" id="registerEventModal" tabindex="-1" aria-labelledby="registerEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="registerEventModalLabel">Event Registration Form</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registerEventForm" method="POST" action="open-register.php">
                    <input type="hidden" name="event_id" id="event_id">
                    <div class="form-group mb-3">
                        <label for="username">Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" required value="<?php echo htmlspecialchars($username); ?>" required>
                    </div>
                    <div class="form-group mb-3 ">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control bg-secondary" required value="<?php echo htmlspecialchars($user_email); ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tickets">Number of Tickets</label>
                        <input type="number" name="tickets" id="tickets" class="form-control" min="1" max="10" value="1" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function setEventId(eventId) {
        document.getElementById('event_id').value = eventId;
    }
</script>