<link rel="stylesheet" href="../assets/css/styles.min.css" />
<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item d-block d-xl-none">
        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-align-justified">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 6l16 0" />
            <path d="M4 12l16 0" />
            <path d="M4 18l12 0" />
          </svg>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-icon-hover" href="javascript:void(0)">
          <iconify-icon icon="mdi-light:bell" class="fs-8"></iconify-icon>
          <div class="notification bg-primary rounded-circle"></div>
        </a>
      </li>
    </ul>

    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
        <li class="nav-item">
          <a href="#" target="_blank" class="btn btn-primary me-2">
            <span class="d-none d-md-block">Login</span>
            <span class="d-block d-md-none">Login</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" target="_blank" class="btn btn-success">
            <span class="d-none d-md-block">Register</span>
            <span class="d-block d-md-none">Register</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link nav-icon-hover" href="#" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
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


