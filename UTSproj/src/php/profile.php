
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Evenlix - Profile</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/logo.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!--  Sidebar -->
        <?php include 'sidebar.php' ?>

        <!--  Main wrapper -->
        <div class="body-wrapper">

            <!--  Header -->
            <?php include 'header.php' ?>
            <div class="container-fluid">
                <!-- Profile Section -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Profile Information</h4>

                                <?php require 'pre-profile.php' ?>
                                
                                <form id="editProfileForm" method="POST" action="profile-update.php" enctype="multipart/form-data">
                                    <div class="mt-3">
                                        <img src="../assets/images/profile/<?php echo htmlspecialchars($user['foto'] ?? 'default.jpg'); ?>" 
                                            alt="Profile Picture" 
                                            id="profileImage" 
                                            class="mt-3 img-fluid rounded-circle mb-3"
                                            style="width: 90px; height: 90px; object-fit: cover; cursor: pointer;" 
                                            onclick="document.getElementById('fileInput').click();">
                                        <input type="file" id="fileInput" name="profileImage"  style="display: none;" accept="image/*" onchange="previewImage(event)">
                                        <img id="profileImagePreview" class="mt-3 img-fluid rounded-circle mb-3" style="display: none; width: 90px; height: 90px; object-fit: cover;">
                                    </div>

                                    <div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name" name="username" 
                                                value="<?php echo htmlspecialchars($user['username']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3">Update Profile</button>
                                    </div>
                                </form>
                                   
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </div>

                        <div class="col-lg-8 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Event Registration History</h4>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            Event 1 - <span class="badge bg-success">Registered</span> <span class="float-end">10th Oct 2024</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
        <script src="../assets/js/sidebarmenu.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/js/dashboard.js"></script>
        <script src="../assets/js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
<?php
    $stmt->close();
    $conn->close();
?>