
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
              </a>""
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
           
              <form method="POST" class="align-items-center" style="justify-content:space-between; width: 100%; display: flex; flex-direction: row; padding-left: 0; margin-bottom: 0; list-style: none;">
                <div class="nav-item d-flex align-items-center" style="width: 70%; flex-direction: row !important;">
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search Project topics and Authors"
                    aria-label="Search..."
                  />
                </div>
                <button class="btn btn-" type="submit"><i class="bx bx-search fs-4 lh-0"></i></button>
              </form>
              <!-- /Search -->

              
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">15 Search Results</span></h4>
                <?php
                    // Define the perform_search function
                    function perform_search($search_query) {
                        // You will need to replace this with your own search logic
                        $search_results = array(
                            array(
                                'title' => 'Design and Implementation of a Digital library system',
                                'description' => 'A digital library system that uses the computer science department as a case study.',
                                'date' => 'Feb 20, 2023',
                                'author' => 'Augustine Smith (2018)',
                                'download_link' => '#'
                            ),
                            array(
                                'title' => 'Object Oriented Programming in PHP',
                                'description' => 'A comprehensive guide to object-oriented programming in PHP.',
                                'date' => 'Jan 15, 2023',
                                'author' => 'Jane Doe (2020)',
                                'download_link' => '#'
                            ),
                            array(
                                'title' => 'Data Mining Techniques for Business Analytics',
                                'description' => 'A book that discusses data mining techniques for business analytics.',
                                'date' => 'Dec 1, 2022',
                                'author' => 'John Smith (2016)',
                                'download_link' => '#'
                            )
                        );
                        
                        // Filter the search results based on the search query
                        $filtered_results = array_filter($search_results, function($result) use ($search_query) {
                            return strpos(strtolower($result['title']), strtolower($search_query)) !== false || 
                                   strpos(strtolower($result['author']), strtolower($search_query)) !== false;
                        });
                        
                        // Return the filtered search results
                        return $filtered_results;
                    }
                  
                    // Check if the search form has been submitted
                    if (isset($_POST['search_query'])) {
                        // Get the search query from the form input
                        $search_query = $_POST['search_query'];
                        
                        // Perform the search and retrieve the results
                        $search_results = perform_search($search_query);
                        
                        // Generate the HTML code for each search result
                        foreach ($search_results as $result) {
                            $title = $result['title'];
                            $description = $result['description'];
                            $date = $result['date'];
                            $author = $result['author'];
                            $download_link = $result['download_link'];
                            
                            // Generate the HTML code for the card
                            echo '<div class="col-lg-12 mb-4 order-0">
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="card-subtitle text-muted mb-3">Computer Science</div>
                                          <p class="card-text" style="font-weight: bold;">' . $title . '</p>
                                          <a href="' . $download_link . '" class="card-link" style="padding-right: 2em;">Download</a>
                                          <li class="list-inline-item" style="padding-right: 1em; ">' . $date . '</li>
                                          <li class="list-inline-item" style="font-size: small;">' . $author . '</li>
                                        </div>
                                      </div>
                                    </div>';
                        }
                    }
                ?>



                <!-- <div class="col-lg-12 mb-4 order-0">
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
