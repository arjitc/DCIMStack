<?php
include 'config/db.php';
include 'libraries/events.php';
$rack_name    = mysqli_real_escape_string($conn, $_POST['rack_name']);
$rack_size    = mysqli_real_escape_string($conn, $_POST['rack_size']);
$rack_city    = mysqli_real_escape_string($conn, $_POST['rack_city']);
$rack_country = mysqli_real_escape_string($conn, $_POST['rack_country']);
if(isset($rack_name, $rack_size, $rack_city, $rack_country)) {
	$sql = "INSERT INTO `rackspace` (`id`, `rack_name`, `rack_size`, `rack_used`, `rack_city`, `rack_country`) VALUES (NULL, '$rack_name', '$rack_size', '0', '$rack_city', '$rack_country');";
	if ($conn->query($sql) === TRUE) {
		$event_type = "New Rackspace";
		$event_message = "New rackspace $rack_name added";
		$event_status = "Complete";
		add_event($event_type, $event_message, $event_status);
    	$_SESSION['success'] = "Success, Rackspace added into DCIMStack";
    	header('Location: add_rackspace.php');
	} else {
		$_SESSION['error'] = "Error, Rackspace not added into DCIMStack";
		header('Location: add_rackspace.php');
	}
	$conn->close();
}
?>