<?php
require "connect.php";

$sql = "SELECT * FROM events ";
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
        
        echo "<div class='d-flex justify-content-center align-items-center'>";
        echo "<button class='btn btn-warning btn-sm rounded-3' data-bs-toggle='modal' data-bs-target='#editEventModal' data-id='" . $row['id_events'] . "'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='icon icon-tabler icon-tabler-file-pencil'>";
        echo "<path stroke='none' d='M0 0h24v24H0z' fill='none'/>";
        echo "<path d='M14 3v4a1 1 0 0 0 1 1h4' />";
        echo "<path d='M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z' />";
        echo "<path d='M10 18l5 -5a1.414 1.414 0 0 0 -2 -2l-5 5v2h2z' />";
        echo "</svg>";
        echo "</button>";
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

<!-- Bootstrap Modal for Editing Event -->
<div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editEventForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="event_id" id="event_id">
          <div class="form-group mb-3">
            <label for="event-name">Event Name</label>
            <input type="text" name="event-name" id="event-name" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label for="DnT">Date and Time</label>
            <input type="datetime-local" name="DnT" id="DnT" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label for="slot">Max Capacity</label>
            <input type="number" name="slot" id="slot" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label for="lokasi">Location</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label for="deskripsi">Description</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
          </div>
          <div class="form-group mb-3">
            <label for="Foto">Event Image</label>
            <input type="file" name="Foto" id="Foto" class="form-control">
            <img id="event-image-preview" style="max-width:100px; margin-top:10px;" />
          </div>
          <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
      </div>
    </div>
  </div>
</div>

