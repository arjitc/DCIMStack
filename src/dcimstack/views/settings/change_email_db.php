<?php
include 'config/db.php';
$user_name = mysqli_real_escape_string($conn, $_SESSION['user_name']);
$email1    = mysqli_real_escape_string($conn, $_POST['email1']);
$email2    = mysqli_real_escape_string($conn, $_POST['email2']);
if(isset($email1, $email2) && $email1 == $email2 && $_SESSION['token']==$_POST['token']) {
	$sql = "UPDATE `users` SET `user_email`='$email' WHERE `user_name`='$user_name'";
	unset($_SESSION['token']);
	if ($conn->query($sql) === TRUE) {
		$_SESSION['user_email'] = $email1;
    	$_SESSION['success'] = "Success, EMail Address updated";
    	header('Location: account.php');
	} else {
		$_SESSION['error'] = "Error, EMail Address not updated.";
		header('Location: account.php');
	}
	$conn->close();
}
?>