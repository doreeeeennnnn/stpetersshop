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

// Get user ID from the URL parameter
if (isset($_GET['id'])) {
    $edit_user_id = $_GET['id'];

    // Create a new instance of the database connection class
    $db = new db_connection();

    // Connect to the database
    if ($db->db_connect()) {
        // Prepare the SQL statement to fetch user data
        $sql = "SELECT * FROM `user` WHERE `user_id` = '$edit_user_id'";

        // Execute the query
        $result = $db->db_query($sql);

        // Check if user exists
        if ($result && $db->db_count() > 0) {
            // Fetch user data
            $user_data = $db->db_fetch_assoc();
        } else {
            // Redirect to user database page if user does not exist
            header("Location: ../../pages/tables/user.php");
            exit();
        }
    } else {
        // Redirect to logout page if unable to connect to the database
        header("Location: ../../../back/logout.php");
        exit();
    }
} else {
    // Redirect to user database page if user ID is not set
    header("Location: ../../pages/tables/user.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit User - St Peter's Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
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
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit User</h4>
                                    <form class="forms-sample" method="POST" action="../../back/edit_user.php" enctype="multipart/form-data">
                                        <input type="hidden" name="user_id" value="<?php echo $user_data['user_id']; ?>">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="<?php echo $user_data['user_fname']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="<?php echo $user_data['user_lname']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $user_data['user_email']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="<?php echo '0' . $user_data['user_phone']; ?>">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                                        <a href="../../pages/tables/user.php"><button type="button" class="btn btn-light">Cancel</button></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <?php include('../../partials/_footer.html'); ?>
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
    <!-- endinject -->
</body>

</html>