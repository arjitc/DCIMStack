<?php
include 'config/db.php';
$user_id    = mysqli_real_escape_string($conn, $_POST['user_id']);
$password1    = mysqli_real_escape_string($conn, $_POST['password1']);
$password2    = mysqli_real_escape_string($conn, $_POST['password2']);
$token = $_SESSION['token'];
unset($_SESSION['token']);

if(!isset($user_id)) {
	$_SESSION['error'] = "Error, password not added due to user id not set.";
	header("Location: users.php");
	exit();
}

if(!isset($password1)) {
	$_SESSION['error'] = "Error, password not updated due to password 1 not set.";
	header("Location: users.php");
	exit();
}

if(!isset($password2)) {
	$_SESSION['error'] = "Error, password not updated due to password 2 not set.";
	header("Location: users.php");
	exit();
}

if(isset($password1, $password2) && $password1 == $password2 && $token == $_POST['token']) {
	$hash = crypt($password1); //Crypt/hash the password
	$sql = "UPDATE `users` SET `user_password_hash`='$hash' WHERE `user_id`='$user_id'";
	
	if ($conn->query($sql) === TRUE) {
		$_SESSION['success'] = "Success, Password updated";
		header('Location: users.php');
	} else {
		$_SESSION['error'] = "Error, Password not updated. Perhaps the passwords entered did not match?";
		header('Location: users.php');
	}
	$conn->close();
}
?>