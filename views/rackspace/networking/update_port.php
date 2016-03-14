<?php
include 'config/db.php';
include 'networking_functions.php';
$device_id = mysqli_real_escape_string($conn, $_POST['device_id']);
$port_number = mysqli_real_escape_string($conn, $_POST['port_number']);
$port_name = mysqli_real_escape_string($conn, $_POST['port_name']);
$port_label = mysqli_real_escape_string($conn, $_POST['port_label']);
$page_referrer = $_POST['page_referrer'];
if(port_config_exists($port_number, $device_id) == 1) {
	$sql = "UPDATE `networking` SET `port_name` = '$port_name' WHERE `port_number` = '$port_number'";
	$conn->query($sql);
	$sql = "UPDATE `networking` SET `port_label` = '$port_label' WHERE `port_number` = '$port_number'";
	$conn->query($sql);
	$_SESSION['success'] = "Port information updated.";
	header("Location: $page_referrer");
} else {
	$sql = "INSERT INTO `networking` (`id`, `device_id`, `port_number`, `port_status`, `port_label`, `port_name`) 
	VALUES (NULL, '$device_id', '$port_number', '1', '$port_label', '$port_name');";
	$conn->query($sql);
	$_SESSION['success'] = "Port information added.";
	header("Location: $page_referrer");
}
?>