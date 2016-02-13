<?php
include 'config/db.php';
include_once 'libraries/events.php';
if (isset($_POST['tracking_id'], $_POST['shipping_courier'], $_POST['delivery_eta'], $_POST['delivery_status'])) {
  $tracking_id      = mysqli_real_escape_string($conn, $_POST['tracking_id']);
  $shipping_courier = mysqli_real_escape_string($conn, $_POST['shipping_courier']);
  $delivery_eta     = mysqli_real_escape_string($conn, $_POST['delivery_eta']);
  $delivery_status  = mysqli_real_escape_string($conn, $_POST['delivery_status']);
  $sql = "INSERT INTO `dcimstack`.`shipments` (`id`, `tracking_id`, `shipping_courier`, `delivery_eta`, `delivery_status`) 
			   VALUES (NULL, '$tracking_id', '$shipping_courier', '$delivery_eta','$delivery_status');";
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