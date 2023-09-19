<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Send the email to the admin
  $to = "peellawalageld@gmail.com";
  $subject = "New message from $name";
  $body = "Name: $name\nEmail: $email\nMessage:\n$message";
  $headers = "From: $email";

  if (mail($to, $subject, $body, $headers)) {
    echo '<script> window.location.href = "Questions.php";alert("Message sent successfully");</script>';
  } else {
    echo '<script> window.location.href = "Questions.php";alert("There is a server  ERROR---Email sending failed...");</script>';
  }
}
?>
