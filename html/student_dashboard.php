<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['user_id'])){
    header('location: index.php');
    exit;
}
// Database connection code
include 'config.php';


// Define how many results to display per page
$results_per_page = 12;
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}

$sql = "SELECT * FROM uploads";
$result = mysqli_query($conn, $sql);
$total = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$total_results = $total;
$total_pages = ceil($total_results / $results_per_page);


// Add pagination
$offsetValue = 12 * ($page - 1);
$limit = 12;
$sql = "SELECT * FROM uploads LIMIT $limit OFFSET $offsetValue";
$result = mysqli_query($conn, $sql);





// Close the database connection
// mysqli_close($conn);

?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
   <?php include_once "headlinks.php" ?>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
          <img src="../assets/img/aaua-repo.gif" alt="" srcset="" width="150px">
            

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="student_dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="pages-account-settings-account.php" class="menu-link">
                <i class="bx bx-user me-2"></i>
                <div data-i18n="Boxicons">My Profile</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="student_logout.php" class="menu-link">
                <i class="bx bx-power-off me-2"></i>
                <div data-i18n="Boxicons">Log Out</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->

              <!-- <form method="post">
                <div class="navbar-nav align-items-center">
                  <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input
                      type="text"
                      name="search_query"
                      class="form-control border-0 shadow-none"
                      placeholder="Search..."
                      aria-label="Search..."
                    />
                    <button type="submit" name="search" class="btn btn-primary">Search</button>
                  </div>
                </div>
              </form> -->

              <form method="POST" class="align-items-center" style="justify-content:space-between; width: 100%; display: flex; flex-direction: row; padding-left: 0; margin-bottom: 0; list-style: none;">
                <div class="nav-item d-flex align-items-center" style="width: 70%; flex-direction: row !important;">
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search Project topics and Authors"
                    aria-label="Search..."
                    name="search_query"
                  />
                </div>
                <button class="btn btn-" type="submit" name="search"><i class="bx bx-search fs-4 lh-0"></i></button>
              </form>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                

                <!-- User -->
                <!-- <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Student</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="student_logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li> -->
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <?php
                          // Get user's information from the database
                          $user_id = $_SESSION['user_id'];
                          $query = "SELECT * FROM student_db WHERE id = $user_id";
                          ?>
                          <h5 class="card-title text-primary">Congratulations  <?php echo $_SESSION['user_name']; ?>🎉</h5>
                          <p class="mb-4">
                          Our repository system dashboard is your one-stop-shop for all project materials, providing you with easy access to a comprehensive collection of learning resources across all departments.
                          </p>

                          <a href="javascript:;" class="btn btn-md btn-outline-primary">Newest Uploads</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Project Repositories</span></h4>

                <!-- <div class="col-lg-4 mb-4 order-0">
                  <div class="card">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-subtitle text-muted mb-3">Computer Science</div>
                        <p class="card-text" style="font-weight: bold;">
                          Design and Implementation of a Digital library system (using computer science department as a case study).
                        </p>
                        <a href="javascript:void(0)" class="card-link" style="padding-right: 2em;">Download</a>
                        <li class="list-inline-item" style="padding-right: 1em; ">Feb 20, 2023</li>
                        <li class="list-inline-item" style="font-size: small;">Augustine Smith (2018)</li>
                      </div>
                    </div>
                  </div>
                </div> -->
                <?php
                include 'function.php';

                  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
                    // Get search query
                    $search_query = $_POST['search_query'];
                    
                    // Query the database for matching project materials
                    $sql = "SELECT * FROM uploads WHERE pro_title LIKE '%$search_query%' OR authur LIKE '%$search_query%'";
                    $searchResult = mysqli_query($conn, $sql);

                    if ($searchResult && mysqli_num_rows($searchResult) > 0) {
                        // Display search searchResults
                        while ($row = mysqli_fetch_assoc($searchResult)) {
                            echo '<div class="col-lg-4 mb-4 order-0">';
                              echo '<div class="card">';
                                echo '<div class="card-body">';
                                echo '<div class="card-subtitle text-muted mb-3">' . $row['department'] . '</div>';
                                echo '<p class="card-text" style="color: #566a7f; font-size: 1.1em;">' . $row['pro_title'] . '</p>';
                                echo '<a href="' . $row['material'] . '" class="card-link" style="padding-right: 2em;">Download</a>';
                                // echo '<li class="list-inline-item" style="padding-right: 1em; ">' . $row['date_published'] . '</li>';
                                // echo '<li class="list-inline-item" style="padding-right: 1em; ">22-03-2023</li>';
                                echo '<li class="list-inline-item" style="font-size: small; color: #566a7f;">' . $row['authur'] . '</li>';
                                echo '</div>';
                              echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No results found.";
                    }
                  }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-lg-4 mb-4 order-0">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<div class="card-subtitle text-muted mb-3">' . $row['department'] . '</div>';
                    echo '<p class="card-text" style="color: #566a7f; font-size: 1.1em;">' . $row['pro_title'] . '</p>';
                    echo '<a href="' . $row['material'] . '" class="card-link" style="padding-right: 2em;">Download</a>';
                    // echo '<li class="list-inline-item" style="padding-right: 1em; ">' . $row['date_published'] . '</li>';
                    // echo '<li class="list-inline-item" style="padding-right: 1em; ">22-03-2023</li>';
                    echo '<li class="list-inline-item" style="font-size: small; color: #566a7f;">' . $row['authur'] . '</li>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
                
                <nav aria-label="Page navigation">
                  <ul class="pagination"  >
                    <?php if ($page > 1): ?>
                      <li class="page-item prev">
                        <a class="page-link" href="?page=<?php echo ($page - 1); ?>">
                          <i class="tf-icon bx bx-chevrons-left"></i>
                        </a>
                      </li>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                      <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                      </li>
                    <?php endfor; ?>
                    
                    <?php if ($page < $total_pages): ?>
                      <li class="page-item next">
                        <a class="page-link" href="?page=<?php echo ($page + 1); ?>">
                          <i class="tf-icon bx bx-chevrons-right"></i>
                        </a>
                      </li>
                    <?php endif; ?>
                  </ul>
                </nav>
                            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

                  <!--  -->



      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
