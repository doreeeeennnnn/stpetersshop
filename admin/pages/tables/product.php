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
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="ti-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
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
            <div class="col-lg-6 grid-margin stretch-card">
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product Database</h4>
                  <p class="card-description">
                    <a href="../forms/add_products.php"><button class="btn btn-outline-primary">Add Product</button></a>
                    <!-- <button class="btn btn-outline-primary"><a href="../../../shop.php">View Shop</a></button> -->
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Product Image
                          </th>
                          <th>
                            Product Name
                          </th>
                          <th>
                            Product Details
                          </th>
                          <th>
                            Product Price
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Include the database connection file
                        require_once '../../../settings/db_class.php';

                        // Create a new instance of the database connection class
                        $db = new db_connection();

                        // Connect to the database
                        if ($db->db_connect()) {
                          // Prepare the SQL statement to fetch product data
                          $sql = "SELECT * FROM `product`";

                          // Execute the query
                          $result = $db->db_query($sql);

                          // Check if any products exist in the database
                          if ($result && $db->db_count() > 0) {
                            // Output table rows dynamically with product data
                            while ($row = $db->db_fetch_assoc()) {
                              echo "<tr data-name='{$row['product_name']}' data-details='{$row['product_details']}'>";
                              echo "<td class='py-1'><img src='../" . $row['product_img'] . "' alt='image' style='width: 50px; height: 50px;' /></td>";
                              echo "<td>" . $row['product_name'] . "</td>";
                              echo "<td>" . $row['product_details'] . "</td>";
                              echo "<td>GHC " . $row['product_price'] . "</td>";
                              echo "<td>";
                              echo "<a href='../forms/edit_product.php?id=" . $row['product_id'] . "'><button class='btn btn-outline-primary'><i class='ti-pencil'></i> Edit</button></a>";
                              echo "<a href='../../back/delete_product.php?id=" . $row['product_id'] . "'><button class='btn btn-outline-danger'><i class='ti-trash'></i> Delete</button></a>";
                              echo "</td>";
                              echo "</tr>";
                            }
                          } else {
                            // Output a message if no products are found in the database
                            echo "<tr><td colspan='5'>No products found.</td></tr>";
                          }
                        } else {
                          // Output an error message if unable to connect to the database
                          echo "<tr><td colspan='5'>Error: Unable to connect to the database.</td></tr>";
                        }
                        ?>
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
              </div>
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
      <!-- Plugin js for this page-->
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="../../js/off-canvas.js"></script>
      <script src="../../js/hoverable-collapse.js"></script>
      <script src="../../js/template.js"></script>
      <script src="../../js/todolist.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script>
        // Select the search input field
        const searchInput = document.getElementById('navbar-search-input');

        // Add event listener for input event on search input
        searchInput.addEventListener('input', function() {
          const searchValue = this.value.toLowerCase();

          // Select all table rows
          const tableRows = document.querySelectorAll('tbody tr');

          // Loop through each table row
          tableRows.forEach(row => {
            // Get data attributes for search
            const name = row.getAttribute('data-name').toLowerCase();
            const details = row.getAttribute('data-details').toLowerCase();
            // const price = row.getAttribute('data-price');

            // Check if any of the data attributes contain the search value
            if (name.includes(searchValue) || details.includes(searchValue)) {
              // Show the table row if it matches the search
              row.style.display = '';
            } else {
              // Hide the table row if it doesn't match the search
              row.style.display = 'none';
            }
          });
        });
      </script>

      <!-- End custom js for this page-->

</body>

</html>