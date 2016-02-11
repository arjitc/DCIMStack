<?php
include 'config/db.php';
include 'libraries/general.php';
$device_id = mysqli_real_escape_string($conn, $_GET['device_id']);

if(ctype_digit($device_id) && !empty($device_id)) {
	$sql = "DELETE FROM `devices` WHERE `device_id`='$device_id'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record deleted successfully";
	    $referrer = $_SESSION['referrer'];
	    unset($_SESSION['referrer']);
	    header("Location: $referrer");
	} else {
	    echo "Error deleting record: " . $conn->error;
	}
} 
?>