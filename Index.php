<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--css files-->
		<link rel="stylesheet" href="styles/home.css">
		<script src="scripts/home.js"></script>
		<title>Clip & Curl Salon</title>
	</head>
	<body onload="changeBackground()">
		<!--Navigate bar-->
		<?php
		$active = "home";
		include 'header.php';
		?>
		
		<!--introduction-->
		<section>
			<div class="cover-image-container">
				<img id="cover-image" src="images/home-images/cover1.jpg" alt="Cover Image">
				<h1 class="tagline-container">Enhancing your natural beauty.</h1>
			</div>
			
			<div class="introduction">
				<div>
					<h2>Experience the best in beauty and wellness</h2>
					<p>Its professional salon really offers a very large number of various different kinds of treatments and 
						each and every treatment come with corresponding furniture of the salon. all, products and treatments 
						are really important aspects of the salon experience.<br><br></p>
				</div>
				<div class="gallery">
					<img src="images/home-images/gallery1.jpg" alt="Gallery Image 1">
					<img src="images/home-images/gallery2.jpg" alt="Gallery Image 2">
					<img src="images/home-images/gallery3.jpg" alt="Gallery Image 3">
					<img src="images/home-images/gallery4.jpg" alt="Gallery Image 3">
					
				</div>
				<a href="Gallery.php" class="btn-gallery">View More...</a>
			</div>
		</section>	
		
		<!-- Reviews -->
		<section id="reviews">
			<div id="carousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<h2>"I had a great experience at Clip & Curl Salon. The stylist was attentive and did a fantastic job on my hair. Highly recommend!"</h2>
						<img class="review-image" src="images/home-images/user-female.png">
						<em>Kamalka,Kadawatha</em>
					</div>
					<div class="carousel-item">
						<h2 class="review-text">"Clip & Curl Salon exceeded my expectations. The staff was friendly. My hair looked amazing. Will definitely be returning!"</h2>
						<img class="review-image" src="images/home-images/user-male.png">
						<em>Chanuka,Kelaniya</em>
					</div>
					<div class="carousel-item">
						<h2 class="review-text">"Clip & Curl Salon is my new favorite! The stylists are talented and the salon is clean and modern. Loved my haircut and color."</h2>
						<img class="review-image" src="images/home-images/user-male.png">
						<em>Dilshan,Dalugama</em>
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				</button>
			</div>
			<!--appointment-->
			<div class="appointment">
				<a href="Appointment.php" class="btn-appointment">Book Now</a>
			</div>
		</section>
		
		<!--footer-->
		<?php
		include 'footer.html';
		?>
    </body>
</html>