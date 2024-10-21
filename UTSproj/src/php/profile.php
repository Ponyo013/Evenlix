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
                                    <?php if (isset($_SESSION['success_message'])): ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            <?php 
                                                echo $_SESSION['success_message'];
                                                unset($_SESSION['success_message']);
                                            ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($_SESSION['error_message'])): ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            <?php 
                                                echo $_SESSION['error_message'];
                                                unset($_SESSION['error_message']);
                                            ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($_SESSION['success_message'])): ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            <?php 
                                                echo $_SESSION['success_message'];
                                                unset($_SESSION['success_message']);
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                
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
                                   
                            
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                    Change Password
                                </button>
                            </div>
                        </div>


                        <?php
                            $userId = $_SESSION['user_id'];

                            require "connect.php";
                            $sql = "SELECT r.registration_id, r.registration_date, e.event_name 
                                    FROM registrations r 
                                    JOIN events e ON r.event_id = e.id_events 
                                    WHERE r.user_id = ? 
                                    ORDER BY r.registration_date DESC";

                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $userId); 
                            $stmt->execute();
                            $result = $stmt->get_result();

                            ?>


                            <div class="col-lg-8 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Event Registration History</h4>
                                        <ul class="list-group">
                                            <?php if ($result->num_rows > 0): ?>
                                                <?php while ($row = $result->fetch_assoc()): ?>
                                                    <li class="list-group-item">
                                                        <?php echo htmlspecialchars($row['event_name']); ?> - 
                                                        <span class="badge bg-success">Registered</span> 
                                                        <span class="float-end"><?php echo date('jS M Y', strtotime($row['registration_date'])); ?></span>
                                                    </li>
                                                <?php endwhile; ?>
                                            <?php else: ?>
                                                <li class="list-group-item">No registration history found.</li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        <!-- Change Password Modal -->
                        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="changePasswordForm" method="POST" action="profile-pass.php">
                                            <div class="mb-3">
                                                <label for="currentPassword" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="newPassword" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="newPassword" name="new_password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Password</button>
                                        </form>
                                    </div>
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