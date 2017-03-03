<?php
//include 'libraries/db.php';
include 'libraries/events.php';
include 'libraries/general.php';
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
if(isset($_POST['device_customer'])) {
	$device_customer = mysqli_real_escape_string($conn, $_POST['device_customer']);
	$sql = "UPDATE `devices` SET `device_customer`='$device_customer' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_GET['device_inuse'])) {
	$device_inuse = mysqli_real_escape_string($conn, $_GET['device_inuse']);
	if($device_inuse==1 OR $device_inuse==0) {
		$sql = "UPDATE `devices` SET `device_inuse`='$device_inuse' WHERE `device_id`='$device_id'";
		$conn->query($sql);
	}
}
if(isset($_POST['device_notes'])) {
	$device_notes = mysqli_real_escape_string($conn, $_POST['device_notes']);
	$sql = "UPDATE `devices` SET `device_notes`='$device_notes' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_capacity'])) {
	$device_capacity = mysqli_real_escape_string($conn, $_POST['device_capacity']);
	$sql = "UPDATE `devices` SET `device_capacity`='$device_capacity' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_rma'])) {
	$device_rma = mysqli_real_escape_string($conn, $_POST['device_rma']);
	$sql = "UPDATE `devices` SET `device_rma`='$device_rma' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_rma_date'])) {
	//$device_rma_date = mysqli_real_escape_string($conn, $_POST['device_rma_date']);
	$sql = "UPDATE `devices` SET `device_rma_date`=NOW() WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
if(isset($_POST['device_rma_notes'])) {
	$device_rma_notes = mysqli_real_escape_string($conn, $_POST['device_rma_notes']);
	$sql = "UPDATE `devices` SET `device_rma_notes`='$device_rma_notes' WHERE `device_id`='$device_id'";
	$conn->query($sql);
}
//UPDATE users SET last_logged = NOW() WHERE id = 1
if(isset($_POST['device_parent'])) {
	if($_POST['device_parent']!=0) {
		$device_parent = mysqli_real_escape_string($conn, $_POST['device_parent']);
		$sql = "UPDATE `devices` SET `device_parent`='$device_parent' WHERE `device_id`='$device_id'";
		$conn->query($sql);
		$sql = "UPDATE `devices` SET `device_inuse`='1' WHERE `device_id`='$device_id'";
		$conn->query($sql);
	} else {
		$sql = "UPDATE `devices` SET `device_parent`='' WHERE `device_id`='$device_id'";
		$conn->query($sql);
		$sql = "UPDATE `devices` SET `device_inuse`='0' WHERE `device_id`='$device_id'";
		$conn->query($sql);
	}
}
unset($_SESSION['referrer']); //clear session var
header("Location: $referrer"); //redirect!
?>
