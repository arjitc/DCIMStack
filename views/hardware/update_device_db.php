<?php
include 'libraries/db.php';
include 'libraries/events.php';
include 'libraries/general.php';
error_reporting(-1);
ini_set('display_errors', 'On');
$referrer = mysqli_real_escape_string($conn, $_POST['referrer']);
$device_id = mysqli_real_escape_string($conn, $_POST['device_id']);
if(empty($device_id)) { $device_id = mysqli_real_escape_string($conn, $_GET['device_id']); }
if(empty($referrer)) { $referrer = $_SESSION['referrer']; }

if(isset($_POST['device_brand'])) {
	$device_brand = mysqli_real_escape_string($conn, $_POST['device_brand']);
	$sql = "UPDATE `devices` SET `device_brand`='$device_brand' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_location'])) {
	$device_location = mysqli_real_escape_string($conn, $_POST['device_location']);
	$sql = "UPDATE `devices` SET `rackid`='$device_location' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_label'])) {
	$device_label = mysqli_real_escape_string($conn, $_POST['device_label']);
	$sql = "UPDATE `devices` SET `device_label`='$device_label' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_ram_total'])) {
	$device_ram_total = mysqli_real_escape_string($conn, $_POST['device_ram_total'])." GB";
	$sql = "UPDATE `devices` SET `device_ram_total`='$device_ram_total' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_cpu_count'])) {
	$device_cpu_count = mysqli_real_escape_string($conn, $_POST['device_cpu_count']);
	$sql = "UPDATE `devices` SET `device_cpu_count`='$device_cpu_count' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_cpu'])) {
	$device_cpu = mysqli_real_escape_string($conn, $_POST['device_cpu']);
	$sql = "UPDATE `devices` SET `device_cpu`='$device_cpu' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_mgmt_mac'])) {
	$device_mgmt_mac = mysqli_real_escape_string($conn, $_POST['device_mgmt_mac']);
	$sql = "UPDATE `devices` SET `device_mgmt_mac`='$device_mgmt_mac' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_mgmt_ip'])) {
	$device_mgmt_ip = mysqli_real_escape_string($conn, $_POST['device_mgmt_ip']);
	$sql = "UPDATE `devices` SET `device_mgmt_ip`='$device_mgmt_ip' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_size'])) {
	$device_size = mysqli_real_escape_string($conn, $_POST['device_size']);
	$sql = "UPDATE `devices` SET `device_size`='$device_size' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_mac'])) {
	$device_mac = mysqli_real_escape_string($conn, $_POST['device_mac']);
	$sql = "UPDATE `devices` SET `device_mac`='$device_mac' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_serial'])) {
	$device_serial = mysqli_real_escape_string($conn, $_POST['device_serial']);
	$sql = "UPDATE `devices` SET `device_serial`='$device_serial' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_ipaddress'])) {
	$device_ipaddress = mysqli_real_escape_string($conn, $_POST['device_ipaddress']);
	$sql = "UPDATE `devices` SET `device_ipaddress`='$device_ipaddress' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_GET['device_inuse'])) {
	$device_inuse = mysqli_real_escape_string($conn, $_GET['device_inuse']);
	if($device_inuse==1 OR $device_inuse==0) {
		$sql = "UPDATE `devices` SET `device_inuse`='$device_inuse' WHERE `device_id`='$device_id'";
		$conn->query($sql);
	}
}
unset($_SESSION['referrer']); //clear session var
header("Location: $referrer"); //redirect!
?>
