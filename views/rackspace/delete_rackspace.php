<?php
include 'config/db.php';
if($_SESSION['token']==$_GET['token']) {
	$rackid = mysqli_real_escape_string($conn, (int)$_GET['rackid']);
	$sql = "DELETE FROM `rackspace` WHERE `rackid`='$rackid'";
	if ($conn->query($sql) === TRUE) {
    	$_SESSION['success'] = "Success, Rackspace deleted.";
    	unset($_SESSION['token']);
    	header('Location: manage_rackspace.php');
	} else {
		$_SESSION['error'] = "Error, Rackspace not deleted.";
		unset($_SESSION['token']);
	    header('Location: manage_rackspace.php');
	}
} else {
	echo "Token mismatch";
	unset($_SESSION['token']);
}
?>