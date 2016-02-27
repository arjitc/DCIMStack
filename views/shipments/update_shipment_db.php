<?php
include 'config/db.php';
$shipment_id = mysqli_real_escape_string($conn, $_POST['shipment_id']);
$shipment_tracking_id =  mysqli_real_escape_string($conn, $_POST['shipment_tracking_id']);
$shipment_notes = mysqli_real_escape_string($conn, $_POST['shipment_notes']);
if(isset($_POST['shipment_tracking_id'], $_POST['shipment_id'])) {
    $sql = "UPDATE `shipments` SET `shipment_tracking_id`='$tracking_id' WHERE `id`='$shipment_id'";
    $conn->query($sql);
    $_SESSION['success'] = "Success, Shipment updated.";
    header('Location: shipments.php');
} 
if(isset($_POST['shipment_notes'], $_POST['shipment_id'])) {
    $sql = "UPDATE `shipments` SET `shipment_notes`='$shipment_notes' WHERE `id`='$shipment_id'";
    $conn->query($sql);
    $_SESSION['success'] = "Success, Shipment updated.";
    header('Location: shipments.php');
}
?>