<?php
include 'config/db.php';
include 'libraries/events.php';
include 'libraries/general.php';

if (isset($_POST['device_id']) && $_POST['disk_status'] == "status_disk") {

$device_id = mysqli_real_escape_string($conn, $_POST['device_id']);

if (ctype_digit($device_id) && !empty($device_id)) {

  $sql = "UPDATE `devices` SET `device_inuse`='0',`device_parent`='NULL' WHERE `device_id`='$device_id'";
  if ($conn->query($sql) === TRUE) { //set success message
        $event_message = "Device status updated to not in use";
    }
    else {
        $event_message = "Device update Failed";
    }

    $event_status = "Complete";
    
    add_event("disk updated", $event_message, $event_status);

    $_SESSION['success'] = "Success";
    }
     else { //set error message
    $_SESSION['error'] = "Error";
  }
  //redirect back to where we came from
  $referrer = basename($_SESSION['referrer']);
  unset($_SESSION['referrer']); //clear session var
  header("Location: $referrer"); //redirect!
}
?>
