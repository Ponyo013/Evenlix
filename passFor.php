<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styleLogin.css">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="PassFor-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>

                    <?php
                        session_start(); 

                        if (isset($_SESSION['success'])) {
                            echo '<div class="alert alert-success text-center">' . $_SESSION['success'] . '</div>';
                            unset($_SESSION['success']); 
                        }

                        if (isset($_SESSION['error'])) {
                            echo '<div class="alert alert-danger text-center">' . $_SESSION['error'] . '</div>';
                            unset($_SESSION['error']); 
                        }
                    ?>

                    <div class="form-group mb-3">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control" type="password" name="password" placeholder="Enter New Password" required>
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Change Password">
                    </div>
                   
                </form>
                <div class="link login-link text-center">Back to <a href="login.php">Login</a></div>
            </div>
        </div>
    </div>
</body>
</html>