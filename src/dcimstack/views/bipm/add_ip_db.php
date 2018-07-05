<?php
include 'config/db.php';
include_once 'libraries/events.php';
if (isset($_POST['ip_range'], $_POST['ip_address_first'], $_POST['ip_address_last'])) {
  $ip_range = mysqli_real_escape_string($conn, $_POST['ip_range']);
  $ip_address_gateway = mysqli_real_escape_string($conn, $_POST['ip_address_gateway']);
  $ip_address_subnet = mysqli_real_escape_string($conn, $_POST['ip_address_subnet']);
  $ip_notes  = mysqli_real_escape_string($conn, $_POST['ip_notes']);

  $ip_address_first = mysqli_real_escape_string($conn, $_POST['ip_address_first']);
  $ip_address_last     = mysqli_real_escape_string($conn, $_POST['ip_address_last']);

  #Node SQL
  $sql = "INSERT INTO `bipm` (`id`, `ip_range`, `ip_address_gateway`, `ip_address_subnet`, `ip_range_node`, `ip_notes`) 
			   VALUES (NULL, '$ip_range', '$ip_address_gateway', '$ip_address_subnet','NULL', '$ip_notes')";
  #IP Subnet Sql

$trimmed = substr($ip_range, 0, strrpos($ip_range, "."));


if ($conn->query($sql) === TRUE) {
	$last_row = mysqli_insert_id($conn);
	$results = $conn->query("UPDATE bipm SET ip_range_node='$last_row' WHERE ID=$last_row");

	if($results){
		$event_type = "New Ip Subnet";
		$event_message = "New ip address added";
		$event_status = "Complete";
		add_event($event_type, $event_message, $event_status);
		$_SESSION['success'] = "Success, IP's added into DCIMStack.";
	}else{
		print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
	}

	foreach (range($ip_address_first, $ip_address_last) as $number) {
	$ip = $trimmed . '.' . $number;

	$sqlip = "INSERT INTO `bipm_iplist` (`id`, `ip`, `ip_node`) 
			   VALUES (NULL, '$ip', '$last_row')";

	if ($conn->query($sqlip) === TRUE) {
	}

}


      header('Location: bipm.php');
  } else {
      $_SESSION['error'] = "Error, IP's not added into DCIMStack";
      header('Location: bipm.php');
  }
} else {
  $_SESSION['error'] = "Error, IP's not added into DCIMStack";
  header('Location: bipm.php');
}
?>