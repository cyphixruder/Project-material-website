<?php

include 'config.php';

// Check if user is logged in
session_start();
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
    echo "Error fetching user information from the database.";
}

// Check if form has been submitted
if(isset($_POST['submit'])){

   // Get updated information from the form
   $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
   $staff_no = mysqli_real_escape_string($conn, $_POST['staff_no']);
   $designation = mysqli_real_escape_string($conn, $_POST['designation']);
   $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
   $department = mysqli_real_escape_string($conn, $_POST['department']);
   

   // Update the user's information in the database
   $update_query = "UPDATE staff_db SET fullname = '$fullname', staff_no = '$staff_no', designation = '$designation', faculty = '$faculty', department = '$department' WHERE id = $user_id";
   mysqli_query($conn, $update_query);

   // Refresh the page to show the updated information
   header('location: pages-account-settings-account-Staff.php');
   exit();
}
?>



<!DOCTYPE html>

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
            <li class="menu-item">
              <a href="staff_dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item active">
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
          <!-- Navbar -->


          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">My Profile /</span> Account</h4>

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <!-- <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="../assets/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        /> -->
                        <!-- <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Done</span>
                          </button>
                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div> -->
                        
                        <!-- <form method="POST" enctype="multipart/form-data" action="image_upload.php">
                        <div class="button-wrapperss">
                            <label for="image" class="btn btn-primary me-2 mb-4" tabindex="0">
                              <span class="d-none d-sm-block">Upload new photo</span>
                              <i class="bx bx-upload d-block d-sm-none"></i>
                            </label>
                            <input type="file" id="image" style="position:fixed; top:-300px; left:-300px" name="image" class="account-file-input"  accept="image/png, image/jpeg" />
                            <button type="submit" class="btn btn-outline-secondary account-image-reset mb-4" name="submit">
                              <i class="bx bx-reset d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Done</span>
                            </button>

                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                          </div>
                        </form> -->
                      <!-- </div> -->
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Full Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="fullname"
                              value="<?php echo $user['fullname']; ?>"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Staff ID Number</label>
                            <input class="form-control" type="text" name="staff_no" id="lastName" value="<?php echo $user['staff_no']; ?>"/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">designation</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="designation"
                              value="<?php echo $user['designation']; ?>"
                              placeholder="john.doe@example.com"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Faculty</label>
                            <select id="country" class="select2 form-select" name="faculty" value="<?php echo $user['faculty']; ?>">
                              <option value="">Select</option>
                              <option value="Agriculture"<?php if($user['faculty'] == 'Agriculture') echo ' selected'; ?>>Agriculture</option>
                              <option value="Arts"<?php if($user['faculty'] == 'Art') echo ' selected'; ?>>Arts</option>
                              <option value="Education"<?php if($user['faculty'] == 'Education') echo ' selected'; ?>>Education</option>
                              <option value="Environmental Design"<?php if($user['faculty'] == 'Environmental Design') echo ' selected'; ?>>Environmental Design</option>
                              <option value="Law"<?php if($user['faculty'] == 'Law') echo ' selected'; ?>>Law</option>
                              <option value="Management Science"<?php if($user['faculty'] == 'Management Science') echo ' selected'; ?>>Management Science</option>
                              <option value="Sciences"<?php if($user['faculty'] == 'Sciences') echo ' selected'; ?>>Sciences</option>
                              <option value="Social Science"<?php if($user['faculty'] == 'Social Science') echo ' selected'; ?>>Social Science</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Department</label>
                            <input class="form-control" value="<?php echo $user['department']; ?>" type="text" name="department" id="lastName"/>
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2" name="submit">Save changes</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">

                      <?php
                      include('function.php');
                      // Check if form has been submitted
                      if(isset($_POST['submits'])){
                      
                        // Get updated information from the form
                        $password = mysqli_real_escape_string($conn, $_POST['password']);
                        $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
                        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
                      
                        // Verify the user's current password
                        $password_query = "SELECT password FROM staff_db WHERE id = $user_id";
                        $password_result = mysqli_query($conn, $password_query);
                        $password_row = mysqli_fetch_assoc($password_result);
                        $password_hash = $password_row['password'];
                      
                        if (password_verify($password, $password_hash)) {
                        
                           // Verify the new password and confirm password match
                           if ($new_password == $confirm_password) {
                              // Update the user's password in the database
                              $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                              $update_query = "UPDATE staff_db SET password = '$password_hash' WHERE id = $user_id";
                              mysqli_query($conn, $update_query);

                              // Set the success message
                              $success = "Password updated successfully.";
                              showNotif($success, "success");
                          
                              // // Redirect the user to the account settings page
                              // header('location: pages-account-settings-account.php');
                              exit();
                           } else {
                              $error = "New password and confirm password must match.";
                              showNotif($error, "info");
                           }
                        } else {
                           $error = "Current password is incorrect.";
                           showNotif($error, "info");
                        }
                      }
                      ?>
                      <form id="formAccountDeactivation" action="" method="POST">
                        <div class="mb-3 col-md-6">
                          <label for="lastName" class="form-label mt-4">Current Password</label>
                          <input class="form-control" type="text" name="password" id="lastName"/>
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="lastName" class="form-label">New Password</label>
                          <input class="form-control" type="text" name="new_password" id="lastName"/>
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="lastName" class="form-label">Confirm Password</label>
                          <input class="form-control" type="text" name="confirm_password" id="lastName"/>
                        </div>
                        <button type="submit" class="btn btn-primary deactivate-account" name="submits">Save Changes</button>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

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

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/pages-account-settings-account.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
