<?php
include 'libraries/db.php';
include 'libraries/events.php';
include 'libraries/general.php';
$username = mysqli_real_escape_string($conn, $_POST['user_name']);
$password = mysqli_real_escape_string($conn, $_POST['user_password']);
$email = mysqli_real_escape_string($conn, $_POST['user_email']);

if(!isset($password)) {
	$_SESSION['error'] = "Error, $username not added due to password not set.";
	header("Location: users.php");
}
if(!isset($email)) {
	$_SESSION['error'] = "Error, $username not added due to email not set.";
	header("Location: users.php");
}
if(!isset($username)) {
	$_SESSION['error'] = "Error, $username not added due to username not set.";
	header("Location: users.php");
}

if(isset($password, $username, $email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$hash = crypt($password); //Crypt/hash the password

	$sql = "INSERT INTO `users` (`user_name`, `user_password_hash`, `user_email`) VALUES ('$username', '$hash', '$email');";

	if ($conn->query($sql) === TRUE) {
		$event_type = "New Customer added";
		$event_message = "A new customer $customer_name was added";
		$event_status = "Complete";
		add_event($event_type, $event_message, $event_status);
		$_SESSION['success'] = "Success, $username added.";
		header("Location: users.php");
	} else {
		$_SESSION['error'] = "Error, $username not added.";
		header("Location: users.php");
	}
}
?>
