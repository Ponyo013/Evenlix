<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Evenlix - Add Event</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/logo.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Wrapper -->
    <div class="body-wrapper">

      <!-- Header -->
      <?php include 'header.php'; ?>

      <!-- Main Content -->
      <div class="container-fluid">

        <!-- Add Event Form Section -->
        <div class="row justify-content-center">
          <div class="container mt-5">
            <h2 class="text-center mb-4">Add New Event</h2>

            <!-- Add Event Form -->
            <form action="upload.php" method="POST" enctype="multipart/form-data" class="mt-4">

              <!-- Event Name -->
              <div class="form-group mb-3">
                <label for="event-name">Event Name</label>
                <input type="text" name="event-name" class="form-control" placeholder="Enter Event Name" required>
              </div>

              <!-- Date and Time -->
              <div class="form-group mb-3">
                <label for="DnT">Date and Time</label>
                <input type="datetime-local" name="DnT" class="form-control" required>
              </div>

              <!-- Max Capacity -->
              <div class="form-group mb-3">
                <label for="slot">Max Capacity</label>
                <input type="number" name="slot" class="form-control" placeholder="Enter Maximum Capacity" required>
              </div>

              <!-- Location -->
              <div class="form-group mb-3">
                <label for="lokasi">Location</label>
                <input type="text" name="lokasi" class="form-control" placeholder="Enter Location" required>
              </div>

              <!-- Description -->
              <div class="form-group mb-3">
                <label for="deskripsi">Description</label>
                <textarea name="deskripsi" class="form-control" placeholder="Enter Event Description" required></textarea>
              </div>

              <!-- Event Photo -->
              <div class="form-group mb-3">
                <label for="Foto">Event Photo</label>
                <input type="file" name="Foto" class="form-control" required>
              </div>

              <!-- Event Status -->
              <div class="form-group mb-3">
                <label for="status">Event Status</label>
                <select name="status" class="form-control" required>
                  <option value="open">Open</option>
                  <option value="closed">Closed</option>
                  <option value="canceled">Canceled</option>
                </select>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary">Add Event</button>

            </form>

          </div>
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
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
