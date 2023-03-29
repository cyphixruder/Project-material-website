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
   
    <style>
    a.bin:link, a:visited {
      color: white;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }
    </style>
  </head>

<?php
include('function.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$showInfo = false;

if(!isset($_SESSION['user_id'])){
    header('location: auth-login-basic-Staff.php');
    exit;
}
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('location: auth-login-basic-Staff.php');
    exit();
}

// Get user's information from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM staff_db WHERE id = $user_id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    // var_dump($user);
} else {
    $error = "Error fetching user information from the database.";
    showNotif($error, "info");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form input values
    $pro_title = $_POST['pro_title'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $author = $_POST['authur'];

      $myPath           =     $_FILES['material'];
      $myfileName       =     $_FILES['material']['name'];
      $fileSize         =     $_FILES['material']['size'];
      $myfileTempName   =     $_FILES['material']['tmp_name'];
      $fileType         =     $_FILES['material']['type'];
      $fileError        =     $_FILES['material']['error'];

      $fileExt          =     explode('.',$myfileName);
      $fileActualExt    =     strtolower(end($fileExt));
      $allowed    =   array('jpg','jpeg','png', 'pdf', 'doc', 'docx');
      if(isset($myPath)){
          if(in_array($fileActualExt,$allowed)){
              if($fileError === 0){
                  if($fileSize < 10000000){
                      // $real_id       =  $myId;
                      $myfileNewName   = $pro_title;
                      $myfileDestination = '../upload_file'.$myfileNewName.'.'.$fileActualExt;                        
                      move_uploaded_file($myfileTempName,$myfileDestination);
                  }else{
                    showNotif("This file is too big, try with a lesser file size", "info");
                  }

              }else{
                showNotif("An error has occured, try again with another file", "info");
              }

          }else{
            showNotif("This type of file cannot be uploaded", "info");
          }

      }
  
    
    if (isset($myfileDestination)) {

        // Insert form data into database
        $sql = "INSERT INTO uploads (pro_title, faculty, department, authur, material) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters to statement
            $stmt->bind_param("sssss", $pro_title, $faculty, $department, $author, $myfileDestination);
            
            // Execute statement
            if ($stmt->execute()) {
              showNotif("Project Material uploaded .", "success");
            } else {
              showNotif("Error: " . $sql . "<br>" . $conn->error, 'info');
            }

            $stmt->close();
        } else {
          showNotif("Error: " . $sql . "<br>" . $conn->error, "info");
        }

    } else {
      showNotif("Error uploading file.", "info");
    }

    // $conn->close();
}

// echo $showInfo;
  
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
              <a href="staff_dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="pages-account-settings-account-Staff.php" class="menu-link">
                <i class="bx bx-user me-2"></i>
                <div data-i18n="Boxicons">My Profile</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="staff_logout.php" class="menu-link">
                <i class="bx bx-power-off me-2"></i>
                <div data-i18n="Boxicons">Log Out</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
        
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
                          
                          <h5 class="card-title text-primary">Congratulations  <?php echo $_SESSION['user_name']; ?>🎉</h5>
                          <p class="mb-4">
                          Our repository system dashboard is your one-stop-shop for all project materials, providing you with easy access to a comprehensive collection of learning resources across all departments.
                          </p>

                          <a href="javascript:;" class="btn btn-md btn-outline-primary">Upload New Project Materials</a>
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

                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Project Upload</span></h4>

                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Basic Layout</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label mt-4" for="basic-default-fullname">Project Title</label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" name="pro_title" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="country">Faculty</label>
                            <select id="country" class="select2 form-select" name="faculty">
                              <option value="">Select</option>
                              <option value="Agriculture">Agriculture</option>
                              <option value="Arts">Arts</option>
                              <option value="Education">Education</option>
                              <option value="Environmental Design">Environmental Design</option>
                              <option value="Law">Law</option>
                              <option value="Management Science">Management Science</option>
                              <option value="Sciences">Sciences</option>
                              <option value="Social Science">Social Science</option>
                            </select>
                          </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-email">Department</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              id="basic-default-email"
                              class="form-control"
                              placeholder="Your department"
                              aria-label="john.doe"
                              aria-describedby="basic-default-email2"
                              name="department"
                            />
                            
                          </div>
                          <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-phone">Authur</label>
                          <input
                            type="text"
                            id="basic-default-phone"
                            class="form-control phone-mask"
                            placeholder="Enter the name of the Authur"
                            name="authur"
                          />
                        </div>
                        <div class="mb-3">
                        <label for="formFile" class="form-label">Upload the Project Material</label>
                        <input class="form-control" type="file" id="formFile" name="material"/>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                      </form>
                    </div>
                  </div>
                </div>

                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Project List</span></h4>
                <div class="card">
                  <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Project List</th>
                        <th>Author</th>
                        <th>Department</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                      // Select data from database
                      $sql = "SELECT * FROM uploads ORDER BY id DESC";
                      $result = mysqli_query($conn, $sql);

                      // Loop through each row and display in the table
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td style ="color: black;">' . $row['pro_title'] . '</td>';
                        echo '<td>' . $row['authur'] . '</td>';
                        echo '<td>' . $row['department'] . '</td>';
                        echo '<td><span class="btn btn-danger me-1"><a href="#" class="bin" data-id="' . $row['id'] . '"><i class="bx bx-trash me-1"></i> Delete</a></span></td>';
                        echo '</tr>';
                      }
                    
                      // Free result set
                      mysqli_free_result($result);
                      ?>
                    </tbody>
                  </table>

                  </div>
                </div>
                <!--/ Basic Bootstrap Table -->

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
    <script>
    $(document).ready(function() {
      // Add click event listener to delete buttons
      $('.bin').click(function(e) {
        e.preventDefault();
      
        // Get the ID of the row to delete
        var id = $(this).data('id');
      
        // Send AJAX request to delete the row from the database
        $.ajax({
          url: 'delete_row.php',
          method: 'POST',
          data: { id: id },
          success: function(response) {
            // If the row was successfully deleted, remove it from the table
            if (response == 'success') {
              $(e.target).closest('tr').remove();
            }
          }
        });
      });
    });
    </script>
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