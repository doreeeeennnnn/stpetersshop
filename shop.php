<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
	// Display an alert message
	echo "<script>alert('You must login to shop.');</script>";
	echo "<script>window.location.href = 'login.php';</script>";
	exit(); // Make sure to exit after redirecting to prevent further execution
}

$fname = $_SESSION['user_fname'];
?>

<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="css/tiny-slider.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<title>St Peter's Shop</title>
</head>

<body>
	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

		<div class="container">
			<a class="navbar-brand" href="home.php">St Peter's Gadgets<span></span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li><a class="nav-link" href="home.php">Home</a></li>
					<li class="nav-item active">
						<a class="nav-link" href="shop.php">Shop</a>
					</li>
					<li><a class="nav-link" href="about.php">About Us</a></li>

					<li><a class="nav-link" href="contact.php">Contact Us</a></li>
				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="images/user.svg" alt="User">
							<?php echo "$fname"; ?>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="./back/logout.php">Logout</a></li>
						</ul>
					</li>
					<li><a class="nav-link" href="cart.php"><img src="images/cart.svg" alt="Cart"></a></li>
					<li>
						<?php if ($_SESSION['user_role'] == 1) : ?>
							<!-- Show link to admin page -->
							<a class="nav-link" href="admin/" style="color:red;">Go to Admin Page</a>
						<?php endif; ?>
					</li>
				</ul>


			</div>
		</div>
	</nav>
	<!-- End Header/Navigation -->

	<div class="Hero">
		<div class="container">
			<div class="d-flex justify-content-center">
				<div class="row">
					<form action="#" class="row g-3">
						<div class="col-auto">
							<br>
							<input type="text" id="searchInput" class="form-control" placeholder="Search for Products">
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="untree_co-section product-section before-footer-section">
		<div class="container">
			<div class="row">
				<!-- Start Column 1 -->
				<?php
				// Include the database connection file
				require_once 'settings/db_class.php';

				// Create a new instance of the database connection class
				$db = new db_connection();

				// Fetch products from the database
				$products = $db->db_fetch_all("SELECT * FROM product");

				// Check if there are products available
				if ($products) {
					foreach ($products as $product) {
				?>
						<div class="col-12 col-md-4 col-lg-3 mb-5">
							<a class="product-item" href="#">
								<img src="admin/back/<?php echo $product['product_img']; ?>" class="img-fluid product-thumbnail" alt="<?php echo $product['product_name']; ?>">
								<h3 class="product-title"><?php echo $product['product_name']; ?></h3>
								<small class="product-description"><?php echo $product['product_details']; ?></small><br>
								<strong class="product-price"><?php echo 'GH₵' . $product['product_price']; ?></strong>
								<!-- Add other product details here -->
								<span class="icon-cross">
									<img src="images/cross.svg" class="img-fluid">
								</span>
							</a>
						</div>
				<?php
					}
				} else {
					// Display a message if no products are available
					echo '<p>No products found.</p>';
				}
				?>
				<!-- End Column 1 -->


			</div>
		</div>
	</div>


	<!-- Start Footer Section -->
	<footer class="footer-section">
		<div class="container relative">

			<div class="sofa-img">
				<img src="images/11i.png" alt="Image" class="img-fluid">
			</div>

			<div class="row g-5 mb-5">
				<div class="col-lg-4">
					<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">St Peter's
							Gadget<span>.</span></a></div>
					<p class="mb-4">We are the number one best online shopping platforms in Ghana. Any Day Any Time!</p>

					<ul class="list-unstyled custom-social">
						<li><a href="https://www.facebook.com/St.PetersPhones/"><span class="fa fa-brands fa-facebook-f"></span></a></li>
						<li><a href="https://x.com/StPetersPhones"><span class="fa fa-brands fa-twitter"></span></a>
						</li>
						<li><a href="https://www.instagram.com/st.petersphones?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><span class="fa fa-brands fa-instagram"></span></a></li>
					</ul>
				</div>

				<div class="col-lg-8">
					<div class="row links-wrap">
						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="about.html">About us</a></li>
								<li><a href="#">Contact us</a></li>
								<li><a href="contact.html">Location</a></li>
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="shop.html">Mobile Phones</a></li>
								<li><a href="shop.html">Laptop</a></li>
								<li><a href="shop.html">Watches</a></li>
							</ul>
						</div>


					</div>
				</div>

			</div>

			<div class="border-top copyright">
				<div class="row pt-4">
					<div class="col-lg-6">
						<p class="mb-2 text-center text-lg-start">Copyright &copy;
							<script>
								document.write(new Date().getFullYear());
							</script>. All Rights Reserved. &mdash;
							Designed with by Doreen Inc</a>
						</p>
					</div>
				</div>
			</div>

		</div>
	</footer>
	<!-- End Footer Section -->


	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>

	<script>
		// JavaScript to filter products based on search input
		document.addEventListener('DOMContentLoaded', function() {
			const searchInput = document.getElementById('searchInput');
			const products = document.querySelectorAll('.product-item');

			searchInput.addEventListener('input', function() {
				const searchTerm = searchInput.value.trim().toLowerCase();

				products.forEach(function(product) {
					const productName = product.querySelector('.product-title').innerText.toLowerCase();
					const productDescription = product.querySelector('.product-description').innerText.toLowerCase();

					if (productName.includes(searchTerm) || productDescription.includes(searchTerm)) {
						product.style.display = 'block'; // Show product if it matches search query
					} else {
						product.style.display = 'none'; // Hide product if it doesn't match search query
					}
				});
			});
		});
	</script>

</body>

</html>