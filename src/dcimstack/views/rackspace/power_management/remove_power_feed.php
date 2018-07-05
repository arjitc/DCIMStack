<?php
include 'config/db.php';
include 'libraries/events.php';
include 'libraries/general.php';
$feed_id = mysqli_real_escape_string($conn, $_GET['feed_id']);
if (ctype_digit($feed_id) && !empty($feed_id)) {
  $sql = "DELETE FROM `power_feeds` WHERE `feed_id`='$feed_id'";
  if ($conn->query($sql) === TRUE) { //set success message
    $event_type = "Power Feed Removed";
    $event_message = "A Power feed was removed";
    $event_status = "Complete";
    add_event($event_type, $event_message, $event_status);
      $_SESSION['success'] = "Success, power feed removed.";
  } else { //set error message
    $_SESSION['error'] = "Error, power feed not removed.";
  }
  //redirect back to where we came from
  $referrer = $_SESSION['referrer'];
  unset($_SESSION['referrer']); //clear session var
  header("Location: $referrer"); //redirect!
} 
?>