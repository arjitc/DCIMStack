<?php
include 'config/db.php';
if($_SESSION['token']==$_GET['token']) {
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$sql = "DELETE FROM `events` WHERE `id`='$id'";
	if ($conn->query($sql) === TRUE) {
    	$_SESSION['success'] = "Success, Event deleted.";
    	header('Location: index.php');
	} else {
		$_SESSION['error'] = "Error, Event not deleted.";
	    header('Location: index.php');
	}
	unset($_SESSION['token']);
} else {
	echo "Token mismatch";
	unset($_SESSION['token']);
}
?>