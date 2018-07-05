<?php
include 'config/db.php';
include 'libraries/events.php';
include 'libraries/general.php';
$shipment_id = mysqli_real_escape_string($conn, $_GET['shipment_id']);
if (ctype_digit($shipment_id) && !empty($shipment_id)) {
  $sql = "DELETE FROM `shipments` WHERE `id`='$shipment_id'";
  if ($conn->query($sql) === TRUE) { //set success message
    $tracking_id = get_tracking_from_id($shipment_id);
    $event_type = "Shipment Removed";
    $event_message = "Shipment $tracking_id was removed";
    $event_status = "Complete";
    add_event($event_type, $event_message, $event_status);
    $_SESSION['success'] = "Success, shipment removed.";
  } else { //set error message
    $_SESSION['error'] = "Error, shipment not removed.";
  }
  //redirect back to where we came from
  $referrer = $_SESSION['referrer'];
  unset($_SESSION['referrer']); //clear session var
  header("Location: $referrer"); //redirect!
} 
?>