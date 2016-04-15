<?php
include 'config/db.php';
include_once 'libraries/events.php';
if (isset($_POST['tracking_id'], $_POST['shipping_courier'], $_POST['delivery_eta'], $_POST['delivery_status'])) {
  $tracking_id      = mysqli_real_escape_string($conn, $_POST['tracking_id']);
  $shipping_courier = mysqli_real_escape_string($conn, $_POST['shipping_courier_custom']);
  if(empty($shipping_courier)) {
    $shipping_courier = mysqli_real_escape_string($conn, $_POST['shipping_courier']);
  }
  $delivery_eta     = mysqli_real_escape_string($conn, $_POST['delivery_eta']);
  $delivery_status  = mysqli_real_escape_string($conn, $_POST['delivery_status']);
  $shipment_notes  = mysqli_real_escape_string($conn, $_POST['shipment_notes']);
  $sql = "INSERT INTO `shipments` (`id`, `shipment_tracking_id`, `shipment_courier`, `shipment_delivery_eta`, `shipment_status`, `shipment_notes`) 
			   VALUES (NULL, '$tracking_id', '$shipping_courier', '$delivery_eta','$delivery_status', '$shipment_notes');";
  if ($conn->query($sql) === TRUE) {
      $event_type = "New Shipment";
      $event_message = "New shipment added";
      $event_status = "Complete";
      add_event($event_type, $event_message, $event_status);
      $_SESSION['success'] = "Success, Shipment added into DCIMStack.";
      header('Location: shipments.php');
  } else {
      $_SESSION['error'] = "Error, Shipment not added into DCIMStack";
      header('Location: shipments.php');
  }
} else {
  $_SESSION['error'] = "Error, Shipment not added into DCIMStack";
  header('Location: shipments.php');
}
?>