<?php
include 'config/db.php';
include 'libraries/events.php';
include 'libraries/general.php';
$device_id = mysqli_real_escape_string($conn, $_GET['device_id']);
if(ctype_digit($device_id) && !empty($device_id)) {
  $sql = "DELETE FROM `devices` WHERE `device_id`='$device_id'";
  if ($conn->query($sql) === TRUE) { //set success message
    $device_label = get_device_label_from_id($device_id);
    $event_type = "Device Removed";
    $event_message = "Device $device_label was removed";
    $event_status = "Complete";
    add_event($event_type, $event_message, $event_status);
      $_SESSION['success'] = "Success, device removed.";
  } else { //set error message
    $_SESSION['error'] = "Error, device not removed.";
  }
  //redirect back to where we came from
  $referrer = $_SESSION['referrer'];
  unset($_SESSION['referrer']); //clear session var
  header("Location: $referrer"); //redirect!
} 
?>