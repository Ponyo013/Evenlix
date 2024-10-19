<?php
require "connect.php";

$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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

        // Description handling
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

        // Combine the description and the "Read more" button in a single paragraph
        echo "<p class='my-4 fs-5 text-dark fw-semibold' id='description-" . $row['id_events'] . "'>";
        echo "<span id='short-description-" . $row['id_events'] . "'>" . $short_description . "</span>";
        
        if ($full_description) {
            echo "<span class='d-none' id='full-description-" . $row['id_events'] . "'>" . $full_description . "</span>";
        }

        // Add "Read more/Read less" button next to the description
        if ($full_description) {
            echo "<a href='javascript:void(0)' class='read-more-btn' id='read-more-btn-" . $row['id_events'] . "' onclick='toggleText(" . $row['id_events'] . ")'> read more</a>";
        }

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
        echo "</svg>" . $row['max_capacity'];
        echo "</div>";
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

<script>
function toggleText(id_events) {
    var shortDescription = document.getElementById('short-description-' + id_events);
    var fullDescription = document.getElementById('full-description-' + id_events);
    var readMoreBtn = document.getElementById('read-more-btn-' + id_events);

    if (fullDescription.classList.contains('d-none')) {
        // Show full description and change button text to 'Read less'
        fullDescription.classList.remove('d-none');
        shortDescription.classList.add('d-none');
        readMoreBtn.innerText = ' read less';
    } else {
        // Show short description and change button text to 'Read more'
        fullDescription.classList.add('d-none');
        shortDescription.classList.remove('d-none');
        readMoreBtn.innerText = ' read more';
    }
}
</script>
