<?php
session_start();  // Starting.continuing Session

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
	<title>St Peter's Contact Us</title>
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
					<li><a class="nav-link" href="index.php">Home</a></li>
					<li><a class="nav-link" href="shop.php">Shop</a></li>
					<li><a class="nav-link" href="about.php">About Us</a></li>
					<li class="nav-item active">
						<a class="nav-link" href="contact.php">Contact Us</a>
					</li>
				</ul>
				<?php if (isset($_SESSION['user_id'])) : ?>
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="images/user.svg" alt="User">
								<?php echo "$fname";?>
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
				<?php endif; ?>
			</div>
		</div>

	</nav>
	<!-- End Header/Navigation -->

	<!-- Start Contact Form -->
	<div class="untree_co-section">
		<div class="container">

			<div class="block">
				<div class="row justify-content-center">


					<div class="col-md-8 col-lg-8 pb-4">


						<div class="row mb-5">
							<div class="col-lg-4">
								<div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
									<div class="service-icon color-1 mb-4">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
											<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
										</svg>
									</div> <!-- /.icon -->
									<div class="service-contents">
										<p>Devtraco Streets, Comm 25</p>
									</div> <!-- /.service-contents-->
								</div> <!-- /.service -->
							</div>

							<div class="col-lg-4">
								<div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
									<div class="service-icon color-1 mb-4">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
											<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
										</svg>
									</div> <!-- /.icon -->
									<div class="service-contents">
										<p>info@stpeters.gh</p>
									</div> <!-- /.service-contents-->
								</div> <!-- /.service -->
							</div>

							<div class="col-lg-4">
								<div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
									<div class="service-icon color-1 mb-4">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
										</svg>
									</div> <!-- /.icon -->
									<div class="service-contents">
										<p>+233 244 417 579</p>
									</div> <!-- /.service-contents-->
								</div> <!-- /.service -->
							</div>
						</div>




						<br>
						<br>
						<br>

					</div>

				</div>

			</div>

		</div>


	</div>
	</div>

	<!-- End Contact Form -->



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
								<li><a href="about.php">About us</a></li>
								<li><a href="contact.php">Contact us</a></li>
								<li><a href="contact.php">Location</a></li>
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="shop.php">Mobile Phones</a></li>
								<li><a href="shop.php">Laptop</a></li>
								<li><a href="shop.php">Watches</a></li>
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
</body>

</html>