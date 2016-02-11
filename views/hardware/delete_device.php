<?php
include 'config/db.php';
$device_id = mysqli_real_escape_string($conn, $_GET['device_id']);
if(ctype_digit($device_id) && !empty($device_id)) {
	$sql = "DELETE FROM `devices` WHERE `device_id`='$device_id'";
	if ($conn->query($sql) === TRUE) { //set success message
	    $_SESSION['success'] = "Success, device removed.";
	} else { //set error message
		$_SESSION['error'] = "Error, device not removed.";
	}
	//redirect back to where we came from
	$referrer = $_SESSION['referrer'];
	unset($_SESSION['referrer']); //clear session var
	header("Location: $referrer"); //redirect!
} 
?>