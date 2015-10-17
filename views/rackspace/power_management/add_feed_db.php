<?php
include 'config/db.php';
include 'libraries/events.php';
include 'libraries/general.php';
$rackid       = mysqli_real_escape_string($conn, $_POST['rackid']);
$feed_type    = mysqli_real_escape_string($conn, $_POST['feed_type']);
$feed_power   = mysqli_real_escape_string($conn, $_POST['feed_power']);
$feed_voltage = mysqli_real_escape_string($conn, $_POST['feed_voltage']);

if(empty($rackid)) {
	$_SESSION['error'] = "Error, RackID missing.";
	header('Location: rackspace.php?rackid='.$rackid);
}
if(empty($feed_type)) {
	$_SESSION['error'] = "Error, Feed Type not set.";
	header('Location: rackspace.php?rackid='.$rackid);
}
if(empty($feed_voltage)) {
	$_SESSION['error'] = "Error, Feed Voltage not set.";
	header('Location: rackspace.php?rackid='.$rackid);
}
if(empty($feed_power)) {
	$_SESSION['error'] = "Error, Feed Power not set.";
	header('Location: rackspace.php?rackid='.$rackid);
}

if(isset($rackid, $feed_type, $feed_voltage, $feed_power)) {
	$sql = "INSERT INTO `dcimstack`.`power_feeds` (`rackid`, `feed_id`, `feed_type`, `feed_power`, `feed_voltage`) 
			VALUES ('$rackid', NULL, '$feed_type', '$feed_power', '$feed_voltage');";
	if ($conn->query($sql) === TRUE) {
    	$rack_name = get_rack_name($rackid);
		$event_type = "Power Feed Added";
		$event_message = "A power feed was added to $rack_name was updated";
		$event_status = "Complete";
		add_event($event_type, $event_message, $event_status);

	    $_SESSION['success'] = "Success, Power feed $feed_type added.";
	    header('Location: rackspace.php?rackid='.$rackid);
	} else {
	    $_SESSION['error'] = "Error, Power feed $feed_type not added.";
	    header('Location: rackspace.php?rackid='.$rackid);
	}
	$conn->close();
} 
?>