<?php
include 'config/db.php';
include 'libraries/events.php';
error_reporting(-1);
ini_set('display_errors', 'On');
$id           = mysqli_real_escape_string($conn, $_POST['rack_id']);
$rack_name    = mysqli_real_escape_string($conn, $_POST['rack_name']);
$rack_size    = mysqli_real_escape_string($conn, $_POST['rack_size']);
$rack_city    = mysqli_real_escape_string($conn, $_POST['rack_city']);
$rack_country = mysqli_real_escape_string($conn, $_POST['rack_country']);
$rack_power   = mysqli_real_escape_string($conn, $_POST['rack_power']);
$rack_voltage = mysqli_real_escape_string($conn, $_POST['rack_voltage']);
if(isset($id, $rack_name, $rack_size, $rack_city, $rack_country, $rack_power, $rack_voltage)) {
	$sql = "UPDATE `rackspace` SET `rack_name`='$rack_name' WHERE `id`='$id'";
	$conn->query($sql);
	//echo $conn->error;
	$sql = "UPDATE `rackspace` SET `rack_size`='$rack_size' WHERE `id`='$id'";
	$conn->query($sql);
	//echo $conn->error;
	$sql = "UPDATE `rackspace` SET `rack_power`='$rack_power' WHERE `id`='$id'";
	$conn->query($sql);
	//echo $conn->error;
	$sql = "UPDATE `rackspace` SET `rack_voltage`='$rack_voltage' WHERE `id`='$id'";
	$conn->query($sql);
	//echo $conn->error;
	$sql = "UPDATE `rackspace` SET `rack_city`='$rack_city' WHERE `id`='$id'";
	echo $conn->query($sql);
	//echo $conn->error;
	$sql = "UPDATE `rackspace` SET `rack_country`='$rack_country' WHERE `id`='$id'";
	$conn->query($sql);
	//echo $conn->error;
	$event_type = "Rackspace Modified";
	$event_message = "Rackspace $rack_name was updated";
	$event_status = "Complete";
	add_event($event_type, $event_message, $event_status);
    $_SESSION['success'] = "Success, Rackspace modified.";
    header('Location: manage_rackspace.php');
	$conn->close();
} 
if(empty($rack_name)) {
	$_SESSION['error'] = "Error, Rack Name not set.";
	header('Location: manage_rackspace.php');
}
if(empty($rack_size)) {
	$_SESSION['error'] = "Error, Rack Size not set.";
	header('Location: manage_rackspace.php');
}
if(empty($rack_city)) {
	$_SESSION['error'] = "Error, Rack City not set.";
	header('Location: manage_rackspace.php');
}
if(empty($rack_country)) {
	$_SESSION['error'] = "Error, Rack Country not set.";
	header('Location: manage_rackspace.php');
}
if(empty($rack_power)) {
	$_SESSION['error'] = "Error, Rack Power not set.";
	header('Location: manage_rackspace.php');
}
if(empty($rack_voltage)) {
	$_SESSION['error'] = "Error, Rack Voltage not set.";
	header('Location: manage_rackspace.php');
}
?>