<?php
// Connect to the MySQL database
$conn = new mysqli('localhost', 'root', '', 'event_registration');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all events from the database
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Check if there are any events to display
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Start of event card
        echo "<div class='col-lg-5 mb-5 mx-4'>";
        echo "<div class='card overflow-hidden hover-img'>";
        echo "<div class='position-relative'>";

        // Display event image
        echo "<img src='" . $row['photo'] . "' class='card-img-top' alt='" . $row['event_name'] . "' style='height: 350px; object-fit: cover;'>";

        echo "</div>";
        echo "<div class='card-body p-4'>";

        // Display event name
        echo "<div class='d-flex align-items-center gap-4'>";
        echo "<div class='d-flex align-items-center gap-2'>";
        echo "<h2 class='fw-bold' style='font-size: 1.5rem; text-transform: uppercase;'>" . $row['event_name'] . "</h2>";
        echo "</div>";

        $dateTime = new DateTime($row['date_time']);
        $formattedDateTime = $dateTime->format('Y-m-d / H:i'); 
        
        // Display event date
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

        // Display event description 
        $description = $row['description'];
        $word_limit = 30;
        $description_words = explode(" ", $description);

        if (count($description_words) > $word_limit) {
            $short_description = implode(" ", array_slice($description_words, 0, $word_limit)) . "...";
            $full_description = $description;
        } else {
            $short_description = $description;
            $full_description = '';
        }

        echo "<p class='d-block my-4 fs-5 text-dark fw-semibold' id='short-description-" . $row['id_events'] . "'>";
        echo $short_description;
        if ($full_description) {
            echo "<br>";
            echo "<a href='javascript:void(0)' class='read-more-btn' id='read-more-btn-" . $row['id_events'] . "' onclick='toggleText(" . $row['id_events'] . ")'>Read more</a>";
        }
        echo "</p>";

        // Display event location and capacity
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
        echo "</svg>" . $row['max_capacity'];
        echo "</div>";
        //Delete buttons
        echo "<div class='d-flex justify-content-center align-items-center'>";
        echo "<a href='hapus.php?id=" . $row['id_events'] . "' class='btn btn-danger btn-sm rounded-3' onclick='return confirm(\"Are you sure?\");'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='icon icon-tabler icon-tabler-trash'>";
        echo "<path stroke='none' d='M0 0h24v24H0z' fill='none'/>";
        echo "<path d='M4 7l16 0' />";
        echo "<path d='M10 11l0 6' />";
        echo "<path d='M14 11l0 6' />";
        echo "<path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12' />";
        echo "<path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3' />";
        echo "</svg></a>";
        echo "</div>";
        echo "</div>"; 
        echo "</div>"; 
        echo "</div>"; 

        echo "</div>"; 
        
    }
} else {
    echo "<p class='text-center'>No events found.</p>";
}

// Close the database connection
$conn->close();
?>

<script>
function toggleText(id_events) {
    var shortDescription = document.getElementById('short-description-' + id_events);
    var fullDescription = document.getElementById('full-description-' + id_events);
    
    if (fullDescription.style.display === 'none') {
        fullDescription.style.display = 'block';
        shortDescription.style.display = 'none';
    } else {
        fullDescription.style.display = 'none';
        shortDescription.style.display = 'block';
    }
}
</script>
