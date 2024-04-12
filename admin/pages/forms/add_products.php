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
                  <h4 class="card-title">Add Product</h4>
                  <form class="forms-sample" method="POST" action="../../back/add_product.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="proname">Product Name</label>
                      <input type="text" class="form-control" id="proname" placeholder="Name" name="product_name">
                    </div>
                    <div class="form-group">
                      <label for="prodet">Product Details</label>
                      <input type="text" class="form-control" id="prodet" placeholder="Details" name="product_details">
                    </div>
                    <div class="form-group">
                      <label for="proprice">Product Price</label>
                      <input type="text" class="form-control" id="proprice" placeholder="Price" name="product_price">
                    </div>
                    <div class="input-group col-xs-12">
                      <input type="file" class="form-control file-upload-info" placeholder="Upload Product Image" id="product_image" name="product_image" onchange="previewImage();">
                      <span class="input-group-append">
                        Upload Image
                      </span>
                    </div>
                    <div class="mt-2">
                      <img id="image_preview" src="#" style="max-width: 200px; max-height: 200px;">
                    </div>
                    <br>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary me-2" name="submit">Submit</button>
                      <a href="../tables/product.php"><button class="btn btn-secondary">Cancel</button></a>
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
  <script>
    function previewImage() {
      var fileInput = document.getElementById('product_image');
      var imagePreview = document.getElementById('image_preview');

      if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          imagePreview.src = e.target.result;
        }

        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  </script>

</body>

</html>