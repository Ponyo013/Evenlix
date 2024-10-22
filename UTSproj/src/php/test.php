<?php
require "connect.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

$user_id = $_SESSION['user_id']; 

$sql_user = "SELECT email FROM users WHERE user_id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($result_user->num_rows > 0) {
    $user = $result_user->fetch_assoc();
    $user_email = $user['email']; 
} else {
    $user_email = '';
}

$stmt_user->close();

$sql = "SELECT * FROM events WHERE status = 'open'";
$result = $conn->query($sql);

echo "<div class='$bgColor mt-3 rounded-2 text-white text-center p-1 w-25' style='font-weight: bold; font-size: 1rem;'>";
        echo $status;  
        echo "</div>"; 

        echo "<button class='btn btn-dark mt-3 rounded-2 text-white text-center p-1 w-25' style='font-weight: bold; font-size: 1rem;' data-bs-toggle='modal' data-bs-target='#registerEventModal' onclick='setEventId(" . $row['id_events'] . ")'>Register</button>";
        echo "</div></div></div>";

        echo "</div>"; 

<div class="modal fade" id="registerEventModal" tabindex="-1" aria-labelledby="registerEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerEventModalLabel">Event Registration Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registerEventForm" method="POST" action="open-register.php">
                    <input type="hidden" name="event_id" id="event_id">
                    <div class="form-group mb-3">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required value="<?php echo htmlspecialchars($user_email); ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tickets">Number of Tickets</label>
                        <input type="number" name="tickets" id="tickets" class="form-control" min="1" max="5" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
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