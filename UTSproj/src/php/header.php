<?php
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$currentDate = date('l, F j, Y');
$userImage = isset($_SESSION['foto']) ? $_SESSION['foto'] : '../assets/images/profile/default.jpg';
?>

<link rel="stylesheet" href="../assets/css/styles.min.css" />
<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid mt-2">
      <div class="navbar-brand">
        <span class="fs-5">Welcome back, <?php echo htmlspecialchars($username); ?></span>
        <div class="small text-muted"><?php echo htmlspecialchars($currentDate); ?></div>
      </div>
      <div class="navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="#" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo htmlspecialchars($userImage); ?>" alt="" width="50" height="50" class="rounded-circle">
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
    </div>
  </nav>
</header>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script>
  
$(function () {
  // Admin Panel settings

  //****************************
  /* This is for the mini-sidebar if width is less then 1170*/
  //****************************
  var setsidebartype = function () {
    var width =
      window.innerWidth > 0 ? window.innerWidth : this.screen.width;
    if (width < 1199) {
      $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
      $("#main-wrapper").addClass("mini-sidebar");
    } else {
      $("#main-wrapper").attr("data-sidebartype", "full");
      $("#main-wrapper").removeClass("mini-sidebar");
    }
  };
  $(window).ready(setsidebartype);
  $(window).on("resize", setsidebartype);
  //****************************
  /* This is for sidebartoggler*/
  //****************************
  $(".sidebartoggler").on("click", function () {
    $("#main-wrapper").toggleClass("mini-sidebar");
    if ($("#main-wrapper").hasClass("mini-sidebar")) {
      $(".sidebartoggler").prop("checked", !0);
      $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
    } else {
      $(".sidebartoggler").prop("checked", !1);
      $("#main-wrapper").attr("data-sidebartype", "full");
    }
  });
  $(".sidebartoggler").on("click", function () {
    $("#main-wrapper").toggleClass("show-sidebar");
  });
})
</script>


