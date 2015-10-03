<?php
include 'config/db.php';
include 'libraries/events.php';
$user_name    = mysqli_real_escape_string($conn, $_SESSION['user_name']);
$password1    = mysqli_real_escape_string($conn, $_POST['password1']);
$password2    = mysqli_real_escape_string($conn, $_POST['password2']);
if(isset($password1, $password2) && $password1 == $password2) {
	$hash = crypt($password1); //Crypt/hash the password
	$sql = "UPDATE `users` SET `user_password_hash`='$hash' WHERE `user_name`='$user_name'";
	if ($conn->query($sql) === TRUE) {
    	$_SESSION['success'] = "Success, Password updated";
    	header('Location: add_rackspace.php');
	} else {
		$_SESSION['error'] = "Error, Password not updated. Perhaps both the passwords entered did not match?";
		header('Location: add_rackspace.php');
	}
	$conn->close();
}
?>