<?php
include 'config/db.php';
$device_id = mysqli_real_escape_string($conn, $_GET['device_id']);
if(ctype_digit($device_id) && !empty($device_id)) {
	$sql = "DELETE FROM `devices` WHERE `device_id`='$device_id'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}
} 
?>