<?php
include 'config/db.php';
include 'libraries/events.php';
include 'libraries/general.php';

$customer_id = mysqli_real_escape_string($conn, $_GET['customer_id']);

if (ctype_digit($customer_id) && !empty($customer_id)) {

	$sql = "DELETE FROM `customers` WHERE `id`='$customer_id'";

	if ($conn->query($sql) === TRUE) {

		$event_type   = "Customer Removed";
		$event_status = "Complete";
		add_event($event_type, $event_message, $event_status);
		
		$_SESSION['success'] = "Success, Customer Removed.";

	} else { //return back SQL error message

		$_SESSION['error'] = "[SQL ERROR] Error, Customer not removed.";

	}
	header("Location: customers.php"); //redirect!

} else {

	$_SESSION['error'] = "Error, Customer not removed. Invalid Customer ID / Customer not found.";
	header("Location: customers.php");

}
?>