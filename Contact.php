<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--css files-->

		<link rel="stylesheet" href="styles/contact.css">

		<title>Clip & Curl Salon-Contact </title>
	</head>
	<body>
		<!--Navigate bar-->
		<?php
		$active = "contact";
		include 'header.php';
		?>
		
		
		<!--conact details-->
		<section id="contact">
			<div class="contact-info">
				<img id="cover-image" src="images/contact-images/cover.jpg" alt="Cover Image">
				<div class="contact-details">
					<div class="heading">
						<h1>Contact Us On...</h1>
						<h5>Get in Touch with Us<br>Professional in Hair Care and Beauty</h5>
					</div>
					<div class="location">
						<h2><img id="contact_img" src="images/contact-images/location.png">Location</h2>
						<address>Clip & Curl(Pvt)Ltd,<br>162/224,<br>Dalugama,<br>Kelaniya.</p>
					</div>
					<div class="phone">
						<h2><img id="contact_img" src="images/contact-images/phone.png">Phone</h2>
						<p>(123) 456-7890</p>
						<p>(987) 654-3210</p>
					</div>
					<div class="email">
						<h2><img id="contact_img" src="images/contact-images/email.png">Email</h2>
						<p><a href="mailto:info@clip&curl.com">info@clip&curl.com</a></p>
						<p><a href="mailto:bookings@salon,com">bookings@salon.com</a></p>
					</div>
					<div class="social">
						<h2>Social</h2>
						<ul>
						<li><a href="https://www.facebook.com"><img id="contact_img" src="images/contact-images/facebook.png"></a></li>
						<li><a href="https://www.instagram.com/"><img id="contact_img" src="images/contact-images/instagram.png"></a></li>
						<li><a href="https://telegram.org"><img id="contact_img" src="images/contact-images/telegram.png"></a></li>
						</ul>
					</div>
					<div class="hours">
						<h2>Open Hours</h2>
						<ul>
							<li><span>Weekdays:<span>9:00am - 7:00pm</li>
							<li><span>Saturday:<span>10:00am - 6:00pm</li>
							<li><span>Sunday:<span>Closed</li>
						</ul>
					</div>
					<div class="nav-image">
						<a href="Appointment.php"><img src="images/contact-images/book.jpg" alt="Link to appointment page"></a>
					</div>
				</div>
			</div>
		</section>
		
		<!--footer-->
		<?php
		include 'footer.html';
		?>
		
	</body>	
</html>
