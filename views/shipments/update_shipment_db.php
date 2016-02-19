<?php
include 'config/db.php';
$tracking_id = mysqli_real_escape_string($conn, $_POST['shipment_tracking_id']);
$shipment_id =  mysqli_real_escape_string($conn, $_POST['shipment_id']);
if(isset($tracking_id)) {
    $delivery_status = mysqli_real_escape_string($conn, $_GET['delivery_status']);
    $sql = "UPDATE `shipments` SET `shipment_tracking_id`='$tracking_id' WHERE `id`='$shipment_id'";
    $conn->query($sql);
    $_SESSION['success'] = "Success, Shipment updated.";
    header('Location: shipments.php');
} else {
  $_SESSION['error'] = "Error, Shipment not updated.";
  header('Location: shipments.php');
}
?>