<?php
include 'libraries/db.php';
include 'libraries/events.php';
include 'libraries/general.php';
$customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
$customer_link = mysqli_real_escape_string($conn, $_POST['customer_link']);
$customer_notes = mysqli_real_escape_string($conn, $_POST['customer_notes']);
$sql = "INSERT INTO `customers` (`id`, `customer_name`, `customer_link`, `customer_notes`, `customer_status`, `added_on`) VALUES (NULL, '$customer_name', '$customer_link', '$customer_notes', '1', CURRENT_TIMESTAMP);";

if ($conn->query($sql) === TRUE) {
	$event_type = "New Customer added";
	$event_message = "A new customer $customer_name was added";
	$event_status = "Complete";
	add_event($event_type, $event_message, $event_status);
	$_SESSION['success'] = "Success, $customer_name added.";
	header("Location: customers.php");
} else {
	$_SESSION['error'] = "Error, $customer_name not added.";
	header("Location: customers.php");
}
?>
