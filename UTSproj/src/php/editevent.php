<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Evenlix</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/logo.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script defer src="script.js"></script>
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?> 

    <div class="body-wrapper">
      <!-- Header -->
      <?php include 'header.php'; ?>

      <div class="container-fluid">
        <div class="row justify-content-center">
          <?php include 'edit.php'; ?>
        </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by Team Jokowi</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editEventForm" method="POST" action="edit-process.php" enctype="multipart/form-data">
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
              <img id="event-image-preview" style="max-width: 100px; margin-top: 10px;" />
            </div>
            <div class="form-group mb-3">
              <label for="status">Event Status</label>
              <select name="status" id="status" class="form-control" required>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
                <option value="canceled">Canceled</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Event</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Files -->
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="../assets/js/read.js"></script>
  <script src="../assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
