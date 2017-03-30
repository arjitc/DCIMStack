<?php
include 'config/db.php';
$user_id    = mysqli_real_escape_string($conn, $_POST['user_id']);
$password1    = mysqli_real_escape_string($conn, $_POST['password1']);
$password2    = mysqli_real_escape_string($conn, $_POST['password2']);

if(!isset($user_id)) {
echo"userid not set";
}

if(!isset($password1)) {
echo"password1 not set";
}

if(!isset($password2)) {
echo"password2 not set";
}
echo"here";
if(isset($password1, $password2) && $password1 == $password2 && $_SESSION['token']==$_POST['token']) {
echo"here";
	$hash = crypt($password1); //Crypt/hash the password
	$sql = "UPDATE `users` SET `user_password_hash`='$hash' WHERE `user_id`='$user_id'";
	unset($_SESSION['token']);
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