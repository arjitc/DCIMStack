<?php
include 'config/db.php';
include 'libraries/events.php';
$user_name    = mysqli_real_escape_string($conn, $_SESSION['user_name']);
$password1    = mysqli_real_escape_string($conn, $_POST['password1']);
$password2    = mysqli_real_escape_string($conn, $_POST['password2']);
if(isset($password1, $password2) && $password1 == $password2 && $_SESSION['token']==$_POST['token']) {
	$hash = crypt($password1); //Crypt/hash the password
	$sql = "UPDATE `users` SET `user_password_hash`='$hash' WHERE `user_name`='$user_name'";
	if ($conn->query($sql) === TRUE) {
		unset($_SESSION['token']);
    	$_SESSION['success'] = "Success, Password updated";
    	header('Location: account.php');
	} else {
		unset($_SESSION['token']);
		$_SESSION['error'] = "Error, Password not updated. Perhaps the passwords entered did not match?";
		header('Location: account.php');
	}
	$conn->close();
}
?>