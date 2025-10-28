<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Evenlix</title>
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

        <!-- Event -->
        <div class="row justify-content-center">
          <?php include 'delete.php'; ?>
          <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by Team Jokowi</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h1 class="modal-title text-white fs-5" id="deleteModalLabel">Delete Event</h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this event?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark text-white" data-bs-dismiss="modal">Close</button>
            <form id="deleteForm" action="delete-process.php" method="POST">
                <input type="hidden" id="deleteEventId" name="id_events"> 
                <button type="submit" class="btn btn-danger">Delete</button> 
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
  <script src="../assets/js/read.js"></script>
  <script src="../assets/js/script.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
