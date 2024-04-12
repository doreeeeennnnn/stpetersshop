<?php
session_start();

// Check if user_id session variable is not set
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../back/logout.php");
    exit();
}

// Check if user role is not suitable for accessing the admin page
if ($_SESSION['user_role'] != 1) {
    header("Location: ../../../back/logout.php");
    exit();
}

// Include the database connection file
require_once '../../../settings/db_class.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    // Default password for admins
    $password = 'admin123';

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Create a new instance of the database connection class
    $db = new db_connection();

    // Connect to the database
    if ($db->db_connect()) {
        // Check if the email already exists
        $check_email_sql = "SELECT * FROM `user` WHERE `user_email` = '$email'";
        if ($db->db_query($check_email_sql) && $db->db_count() > 0) {
            // Email already exists, show error message
            echo "<script>alert('Error: Email already exists.');</script>";
            echo "<script>window.location.href = 'add_admin.php';</script>";
            exit();
        }

        // Prepare the SQL statement to insert a new admin into the database
        $sql = "INSERT INTO `user` (`user_fname`, `user_lname`, `user_email`, `user_phone`, `user_pass`, `user_role`) 
                VALUES ('$fname', '$lname', '$email', '$phone', '$hashed_password', 1)";

        // Execute the query
        if ($db->db_query($sql)) {
            // Registration successful
            echo "<script>alert('Admin registration was successful. Default password is admin123.');</script>";
            echo "<script>window.location.href = '../../pages/tables/user.php';</script>";
            exit();
        } else {
            // Error handling
            echo "<script>alert('Error: Unable to register. Please try again later.');</script>";
            echo "<script>window.location.href = 'add_admin.php';</script>";
            exit();
        }
    } else {
        // Error handling, show alert and redirect to login page
        echo "<script>alert('Error: Unable to connect to the database.');</script>";
        echo "<script>window.location.href = 'add_admin.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>St Peter's Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <!-- <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-5" href="../../index.html"><img src="../../images/logo.svg" class="me-2"
            alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-mini.svg"
            alt="logo" /></a>
      </div> -->
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-search d-none d-lg-block">
            <a href="../../../shop.php"><button class="btn btn-outline-primary">View Shop</button></a>
          </li>
          <li class="nav-item nav-search d-none d-lg-block">
            <a href="../../../back/logout.php"><button class="btn btn-outline-danger">Logout</button></a>
          </li>


        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/product.php">
              <i class="ti-view-list-alt menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/user.php">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
            </div>
            <div class="col-md-6 grid-margin stretch-card">
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Admin</h4>
                  <form class="forms-sample" method="POST" action="">
                    <div class="form-group">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
                    </div>
                    <div class="form-group">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
                    </div>
                    <div class="form-group">
                      <label for="phone">Contact</label>
                      <input type="number" class="form-control" id="phone" placeholder="Contact" name="phone">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                    </div>
                    <br>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary me-2" name="submit">Submit</button>
                      <a href="../../pages/tables/user.php"><button class="btn btn-secondary">Cancel</button></a>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
          </div>
        </div>
        <br>
        <br>
        <br>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
