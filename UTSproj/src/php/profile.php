<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Evenlix - Profile</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/logo.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <style>
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-image-input {
            display: none;
        }

        .profile-image-label {
            cursor: pointer;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
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

                                <!-- Profile Image Section -->
                                <div class="text-center mb-4">
                                    <img src="../assets/images/default-profile.png" alt="Profile Image" class="profile-image" id="profileImagePreview">
                                    <label for="profileImage" class="profile-image-label btn btn-outline-primary">Change Profile Image</label>
                                    <input type="file" class="profile-image-input" id="profileImage" accept="image/*">
                                </div>

                                <!-- Display Mode -->
                                <div id="profileDisplay">
                                    <p><strong>Name: </strong><span id="displayName">John Doe</span></p>
                                    <p><strong>Email: </strong><span id="displayEmail">john@example.com</span></p>
                                    <button class="btn btn-primary" id="editProfileBtn">Edit Profile</button>
                                </div>

                                <!-- Edit Mode (Initially Hidden) -->
                                <form id="editProfileForm" style="display:none;">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="John Doe" value="John Doe">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="john@example.com" value="john@example.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="********">
                                    </div>
                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                    <button type="button" class="btn btn-secondary" id="cancelEditBtn">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Event Registration History</h4>
                                <ul class="list-group">
                                    <!-- Example of registered events -->
                                    <li class="list-group-item">
                                        Event 1 - <span class="badge bg-success">Registered</span> <span class="float-end">10th Oct 2024</span>
                                    </li>
                                    <li class="list-group-item">
                                        Event 2 - <span class="badge bg-success">Registered</span> <span class="float-end">15th Oct 2024</span>
                                    </li>
                                    <li class="list-group-item">
                                        Event 3 - <span class="badge bg-success">Registered</span> <span class="float-end">20th Oct 2024</span>
                                    </li>
                                </ul>
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
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

        <!-- Script to toggle between display and edit modes -->
        <script>
            document.getElementById('editProfileBtn').addEventListener('click', function() {
                document.getElementById('profileDisplay').style.display = 'none';
                document.getElementById('editProfileForm').style.display = 'block';
            });

            document.getElementById('cancelEditBtn').addEventListener('click', function() {
                document.getElementById('profileDisplay').style.display = 'block';
                document.getElementById('editProfileForm').style.display = 'none';
            });

            document.getElementById('profileImage').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('profileImagePreview').src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>
</body>

</html>