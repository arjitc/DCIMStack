<?php
include 'config/db.php';
$setting    = mysqli_real_escape_string($conn, $_POST['setting']);
$value      = mysqli_real_escape_string($conn, $_POST['value']);
if (isset($setting, $value) && $_SESSION['token']==$_POST['token']) {
	//delete old entries for this setting.
	$sql = "DELETE FROM `dcimstack`.`settings` WHERE `setting`='$setting'";
	$conn->query($sql);
	//insert new entry for this setting
	$sql = "INSERT INTO `dcimstack`.`settings` (`id`, `setting`, `value`) VALUES (NULL, '$setting', '$value');";
	unset($_SESSION['token']);
	if ($conn->query($sql) === TRUE) {
    	$_SESSION['success'] = "Success, setting updated";
    	header('Location: settings.php');
	} else {
		$_SESSION['error'] = "Error, setting not updated.";
		header('Location: settings.php');
	}
	$conn->close();
}
?>