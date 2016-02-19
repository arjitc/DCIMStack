<?php
include 'config/db.php';
include 'libraries/events.php';
$rackid       = mysqli_real_escape_string($conn, $_POST['rackid']);
$rack_name    = mysqli_real_escape_string($conn, $_POST['rack_name']);
$rack_size    = mysqli_real_escape_string($conn, $_POST['rack_size']);
$rack_city    = mysqli_real_escape_string($conn, $_POST['rack_city']);
$rack_country = mysqli_real_escape_string($conn, $_POST['rack_country']);
if(isset($rackid, $rack_name, $rack_size, $rack_city, $rack_country)) {
  $sql = "UPDATE `rackspace` SET `rack_name`='$rack_name' WHERE `rackid`='$rackid'";
  $conn->query($sql);
	
  $sql = "UPDATE `rackspace` SET `rack_size`='$rack_size' WHERE `rackid`='$rackid'";
  $conn->query($sql);
	
  $sql = "UPDATE `rackspace` SET `rack_city`='$rack_city' WHERE `rackid`='$rackid'";
  echo $conn->query($sql);
	
  $sql = "UPDATE `rackspace` SET `rack_country`='$rack_country' WHERE `rackid`='$rackid'";
  $conn->query($sql);
	
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
?>