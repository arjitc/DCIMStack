<?php
include 'libraries/db.php';
include 'libraries/events.php';
include 'libraries/general.php';
$page_referrer = mysqli_real_escape_string($conn, $_POST['page_referrer']);
if(empty($page_referrer)) { $page_referrer = $_SESSION['referrer']; }
$device_brand = mysqli_real_escape_string($conn, $_POST['device_brand']);
$device_type = mysqli_real_escape_string($conn, $_POST['device_type']);
$device_location = mysqli_real_escape_string($conn, $_POST['device_location']);
$device_label = mysqli_real_escape_string($conn, $_POST['device_label']);
$device_hostingname = mysqli_real_escape_string($conn, $_POST['device_hostingname']);
$device_serial = mysqli_real_escape_string($conn, $_POST['device_serial']);
$device_capacity = mysqli_real_escape_string($conn, $_POST['device_capacity'])." ".mysqli_real_escape_string($conn, $_POST['device_capacity_size']);
$device_mac = mysqli_real_escape_string($conn, $_POST['device_mac']);
$device_ram_total = mysqli_real_escape_string($conn, $_POST['device_ram_total'])." GB";
if(empty($_POST['device_ram_total'])) {
	$device_ram_total = mysqli_real_escape_string($conn, $_POST['device_ram_total']);
}
$device_cpu_count = mysqli_real_escape_string($conn, $_POST['device_cpu_count']);
$device_power_usage = mysqli_real_escape_string($conn, $_POST['device_power_usage']);
$device_power_feed1 = mysqli_real_escape_string($conn, $_POST['device_power_feed1']);
$device_power_feed2 = mysqli_real_escape_string($conn, $_POST['device_power_feed2']);
$device_cpu = mysqli_real_escape_string($conn, $_POST['device_cpu']);
$device_rack_position = mysqli_real_escape_string($conn, $_POST['device_rack_position']);
$device_size = mysqli_real_escape_string($conn, $_POST['device_size']);
$device_notes = mysqli_real_escape_string($conn, $_POST['device_notes']);
$device_dop = mysqli_real_escape_string($conn, $_POST['device_dop']);
$device_warranty = mysqli_real_escape_string($conn, $_POST['device_warranty']);
$device_tracking_id = mysqli_real_escape_string($conn, $_POST['device_tracking_id']);
$device_mgmt_mac = mysqli_real_escape_string($conn, $_POST['device_mgmt_mac']);
$device_ipaddress = mysqli_real_escape_string($conn, $_POST['device_ipaddress']);
$device_mgmt_ip = mysqli_real_escape_string($conn, $_POST['device_mgmt_ip']);
$device_parent = mysqli_real_escape_string($conn, $_POST['device_parent']);
$device_inuse = mysqli_real_escape_string($conn, $_POST['device_inuse']);


if(isset($device_location)) {
$device_parent = $device_location;
}
if($device_location != '522') {
$device_inuse = '1';
}

if(empty($device_size)) { $device_size=0; }
$sql = "INSERT INTO `devices`
(`device_id`, `rackid`, `device_type`, `device_label`, `device_hostingname`, `device_inuse`, `device_brand`, `device_serial`, `device_mac`, `device_ram_total`, `device_capacity`, `device_cpu_count`, `device_power_usage`, `device_power_feed1`, `device_power_feed2`, `device_cpu`, `device_rack_position`, `device_parent`, `device_size`, `device_warranty`,`device_dop`, `device_tracking_id`, `device_ipaddress`, `device_mgmt_ip`, `device_mgmt_mac`,`device_notes`)
VALUES
(NULL,
	'$device_location',
	'$device_type',
	'$device_label',
	'$device_hostingname',
	'$device_inuse',
	'$device_brand',
	'$device_serial',
	'$device_mac',
	'$device_ram_total',
	'$device_capacity',
	'$device_cpu_count',
	'$device_power_usage',
	'$device_power_feed1',
	'$device_power_feed2',
	'$device_cpu',
	'$device_rack_position',
	'$device_parent',
	'$device_size',
	'$device_warranty',
	'$device_dop',
	'$device_tracking_id',
	'$device_ipaddress',
	'$device_mgmt_ip',
	'$device_mgmt_mac',
	'$device_notes');";

if ($conn->query($sql) === TRUE) {
	$rack_name = get_rack_name($device_location);
	if(empty(get_rack_name($device_location))) {
		$rack_name = $device_location;
	}
	$event_type = "New $device_type added";
	$event_message = "A new $device_type $device_label was added to $rack_name";
	$event_status = "Complete";
	add_event($event_type, $event_message, $event_status);
	$conn->close();
	$_SESSION['success'] = "Success, $device_type added.";
	header("Location: $page_referrer");
} else {
	$_SESSION['error'] = "Error, $device_type not added.";
	header("Location: $page_referrer");
}
?>
