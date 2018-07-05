<?php
include 'config/db.php';
include 'libraries/hipchat.php';
$shipment_id = mysqli_real_escape_string($conn, $_POST['shipment_id']);
$shipment_tracking_id =  mysqli_real_escape_string($conn, $_POST['shipment_tracking_id']);
$shipment_notes = mysqli_real_escape_string($conn, $_POST['shipment_notes']);
$shipment_status = mysqli_real_escape_string($conn, $_POST['shipment_status']);
$shipment_delivery_eta = mysqli_real_escape_string($conn, $_POST['shipment_delivery_eta']);
$shipment_courier = mysqli_real_escape_string($conn, $_POST['shipment_courier']);
if(isset($_POST['shipment_tracking_id'], $_POST['shipment_id'])) {
    $sql = "UPDATE `shipments` SET `shipment_tracking_id`='$shipment_tracking_id' WHERE `id`='$shipment_id'";
    $conn->query($sql);
    $_SESSION['success'] = "Success, Shipment updated.";
} 
if(isset($_POST['shipment_notes'], $_POST['shipment_id'])) {
    $sql = "UPDATE `shipments` SET `shipment_notes`='$shipment_notes' WHERE `id`='$shipment_id'";
    $conn->query($sql);
    $_SESSION['success'] = "Success, Shipment updated.";
}
if(isset($_POST['shipment_status'], $_POST['shipment_id'])) {
    $sql = "UPDATE `shipments` SET `shipment_status`='$shipment_status' WHERE `id`='$shipment_id'";
    $conn->query($sql);
    hipchat_alert("Shipment $shipment_tracking_id has been updated to $shipment_status");
    $_SESSION['success'] = "Success, Shipment updated.";
}
if(isset($_POST['shipment_delivery_eta'], $_POST['shipment_id'])) {
    $sql = "UPDATE `shipments` SET `shipment_delivery_eta`='$shipment_delivery_eta' WHERE `id`='$shipment_id'";
    $conn->query($sql);
    hipchat_alert("Shipment $shipment_tracking_id delivery ETA has been updated to $shipment_delivery_eta");
    $_SESSION['success'] = "Success, Shipment updated.";
}
if(isset($_POST['shipment_courier'], $_POST['shipment_id'])) {
    $sql = "UPDATE `shipments` SET `shipment_courier`='$shipment_courier' WHERE `id`='$shipment_id'";
    $conn->query($sql);
    $_SESSION['success'] = "Success, Shipment updated.";
}
header('Location: shipments.php');
?>