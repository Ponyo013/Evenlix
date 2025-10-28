<?php
require "connect.php";
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null; 
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null; 
$username = 'Guest';
$userImage = '../assets/images/profile/default.jpg'; 
$currentDate = date('l, F j, Y');

if ($userId) {
    $stmt = $conn->prepare("SELECT username, foto FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($username, $foto);
    
    if ($stmt->fetch()) {
        if (!empty($foto)) {
            $userImage = "../assets/images/profile/" . $foto . '?' . time();
        }
    }
    
    $stmt->close();
}
?>

<link rel="stylesheet" href="../assets/css/styles.min.css" />
<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <li class="nav-item d-block d-xl-none">
    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
        <path fill="currentColor" d="M4 6a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H5a1 1 0 0 1-1-1m0 6a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H5a1 1 0 0 1-1-1m1 5a1 1 0 1 0 0 2h14a1 1 0 1 0 0-2z"/>
    </svg>
    </a>
    </li>
    <div class="container-fluid mt-2">
      <div class="navbar-brand">
        <span class="fs-5">Welcome back, <?php echo htmlspecialchars($username); ?></span>
        <div class="small text-muted"><?php echo htmlspecialchars($currentDate); ?></div>
      </div>
      <?php if ($role === 'admin' || $role === 'user'): ?>
      <div class="navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="#" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo htmlspecialchars($userImage); ?>" alt="" width="50" height="50" class="rounded-circle" style="object-fit: cover;">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <div class="message-body">
                <a href="profile.php" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-user fs-6"></i>
                  <p class="mb-0 fs-3">My Profile</p>
                </a>
                <a href="login.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <?php else: ?><!-- If the user is not admin or user, display the Login button -->
        <li class="nav-item d-flex align-items-center">
    <a href="login.php" class="btn btn-primary me-2">Login</a>
    <div class="navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="login.php">
                    <img src="<?php echo htmlspecialchars($userImage); ?>" alt="" width="50" height="50" class="rounded-circle" style="object-fit: cover;">
                </a>
            </li>
        </ul>
    </div>
</li>
        


    <?php endif; ?>
    </div>
  </nav>
</header>


