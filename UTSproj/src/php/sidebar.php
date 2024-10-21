<?php 
  session_start();
?>
<!-- Sidebar Start -->
<aside class="left-sidebar">
  <!-- Sidebar scroll -->
  <div>
    <div class="d-flex align-items-center">
      <a href="./index.php">
        <!-- <img class="logo" src="../assets/images/logos/logo.png" alt="Logo" style="width: 250px; height: auto;" /> -->
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>

    <!-- Sidebar navigation -->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">

        <!-- Home Section -->
        <li class="nav-small-cap">
          <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./index.php" aria-expanded="false">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-home">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
              </svg>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <!-- Admin Section -->
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
          
          <li class="nav-small-cap">
            <span class="hide-menu">Admin</span>
          </li>

          <!-- Add Event -->
          <li class="sidebar-item">
            <a class="sidebar-link" href="./addevent.php" aria-expanded="false">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icon-tabler-circle-plus">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M4.929 4.929a10 10 0 1 1 14.141 14.141a10 10 0 0 1 -14.14 -14.14zm8.071 4.071a1 1 0 1 0 -2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0 -2h-2v-2z" />
                </svg>
              </span>
              <span class="hide-menu">Add Event</span>
            </a>
          </li>

          <!-- Edit Event -->
          <li class="sidebar-item">
            <a class="sidebar-link" href="./editevent.php" aria-expanded="false">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-edit">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                  <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                  <path d="M16 5l3 3" />
                </svg>
              </span>
              <span class="hide-menu">Edit Event</span>
            </a>
          </li>

          <!-- Delete Event -->
          <li class="sidebar-item">
            <a class="sidebar-link" href="./deleteevent.php" aria-expanded="false">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-circle-minus">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                  <path d="M9 12l6 0" />
                </svg>
              </span>
              <span class="hide-menu">Delete Event</span>
            </a>
          </li>
          
          <li class="sidebar-item">
            <a class="sidebar-link ps-2" href="./viewRegis.php" aria-expanded="false">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M6 5h2.5a3 3 0 0 1 3-3a3 3 0 0 1 3 3H17a3 3 0 0 1 3 3v11 a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V8a3 3 0 0 1 3-3m0 1a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-1v3H7V6zm2 2h7V6H8zm3.5-5a2 2 0 0 0-2 2h4a2 2 0 0 0-2-2M6 11h11v1H6zm0 3h11v1H6zm0 3h9v1H6z"/>
                </svg>
              </span>
              <span class="hide-menu">View Registrants</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link ps-2" href="./UserManage.php" aria-expanded="false">
              <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                viewBox="0 0 640 512"><path fill="currentColor" d="M610.5 373.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5c-6.7-21.6-18.2-41.2-33.2-57.4c-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1c-22.3-5-45-4.8-66.2 0c-3.3.7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4c-15 16.2-26.5 35.8-33.2 57.4c-1 3.3.4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5c6.7 21.6 18.2 41.1 33.2 57.4c2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1c22.3 5 45 4.8 66.2 0c3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4c15-16.2 26.5-35.8 33.2-57.4c1-3.3-.4-6.8-3.3-8.5zM496 400.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5s48.5 21.8 48.5 48.5s-21.7 48.5-48.5 48.5M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128m201.2 226.5c-2.3-1.2-4.6-2.6-6.8-3.9l-7.9 4.6c-6 3.4-12.8 5.3-19.6 5.3c-10.9 0-21.4-4.6-28.9-12.6c-18.3-19.8-32.3-43.9-40.2-69.6c-5.5-17.7 1.9-36.4 17.9-45.7l7.9-4.6q-.15-3.9 0-7.8l-7.9-4.6c-16-9.2-23.4-28-17.9-45.7c.9-2.9 2.2-5.8 3.2-8.7c-3.8-.3-7.5-1.2-11.4-1.2h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c10.1 0 19.5-3.2 27.2-8.5c-1.2-3.8-2-7.7-2-11.8z"/>
              </svg>
              </span>
              <span class="hide-menu">Manage User</span>
            </a>
          </li>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
          <li class="nav-small-cap">
            <span class="hide-menu">User</span>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="./viewevents.php" aria-expanded="false">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 21q-.825 0-1.412-.587T14 19v-4q0-.825.588-1.412T16 13h4q.825 0 1.413.588T22 15v4q0 .825-.587 1.413T20 21zm0-2h4v-4h-4zM2 18v-2h9v2zm14-7q-.825 0-1.412-.587T14 9V5q0-.825.588-1.412T16 3h4q.825 0 1.413.588T22 5v4q0 .825-.587 1.413T20 11zm0-2h4V5h-4zM2 8V6h9v2zm16-1"/></svg>
              </span>
              <span class="hide-menu">Available Events</span>
            </a>
          </li>
          
          <li class="sidebar-item">
            <a class="sidebar-link" href="./myevents.php" aria-expanded="false">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-minus">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                  <path d="M9 12l6 0" />
                </svg>
              </span>
              <span class="hide-menu">My Events</span>
            </a>
          </li>
        <?php endif; ?>

      </ul>
    </nav>
  </div>
</aside>
