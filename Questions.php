<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--css files-->
		<link rel="stylesheet" href="styles/questions.css">
		<script>
			function validateForm() {
				const name = document.forms["myForm"]["name"].value;
				const email = document.forms["myForm"]["email"].value;
				const message = document.forms["myForm"]["message"].value;
				
				// Name validation
				if (name == "") {
					alert("Name must be filled out correctly");
					return false;
				}
				else if(name.length<3){
					alert("Name cannot be less than 3 characters");
					return false;
				}
				
				
				// Message validation
				if (message == "") {
					alert("Message must be filled out");
					return false;
				}
				else if(message.length<10){
					alert("Message cannot be less than 10 characters");
					return false;
				}
				
				// Email validation
				const emailFormat =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				if (email == "") {
					alert("Email must be filled out");
					return false;
				}
				else if (!emailFormat.test(email)) {
					alert("Email format is invalid");
					return false;
				}
			
				return true;
			}
			</script>
		
		<title>Clip & Curl Salon - Questions</title>
	</head>
	<body>
		<!--Navigate bar-->
		<?php
		$active = "questions";
		include 'header.php';
		?>
		
		<!--title-->
		<section id="title">
			<div class="cover-image-container">
				<img id="cover-image" src="images/questions-images/cover.jpg" alt="Cover Image">
				<div class="question-form">
					<h1>We are love to hear from you...<br><br></h1>
					<form method="post" action="sendmail.php" name="myForm" id="myForm"  >
						<label for="name">Name:</label>
						<br>
						<input type="text" id="name" name="name" required>
						<br><br>
						<label for="email">Email:</label>
						<br>
						<input type="email" id="email" name="email" required>
						<br><br>
						<label for="message">Message:</label>
						<br>
						<textarea id="message" name="message" rows="5" required></textarea>
						<br><br>
						<button type="submit" name="submit" onclick="return validateForm()">Submit</button>
					</form>
					
				</div>
			</div>
		</section>
		
		<!--footer-->
		<?php
		include 'footer.html';
		?>
    </body>
</html>