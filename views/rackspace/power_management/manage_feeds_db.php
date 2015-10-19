<?php
include 'config/db.php';
include 'libraries/events.php';
include 'libraries/general.php';
$rackid       = mysqli_real_escape_string($conn, $_POST['rackid']);
$feed_type    = mysqli_real_escape_string($conn, $_POST['feed_type']);
$feed_power   = mysqli_real_escape_string($conn, $_POST['feed_power']);
$feed_voltage = mysqli_real_escape_string($conn, $_POST['feed_voltage']);
$feedid       = mysqli_real_escape_string($conn, $_POST['feedid']);

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
if(empty($feedid)) {
	$_SESSION['error'] = "Error, FeedID missing.";
	header('feedid: rackspace.php?rackid='.$rackid);
}

if(isset($rackid, $feed_type, $feed_voltage, $feed_power, $feedid)) {
	$sql = "UPDATE `power_feeds` SET `feed_type`='$feed_type', `feed_voltage`='$feed_voltage', `feed_power`='$feed_power' WHERE `feed_id`='$feedid'";
	if ($conn->query($sql) === TRUE) {
    	$rack_name = get_rack_name($rackid);
		$event_type = "Power Feed Modified";
		$event_message = "Power feed $power_type attached to $rack_name was modified.";
		$event_status = "Complete";
		add_event($event_type, $event_message, $event_status);

	    $_SESSION['success'] = "Success, Power feed $feed_type modified.";
	    header('Location: rackspace.php?rackid='.$rackid);
	} else {
	    $_SESSION['error'] = "Error, Power feed $feed_type not modified.";
	    header('Location: rackspace.php?rackid='.$rackid);
	}
	$conn->close();
} 
?>