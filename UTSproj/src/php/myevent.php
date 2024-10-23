<?php
require "connect.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT e.*, r.registration_id 
        FROM events e 
        JOIN registrations r ON e.id_events = r.event_id 
        WHERE r.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $event_id = $row['id_events']; // Assuming this is the column name for the event ID
        $ticket_query = "SELECT tickets AS user_tickets FROM registrations WHERE event_id = ? AND user_id = ?";
        $ticket_stmt = $conn->prepare($ticket_query);
        $ticket_stmt->bind_param("ii", $event_id, $user_id);
        $ticket_stmt->execute();
        $ticket_result = $ticket_stmt->get_result();

        // Set default user tickets to 0 if the user has not bought any tickets
        $user_tickets = 0;
        if ($ticket_result && $ticket_result->num_rows > 0) {
            $ticket_row = $ticket_result->fetch_assoc();
            $user_tickets = $ticket_row['user_tickets'] ?? 0;
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

        echo "<div class='d-flex align-items-center fs-3 ms-auto'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none'>";
        echo "<g fill='none' fill-rule='evenodd'>";
        echo "<path d='m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z'/>";
        echo "<path fill='currentColor' d='M5 6a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7.17a3.001 3.001 0 0 1 5.66 0H19a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1.17a3.001 3.001 0 0 1-5.66 0zM2 7a3 3 0 0 1 3-3h8a1 1 0 0 1 1 1a1 1 0 1 0 2 0a1 1 0 0 1 1-1h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2a1 1 0 0 1-1-1a1 1 0 1 0-2 0a1 1 0 0 1-1 1H5a3 3 0 0 1-3-3zm13 2a1 1 0 0 1 1 1v.5a1 1 0 1 1-2 0V10a1 1 0 0 1 1-1m1 4.5a1 1 0 1 0-2 0v.5a1 1 0 1 0 2 0z'/>";
        echo "</g>";
        echo "</svg>&nbsp;" . $user_tickets . 'X';
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

        echo "<div class='d-flex justify-content-between align-items-center mt-3'>";
        echo "<div class='$bgColor mt-3 rounded-2 text-white text-center p-1 w-25' style='font-weight: bold; font-size: 1rem;'>";
        echo $status;  
        echo "</div>"; 

        if (strtolower($row['status']) != 'canceled') {
            echo "<button class='btn btn-danger mt-3 rounded-2 text-white text-center p-1 w-25' style='font-weight: bold; font-size: 1rem;' onclick='setEventId(" . $row['registration_id'] . ")' data-bs-toggle='modal' data-bs-target='#cancelModal'>Cancel</button>";
        }
        
        echo "</div></div>";
        echo "</div>"; 
        echo "</div>"; 
    }
}
