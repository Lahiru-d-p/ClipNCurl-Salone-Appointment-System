<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--css files-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link rel="stylesheet" href="styles/navigatebar.css">
		<!-- Bootsrap Scripts -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
		<!--Navigate bar-->
		<section id="navigatebar">
			<nav class="navbar navbar-expand-lg fixed-top">
				<img src="images/salon-icon.png" alt="Salon Icon">
				<h1 id="navbar-brand">Clip & Curl</h1>
				<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarToggler1">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarToggler1">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item">
							<a class="nav-link <?php if($active=="home") echo "active-page"; ?>" href="Index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if($active=="services") echo "active-page"; ?>" href="Services.php">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if($active=="gallery") echo "active-page"; ?>" href="Gallery.php">Gallery</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if($active=="aboutus") echo "active-page"; ?>" href="About_Us.php">About Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if($active=="questions") echo "active-page"; ?>" href="Questions.php">Questions</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if($active=="contact") echo "active-page"; ?>" href="Contact.php">Contact Us</a>
						</li>
						<li class="nav-item">
							<a class="navbar-right" href="Appointment.php">Book Appointment</a>
						</li>
					</ul>
				</div>
			</nav>
		</section>
    </body>
</html>