<?php
session_start();  // Starting/continuing Session

// $fname = $_SESSION['user_fname'];
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
	<title>St Peter's Gadgets</title>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

		<div class="container">
			<a class="navbar-brand" href="index.php">St Peter's Gadgets<span></span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li><a class="nav-link" href="shop.php">Shop</a></li>
					<li><a class="nav-link" href="about.php">About Us</a></li>
					<li><a class="nav-link" href="contact.php">Contact Us</a></li>
				</ul>

				<?php if (isset($_SESSION['user_id'])) : ?>
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="images/user.svg" alt="User">
								<?php echo "{$_SESSION['user_fname']}";?>
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

	<!-- Start Product Section -->
	<div class="product-section">
		<div class="container">
			<div class="row">

				<!-- Start Column 1 -->
				<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
					<h2 class="mb-4 section-title">Ghana's Best Gadget Shop</h2>
					<p class="mb-4">Any Day Any Time Shop With St Peter's. </p>
					<p><a href="shop.php" class="btn">Shop Now</a></p>
				</div>
				<!-- End Column 1 -->

				<!-- Start Column 2 -->
				<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
					<a class="product-item" href="shop.php">
						<img src="images/iphone_13__gnwdyqfq7i2y_xlarge_2x-removebg-preview.png" class="img-fluid product-thumbnail" style="margin-top: -50px" ;>
						<h3 class="product-title">Iphone 13</h3>

						<strong class="product-price">₵7,000.00</strong>

						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div>
				<!-- End Column 2 -->

				<!-- Start Column 3 -->
				<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
					<a class="product-item" href="shop.php">
						<img src="images/iphone-compare-iphone-14-202309-removebg-preview.png" class="img-fluid product-thumbnail">
						<h3 class="product-title">Iphone 14</h3>
						<strong class="product-price">₵8,000.00</strong>

						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div>
				<!-- End Column 3 -->

				<!-- Start Column 4 -->
				<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
					<a class="product-item" href="shop.php">
						<img src="images/iphone-compare-iphone-15-202309-removebg-preview.png" class="img-fluid product-thumbnail">
						<h3 class="product-title">Iphone 15</h3>
						<strong class="product-price">₵10,000.00</strong>

						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div>
				<!-- End Column 4 -->

			</div>
		</div>
	</div>
	<!-- End Product Section -->

	<!-- Start Why Choose Us Section -->
	<div class="why-choose-section">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-6">
					<h2 class="section-title">Why Choose Us</h2>
					<p>Discover why shopping with us is the smart choice: unbeatable quality, exceptional service, and a commitment to your satisfaction.</p>

					<div class="row my-5">
						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/truck.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Fast &amp; Free Shipping</h3>
								<p>Enjoy free shipping on all orders – because getting what you love should never come with extra costs!</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/bag.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Easy to Shop</h3>
								<p>Experience effortless shopping with our user-friendly platform – your convenience is our priority</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/support.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>24/7 Support</h3>
								<p>Get peace of mind with our 24/7 support – assistance whenever you need it!</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/return.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Hassle Free Returns</h3>
								<p>Shop stress-free with our hassle-free returns policy - your satisfaction guaranteed!</p>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-5">
					<div class="img-wrap">
						<img src="images/stpeterslogo.png" alt="Image" class="img-fluid">
					</div>
				</div>

			</div>
		</div>
	</div>
	</div>

	<!-- Start Testimonial Slider -->
	<div class="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 mx-auto text-center">
					<h2 class="section-title">Testimonials</h2>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="testimonial-slider-wrap text-center">

						<div id="testimonial-nav">
							<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
							<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
						</div>

						<div class="testimonial-slider">

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<blockquote class="mb-5">
												<p>&ldquo;As a busy professional, I don't always have time to browse multiple stores for the latest gadgets. That's why I love shopping at this online gadget store. Their website is easy to navigate, and they have an impressive selection of products to choose from. Plus, their prices are competitive, and I always receive my orders quickly. Whether I'm shopping for myself or buying gifts for friends and family, this store is my go-to destination for all things tech!&rdquo;</p>
											</blockquote>

											<div class="author-info">
												<div class="author-pic">
													<img src="images/t1.jpeg" alt="Maria Jones" class="img-fluid">
												</div>
												<h3 class="font-weight-bold">Dorcas Asamoah</h3>
												<span class="position d-block mb-3">CEO, Co-Founder, Dell Inc.</span>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<blockquote class="mb-5">
												<p>&ldquo;I've been a tech enthusiast for years, and I must say, this online gadget store has exceeded my expectations! Not only do they offer a wide range of cutting-edge products, but their customer service is top-notch. Every time I've had a question or concern, they've been quick to respond and resolve any issues. I highly recommend this store to anyone looking for quality gadgets and exceptional service &rdquo;</p>
											</blockquote>

											<div class="author-info">
												<div class="author-pic">
													<img src="images/woman.jpg" alt="Maria Jones" class="img-fluid">
												</div>
												<h3 class="font-weight-bold">Freda Boateng</h3>
												<span class="position d-block mb-3">Social media influencer</span>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<blockquote class="mb-5">
												<p>&ldquo;I stumbled upon this online gadget store while searching for a birthday gift for my tech-savvy friend, and I'm so glad I did! Not only did they have exactly what I was looking for, but the ordering process was seamless, and my package arrived right on time. The product quality was fantastic, and my friend absolutely loved his gift. I'll definitely be coming back to this store for all my future gadget needs!&rdquo;</p>
											</blockquote>

											<div class="author-info">
												<div class="author-pic">
													<img src="images/man.jpg" alt="Maria Jones" class="img-fluid">
												</div>
												<h3 class="font-weight-bold">Ken Odoi</h3>
												<span class="position d-block mb-3">Business man</span>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Testimonial Slider -->

	<!-- Start Footer Section -->
	<footer class="footer-section">
		<div class="container relative">

			<div class="sofa-img">
				<img src="images/11i.png" alt="Image" class="img-fluid">
			</div>

			<div class="row g-5 mb-5">
				<div class="col-lg-4">
					<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">St Peter's Gadget<span>.</span></a></div>
					<p class="mb-4">We are the number one best online shopping platforms in Ghana. Any Day Any Time!</p>

					<ul class="list-unstyled custom-social">
						<li><a href="https://www.facebook.com/St.PetersPhones/"><span class="fa fa-brands fa-facebook-f"></span></a></li>
						<li><a href="https://x.com/StPetersPhones"><span class="fa fa-brands fa-twitter"></span></a></li>
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
						<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script>. All Rights Reserved. &mdash; Designed with by Doreen Inc</a>
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