<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--css files-->
		<link rel="stylesheet" href="styles/appointment.css">
		
		<script src="scripts/appointment.js"></script>
		<title>Clip & Curl Salon-Appointment</title>
	</head>
	<body>
		<!--Navigate bar-->
		<?php
		include 'header.php';
		?>
		
		
		
		<!--appointment form-->
		<section id="appointment-form">
			<div class="cover-image-container">
				<img id="cover-image" src="images/appointment-images/appointment.jpg" alt="Cover Image">
				<div class="form-container">
					<?php
		if(isset($_SESSION['success_message'])){ ?>
		<span class="<?php echo "success_message"?>"><h2><?php echo $_SESSION['success_message']; ?></h2></span>
		<?php 
			unset($_SESSION['success_message']);
		} ?>
					<h2><br>Appointment Form<br><br></h2>
					<form method="post" action="appointment_action.php" name="myForm" id="myForm" >
						
						<label for="name">Name</label>
						<input type="text" id="name" name="name" placeholder="Enter your name" value="<?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; unset($_SESSION['name']);}?>" required>
						<hr>
						<label for="email">Email</label>
						<input type="email" id="email" name="email" placeholder="Enter your email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; unset($_SESSION['email']);}?>" required>
						<hr>
						<label for="phone">Phone Number</label>
						<input type="text" id="phone" name="phone" placeholder="Enter your phone number" value="<?php if(isset($_SESSION['phone'])){ echo $_SESSION['phone']; unset($_SESSION['phone']);}?>" required>
						<hr>
						<label for="duration">Appointment Duration (*Enter total duration of your services)</label>
						<select id="duration" name="duration">
							<option value="0.5" <?php if(isset($_SESSION['duration'])){if($_SESSION['duration']==0.5){ echo 'selected'; unset($_SESSION['duration']);}}?>>30 min</option>
							<option value="1" <?php if(isset($_SESSION['duration'])){if($_SESSION['duration']==1){ echo 'selected'; unset($_SESSION['duration']);}}?>>1h</option>
							<option value="1.5" <?php if(isset($_SESSION['duration'])){if($_SESSION['duration']==1.5){ echo 'selected'; unset($_SESSION['duration']);}}?>>1h 30 min</option>
							<option value="2" <?php if(isset($_SESSION['duration'])){if($_SESSION['duration']==2){ echo 'selected'; unset($_SESSION['duration']);}}?>>2h</option>
							<option value="2.5" <?php if(isset($_SESSION['duration'])){if($_SESSION['duration']==2.5){ echo 'selected'; unset($_SESSION['duration']);}}?>>2h 30min</option>
							<option value="3" <?php if(isset($_SESSION['duration'])){if($_SESSION['duration']==3){ echo 'selected'; unset($_SESSION['duration']);}}?>>3h</option>
							<option value="3.5" <?php if(isset($_SESSION['duration'])){if($_SESSION['duration']==3.5){ echo 'selected'; unset($_SESSION['duration']);}}?>>3h 30min</option>
							<option value="4" <?php if(isset($_SESSION['duration'])){if($_SESSION['duration']==4){ echo 'selected'; unset($_SESSION['duration']);}}?>>4h</option>
						</select>
						<!-- input type="text" id="duration" name="duration" placeholder="Enter appointment duration" value="<?php /*if(isset($_SESSION['duration'])){ echo $_SESSION['duration']; unset($_SESSION['duration']);}*/?>" required> -->
						<hr>
						<label for="message">Message</label>
						<textarea id="message" name="message" placeholder="Enter required services" required><?php if(isset($_SESSION['message'])){ echo $_SESSION['message']; unset($_SESSION['message']);}?></textarea>
						<hr>
						<label for="date">Appointment Date</label>
						<input type="date" id="date" name="date" min="<?php echo date('Y-m-d');?>" value="<?php if(isset($_SESSION['date'])){ echo $_SESSION['date']; unset($_SESSION['date']);}?>" required> <input type="submit" id="search_time" name="search_time" value="Search for Times" required>
						<hr>
						<?php 
							if(isset($_SESSION['sunday_message'])){ ?>
								<span style="color:red;"><?php echo $_SESSION['sunday_message']; ?></span> 
							<?php
								unset($_SESSION['sunday_message']);
							}
							
							if(isset($_SESSION['empty_message'])){ ?>
								<span style="color:red;"><?php echo $_SESSION['empty_message']; ?></span>
							<?php
								unset($_SESSION['empty_message']);
							}
							if(isset($_SESSION['time_slots'])){ 
							$start_times = $_SESSION['time_slots'];
							?>
						<label for="time">Appointment Time</label>
						<select name="time" id="time" required>
						<?php	foreach($start_times as $time) { ?>
							<option value="<?php echo $time; ?>"><?php echo $time; ?></option>
						<?php 
						}  
						?>
						</select>
						<hr>
						<input type="submit" id="proceed_appointment" name="proceed_appointment" value="Submit" onclick="return validateForm()"required>
						<?php 
						unset( $_SESSION['time_slots']);
						} ?>
					</form>
				</div>
				<div class="cancellation">
					<p> Appointment cancellation or any further questions,<br><br>
					<a href="Contact.php"><img id="contact_img" src="images/appointment-images/contact-us.png"></a>
					<a href="Questions.php"><img id="contact_img" src="images/appointment-images/mail.png"></a>
					</p>
				</div>
			</div>
		</section>
		
		<!--footer-->
		<?php
		include 'footer.html';
		?>
	</body>
</html>
<?php

?>