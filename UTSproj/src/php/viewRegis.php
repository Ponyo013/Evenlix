<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Evenlix</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/logo.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
      <!--  Sidebar -->
      <?php include 'sidebar.php'?> 

      <!--  Main wrapper -->
      <div class="body-wrapper">

      <!--  Header -->
      <?php include 'header.php'?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div>
                <table id="viewRegistrant" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th class="text-start">Date</th>
                            <th>Status</th>
                            <th>Registrant</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        require "ViewRegis-process.php";
                      ?>
                    </tbody>
                </table>
              </div>
              
              <div class="d-flex justify-content-center mt-4" style='margin-bottom:160px;'>
                <button class="btn btn-success w-25" onclick="window.location.href='view-export.php';">Export List</button>
              </div>

            
            <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by Team Jokowi</p>
            </div>
        </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
  <script src="../assets/js/tableEvent.js"></script>
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